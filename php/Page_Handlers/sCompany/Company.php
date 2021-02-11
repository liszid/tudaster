<?php

declare(strict_types=1);

namespace Page_Handlers\sCompany;

use PreLoad\{
    Valid
    ,Check
    ,Log
};

use Samples\{
    sElement
    ,sCard
    ,sTranslate
    ,sTables
    ,sFrame
};

class Company extends \Page_Handlers\sCompany
{
    public static function Filter(array $array = array()): string
    {
        self::setDCombined();
        $Company_Site = self::$dCombined->Select(array('companyId' => (int)$array['dp']), 'Company_Site_Filter');
        $returnContent = sTables::Prompt($Company_Site, 'Company_Site_Filter');

        return sFrame::Page(array('path' => 'Company/Company/Filter', 'content' => $returnContent));
    }

/*
* Returns Company Adding form
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.13
*/
    public static function Add(array $array = array()): string
    {
        self::setDCompany();
        if (! isset($array['Save'])) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">'
                            .sElement::General(array('origo' => 'usrCmpCmpAdd', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input')
                            .sElement::General(array('constData' => self::COMPANY, 'staticData' => array('origo' => 'usrCmpCmpAdd', 'tag' => 'Add')),'Generate_Form')
                        .'</div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrCmpCmpAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dCompany->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Company', 'y' => 'Company'), 'Spinner');
        }
    }

/*
* Fires Company View
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.13
*/
    public static function View(array $array = array()): string
    {
        self::setDCompany();
        $Company = (self::$dCompany->Select(array('companyId' => (int)$array['dp']), 'byCompanyId'))[0];
        return '
            <form method="post" class="form-group col-12" autocomplete="on">
                <div class="form-group col p-0">
                    <div class="col-12 row">'
                        .sCard::Collapsible(array('header' => 'Alap adatok', 'content' => sElement::General(array('constData' => self::COMPANY, 'staticData' => array('origo' => 'usrCmpCmpView', 'tag' => 'View'),'valueData' => $Company),'Generate_Form')))
                        .sElement::General( array('origo' => 'usrCmpCmpView', 'data' => 'userName', 'desc' => 'Hozzáadta', 'value' => $Company['userName'], 'type' => 'text', 'disabled' => true), 'Input')
                        .sElement::General( array('origo' => 'usrCmpCmpView', 'data' => 'companyDate','desc' => 'Hozzáadva','value' => $Company['companyDate'], 'type' => 'text', 'disabled' => true), 'Input')
                    .'</div>
                </div>
            </form>';
    }

/*
* Fires Company Edit
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.13
*/
    public static function Edit(array $array = array()): string
    {
        self::setDCompany();
        if (! isset($array['Save'])) {
            $Company = (self::$dCompany->Select(array('companyId' => (int)$array['dp']), 'byCompanyId'))[0];
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">'
                            .sElement::General(array('origo' => 'usrCmpCmpEdit', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input')
                            .sElement::General(array('origo' => 'usrCmpCmpEdit', 'data' => 'companyId', 'desc' => '', 'value' => $array['dp'], 'type' => 'hidden'), 'Input')
                            .sElement::General(array('constData' => self::COMPANY, 'staticData' => array('origo' => 'usrCmpCmpEdit', 'tag' => 'Edit'),'valueData' => $Company),'Generate_Form')
                        .'</div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrCmpCmpEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (
                        self::$dCompany->Update($array)
                    )
                    ? sTranslate::ACTION['Success']['content']
                    : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Company', 'y' => 'Company'), 'Spinner');
        }
    }

/*
* Fires Company Delete
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.13
*/
    public static function Delete(array $array = array()): string
    {
        self::setDCompany();
        return
            '<h4>'.(
                (
                    self::$dCompany->Delete(
                        array(
                            'companyId' => (int)$array['dp']
                        )
                    )
                )
                ? sTranslate::ACTION['Success']['content']
                : sTranslate::ACTION['Fail']['content']
            ).'</h4>'.sElement::General(array('x' => 'Company', 'y' => 'Company'), 'Spinner');
    }

}

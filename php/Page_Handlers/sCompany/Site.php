<?php

declare(strict_types=1);

namespace Page_Handlers\sCompany;

use PreLoad\{
    Valid,
    Check,
    Log
};

use Samples\{
    sCard,
    sElement,
    sTranslate
};

class Site extends \Page_Handlers\sCompany
{
/*
 * Returns Company Site Adding form
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.13
 */
    public static function Add(array $array = array()): string
    {
        self::setDCompany_Site();
        if (! isset($array['Save'])) {
            self::setDCompany();
            self::setDCompany_Site_Type();

            $companySelect = array();
            $companySiteType = array();

            foreach(self::$dCompany->Select(array(), 'forCompanySelect') as $i) {
                $companySelect[] = array('id' => $i['companyId'], 'name' => $i['companyName']);
            }

            foreach(self::$dCompany_Site_Type->Select(array(), 'All') as $i) {
                $companySiteType[] = array('id' => $i['companySiteTypeId'], 'name' => $i['companySiteTypeName']);
            }

            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'usrCmpSiteAdd', 'data' => 'userId', 'desc' => '', 'value' => $_SESSION['User']['userId'], 'type' => 'hidden'), 'Input').'
                            '.sElement::General(array('origo' => 'usrCmpSiteAdd', 'data' => 'companyId', 'desc' => 'Cég', 'value' => '', 'select' => $companySelect, 'type' => 'select'), 'Input').'
                            '.sElement::General(array('origo' => 'usrCmpSiteAdd', 'data' => 'companySiteName', 'desc' => 'Telephely neve', 'value' => '', 'type' => 'text', 'must-fill' => true), 'Input').'
                            '.sElement::General(array('origo' => 'usrCmpSiteAdd', 'data' => 'companySiteDesc', 'desc' => 'Telephely leírása', 'value' => '', 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'usrCmpSiteAdd', 'data' => 'companySiteTypeId', 'desc' => 'Telephely típusa', 'value' => '', 'select' => $companySiteType, 'type' => 'select'), 'Input').'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrCmpSiteAdd-button"'.((empty($companySelect))?' disabled' : '').'><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (
                        self::$dCompany_Site->Insert($array)
                    )
                    ? sTranslate::ACTION['Success']['content']
                    : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Company', 'y' => 'Site'), 'Spinner');
        }
    }

/*
 * Fires Company Site View
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.13
 */
    public static function View(array $array = array()): string
    {
        self::setDCombined();
        $Company_Site = (self::$dCombined->Select(array('companySiteId' => (int)$array['dp']), 'Company_Site_View'))[0];

        return '
            <form method="post" class="form-group col-12" autocomplete="on">
                <div class="form-group col p-0">
                    <div class="col-12 row">'
                        .sCard::Collapsible(array('header' => 'Cég adatok', 'content' => sElement::General(array('constData' => self::COMPANY, 'staticData' => array('origo' => 'usrCmpSiteView', 'tag' => 'View'),'valueData' => $Company_Site,'selectData' => array('companyId' => self::Company_Select())),'Generate_Form')))
                        .sCard::Collapsible(array('header' => 'Telephely adatok', 'content' => sElement::General(array('constData' => self::COMPANY_SITE, 'staticData' => array('origo' => 'usrCmpSiteView', 'tag' => 'View'),'valueData' => $Company_Site,'selectData' => array('companySiteTypeId' => self::Company_Site_Type_Select())),'Generate_Form')))
                        .sCard::Collapsible(array('header' => 'Telephely vezető adatok', 'content' => sElement::General(array('constData' => self::COMPANY_SITE_OWNER, 'staticData' => array('origo' => 'usrCmpSiteView', 'tag' => 'View'),'valueData' => $Company_Site),'Generate_Form')))
                        .sCard::Collapsible(array('header' => 'Telephely vezető helyettes adatok', 'content' => sElement::General(array('constData' => self::COMPANY_SITE_SUB_OWNER, 'staticData' => array('origo' => 'usrCmpSiteView', 'tag' => 'View'),'valueData' => $Company_Site),'Generate_Form')))
                        .sElement::General( array('origo' => 'usrCmpSiteView', 'data' => 'userName', 'desc' => 'Hozzáadta', 'value' => $Company_Site['userName'], 'type' => 'text', 'disabled' => true), 'Input')
                        .sElement::General( array('origo' => 'usrCmpSiteView', 'data' => 'companySiteDate','desc' => 'Hozzáadva','value' => $Company_Site['companySiteDate'], 'type' => 'text', 'disabled' => true), 'Input')
                    .'</div>
                </div>
            </form>';
    }

/*
 * Fires Company Site Edit
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.13
 */
    public static function Edit(array $array = array()): string
    {
        self::setDCompany_Site();
        if (! isset($array['Save'])) {
            self::setDCombined();

            $Company_Site = (self::$dCombined->Select(array('companySiteId' => (int)$array['dp']), 'Company_Site_View'))[0];

            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">'
                            .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input')
                            .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteId', 'desc' => '', 'value' => $array['dp'], 'type' => 'hidden'), 'Input')
                            .sCard::Collapsible(array('header' => 'Telephely adatok', 'content' => sElement::General(array('constData' => self::COMPANY_SITE, 'staticData' => array('origo' => 'usrCmpSiteEdit', 'tag' => 'Edit'),'valueData' => $Company_Site,'selectData' => array('companySiteTypeId' => self::Company_Site_Type_Select())),'Generate_Form')))
                            .sCard::Collapsible(array('header' => 'Telephely vezető adatok', 'content' => sElement::General(array('constData' => self::COMPANY_SITE_OWNER, 'staticData' => array('origo' => 'usrCmpSiteEdit', 'tag' => 'Edit'),'valueData' => $Company_Site),'Generate_Form')))
                            .sCard::Collapsible(array('header' => 'Telephely vezető helyettes adatok', 'content' => sElement::General(array('constData' => self::COMPANY_SITE_SUB_OWNER, 'staticData' => array('origo' => 'usrCmpSiteEdit', 'tag' => 'Edit'),'valueData' => $Company_Site),'Generate_Form')))
                        .'</div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrCmpSiteEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (
                        self::$dCompany_Site->Update($array)
                    )
                    ? sTranslate::ACTION['Success']['content']
                    : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Company', 'y' => 'Site'), 'Spinner');
        }
    }

/*
 * Fires Company Site Delete
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.13
 */
    public static function Delete(array $array = array()): string
    {
        self::setDCompany_Site();
        return
            '<h4>'.(
                (
                    isset($array['dp'])
                    && self::$dCompany_Site->Delete(
                        array(
                            'companySiteId' => (int)$array['dp']
                        )
                    )
                )
                ? sTranslate::ACTION['Success']['content']
                : sTranslate::ACTION['Fail']['content']
            ).'</h4>'.sElement::General(array('x' => 'Company', 'y' => 'Site'), 'Spinner');
    }

}

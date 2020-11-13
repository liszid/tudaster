<?php

declare(strict_types=1);

namespace Samples\sCompany;

use PreLoad\{
    Valid,
    Check,
    Log
};

use Samples\{
    sElement,
    sTranslate
};

class Site extends \Samples\sCompany
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
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'cmpSiteAdd', 'data' => 'companyId', 'desc' => 'Cég', 'value' => '', 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'cmpSiteAdd', 'data' => 'companySiteName', 'desc' => 'Telephely neve', 'value' => '', 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'cmpSiteAdd', 'data' => 'companySiteDesc', 'desc' => 'Telephely leírása', 'value' => '', 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'cmpSiteAdd', 'data' => 'companySiteType', 'desc' => 'Telephely típusa', 'value' => '', 'type' => 'text'), 'Input').'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="admUsrsAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dCompany_Site->Insert($array))
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
        self::setDCompany_Site();
        return
            '<h4>'.(
                (
                    self::$dCompany_Site->Select(
                        array(
                            'companySiteId' => (int)$array['dp']
                        ),'byCompanySiteId'
                    )
                )
                ? sTranslate::ACTION['Success']['content']
                : sTranslate::ACTION['Fail']['content']
            ).'</h4>'.sElement::General(array('x' => 'Company', 'y' => 'Site'), 'Spinner');
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
        return
            '<h4>'.(
                (
                    self::$dCompany_Site->Update(
                        array(
                            'companySiteId' => (int)$array['dp']
                        )
                    )
                )
                ? sTranslate::ACTION['Success']['content']
                : sTranslate::ACTION['Fail']['content']
            ).'</h4>'.sElement::General(array('x' => 'Company', 'y' => 'Site'), 'Spinner');
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
                    self::$dCompany_Site->Delete(
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

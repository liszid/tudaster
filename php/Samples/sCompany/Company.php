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

class Company extends \Samples\sCompany
{
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
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'cmpAdd', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input').'
                            '.sElement::General(array('origo' => 'cmpAdd', 'data' => 'companyName', 'desc' => 'Cég neve', 'value' => '', 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'cmpAdd', 'data' => 'companyDesc', 'desc' => 'Cég leírása', 'value' => '', 'type' => 'text'), 'Input').'

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="cmpAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
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
                    <div class="col-12 row">
                        '.sElement::General(array('origo' => 'cmpView', 'data' => 'companyName', 'desc' => 'Cég neve', 'value' => $Company['companyName'], 'type' => 'text', 'disabled' => true), 'Input').'
                        '.sElement::General(array('origo' => 'cmpView', 'data' => 'companyOwnerLastName', 'desc' => 'Tulajdonos vezetékneve', 'value' => $Company['companyOwnerLastName'], 'type' => 'text', 'disabled' => true), 'Input').'
                        '.sElement::General(array('origo' => 'cmpView', 'data' => 'companyOwnerFirstName', 'desc' => 'Tulajdonos keresztneve', 'value' => $Company['companyOwnerFirstName'], 'type' => 'text', 'disabled' => true), 'Input').'
                        '.sElement::General(array('origo' => 'cmpView', 'data' => 'companyAddressCity', 'desc' => 'Cég címe: Város', 'value' => $Company['companyAddressCity'], 'type' => 'text', 'disabled' => true), 'Input').'
                        '.sElement::General(array('origo' => 'cmpView', 'data' => 'companyAddressPostcode', 'desc' => 'Cég címe: Irányítószám', 'value' => $Company['companyAddressPostcode'], 'type' => 'text', 'disabled' => true), 'Input').'
                        '.sElement::General(array('origo' => 'cmpView', 'data' => 'companyAddressStreet', 'desc' => 'Cég címe: Utca, Házszám', 'value' => $Company['companyAddressStreet'], 'type' => 'text', 'disabled' => true), 'Input').'

                    </div>
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
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'cmpEdit', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input').'
                            '.sElement::General(array('origo' => 'cmpEdit', 'data' => 'companyId', 'desc' => '', 'value' => $array['dp'], 'type' => 'hidden'), 'Input').'
                            '.sElement::General(array('origo' => 'cmpEdit', 'data' => 'companyName', 'desc' => 'Cég neve', 'value' => $Company['companyName'], 'type' => 'text', 'disabled' => true), 'Input').'
                            '.sElement::General(array('origo' => 'cmpEdit', 'data' => 'companyOwnerLastName', 'desc' => 'Tulajdonos vezetékneve', 'value' => $Company['companyOwnerLastName'], 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'cmpEdit', 'data' => 'companyOwnerFirstName', 'desc' => 'Tulajdonos keresztneve', 'value' => $Company['companyOwnerFirstName'], 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'cmpEdit', 'data' => 'companyAddressCity', 'desc' => 'Cég címe: Város', 'value' => $Company['companyAddressCity'], 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'cmpEdit', 'data' => 'companyAddressPostcode', 'desc' => 'Cég címe: Irányítószám', 'value' => $Company['companyAddressPostcode'], 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'cmpEdit', 'data' => 'companyAddressStreet', 'desc' => 'Cég címe: Utca, Házszám', 'value' => $Company['companyAddressStreet'], 'type' => 'text'), 'Input').'

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="cmpEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (
                        self::$dCompany->Update(
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

/*
* Fires Company Delete
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.13
*/
    public static function Delete(array $array = array()): string
    {
        Log::Export($array);
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

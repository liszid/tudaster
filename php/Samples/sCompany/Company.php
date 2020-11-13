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
        return
            '<h4>'.(
                (
                    self::$dCompany->Select(
                        array(
                            'companyId' => (int)$array['dp']
                        ),'byCompanyId'
                    )
                )
                ? sTranslate::ACTION['Success']['content']
                : sTranslate::ACTION['Fail']['content']
            ).'</h4>'.sElement::General(array('x' => 'Company', 'y' => 'Company'), 'Spinner');
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

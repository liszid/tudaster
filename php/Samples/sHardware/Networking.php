<?php

declare(strict_types=1);

namespace Samples\sHardware;

use PreLoad\{
    Valid,
    Check,
    Log
};

use Samples\{
    sElement,
    sTranslate,
    sTables,
    sFrame
};

class Networking extends \Samples\sHardware
{
/*
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.13
*/
    public static function Add(array $array = array()): string
    {
        self::setDHardware();
        if (! isset($array['Save']) || true) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            <h4>SZÜKSÉGES MEZŐK</h4>
                            '.sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input').'
                            '.sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareName', 'desc' => 'Megnevezés', 'value' => '', 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareDesc', 'desc' => 'Leírás', 'value' => '', 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareSerial', 'desc' => 'Serial', 'value' => '', 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareMAC', 'desc' => 'MAC-cím', 'value' => '', 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareIP', 'desc' => 'IP-cím', 'value' => '', 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'companySiteId', 'desc' => 'Telephely', 'value' => '', 'type' => 'text'), 'Input').'
                            <hr />
                            <h4>OPCIONÁLIS MEZŐK</h4>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrHardwNetworkingAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dHardware->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Hardware', 'y' => 'Laptop'), 'Spinner');
        }
    }

/*
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.13
*/
    public static function View(array $array = array()): string
    {
        return 'View';
    }

/*
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.13
*/
    public static function Edit(array $array = array()): string
    {
        return 'Edit';
    }

/*
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.13
*/
    public static function Delete(array $array = array()): string
    {
        return 'Delete';
    }
}

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
    sFrame,
    sCard
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
        self::setDHardware_Networking();
        if (! isset($array['Save'])) {
            $Hardware_Hardware_Content =
                sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input')
                .sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareName', 'desc' => 'Megnevezés', 'value' => 'Hálózati eszköz teszt', 'type' => 'text'), 'Input')
                .sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareDesc', 'desc' => 'Leírás', 'value' => 'Hálózati eszköz teszt mező', 'type' => 'text'), 'Input')
                .sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareSerial', 'desc' => 'Serial', 'value' => 'AAA-1234567', 'type' => 'text'), 'Input')
                .sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareMAC', 'desc' => 'MAC-cím', 'value' => 'MM:MM:MM:SS:SS:SS', 'type' => 'text'), 'Input')
                .sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareIP', 'desc' => 'IP-cím', 'value' => '127.0.0.1', 'type' => 'text'), 'Input')
                .sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'companySiteId', 'desc' => 'Telephely', 'value' => '1', 'type' => 'text'), 'Input');
            $Hardware_Networking_Content =
                sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareNetworkingType', 'desc' => 'Márka, típus', 'value' => '-', 'type' => 'text'), 'Input')
                .sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareNetworkingUse', 'desc' => 'Használat', 'value' => '-', 'type' => 'text'), 'Input')
                .sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareNetworkingOS', 'desc' => 'Op. rendszer', 'value' => '-', 'type' => 'text'), 'Input')
                .sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareNetworkingOSVer', 'desc' => 'Op. rendszer verzió', 'value' => '-', 'type' => 'text'), 'Input')
                .sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareNetworkingNetworkPorts', 'desc' => 'Hálózati portok', 'value' => '-', 'type' => 'text'), 'Input')
                .sElement::General(array('origo' => 'usrHardwNetworkingAdd', 'data' => 'hardwareNetworkingOperator', 'desc' => 'Beállító', 'value' => '-', 'type' => 'text'), 'Input');
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sCard::Collapsible(array('header' => 'SZÜKSÉGES MEZŐK', 'content' => $Hardware_Hardware_Content)).'
                            <hr>
                            '.sCard::Collapsible(array('header' => 'OPCIONÁLIS MEZŐK', 'content' => $Hardware_Networking_Content)).'
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
                    (self::$dHardware_Networking->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Hardware', 'y' => 'Networking'), 'Spinner');
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

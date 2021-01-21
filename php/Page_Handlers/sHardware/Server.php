<?php

declare(strict_types=1);

namespace Page_Handlers\sHardware;

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

class Server extends \Page_Handlers\sHardware
{
/*
* Generates Hardware::Server->Add modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function Add(array $array = array()): string
    {
        self::setDHardware_Server();
        if (! isset($array['Save'])) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'usrHardwServerAdd', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input').'
                            '.sElement::General(array('origo' => 'usrHardwServerAdd', 'data' => 'hardwareType', 'desc' => '', 'value' => 'Server', 'type' => 'hidden'), 'Input').'
                            '.sCard::Collapsible(array('header' => 'Általános adatok', 'content' => sElement::General(array('constData' => self::HARDWARE, 'staticData' => array('origo' => 'usrHardwServerAdd', 'tag' => 'Add'),'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form'))).'
                            '.sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => self::SERVER, 'staticData' => array('origo' => 'usrHardwServerAdd', 'tag' => 'Add'),'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form'))).'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrHardwServerAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dHardware_Server->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Hardware', 'y' => 'Server'), 'Spinner');
        }
    }

/*
* Generates Hardware::Server->View modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function View(array $array = array()): string
    {
        self::setDCombined();
        $Hardware_Server = (self::$dCombined->Select(array('hardwareServerId' => (int)$array['dp']), 'Hardware_Server_View'))[0];
        return '
            <form method="post" class="form-group col-12" autocomplete="on">
                <div class="form-group col p-0">
                    <div class="col-12 row">'
                        .sCard::Collapsible(array('header' => 'Általános adatok', 'content' => sElement::General(array('constData' => self::HARDWARE, 'staticData' => array('origo' => 'usrHardwServerView', 'tag' => 'View'), 'valueData' => $Hardware_Server,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                        .sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => self::SERVER, 'staticData' => array('origo' => 'usrHardwServerView', 'tag' => 'View'), 'valueData' => $Hardware_Server,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                    .'</div>
                </div>
            </form>';
    }

/*
* Generates Hardware::Server->Edit modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function Edit(array $array = array()): string
    {
        if (! isset($array['Save'])) {
            self::setDCombined();
            $Hardware_Server = (self::$dCombined->Select(array('hardwareServerId' => (int)$array['dp']), 'Hardware_Server_View'))[0];
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">'
                            .sCard::Collapsible(array('header' => 'Általános adatok','content' => sElement::General(array('constData' => self::HARDWARE,'staticData' => array('origo' => 'usrHardwServerEdit','tag' => 'Edit'),'valueData' => $Hardware_Server,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                            .sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => self::SERVER, 'staticData' => array('origo' => 'usrHardwServerEdit', 'tag' => 'Edit'), 'valueData' => $Hardware_Server,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                            .self::Huntgroup_Checkbox(array('dp' => $array['dp'], 'origo' => 'usrHardwServerEdit'))
                        .'</div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrHardwServerEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            self::setDHardware_Server();
            return
                '<h4>'.(
                    (self::$dHardware_Server->Update($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Hardware', 'y' => 'Server'), 'Spinner');
        }
    }

/*
* Deletes selected Hardware
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function Delete(array $array = array()): string
    {
            self::setDHardware_Server();
            return
                '<h4>'.(
                    (self::$dHardware_Server->Delete(
                        array(
                            'hardwareServerId' => (int)$array['dp']
                        )
                    ))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Hardware', 'y' => 'Server'), 'Spinner');
    }
}

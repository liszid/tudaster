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

class PC extends \Page_Handlers\sHardware
{
/*
* Generates Hardware::PC->Add modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function Add(array $array = array()): string
    {
        self::setDHardware_PC();
        if (! isset($array['Save'])) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'usrHardwPCAdd', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input').'
                            '.sCard::Collapsible(array('header' => 'Általános adatok', 'content' => sElement::General(array('constData' => self::HARDWARE, 'staticData' => array('origo' => 'usrHardwPCAdd', 'tag' => 'Add'),'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form'))).'
                            '.sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => self::PC, 'staticData' => array('origo' => 'usrHardwPCAdd', 'tag' => 'Add'),'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form'))).'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrHardwPCAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dHardware_PC->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Hardware', 'y' => 'PC'), 'Spinner');
        }
    }

/*
* Generates Hardware::PC->View modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function View(array $array = array()): string
    {
        self::setDCombined();
        $Hardware_PC = (self::$dCombined->Select(array('hardwarePCId' => (int)$array['dp']), 'Hardware_PC_View'))[0];
        return '
            <form method="post" class="form-group col-12" autocomplete="on">
                <div class="form-group col p-0">
                    <div class="col-12 row">'
                        .sCard::Collapsible(array('header' => 'Általános adatok', 'content' => sElement::General(array('constData' => self::HARDWARE, 'staticData' => array('origo' => 'usrHardwPCView', 'tag' => 'View'), 'valueData' => $Hardware_PC,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                        .sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => self::PC, 'staticData' => array('origo' => 'usrHardwPCView', 'tag' => 'View'), 'valueData' => $Hardware_PC,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                    .'</div>
                </div>
            </form>';
    }

/*
* Generates Hardware::PC->Edit modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function Edit(array $array = array()): string
    {
        if (! isset($array['Save'])) {
            self::setDCombined();
            $Hardware_PC = (self::$dCombined->Select(array('hardwarePCId' => (int)$array['dp']), 'Hardware_PC_View'))[0];
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">'
                            .sCard::Collapsible(array('header' => 'Általános adatok','content' => sElement::General(array('constData' => self::HARDWARE,'staticData' => array('origo' => 'usrHardwPCEdit','tag' => 'Edit'),'valueData' => $Hardware_PC,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                            .sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => self::PC, 'staticData' => array('origo' => 'usrHardwPCEdit', 'tag' => 'Edit'), 'valueData' => $Hardware_PC,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                        .'</div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrHardwPCEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            self::setDHardware_PC();
            return
                '<h4>'.(
                    (self::$dHardware_PC->Update($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Hardware', 'y' => 'PC'), 'Spinner');
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
        return 'Delete';
    }
}

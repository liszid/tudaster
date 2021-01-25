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

class Printer extends \Page_Handlers\sHardware
{
/*
* Generates Hardware::Printer->Add modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function Add(array $array = array()): string
    {
        self::setDHardware_Printer();
        if (! isset($array['Save'])) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'usrHardwPrinterAdd', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input').'
                            '.sElement::General(array('origo' => 'usrHardwPrinterAdd', 'data' => 'hardwareType', 'desc' => '', 'value' => 'Printer', 'type' => 'hidden'), 'Input').'
                            '.sCard::Collapsible(array('header' => 'Általános adatok', 'content' => sElement::General(array('constData' => self::HARDWARE, 'staticData' => array('origo' => 'usrHardwPrinterAdd', 'tag' => 'Add'),'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form'))).'
                            '.sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => self::PRINTER, 'staticData' => array('origo' => 'usrHardwPrinterAdd', 'tag' => 'Add'),'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form'))).'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrHardwPrinterAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dHardware_Printer->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Hardware', 'y' => 'Printer'), 'Spinner');
        }
    }

/*
* Generates Hardware::Printer->View modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function View(array $array = array()): string
    {
        self::setDCombined();
        $Hardware_Printer = (self::$dCombined->Select(array('hardwarePrinterId' => (int)$array['dp']), 'Hardware_Printer_View'))[0];
        return '
            <form method="post" class="form-group col-12" autocomplete="on">
                <div class="form-group col p-0">
                    <div class="col-12 row">'
                        .sCard::Collapsible(array('header' => 'Általános adatok', 'content' => sElement::General(array('constData' => self::HARDWARE, 'staticData' => array('origo' => 'usrHardwPrinterView', 'tag' => 'View'), 'valueData' => $Hardware_Printer,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                        .sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => self::PRINTER, 'staticData' => array('origo' => 'usrHardwPrinterView', 'tag' => 'View'), 'valueData' => $Hardware_Printer,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                        .sElement::General(array('origo' => 'usrHardwPrinterView','data' => 'userName','desc' => 'Hozzáadta','value' => $Hardware_Printer['userName'], 'type' => 'text', 'disabled' => true), 'Input')
                    .'</div>
                </div>
            </form>';
    }

/*
* Generates Hardware::Printer->Edit modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function Edit(array $array = array()): string
    {
        if (! isset($array['Save'])) {
            self::setDCombined();
            $Hardware_Printer = (self::$dCombined->Select(array('hardwarePrinterId' => (int)$array['dp']), 'Hardware_Printer_View'))[0];
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">'
                            .sCard::Collapsible(array('header' => 'Általános adatok','content' => sElement::General(array('constData' => self::HARDWARE,'staticData' => array('origo' => 'usrHardwPrinterEdit','tag' => 'Edit'),'valueData' => $Hardware_Printer,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                            .sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => self::PRINTER, 'staticData' => array('origo' => 'usrHardwPrinterEdit', 'tag' => 'Edit'), 'valueData' => $Hardware_Printer,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                            .self::Huntgroup_Checkbox(array('dp' => $Hardware_Printer['hardwareId'], 'origo' => 'usrHardwPrinterEdit'))
                        .'</div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrHardwPrinterEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            self::setDHardware_Printer();
            return
                '<h4>'.(
                    (self::$dHardware_Printer->Update($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Hardware', 'y' => 'Printer'), 'Spinner');
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
            self::setDHardware_Printer();
            return
                '<h4>'.(
                    (self::$dHardware_Printer->Delette(
                        array(
                            'hardwarePrinterId' => (int)$array['dp']
                        )
                    ))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Hardware', 'y' => 'Printer'), 'Spinner');
    }
}

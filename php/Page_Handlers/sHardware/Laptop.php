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

class Laptop extends \Page_Handlers\sHardware
{
/*
* Generates Hardware::Laptop->Add modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.15
*/
    public static function Add(array $array = array()): string
    {
        self::setDHardware_Laptop();
        if (! isset($array['Save'])) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'usrHardwLaptopAdd', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input').'
                            '.sCard::Collapsible(array('header' => 'Általános adatok', 'content' => sElement::General(array('constData' => self::HARDWARE,'staticData' => array('origo' => 'usrHardwLaptopAdd','tag' => 'Add'),'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form'))).'
                            '.sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => self::LAPTOP, 'staticData' => array('origo' => 'usrHardwLaptopAdd', 'tag' => 'Add'),'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form'))).'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrHardwLaptopAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dHardware_Laptop->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Hardware', 'y' => 'Laptop'), 'Spinner');
        }
    }

/*
* Generates Hardware::Laptop->View modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.15
*/
    public static function View(array $array = array()): string
    {
        self::setDCombined();
        $Hardware_Laptop = (self::$dCombined->Select(array('hardwareLaptopId' => (int)$array['dp']), 'Hardware_Laptop_View'))[0];
        return '
            <form method="post" class="form-group col-12" autocomplete="on">
                <div class="form-group col p-0">
                    <div class="col-12 row">'
                        .sCard::Collapsible(array('header' => 'Általános adatok', 'content' => sElement::General(array('constData' => self::HARDWARE, 'staticData' => array('origo' => 'usrHardwLaptopView', 'tag' => 'View'), 'valueData' => $Hardware_Laptop,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                        .sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => self::LAPTOP, 'staticData' => array('origo' => 'usrHardwLaptopView', 'tag' => 'View'), 'valueData' => $Hardware_Laptop,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                    .'</div>
                </div>
            </form>';
    }

/*
* Generates Hardware::Laptop->Edit modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.15
*/
    public static function Edit(array $array = array()): string
    {
        if (! isset($array['Save'])) {
            self::setDCombined();
            $Hardware_Laptop = (self::$dCombined->Select(array('hardwareLaptopId' => (int)$array['dp']), 'Hardware_Laptop_View'))[0];
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">'
                            .sCard::Collapsible(array('header' => 'Általános adatok','content' => sElement::General(array('constData' => self::HARDWARE,'staticData' => array('origo' => 'usrHardwLaptopEdit','tag' => 'Edit'),'valueData' => $Hardware_Laptop,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                            .sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => self::LAPTOP, 'staticData' => array('origo' => 'usrHardwLaptopEdit', 'tag' => 'Edit'), 'valueData' => $Hardware_Laptop,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                        .'</div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrHardwLaptopEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            self::setDHardware_Laptop();
            return
                '<h4>'.(
                    (self::$dHardware_Laptop->Update($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Hardware', 'y' => 'Laptop'), 'Spinner');
        }
    }

/*
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

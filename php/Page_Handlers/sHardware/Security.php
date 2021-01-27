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

class Security extends \Page_Handlers\sHardware
{
/*
* Generates Hardware::Security->Add modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function Add(array $array = array()): string
    {
        self::setDHardware_Security();
        if (! isset($array['Save'])) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'usrHardwSecurityAdd', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input').'
                            '.sElement::General(array('origo' => 'usrHardwSecurityAdd', 'data' => 'hardwareType', 'desc' => '', 'value' => 'Security', 'type' => 'hidden'), 'Input').'
                            '.sCard::Collapsible(array('header' => 'Általános adatok', 'content' => sElement::General(array('constData' => self::HARDWARE, 'staticData' => array('origo' => 'usrHardwSecurityAdd', 'tag' => 'Add'),'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form'))).'
                            '.sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => self::SECURITY, 'staticData' => array('origo' => 'usrHardwSecurityAdd', 'tag' => 'Add'),'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form'))).'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrHardwSecurityAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dHardware_Security->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Hardware', 'y' => 'Security'), 'Spinner');
        }
    }

/*
* Generates Hardware::Security->View modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function View(array $array = array()): string
    {
        self::setDCombined();
        $Hardware_Security = (self::$dCombined->Select(array('hardwareSecurityId' => (int)$array['dp']), 'Hardware_Security_View'))[0];
        return '
            <form method="post" class="form-group col-12" autocomplete="on">
                <div class="form-group col p-0">
                    <div class="col-12 row">'
                        .sCard::Collapsible(array('header' => 'Általános adatok', 'content' => sElement::General(array('constData' => self::HARDWARE, 'staticData' => array('origo' => 'usrHardwSecurityView', 'tag' => 'View'), 'valueData' => $Hardware_Security,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                        .sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => self::SECURITY, 'staticData' => array('origo' => 'usrHardwSecurityView', 'tag' => 'View'), 'valueData' => $Hardware_Security,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                        .sElement::General(array('origo' => 'usrHardwSecurityView','data' => 'userName','desc' => 'Hozzáadta','value' => $Hardware_Security['userName'], 'type' => 'text', 'disabled' => true), 'Input')
                    .'</div>
                </div>
            </form>';
    }

/*
* Generates Hardware::Security->Edit modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function Edit(array $array = array()): string
    {
        if (! isset($array['Save'])) {
            self::setDCombined();
            $Hardware_Security = (self::$dCombined->Select(array('hardwareSecurityId' => (int)$array['dp']), 'Hardware_Security_View'))[0];
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">'
                            .sCard::Collapsible(array('header' => 'Általános adatok','content' => sElement::General(array('constData' => self::HARDWARE,'staticData' => array('origo' => 'usrHardwSecurityEdit','tag' => 'Edit'),'valueData' => $Hardware_Security,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                            .sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => self::SECURITY, 'staticData' => array('origo' => 'usrHardwSecurityEdit', 'tag' => 'Edit'), 'valueData' => $Hardware_Security,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                            .sCard::Collapsible(array('header' => 'Csoport adatok', 'content' => self::Huntgroup_Checkbox(array('dp' => $Hardware_Security['hardwareId'], 'origo' => 'usrHardwSecurityEdit'))))
                        .'</div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrHardwSecurityEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            self::setDHardware_Security();
            return
                '<h4>'.(
                    (self::$dHardware_Security->Update($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Hardware', 'y' => 'Security'), 'Spinner');
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
            self::setDHardware_Security();
            return
                '<h4>'.(
                    (self::$dHardware_Security->Delete(
                        array(
                            'hardwareSecurityId' => (int)$array['dp']
                        )
                    ))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Hardware', 'y' => 'Security'), 'Spinner');
    }
}

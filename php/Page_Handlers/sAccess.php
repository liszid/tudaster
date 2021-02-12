<?php

declare(strict_types=1);

namespace Page_Handlers;

use PreLoad\{
    Valid
    ,Check
    ,Log
};

use Data\{
    dAccess
    ,dCombined
    ,dHardware
    ,dHuntgroup
};

use Samples\{
    sCard
    ,sTables
    ,sElement
    ,sTranslate
};

class sAccess
{
    protected static $dAccess;
    protected static $dCombined;
    protected static $dHardware;
    protected static $dHuntgroup;

    const ACCESS = array(
        array('data' => 'accessId', 'desc' => '', 'type' => 'hidden', 'tags' => 'Edit')
        ,array('data' => 'accessUsername', 'desc' => 'Felhasználónév', 'type' => 'text', 'tags' => 'Add,Edit,View', 'must-fill' => true)
        ,array('data' => 'accessPassword', 'desc' => 'Jelszó', 'type' => 'text', 'tags' => 'Add,Edit,View', 'must-fill' => true)
        ,array('data' => 'hardwareId', 'desc' => 'Eszköz', 'type' => 'select', 'tags' => 'Add,View,Edit')
    );

    const HARDWARE = array(
        array('data' => 'hardwareId', 'desc' => '', 'type' => 'hidden', 'tags' => 'View')
        ,array('data' => 'hardwareName', 'desc' => 'Megnevezés', 'type' => 'text', 'tags' => 'View')
        ,array('data' => 'hardwareDesc', 'desc' => 'Leírás', 'type' => 'text', 'tags' => 'View')
        ,array('data' => 'hardwareSerial', 'desc' => 'Serial', 'type' => 'text', 'tags' => 'View')
        ,array('data' => 'hardwareMAC', 'desc' => 'MAC-cím', 'type' => 'text', 'tags' => 'View')
        ,array('data' => 'hardwareIP', 'desc' => 'IP-cím', 'type' => 'text', 'tags' => 'View')
        ,array('data' => 'companySiteId', 'desc' => 'Telephely', 'type' => 'select', 'tags' => 'View')
        ,array('data' => 'hardwareSwitch', 'desc' => 'Switch IP', 'type' => 'text', 'tags' => 'View')
        ,array('data' => 'hardwareSwitchPort', 'desc' => 'Switch Port', 'type' => 'text', 'tags' => 'View')
        ,array('data' => 'hardwareVLANName', 'desc' => 'VLAN Név', 'type' => 'text', 'tags' => 'View')
        ,array('data' => 'hardwareVLANNum', 'desc' => 'VLAN Száma', 'type' => 'text', 'tags' => 'View')
        ,array('data' => 'hardwareDateIn', 'desc' => 'Beszerzés dátuma', 'type' => 'text', 'tags' => 'View')
        ,array('data' => 'hardwareDateOut', 'desc' => 'Kivitel dátuma', 'type' => 'text', 'tags' => 'View')
    );
/*
 * Sets the class variable : dHardware
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    protected static function setDAccess()
    {
        self::$dAccess= new dAccess();
    }

/*
 * Sets the class variable : dCombined
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    protected static function setDCombined()
    {
        self::$dCombined = new dCombined();
    }

/*
 * Sets the class variable : dHardware
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    protected static function setDHardware()
    {
        self::$dHardware = new dHardware();
    }

/*
 * Sets the class variable : dHardware
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    protected static function setDHuntgroup()
    {
        self::$dHuntgroup = new dHuntgroup();
    }

/*
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    public static function Action(array $array = array()): string
    {
        $wclass;
        $returnContent = '';

        switch ($array['z']) {
            case 'Add':
                $returnContent .= self::Add($array);
                break;
            case 'View':
                $returnContent .= self::View($array);
                break;
            case 'Delete':
                $returnContent .= self::Delete($array);
                break;
            case 'Edit':
                $returnContent .= self::Edit($array);
                break;
        }
        if (Valid::vString($returnContent)) {
            $returnContent = '<div class="text-center justification-centered">'.$returnContent.'</div>';
        }

        return $returnContent;
    }
/*
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.12.09
 */
    public static function Access(array $array = array()): string
    {
        self::setDCombined();
        $returnString = '';
        $Combined = self::$dCombined->Select(array('userId' => $GLOBALS['sessionId']), 'Access_Table');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Combined, 'Access_Access');
        return $returnString;
    }
/*
 * @return array
 * @author Liszi Dániel
 * @since 2020.12.16
 */
    protected static function Hardware_Select(): array
    {
        self::setDCombined();
        $tempArray = array();
        foreach(self::$dCombined->Select(array('userId' => $GLOBALS['sessionId']), 'Hardware_Members_All') as $i) {
            $tempArray[] = array('id' => $i['hardwareId'], 'name' => $i['hardwareType'].' - '.$i['hardwareName']);
        }
        return $tempArray;
    }

/*
 * Returns Access Adding form
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2021.01.11
 */
    public static function Add(array $array = array()): string
    {
        self::setDAccess();
        if (! isset($array['Save'])) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'usrAccessAdd', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input').'
                            '.sElement::General(array('constData' => self::ACCESS, 'staticData' => array('origo' => 'usrAccessAdd', 'tag' => 'Add'), 'selectData' => array('hardwareId' => self::Hardware_Select())),'Generate_Form').'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrAccessAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dAccess->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Accesses', 'y' => 'Access'), 'Spinner');
        }
    }

/*
 * Fires Access View
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2021.01.11
 */
    public static function View(array $array = array()): string
    {
        self::setDAccess();
        self::setDHardware();

        $Access = (self::$dAccess->Select(array('accessId' => (int)$array['dp']), 'byAccessId'))[0];
        $Hardware = (self::$dHardware->Select(array('hardwareId' => (int)$Access['hardwareId']), 'byHardwareId'))[0];

        $Access['accessPassword'] = self::$dAccess->Decode($Access['accessPassword']);

        return '
            <form method="post" class="form-group col-12" autocomplete="on">
                <div class="form-group col p-0">
                    <div class="col-12 row">'
                        .sCard::Collapsible(array('header' => 'Hozzáférési adatok','content' => sElement::General(array('constData' => self::ACCESS, 'staticData' => array('origo' => 'usrAccessView', 'tag' => 'View'), 'valueData' => $Access,'selectData' => array('hardwareId' => self::Hardware_Select())),'Generate_Form')))
                        .sCard::Collapsible(array('header' => 'Eszköz adatok','content' => sElement::General(array('constData' => self::HARDWARE,'staticData' => array('origo' => 'usrAccessView','tag' => 'View'),'valueData' => $Hardware),'Generate_Form')))
                        .sElement::General( array('origo' => 'usrAccessView', 'data' => 'userName', 'desc' => 'Hozzáadta', 'value' => $Access['userName'], 'type' => 'text', 'disabled' => true), 'Input')
                        .sElement::General( array('origo' => 'usrAccessView', 'data' => 'accessDate','desc' => 'Hozzáadva','value' => $Access['accessDate'], 'type' => 'text', 'disabled' => true), 'Input')
                    .'</div>
                </div>
            </form>';
    }

/*
 * Fires Access Edit
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2021.01.11
 */
    public static function Edit(array $array = array()): string
    {
        if (! isset($array['Save'])) {
            self::setDAccess();
            $Access = (self::$dAccess->Select(array('accessId' => (int)$array['dp']), 'byAccessId'))[0];

            $Access['accessPassword'] = self::$dAccess->Decode($Access['accessPassword']);

            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">'
                            .sElement::General(array('origo' => 'usrAccessEdit', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input')
                            .sElement::General(array('constData' => self::ACCESS,'staticData' => array('origo' => 'usrAccessEdit','tag' => 'Edit'),'valueData' => $Access,'selectData' => array('hardwareId' => self::Hardware_Select())),'Generate_Form')
                        .'</div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrAccessEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            self::setDAccess();
            return
                '<h4>'.(
                    (self::$dAccess->Update($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Accesses', 'y' => 'Access'), 'Spinner');
        }
    }

/*
 * Fires Access Delete
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2021.01.11
 */
    public static function Delete(array $array = array()): string
    {
        self::setDAccess();
        return
            '<h4>'.(
                (self::$dAccess->Delete(
                    array(
                        'accessId' => (int)$array['dp']
                        ,'userId' => $GLOBALS['sessionId']
                    )
                ))
                    ? sTranslate::ACTION['Success']['content']
                    : sTranslate::ACTION['Fail']['content']
            ).'</h4>'.sElement::General(array('x' => 'Accesses', 'y' => 'Access'), 'Spinner');
    }
}

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
        ,array('data' => 'accessUsername', 'desc' => 'Felhasználónév', 'type' => 'text', 'tags' => 'Add,Edit,View')
        ,array('data' => 'accessPassword', 'desc' => 'Jelszó', 'type' => 'text', 'tags' => 'Add,Edit,View')
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

        switch($array['y']) {
            case 'Access':
                $wclass = new sAccess\Access;
                break;
        }

        switch ($array['z']) {
            case 'Add':
                $returnContent .= $wclass::Add($array);
                break;
            case 'View':
                $returnContent .= $wclass::View($array);
                break;
            case 'Delete':
                $returnContent .= $wclass::Delete($array);
                break;
            case 'Edit':
                $returnContent .= $wclass::Edit($array);
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
        foreach(self::$dCombined->Select(array('userId' => $GLOBALS['sessionId']), 'Hardware_Members_By_Type') as $i) {
            $tempArray[] = array('id' => $i['hardwareId'], 'name' => $i['hardwareType'].' - '.$i['hardwareName']);
        }
        return $tempArray;
    }

/*
 * @return string
 * @param $array array
 * @param $bool bool
 * @author Liszi Daniel
 * @since 2021.01.21
*/
    protected static function Huntgroup_Checkbox(array $array = array(), bool $bool = false): string
    {
        self::setDHuntgroup();
        self::setDCombined();

        $AllUsers = self::$dHuntgroup->Select(array(), 'All');
        $HGUsers = self::$dCombined->Select(array('accessId' => (int)$array['dp']), 'Access_Members');

        $returnString = '
        <div class="form-group col-12 h-100">
            <label for="'.$array['origo'].'-huntgroupCheckbox">Csoportok</label>
            <select multiple size="10"'.(($bool)?' disabled':'').' class="form-control" id="'.$array['origo'].'-huntgroupCheckbox">
        ';

        foreach($AllUsers as $i) {
            $returnString .= '
                <option'.((! is_null($HGUsers) && array_search($i['huntgroupId'], array_column($HGUsers, 'huntgroupId')) !== false )?' selected':'').' value="'.$i['huntgroupId'].'">
                    '.$i['huntgroupName'].'
                </option>';
        }

        $returnString .= '
            </select>
          </div>
        ';

        return $returnString;
    }
}

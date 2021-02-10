<?php

declare(strict_types=1);

namespace Page_Handlers;

use PreLoad\{
    Valid
    ,Check
    ,Log
};

use Data\{
    dHardware
    ,dCombined
    ,dHuntgroup
    ,dHuntgroup_Member
};

use Samples\{
    sCard
    ,sTables
    ,sTranslate
    ,sElement
    ,sFrame
};

class sHardware
{
    protected static $dHardware;
    protected static $dCombined;
    protected static $dHuntgroup;
    protected static $dHuntgroup_Member;

    const HARDWARE = array(
        array('data' => 'hardwareId', 'desc' => '', 'type' => 'hidden', 'tags' => 'Edit')
        ,array('data' => 'hardwareName', 'desc' => 'Megnevezés', 'type' => 'text', 'tags' => 'Add,View,Edit', 'must-fill' => true)
        ,array('data' => 'hardwareDesc', 'desc' => 'Leírás', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSerial', 'desc' => 'Serial', 'type' => 'text', 'tags' => 'Add,View,Edit', 'must-fill' => true)
        ,array('data' => 'hardwareMAC', 'desc' => 'MAC-cím', 'type' => 'text', 'tags' => 'Add,View,Edit', 'must-fill' => true)
        ,array('data' => 'hardwareIP', 'desc' => 'IP-cím', 'type' => 'text', 'tags' => 'Add,View,Edit', 'must-fill' => true)
        ,array('data' => 'companySiteId', 'desc' => 'Telephely', 'type' => 'select', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSwitch', 'desc' => 'Switch IP', 'type' => 'text', 'tags' => 'View,Edit')
        ,array('data' => 'hardwareSwitchPort', 'desc' => 'Switch Port', 'type' => 'text', 'tags' => 'View,Edit')
        ,array('data' => 'hardwareVLANName', 'desc' => 'VLAN Név', 'type' => 'text', 'tags' => 'View,Edit')
        ,array('data' => 'hardwareVLANNum', 'desc' => 'VLAN Száma', 'type' => 'text', 'tags' => 'View,Edit')
        ,array('data' => 'hardwareDateIn', 'desc' => 'Beszerzés dátuma', 'type' => 'text', 'tags' => 'View,Edit')
        ,array('data' => 'hardwareDateOut', 'desc' => 'Kivitel dátuma', 'type' => 'text', 'tags' => 'View,Edit')
    );

    const LAPTOP = array(
        array('data' => 'hardwareSpecUser', 'desc' => 'Kezelő', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecType', 'desc' => 'Márka, típus', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecOS', 'desc' => 'Op. rendszer', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecOSVer', 'desc' => 'Op. rendszer verzió', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecHDD', 'desc' => 'Tárhely', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecMEM', 'desc' => 'Memória', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecPROC', 'desc' => 'Processzor', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecOperator', 'desc' => 'Beállító', 'type' => 'text', 'tags' => 'Add,View,Edit')
    );

    const COMPUTER = array(
        array('data' => 'hardwareSpecUser', 'desc' => 'Kezelő', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecType', 'desc' => 'Márka, típus', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecUse', 'desc' => 'Használati cél', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecOS', 'desc' => 'Op. Rendszer', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecOSVer', 'desc' => 'Op. Rendszer verzió', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecHDD', 'desc' => 'Tárhely', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecMEM', 'desc' => 'Memória', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecPROC', 'desc' => 'Processzor', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecNetworkPorts', 'desc' => 'Portok száma', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecOperator', 'desc' => 'Beállító', 'type' => 'text', 'tags' => 'Add,View,Edit')
    );

    const PRINTER = array(
        array('data' => 'hardwareSpecUse', 'desc' => 'Használat', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecType', 'desc' => 'Márka,típus', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecToner', 'desc' => 'Toner', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecOperator', 'desc' => 'Beállító', 'type' => 'text', 'tags' => 'Add,View,Edit')
    );

    const NETWORKING = array(
        array('data' => 'hardwareSpecType', 'desc' => 'Márka, típus', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecUse', 'desc' => 'Használat', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecOS', 'desc' => 'Op. rendszer', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecOSVer', 'desc' => 'Op. rendszer verzió', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecNetworkPorts', 'desc' => 'Hálózati portok', 'type' => 'text', 'tags' => 'Add,View,Edit')
        ,array('data' => 'hardwareSpecperator', 'desc' => 'Beállító', 'type' => 'text', 'tags' => 'Add,View,Edit')
    );

    const TYPES = array(
        "Laptop" => array(
            "origo" => 'usrHardwLaptop'
            ,"optionalData" => self::LAPTOP
            ,"tableName" => 'Hardware_Laptop'
        )
        ,"Computer" => array(
            "origo" => 'usrHardwComputer'
            ,"optionalData" => self::COMPUTER
            ,"tableName" => 'Hardware_Computer'
        )
        ,"Server" => array(
            "origo" => 'usrHardwServer'
            ,"optionalData" => self::COMPUTER
            ,"tableName" => 'Hardware_Server'
        )
        ,"Printer" => array(
            "origo" => 'usrHardwPrinter'
            ,"optionalData" => self::PRINTER
            ,"tableName" => 'Hardware_Printer'
        )
        ,"Router" => array(
            "origo" => 'usrHardwRouter'
            ,"optionalData" => self::NETWORKING
            ,"tableName" => 'Hardware_Router'
        )
        ,"Switch" => array(
            "origo" => 'usrHardwSwitch'
            ,"optionalData" => self::NETWORKING
            ,"tableName" => 'Hardware_Switch'
        )
        ,"Access_Point" => array(
            "origo" => 'usrHardwAccessPoint'
            ,"optionalData" => self::NETWORKING
            ,"tableName" => 'Hardware_Access_Point'
        )
        ,"Telephony" => array(
            "origo" => 'usrHardwTelephony'
            ,"optionalData" => self::NETWORKING
            ,"tableName" => 'Hardware_Telephony'
        )
        ,"Camera" => array(
            "origo" => 'usrHardwCamera'
            ,"optionalData" => self::NETWORKING
            ,"tableName" => 'Hardware_Camera'
        )
        ,"DVR_CCTV" => array(
            "origo" => 'usrHardwDVRCCTV'
            ,"optionalData" => self::NETWORKING
            ,"tableName" => 'Hardware_DVR_CCTV'
        )
        ,"Alarm" => array(
            "origo" => 'usrHardwAlarm'
            ,"optionalData" => self::NETWORKING
            ,"tableName" => 'Hardware_Alarm'
        )
    );

/*
 * Sets the class variable : dHardware
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    protected static function setDHardware()
    {
        self::$dHardware= new dHardware();
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
 * @since 2021.01.27
 */
    protected static function setDHuntgroup()
    {
        self::$dHuntgroup = new dHuntgroup();
    }

/*
 * Sets the class variable : dHardware
 * @author Liszi Dániel
 * @since 2021.01.27
 */
    protected static function setDHuntgroup_Member()
    {
        self::$dHuntgroup_Member = new dHuntgroup_Member();
    }

/*
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    public static function Action(array $array = array()): string
    {
        $returnContent = '';

        $array['hardwareType'] = $array['y'];
        $array['defaultData'] = self::HARDWARE;
        $array['optionalData'] = self::TYPES[$array['y']]['optionalData'];
        $array['origo'] = self::TYPES[$array['y']]['origo'].$array['z'];
        $array['returnPath'] = array('x' => 'Hardware', 'y' => $array['y']);

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

    public static function Page(array $array = array()): string
    {
        self::setDCombined();

        $returnString = '';

        $Hardware = self::$dCombined->Select(array('userId' => $GLOBALS['sessionId'], 'hardwareType' => $array['hardwareType']), 'Hardware_Members_Select');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Hardware, self::TYPES[$array['hardwareType']]['tableName']);

        return $returnString;
    }

    public static function Hardware(array $array = array()): string
    {
        self::setDCombined();

        $returnString = '';

        $Hardware = self::$dCombined->Select(array('userId' => $GLOBALS['sessionId']), 'Hardware_Members_All');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Hardware, 'Hardware_Hardware');
        return $returnString;
    }
/*
 * Generates a Select list to choose the Location of the item
 * @return array
 * @author Liszi Dániel
 * @since 2020.12.16
 */
    protected static function Company_Site_Select(): array
    {
        self::setDCombined();
        $tempArray = array();
        foreach(self::$dCombined->Select(array(), 'Company_Site_Select') as $i) {
            $tempArray[] = array('id' => $i['companySiteId'], 'name' => $i['companyName'].' - '.$i['companySiteName']);
        }
        return $tempArray;
    }

/*
 * Generates a Checkbox panel to select which groups can see the item
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
        $HGUsers = self::$dCombined->Select(array('hardwareId' => (int)$array['dp']), 'Hardware_Members');

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

/*
* Generates Hardware::Add modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function Add(array $array = array()): string
    {
        self::setDHardware();
        if (! isset($array['Save'])) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">'
                            .sElement::General(array('origo' => $array['origo'], 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input')
                            .sElement::General(array('origo' => $array['origo'], 'data' => 'hardwareType', 'desc' => '', 'value' => $array['hardwareType'], 'type' => 'hidden'), 'Input')
                            .sCard::Collapsible(array('header' => 'Általános adatok', 'content' => sElement::General(array('constData' => $array['defaultData'], 'staticData' => array('origo' => $array['origo'], 'tag' => 'Add'),'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                            .sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => $array['optionalData'], 'staticData' => array('origo' => $array['origo'], 'tag' => 'Add'),'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                        .'</div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="'.$array['origo'].'-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dHardware->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General($array['returnPath'], 'Spinner');
        }
    }

/*
* Generates Hardware::View modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function View(array $array = array()): string
    {
        self::setDHardware();
        $Hardware = (self::$dHardware->Select(array('hardwareId' => (int)$array['dp']), 'byHardwareId'))[0];
        return '
            <form method="post" class="form-group col-12" autocomplete="on">
                <div class="form-group col p-0">
                    <div class="col-12 row">'
                        .sCard::Collapsible(array('header' => 'Általános adatok', 'content' => sElement::General(array('constData' => $array['defaultData'], 'staticData' => array('origo' => $array['origo'], 'tag' => 'View'), 'valueData' => $Hardware,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                        .sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General(array('constData' => $array['optionalData'], 'staticData' => array('origo' => $array['origo'], 'tag' => 'View'), 'valueData' => $Hardware,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                        .sElement::General(array('origo' => $array['origo'],'data' => 'userName','desc' => 'Hozzáadta','value' => $Hardware['userName'], 'type' => 'text', 'disabled' => true), 'Input')
                    .'</div>
                </div>
            </form>';
    }

/*
* Generates Hardware::Edit modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function Edit(array $array = array()): string
    {
        self::setDHardware();
        if (! isset($array['Save'])) {
            $Hardware = (self::$dHardware->Select(array('hardwareId' => (int)$array['dp']), 'byHardwareId'))[0];
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">'
                            .sElement::General(array('origo' => $array['origo'], 'data' => 'hardwareType', 'desc' => '', 'value' => $array['hardwareType'], 'type' => 'hidden'), 'Input')
                            .sCard::Collapsible(array('header' => 'Általános adatok','content' => sElement::General(array('constData' => $array['defaultData'],'staticData' => array('origo' => $array['origo'],'tag' => 'Edit'),'valueData' => $Hardware,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                            .sCard::Collapsible(array('header' => 'Opcionális adatok', 'content' => sElement::General( array( 'constData' => $array['optionalData'], 'staticData' => array( 'origo' => $array['origo'], 'tag' => 'Edit' ), 'valueData' => $Hardware, 'selectData' => array( 'companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                            .sCard::Collapsible(array('header' => 'Csoport adatok', 'content' => self::Huntgroup_Checkbox(array('dp' => $Hardware['hardwareId'], 'origo' => $array['origo']))))
                        .'</div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="'.$array['origo'].'-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dHardware->Update($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General($array['returnPath'], 'Spinner');
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
            self::setDHardware();
            return
                '<h4>'.(
                    (self::$dHardware->Delete(
                        array(
                            'hardwareId' => (int)$array['dp']
                        )
                    ))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General($array['returnPath'], 'Spinner');
    }
}

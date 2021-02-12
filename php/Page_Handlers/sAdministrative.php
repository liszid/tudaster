<?php

declare(strict_types=1);

namespace Page_Handlers;

use PreLoad\{
    Valid
    ,Check
    ,Log
};

use Data\{
    dUser
    ,dGroup
    ,dGroup_Member
    ,dHuntgroup
    ,dHuntgroup_Member
    ,dCombined
    ,dTools
    ,dLog
    ,dKnowledge_Type
    ,dCompany_Site_Type
};

use Samples\{
    sCard
    ,sTables
    ,sTranslate
    ,sElement
};

class sAdministrative {
    protected static $dUser;
    protected static $dGroup;
    protected static $dGroup_Member;
    protected static $dHuntgroup;
    protected static $dHuntgroup_Member;
    protected static $dCombined;
    protected static $dTools;
    protected static $dLog;
    protected static $dKnowledge_Type;
    protected static $dCompany_Site_Type;

/*
 * Sets the class variable : dUser
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDUser()
    {
        self::$dUser = new dUser();
    }

/*
 * Sets the class variable : dGroup
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDGroup()
    {
        self::$dGroup = new dGroup();
    }

/*
 * Sets the class variable : dGroup_Member
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDGroup_Member()
    {
        self::$dGroup_Member = new dGroup_Member();
    }

/*
 * Sets the class variable : dGroup
 * @author Liszi Dániel
 * @since 2021.01.15
 */
    protected static function setDHuntgroup()
    {
        self::$dHuntgroup = new dHuntgroup();
    }

/*
 * Sets the class variable : dGroup_Member
 * @author Liszi Dániel
 * @since 2021.01.15
 */
    protected static function setDHuntgroup_Member()
    {
        self::$dHuntgroup_Member = new dHuntgroup_Member();
    }

/*
 * Sets the class variable : dCombined
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDCombined()
    {
        self::$dCombined = new dCombined();
    }

/*
 * Sets the class variable : dTools
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDTools()
    {
        self::$dTools = new dTools();
    }

/*
 * Sets the class variable : dTools
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDLog()
    {
        self::$dLog = new dLog();
    }
/*
 * Sets the class variable : dTools
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDKnowledge_Type()
    {
        self::$dKnowledge_Type = new dKnowledge_Type();
    }
/*
 * Sets the class variable : dTools
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDCompany_Site_Type()
    {
        self::$dCompany_Site_Type = new dCompany_Site_Type();
    }
/*
 * Used at Administrative Page for interactions
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    public static function Action(array $array = array()): string
    {
        $wclass;
        $returnContent = '';

        switch($array['y']) {
            case 'Users':
                $wclass = new sAdministrative\Users;
                break;
            case 'Groups':
                $wclass = new sAdministrative\Groups;
                break;
            case 'Huntgroups':
                $wclass = new sAdministrative\Huntgroups;
                break;
            case 'Tools':
                $wclass = new sAdministrative\Tools;
                break;
        }

        switch ($array['z']) {
            case 'Add':
                $returnContent .= $wclass::Add($array);
                break;
            case 'View':
                $returnContent .= $wclass::View($array);
                break;
            case 'Reset':
                $returnContent .= $wclass::Reset($array);
                break;
            case 'Delete':
                $returnContent .= $wclass::Delete($array);
                break;
            case 'Edit':
                $returnContent .= $wclass::Edit($array);
                break;
// Tools specific
            case 'Logs':
                $returnContent .= $wclass::Logs($array);
                break;
            case 'Knowledge_Type':
                $returnContent .= $wclass::Knowledge_Type($array);
                break;
            case 'Company_Site_Type':
                $returnContent .= $wclass::Company_Site_Type($array);
                break;
        }

        if (Valid::vString($returnContent)) {
            $returnContent = '<div class="text-center justification-centered">'.$returnContent.'</div>';
        }

        return $returnContent;
    }

/*
 * Used at Administrative Page to display Users section
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Users(array $array = array()): string
    {
        self::setDCombined();
        $returnString = '';
        $Users = self::$dCombined->Select(array(), 'Member_Full');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Users, 'Admin_Users');
        return $returnString;
    }

/*
 * Used at Administrative Page to display Groups section
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Groups(array $array = array()): string
    {
        self::setDGroup();
        $returnString = '';
        $Groups = self::$dGroup->Select(array(), 'All');

        if (Valid::vString($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Groups, 'Admin_Groups');
        return $returnString;
    }

/*
 * Used at Administrative Page to display Huntgroups section
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2021.01.15
 */
    public static function Huntgroups(array $array = array()): string
    {
        self::setDHuntgroup();
        $returnString = '';
        $Huntgroups = self::$dHuntgroup->Select(array(), 'All');

        if (Valid::vString($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Huntgroups, 'Admin_Huntgroups');
        return $returnString;
    }

/*
 * Used at Administrative Page to display Tools section
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Tools(array $array = array()): string
    {
        $returnString = '';
        if (Valid::vString($array['path'])) {
            $returnString .=
                sCard::Collapsible(sTranslate::Info($array['path']))
                .'<div class="card-deck m-2 justify-content-center">'
                    .sCard::Blank(array('color' => 'secondary','bool' => true,'button' => sElement::General(array('color' => 'success','fa' => 'info','text' => ' Események','path' => $array['path'].'/Logs','dp' => 'Database'),'Button')))
                    .sCard::Blank(array('color' => 'secondary','bool' => true,'button' => sElement::General(array('color' => 'success','fa' => 'info','text' => ' Tudáscikk típusok','path' => $array['path'].'/Knowledge_Type','dp' => 'Database'),'Button')))
                    .sCard::Blank(array('color' => 'secondary','bool' => true,'button' => sElement::General(array('color' => 'success','fa' => 'info','text' => ' Telephely típusok','path' => $array['path'].'/Company_Site_Type','dp' => 'Database'),'Button')))
                    .sCard::Blank(array('color' => 'secondary','bool' => true,'button' => sElement::General(array('color' => 'danger','fa' => 'trash','text' => ' Adatbázis törlése','path' => $array['path'].'/Delete','dp' => 'Database'),'Button')))
                .'</div>';

        }

        return $returnString;
    }
}

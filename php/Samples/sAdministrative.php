<?php

declare(strict_types=1);

namespace Samples;
use PreLoad\{
    Valid,
    Check,
    Log
};

use Data\{
    dUser,
    dGroup,
    dGroup_Member,
    dCombined
};

class sAdministrative {
    protected static $dUser;
    protected static $dGroup;
    protected static $dGroup_Member;
    protected static $dCombined;

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
 * Sets the class variable : dCombined
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDCombined()
    {
        self::$dCombined = new dCombined();
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
            case 'Membership':
                $wclass = new sAdministrative\Membership;
                break;
        }

        switch ($array['z']) {
            case 'Add':
                $returnContent .= $wclass::Add($array);
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
        self::setDUser();
        $returnString = '';
        $Users = self::$dUser->Select(array(), 'All');
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
 * Used at Administrative Page to display Membership section
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Membership(array $array = array()): string
    {
        self::setDCombined();
        $returnString = '';
        $Members = self::$dCombined->Select(array(), 'Member_Full');
        if (Valid::vString($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }
        $returnString .= sTables::Prompt($Members, 'Admin_Members');
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
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        return $returnString;
    }
}

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
    dCombined
};

class sAdministrative {
    private static $dUser;
    private static $dGroup;
    private static $dGroup_Member;
    private static $dCombined;

/*
 * Sets the class variable : dUser
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    private static function setDUser()
    {
        self::$dUser = new dUser();
    }

/*
 * Sets the class variable : dGroup
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    private static function setDGroup()
    {
        self::$dGroup = new dGroup();
    }

/*
 * Sets the class variable : dGroup_Member
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    private static function setDGroup_Member()
    {
        self::$dGroup_Member = new dGroup_Member();
    }

/*
 * Sets the class variable : dCombined
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    private static function setDCombined()
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
        $returnContent = '';
        $nestedArg = $array['y']."/".$array['z'];

        self::setDUser();
        self::setDGroup();

        switch ($nestedArg) {
            case 'Users/Add':
                $returnContent .= 'Adding new user form';
                break;
            case 'Users/Reset':
                $returnContent .= 'Reset, dp: '.$array['dp'];
                $returnContent .= sElement::General(array('x' => 'Administrative', 'y' => 'Users'), 'Spinner');
                break;
            case 'Users/Delete':
                $returnContent .= ((self::$dUser->Delete(array('userId' => $array['dp'])))? 'Sikeres müvelet!' : 'Sikertelen müvelet!');
                $returnContent .= sElement::General(array('x' => 'Administrative', 'y' => 'Users'), 'Spinner');
                break;
            case 'Groups/Add':
                $returnContent .= 'Adding new group form';
                break;
            case 'Groups/Edit':
                $returnContent .= 'Edit, dp: '.$array['dp'];
                break;
            case 'Groups/Delete':

                $returnContent .= ((self::$dGroup->Delete(array('groupId' => $array['dp'])))? 'Sikeres müvelet!' : 'Sikertelen müvelet!');
                $returnContent .= sElement::General(array('x' => 'Administrative', 'y' => 'Groups'), 'Spinner');
                break;
            case 'Membership/Edit':
                $returnContent .= 'Edit, dp: '.$array['dp'];
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
            $returnString .= sElement::General(array('path' => $array['path'], 'fa' => 'plus-circle'), 'Add');
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
            $returnString .= sElement::General(array('path' => $array['path'], 'fa' => 'plus-circle'), 'Add');
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
}

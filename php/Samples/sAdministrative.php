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

    private static function setDUser()
    {
        self::$dUser = new dUser();
    }

    private static function setDGroup()
    {
        self::$dGroup = new dGroup();
    }

    private static function setDGroup_Member()
    {
        self::$dGroup_Member = new dGroup_Member();
    }

    private static function setDCombined()
    {
        self::$dCombined = new dCombined();
    }

    public static function Action(array $array = array()): string
    {
        $returnContent = '';
        $nestedArg = $array['y']."/".$array['z'];

        self::setDUser();

        switch ($nestedArg) {
            case 'Users/Reset':
                $returnContent = 'Reset'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: '');
                break;
            case 'Users/Delete':
                if (self::$dUser->Delete(array('userId' => $_POST['dp']))) {
                    $returnContent = 'Delete'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: '').' was success';
                } else {
                    $returnContent = 'Delete'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: '').' failed';
                }
                break;
            case 'Groups/Edit':
                $returnContent = 'Edit'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: '');
                break;
            case 'Groups/Delete':
                $returnContent = 'Delete'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: '');
                break;
            case 'Membership/Edit':
                $returnContent = 'Edit'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: '');
                break;
            case 'Membership/Delete':
                $returnContent = 'Delete'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: '');
                break;

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
}

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
                $returnContent .= self::actionUsersAdd($array);
                break;
            case 'Users/Reset':
                $returnContent .= self::actionUsersReset($array);
                break;
            case 'Users/Delete':
                $returnContent .= self::actionUsersDelete($array);
                break;
            case 'Groups/Add':
                $returnContent .= self::actionGroupsAdd($array);
                break;
            case 'Groups/Edit':
                $returnContent .= self::actionGroupsEdit($array);
                break;
            case 'Groups/Delete':
                $returnContent .= self::actionGroupsDelete($array);
                break;
            case 'Membership/Edit':
                $returnContent .= self::actionMembershipEdit($array);
                break;
        }

        if (Valid::vString($returnContent)) {
            $returnContent = '<div class="text-center justification-centered">'.$returnContent.'</div>';
        }

        return $returnContent;
    }

/*
 * Returns User adding form
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.04
 */
    private static function actionUsersAdd(array $array = array()): string
    {
        if (! isset($array['Save'])) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'admUsrsAdd', 'data' => 'nameUser', 'desc' => 'Bejelentkezési név', 'value' => '', 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'admUsrsAdd', 'data' => 'contEmail', 'desc' => 'E-mail cím', 'value' => '', 'type' => 'text'), 'Input').'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="admUsrsAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            Log::Export($array);
            return 'SAVE';
        }
    }

/*
 * Fires User Password Reset
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.04
 */
    private static function actionUsersReset(array $array = array()): string
    {
        return
            '<h4>'.(
                (
                    self::$dUser->Update(
                        array(
                            'userId' => (int)$array['dp']
                        ),'Reset'
                    )
                )
                ? sTranslate::ACTION['Success']['content']
                : sTranslate::ACTION['Fail']['content']
            ).'</h4>'.sElement::General(array('x' => 'Administrative', 'y' => 'Users'), 'Spinner');
    }

/*
 * Fires User Delete
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.04
 */
    private static function actionUsersDelete(array $array = array()): string
    {
        return
            '<h4>'.(
                (
                    self::$dUser->Update(
                        array(
                            'userId' => (int)$array['dp'],
                            'groupId' => 3
                        ), 'Delete'
                    )
                )
                ? sTranslate::ACTION['Success']['content']
                : sTranslate::ACTION['Fail']['content']
            ).'</h4>'.sElement::General(array('x' => 'Administrative', 'y' => 'Users'), 'Spinner');
    }

/*
 * Returns Group adding form
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.04
 */
    private static function actionGroupsAdd(array $array = array()): string
    {
        return '
            <form method="post" class="form-group col-12" autocomplete="on">
                <div class="form-group col p-0">
                    <div class="col-12 row">
                        '.sElement::General(array('origo' => 'admGrpAdd', 'data' => 'groupName', 'desc' => 'Név', 'value' => '', 'type' => 'text'), 'Input').'
                        '.sElement::General(array('origo' => 'admGrpAdd', 'data' => 'groupDesc', 'desc' => 'Leírás', 'value' => '', 'type' => 'text'), 'Input').'
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12 row">
                        <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="admUsrAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                    </div>
                </div>
            </form>';
    }

/*
 * Returns Group Editing form
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.04
 */
    private static function actionGroupsEdit(array $array = array()): string
    {
        return 'Edit, dp: '.$array['dp'];
    }

/*
 * Fires Group Delete action
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.04
 */
    private static function actionGroupsDelete(array $array = array()): string
    {
        return
            '<h4>'.(
                (
                    self::$dGroup->Delete(
                        array(
                            'groupId' => $array['dp']
                        )
                    )
                )
                    ? sTranslate::ACTION['Success']['content']
                    : sTranslate::ACTION['Fail']['content']
            ).'</h4>'.sElement::General(array('x' => 'Administrative', 'y' => 'Groups'), 'Spinner');
    }

/*
 * Return Membership Editing form
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.04
 */
    private static function actionMembershipEdit(array $array = array()): string
    {
        return 'Edit, dp: '.$array['dp'];
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

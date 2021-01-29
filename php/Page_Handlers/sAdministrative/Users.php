<?php

declare(strict_types=1);

namespace Page_Handlers\sAdministrative;

use PreLoad\{
    Valid,
    Check,
    Log
};

use Samples\{
    sElement,
    sTranslate
};

class Users extends \Page_Handlers\sAdministrative
{
/*
* Returns User adding form
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.04
*/
    public static function Add(array $array = array()): string
    {
        self::setDUser();
        if (! isset($array['Save'])) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'admUsrsAdd', 'data' => 'userName', 'desc' => 'Bejelentkezési név', 'value' => '', 'type' => 'text', 'must-fill' => true), 'Input').'
                            '.sElement::General(array('origo' => 'admUsrsAdd', 'data' => 'userContEmail', 'desc' => 'E-mail cím', 'value' => '', 'type' => 'text', 'must-fill' => true), 'Input').'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="admUsrsAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dUser->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Administrative', 'y' => 'Users'), 'Spinner');
        }
    }
    /*
* Return Membership Editing form
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.04
*/
    public static function Edit(array $array = array()): string
    {
        self::setDGroup();
        self::setDGroup_Member();

        if (! isset($array['Save'])) {
            $selectTag = array();

            foreach(self::$dGroup->Select(array(), 'forMemberEdit') as $i) {
                $selectTag[] = array('id' => $i['groupId'], 'name' => $i['groupName']);
            }
            $Group_Member = self::$dGroup_Member->Select(array('userId' => $array['dp']), 'byUserId')[0];

            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'admMemsEdit', 'data' => 'groupMemberId', 'desc' => 'Jogosultsági kör azonosító', 'value' => $Group_Member['groupMemberId'], 'type' => 'hidden'), 'Input').'
                            '.sElement::General(array('origo' => 'admMemsEdit', 'data' => 'groupId', 'desc' => 'Jogosultsági kör', 'value' => (self::$dGroup_Member->Select(array('groupMemberId' => $Group_Member['groupMemberId']), 'byGroupMemberId'))[0]['groupId'], 'select' => $selectTag, 'type' => 'select'), 'Input').'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="admMemsEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dGroup_Member->Update($array, 'byGroupMemberId'))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Administrative', 'y' => 'Users'), 'Spinner');
        }
        return 'Edit, dp: '.$array['dp'];
    }

/*
* Fires User Password Reset
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.04
*/
    public static function Reset(array $array = array()): string
    {
        self::setDUser();
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
    public static function Delete(array $array = array()): string
    {
        self::setDUser();
        return
            '<h4>'.(
                (
                    self::$dUser->Update(
                        array(
                            'userId' => (int)$array['dp'],
                            'groupId' => (int)$GLOBALS['groupDelete']
                        ), 'Delete'
                    )
                )
                ? sTranslate::ACTION['Success']['content']
                : sTranslate::ACTION['Fail']['content']
            ).'</h4>'.sElement::General(array('x' => 'Administrative', 'y' => 'Users'), 'Spinner');
    }

}

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

class Groups extends \Page_Handlers\sAdministrative
{
/*
* Returns Group adding form
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.04
*/
    public static function Add(array $array = array()): string
    {
        self::setDGroup();
        if (! isset($array['Save'])) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'admGrpsAdd', 'data' => 'groupName', 'desc' => 'Név', 'value' => '', 'type' => 'text', 'must-fill' => true), 'Input').'
                            '.sElement::General(array('origo' => 'admGrpsAdd', 'data' => 'groupDesc', 'desc' => 'Leírás', 'value' => '', 'type' => 'text'), 'Input').'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="admGrpsAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dGroup->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Administrative', 'y' => 'Groups'), 'Spinner');
        }
    }

/*
* Returns Group Editing form
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.04
*/
    public static function Edit(array $array = array()): string
    {
        self::setDGroup();
        if (! isset($array['Save'])) {
            $Group = self::$dGroup->Select(array('groupId' => (int)$array['dp']), 'byGroupId')[0];
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'admGrpsEdit', 'data' => 'groupId', 'desc' => 'Id', 'value' => $Group['groupId'], 'type' => 'hidden'), 'Input').'
                            '.sElement::General(array('origo' => 'admGrpsEdit', 'data' => 'groupName', 'desc' => 'Név', 'value' => $Group['groupName'], 'type' => 'hidden'), 'Input').'
                            '.sElement::General(array('origo' => 'admGrpsEdit', 'data' => 'groupDesc', 'desc' => 'Leírás', 'value' => $Group['groupDesc'], 'type' => 'hidden'), 'Input').'
                            '.self::promptSelect($Group).'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="admGrpsEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dGroup->Update($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Administrative', 'y' => 'Groups'), 'Spinner');
        }
    }

/*
* Returns Group View form
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2021.01.15
*/
    public static function View(array $array = array()): string
    {
        self::setDGroup();
        $Group = self::$dGroup->Select(array('groupId' => (int)$array['dp']), 'byGroupId')[0];
        return '
            <form method="post" class="form-group col-12" autocomplete="on">
                <div class="form-group col p-0">
                    <div class="col-12 row">
                        '.sElement::General(array('origo' => 'admGrpsView', 'data' => 'groupId', 'desc' => 'Id', 'value' => $Group['groupId'], 'type' => 'hidden'), 'Input').'
                        '.sElement::General(array('origo' => 'admGrpsView', 'data' => 'groupName', 'desc' => 'Név', 'value' => $Group['groupName'], 'type' => 'hidden'), 'Input').'
                        '.sElement::General(array('origo' => 'admGrpsView', 'data' => 'groupDesc', 'desc' => 'Leírás', 'value' => $Group['groupDesc'], 'type' => 'hidden'), 'Input').'
                        '.self::promptSelect($Group, true).'
                    </div>
                </div>
            </form>';
    }

/*
* Generates Select form for Administrative/Groups section
* @param $array array
* @param $bool bool
* @return string
* @author Liszi Dániel
* @since 2021.01.15
*/
    private static function promptSelect(array $array = array(), bool $bool = false): string
    {
        $returnString = '';
        foreach (sTranslate::ROLE as $key => $value) {
            $lmntArray = array();
            $lmntArray['data'] = $key;
            $lmntArray['desc'] = $value['desc'];
            $lmntArray['value'] = $array[$key];
            $lmntArray['select'] = sTranslate::ROLE_SELECT[$value['select_type']];
            $lmntArray['type'] = 'select';
            if ($bool) {
                $lmntArray['origo'] = 'admGrpsView';
                $lmntArray['disabled'] = true;
            } else {
                $lmntArray['origo'] = 'admGrpsEdit';
            }
            $returnString .= sElement::General($lmntArray, 'Input');
        }
        return $returnString;
    }
/*
* Fires Group Delete action
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.04
*/
    public static function Delete(array $array = array()): string
    {
        self::setDGroup();
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
}

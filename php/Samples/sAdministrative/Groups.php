<?php

declare(strict_types=1);

namespace Samples\sAdministrative;

use PreLoad\{
    Valid,
    Check,
    Log
};

use Samples\{
    sElement,
    sTranslate
};

class Groups extends \Samples\sAdministrative
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
                            '.sElement::General(array('origo' => 'admGrpsAdd', 'data' => 'groupName', 'desc' => 'Név', 'value' => '', 'type' => 'text'), 'Input').'
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

    private static function promptSelect(array $array = array()): string
    {
        $returnString = '';
        foreach (sTranslate::ROLE as $key => $value) {
            $returnString .= sElement::General(array('origo' => 'admGrpsEdit', 'data' => $key, 'desc' => $value['desc'], 'value' => $array[$key], 'select' => sTranslate::ROLE_SELECT[$value['select_type']], 'type' => 'select'), 'Input');
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

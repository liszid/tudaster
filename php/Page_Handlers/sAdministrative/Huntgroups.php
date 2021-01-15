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

class Huntgroups extends \Page_Handlers\sAdministrative
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
        self::setDHuntgroup();
        if (! isset($array['Save'])) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'admHuntgroupsAdd', 'data' => 'huntgroupName', 'desc' => 'Név', 'value' => '', 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'admHuntgroupsAdd', 'data' => 'huntgroupDesc', 'desc' => 'Leírás', 'value' => '', 'type' => 'text'), 'Input').'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="admHuntgroupsAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dHuntgroup->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Administrative', 'y' => 'Huntgroups'), 'Spinner');
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
        self::setDHuntgroup();
        if (! isset($array['Save'])) {
            $Huntgroup = self::$dHuntgroup->Select(array('huntgroupId' => (int)$array['dp']), 'byHuntgroupId')[0];
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'admHuntgroupsEdit', 'data' => 'huntgroupId', 'desc' => 'Id', 'value' => $Huntgroup['huntgroupId'], 'type' => 'hidden'), 'Input').'
                            '.sElement::General(array('origo' => 'admHuntgroupsEdit', 'data' => 'huntgroupName', 'desc' => 'Név', 'value' => $Huntgroup['huntgroupName']), 'Input').'
                            '.sElement::General(array('origo' => 'admHuntgroupsEdit', 'data' => 'huntgroupDesc', 'desc' => 'Leírás', 'value' => $Huntgroup['huntgroupDesc']), 'Input').'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="admHuntgroupsEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dHuntgroup->Update($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Administrative', 'y' => 'Huntgroups'), 'Spinner');
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
        self::setDHuntgroup();
        $Huntgroup = self::$dHuntgroup->Select(array('huntgroupId' => (int)$array['dp']), 'byHuntgroupId')[0];
        $Checkboxes = self::Prompt_Checkbox($array, true);
        return '
            <form method="post" class="form-group col-12" autocomplete="on">
                <div class="form-group col p-0">
                    <div class="col-12 row">
                        '.sElement::General(array('origo' => 'admHuntgroupsView', 'data' => 'huntgroupId', 'desc' => 'Id', 'value' => $Huntgroup['huntgroupId'], 'type' => 'hidden'), 'Input').'
                        '.sElement::General(array('origo' => 'admHuntgroupsView', 'data' => 'huntgroupName', 'desc' => 'Név', 'value' => $Huntgroup['huntgroupName'],  'disabled' => true), 'Input').'
                        '.sElement::General(array('origo' => 'admHuntgroupsView', 'data' => 'huntgroupDesc', 'desc' => 'Leírás', 'value' => $Huntgroup['huntgroupDesc'], 'disabled' => true), 'Input').'
                        '.$Checkboxes.'
                    </div>
                </div>
            </form>';
    }

/*
    <input type="checkbox" class="btn-check" id="btn-check2" checked autocomplete="off" />
    <label class="btn btn-primary" for="btn-check2">Checkbox button</label>
*/
    private static function Prompt_Checkbox(array $array = array(), bool $bool = false): string
    {
        self::setDUser();
        self::setDCombined();

        $AllUsers = self::$dUser->Select(array(), 'All')[0];
        $HGUsers = self::$dCombined->Select(array('huntgroupId' => $array['dp']),'Huntgroup_Members')[0];
        $returnString = '';

        foreach($AllUsers as $i) {
            $returnString = '
                <input type="checkbox" class="btn-check" id="btn-user-'.$i['userId'].'"'.((array_search($i['userId'], array_column($HGUsers, 'userId')) > 0)?' checked':'').(($bool)?' disabled':'').' autocomplete="off" />
                <label class="btn btn-primary" for="btn-user-'.$i['userId'].'">'.$i['userName'].'</label>
            ';
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
        self::setDHuntgroup();
        return
            '<h4>'.(
                (
                    self::$dHuntgroup->Delete(
                        array(
                            'huntgroupId' => $array['dp']
                        )
                    )
                )
                    ? sTranslate::ACTION['Success']['content']
                    : sTranslate::ACTION['Fail']['content']
            ).'</h4>'.sElement::General(array('x' => 'Administrative', 'y' => 'Huntgroups'), 'Spinner');
    }
}

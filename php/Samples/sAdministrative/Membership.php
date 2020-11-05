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

class Membership extends \Samples\sAdministrative
{
/*
* Return Membership Editing form
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.04
*/
    public static function Edit(array $array = array()): string
    {
        if (! isset($array['Save'])) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'admMemsEdit', 'data' => 'groupMemberId', 'desc' => 'Csoport tag Id', 'value' => $array['dp'], 'type' => 'hidden'), 'Input').'
                            '.sElement::General(array('origo' => 'admMemsEdit', 'data' => 'groupId', 'desc' => 'Csoport Id', 'value' => '', 'type' => 'text'), 'Input').'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="admMemsEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            self::setDGroup_Member();
            return
                '<h4>'.(
                    (self::$dGroup_Member->Update($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Administrative', 'y' => 'Users'), 'Spinner');
        }
        return 'Edit, dp: '.$array['dp'];
    }
}

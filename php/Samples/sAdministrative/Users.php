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

class Users extends \Samples\sAdministrative
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
            return
                '<h4>'.(
                    (self::$dUser->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Administrative', 'y' => 'Users'), 'Spinner');
        }
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

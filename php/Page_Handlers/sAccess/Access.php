<?php

declare(strict_types=1);

namespace Page_Handlers\sAccess;

use PreLoad\{
    Valid,
    Check,
    Log
};

use Samples\{
    sCard,
    sElement,
    sTranslate
};

class Access extends \Page_Handlers\sAccess
{
/*
 * Returns Access Adding form
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2021.01.11
 */
    public static function Add(array $array = array()): string
    {
        self::setDAccess();
        if (! isset($array['Save'])) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'usrAccessAdd', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input').'
                            '.sCard::Collapsible(array('header' => 'Általános adatok', 'content' => sElement::General(array('constData' => self::ACCESS, 'staticData' => array('origo' => 'usrAccessAdd', 'tag' => 'Add'),'selectData' => array('hardwareId' => self::Hardware_Select())),'Generate_Form'))).'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrAccessAdd-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dAccess->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Accesses', 'y' => 'Access'), 'Spinner');
        }
    }

/*
 * Fires Access View
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2021.01.11
 */
    public static function View(array $array = array()): string
    {
        self::setDAccess();
        self::setDHardware();

        $Access = (self::$dAccess->Select(array('accessId' => (int)$array['dp']), 'byAccessId'))[0];
        $Hardware = (self::$dHardware->Select(array('hardwareId' => (int)$Access['hardwareId']), 'byHardwareId'))[0];

        $Access['accessPassword'] = self::$dAccess->Decode($Access['accessPassword']);

        return '
            <form method="post" class="form-group col-12" autocomplete="on">
                <div class="form-group col p-0">
                    <div class="col-12 row">'
                        .sCard::Collapsible(array('header' => 'Hozzáférési adatok', 'content' => sElement::General(array('constData' => self::ACCESS, 'staticData' => array('origo' => 'usrAccessView', 'tag' => 'View'), 'valueData' => $Access,'selectData' => array('hardwareId' => self::Hardware_Select())),'Generate_Form')))
                        .sCard::Collapsible(array('header' => 'Eszköz adatok','content' => sElement::General(array('constData' => self::HARDWARE,'staticData' => array('origo' => 'usrAccessView','tag' => 'View'),'valueData' => $Hardware),'Generate_Form')))
                    .'</div>
                </div>
            </form>';
    }

/*
 * Fires Access Edit
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2021.01.11
 */
    public static function Edit(array $array = array()): string
    {
        if (! isset($array['Save'])) {
            self::setDAccess();
            $Access = (self::$dAccess->Select(array('accessId' => (int)$array['dp']), 'byAccessId'))[0];

            $Access['accessPassword'] = self::$dAccess->Decode($Access['accessPassword']);

            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">'
                            .sCard::Collapsible(array('header' => 'Általános adatok','content' => sElement::General(array('constData' => self::ACCESS,'staticData' => array('origo' => 'usrAccessEdit','tag' => 'Edit'),'valueData' => $Access,'selectData' => array('hardwareId' => self::Hardware_Select())),'Generate_Form')))
                        .'</div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrAccessEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            self::setDAccess();
            return
                '<h4>'.(
                    (self::$dAccess->Update($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Accesses', 'y' => 'Access'), 'Spinner');
        }
    }

/*
 * Fires Access Delete
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2021.01.11
 */
    public static function Delete(array $array = array()): string
    {
        self::setDAccess();
        return
            '<h4>'.(
                (self::$dAccess->Delete(
                    array(
                        'accessId' => (int)$array['dp']
                    )
                ))
                    ? sTranslate::ACTION['Success']['content']
                    : sTranslate::ACTION['Fail']['content']
            ).'</h4>'.sElement::General(array('x' => 'Accesses', 'y' => 'Access'), 'Spinner');
    }

}

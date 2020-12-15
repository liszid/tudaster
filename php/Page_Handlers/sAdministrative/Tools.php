<?php

declare(strict_types=1);

namespace Page_Handlers\sAdministrative;

use PreLoad\{
    Valid,
    Check,
    Log
};

use Samples\{
    sTranslate,
    sElement
};

use Database\Table;

class Tools extends \Page_Handlers\sAdministrative
{
    public static function Delete(array $array = array())
    {
        self::setDTools();
        $bool = self::$dTools->Delete(array(), 'Database');
        $returnContent = ($bool)
            ? sTranslate::ACTION['Success']['content']
            : sTranslate::ACTION['Fail']['content'];

        if ($bool) {
            unset($_SESSION);
        }

        if (! isset($_SESSION)) {
            $Table = new Table();

            if (!isset($_SESSION['Database'])) {
                if ( $Table::initTable() === true) {
                    $_SESSION['Database'] = true;
                }
            }
        }

        return
            '<h4>'.$returnContent.'</h4>'.sElement::General(array('x' => 'Home', 'reload' => true), 'Spinner');
    }
}

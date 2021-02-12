<?php

declare(strict_types=1);

namespace Page_Handlers\sAdministrative;

use PreLoad\{
    Valid
    ,Check
    ,Log
};

use Samples\{
    sTables
    ,sTranslate
    ,sElement
};

use Database\Table;

class Tools extends \Page_Handlers\sAdministrative
{
    public static function Delete(array $array = array()): string
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

    public static function Logs(): string
    {
        self::setDLog();
        $Logs = self::$dLog->Select(array(), 'All');
        return sTables::Prompt($Logs, 'Admin_Logs');
    }
}

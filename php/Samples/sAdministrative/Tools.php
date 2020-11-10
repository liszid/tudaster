<?php

declare(strict_types=1);

namespace Samples\sAdministrative;

use PreLoad\{
    Valid,
    Check,
    Log
};

class Tools extends \Samples\sAdministrative
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

        return
            '<h4>'.$returnContent.'</h4>'.sElement::General(array('x' => 'Home'), 'Spinner');
    }
}

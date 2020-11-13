<?php

declare(strict_types=1);

namespace Samples;

use PreLoad\{
    Valid,
    Check,
    Log
};

use Data\{
    dCompany,
    dCombined
};

class sCompany
{
/*
 * Used at Administrative Page to display Users section
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.13
 */
    public static function Company(array $array = array()): string
    {
        $returnString = 'Company';
        $dCompany = new dCompany();
        $Company = $dCompany->Select(array(), 'All');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Company, 'Company_Company');
        return $returnString;
    }

/*
 * Used at Administrative Page to display Users section
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.13
 */
    public static function Sites(array $array = array()): string
    {
        $returnString = 'Sites';
        $dCombined = new dCombined();
        $Company_Sites = $dCombined->Select(array(), 'Company_Site_Table');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Company_Sites, 'Company_Site');
        return $returnString;
    }
}

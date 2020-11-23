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
    dCompany_Site,
    dCompany_Site_Type,
    dCombined
};

class sCompany
{
    protected static $dCompany;
    protected static $dCompany_Site;
    protected static $dCompany_Site_Type;
    protected static $dCombined;

/*
 * Sets the class variable : dUser
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDCompany()
    {
        self::$dCompany = new dCompany();
    }

/*
 * Sets the class variable : dGroup
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDCompany_Site()
    {
        self::$dCompany_Site = new dCompany_Site();
    }

/*
 * Sets the class variable : dGroup
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDCompany_Site_Type()
    {
        self::$dCompany_Site_Type = new dCompany_Site_Type();
    }

/*
 * Sets the class variable : dCombined
 * @author Liszi Dániel
 * @since 2020.11.03
 */
    protected static function setDCombined()
    {
        self::$dCombined = new dCombined();
    }

/*
 * Used at Administrative Page for interactions
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.03
 * @update 2020.11.23
 */
    public static function Action(array $array = array()): string
    {
        $wclass;
        $returnContent = '';

        switch($array['y']) {
            case 'Company':
                $wclass = new sCompany\Company;
                break;
            case 'Site':
                $wclass = new sCompany\Site;
                break;
        }

        switch ($array['z']) {
            case 'Add':
                $returnContent .= $wclass::Add($array);
                break;
            case 'View':
                $returnContent .= $wclass::View($array);
                break;
            case 'Delete':
                $returnContent .= $wclass::Delete($array);
                break;
            case 'Edit':
                $returnContent .= $wclass::Edit($array);
                break;
            case 'Filter':
                $returnContent .= $wclass::Filter($array);
                break;
        }
        if (Valid::vString($returnContent)) {
            $returnContent = '<div class="text-center justification-centered">'.$returnContent.'</div>';
        }

        return $returnContent;
    }
/*
 * Used at Administrative Page to display Users section
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.13
 */
    public static function Company(array $array = array()): string
    {
        self::setDCompany();
        $returnString = '';
        $Company = self::$dCompany->Select(array(), 'All');

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
    public static function Site(array $array = array()): string
    {
        self::setDCombined();
        $returnString = '';
        $Company_Sites = self::$dCombined->Select(array(), 'Company_Site_Table');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Company_Sites, 'Company_Site');
        return $returnString;
    }
}

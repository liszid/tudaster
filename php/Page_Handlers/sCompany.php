<?php

declare(strict_types=1);

namespace Page_Handlers;

use PreLoad\{
    Valid
    ,Check
    ,Log
};

use Data\{
    dCompany
    ,dCompany_Site
    ,dCompany_Site_Type
    ,dCombined
};

use Samples\{
    sCard
    ,sTables
    ,sTranslate
};

class sCompany
{
    protected static $dCompany;
    protected static $dCompany_Site;
    protected static $dCompany_Site_Type;
    protected static $dCombined;

    const COMPANY = array(
        array('data' => 'companyId', 'desc' => 'Cég neve', 'type' => 'select', 'tags' => 'View')
        ,array('data' => 'companyOwnerLastName', 'desc' => 'Tulajdonos vezetékneve', 'type' => 'text', 'tags' => 'View')
        ,array('data' => 'companyOwnerFirstName', 'desc' => 'Tulajdonos keresztneve', 'type' => 'text', 'tags' => 'View')
        ,array('data' => 'companyAddressCity', 'desc' => 'Város', 'type' => 'text', 'tags' => 'View')
        ,array('data' => 'companyAddressPostcode', 'desc' => 'Irányítószám', 'type' => 'text', 'tags' => 'View')
        ,array('data' => 'companyAddressStreet', 'desc' => 'Utca, Házszám', 'type' => 'text', 'tags' => 'View')
    );

    const COMPANY_SITE = array(
        array( 'data' => 'companySiteName', 'desc' => 'Telephely neve', 'type' => 'text', 'tags' => 'Edit,View')
        ,array('data' => 'companySiteTypeId', 'desc' => 'Telephely típusa', 'type' => 'select', 'tags' => 'Edit,View')
        ,array('data' => 'companySiteDesc', 'desc' => 'Telephely leírása', 'type' => 'text', 'tags' => 'Edit,View')
        ,array('data' => 'companySiteAddressCity', 'desc' => 'Város', 'type' => 'text', 'tags' => 'Edit,View')
        ,array('data' => 'companySiteAddressPostcode', 'desc' => 'Irányítószám', 'type' => 'text', 'tags' => 'Edit,View')
        ,array('data' => 'companySiteAddressStreet', 'desc' => 'Utca, Házszám', 'type' => 'text', 'tags' => 'Edit,View')
        ,array('data' => 'companySiteEmail', 'desc' => 'E-mail cím', 'type' => 'text', 'tags' => 'Edit,View')
        ,array('data' => 'companySitePhone', 'desc' => 'Telefonszám', 'type' => 'text', 'tags' => 'Edit,View')

    );

    const COMPANY_SITE_OWNER = array(
        array( 'data' => 'companySiteOwnerLastName', 'desc' => 'Vezetéknév', 'type' => 'text', 'tags' => 'Edit,View')
        ,array('data' => 'companySiteOwnerFirstName', 'desc' => 'Keresztnév', 'type' => 'text', 'tags' => 'Edit,View')
        ,array('data' => 'companySiteOwnerEmail', 'desc' => 'E-mail cím', 'type' => 'text', 'tags' => 'Edit,View')
        ,array('data' => 'companySiteOwnerPhone', 'desc' => 'Telefonszám', 'type' => 'text', 'tags' => 'Edit,View')
    );

    const COMPANY_SITE_SUB_OWNER = array(
        array( 'data' => 'companySiteSubOwnerLastName', 'desc' => 'Vezetéknév', 'type' => 'text', 'tags' => 'Edit,View')
        ,array('data' => 'companySiteSubOwnerFirstName', 'desc' => 'Keresztnév', 'type' => 'text', 'tags' => 'Edit,View')
        ,array('data' => 'companySiteSubOwnerEmail', 'desc' => 'E-mail cím', 'type' => 'text', 'tags' => 'Edit,View')
        ,array('data' => 'companySiteSubOwnerPhone', 'desc' => 'Telefonszám', 'type' => 'text', 'tags' => 'Edit,View')
    );
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
        /*if (Valid::vString($returnContent)) {
            $returnContent = '<div class="text-center justification-centered">'.$returnContent.'</div>';
        }*/

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

/*
 * @return array
 * @author Liszi Dániel
 * @since 2020.12.16
 */
    protected static function Company_Site_Type_Select(): array
    {
        self::setDCompany_Site_Type();
        $tempArray = array();
        foreach(self::$dCompany_Site_Type->Select(array(), 'All') as $i) {
            $tempArray[] = array('id' => $i['companySiteTypeId'], 'name' => $i['companySiteTypeName']);
        }
        return $tempArray;
    }

/*
 * @return array
 * @author Liszi Dániel
 * @since 2020.12.16
 */
    protected static function Company_Select(): array
    {
        self::setDCompany();
        $tempArray = array();
        foreach(self::$dCompany->Select(array(), 'forCompanySelect') as $i) {
            $tempArray[] = array('id' => $i['companyId'], 'name' => $i['companyName']);
        }
        return $tempArray;
    }
}

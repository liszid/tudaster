<?php

declare(strict_types=1);

namespace Page_Handlers;

use PreLoad\{
    Valid
    ,Check
    ,Log
};

use Data\{
    dAccess
    ,dCombined
};

use Samples\{
    sCard
    ,sTables
    ,sTranslate
};

class sAccess
{
    protected static $dAccess;
    protected static $dCombined;

    const ACCESS = array(
        array('data' => 'accessId', 'desc' => '', 'type' => 'hidden', 'tags' => 'Edit')
    );

/*
 * Sets the class variable : dHardware
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    protected static function setDAccess()
    {
        self::$dAccess= new dAccess();
    }

/*
 * Sets the class variable : dCombined
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    protected static function setDCombined()
    {
        self::$dCombined = new dCombined();
    }

/*
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    public static function Action(array $array = array()): string
    {
        $wclass;
        $returnContent = '';

        switch($array['y']) {
            case 'Access':
                $wclass = new sAccess\Access;
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
        }
        if (Valid::vString($returnContent)) {
            $returnContent = '<div class="text-center justification-centered">'.$returnContent.'</div>';
        }

        return $returnContent;
    }
/*
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.12.09
 */
    public static function Access(array $array = array()): string
    {
        self::setDAccess();
        $returnString = '';
        $Access = self::$dAccess->Select(array(), 'All');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Access, 'Access_Access');
        return $returnString;
    }
/*
 * @return array
 * @author Liszi Dániel
 * @since 2020.12.16
 */
    protected static function Hardware_Select(): array
    {
        self::setDCombined();
        $tempArray = array();
        foreach(self::$dCombined->Select(array(), 'Company_Site_Select') as $i) {
            $tempArray[] = array('id' => $i['companySiteId'], 'name' => $i['companyName'].' - '.$i['companySiteName']);
        }
        return $tempArray;
    }
}

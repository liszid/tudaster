<?php

declare(strict_types=1);

namespace Page_Handlers;

use PreLoad\{
    Valid
    ,Check
    ,Log
};

use Data\{
    dKnowledge
    ,dCombined
};

use Samples\{
    sCard
    ,sTables
    ,sTranslate
};

class sKnowledge
{
    protected static $dKnowledge;
    protected static $dCombined;

    const ACCESS = array(
        array('data' => 'accessId', 'desc' => '', 'type' => 'hidden', 'tags' => 'Edit')
        ,array('data' => 'accessUsername', 'desc' => 'Felhasználónév', 'type' => 'text', 'tags' => 'Add,Edit,View', 'must-fill' => true)
        ,array('data' => 'accessPassword', 'desc' => 'Jelszó', 'type' => 'text', 'tags' => 'Add,Edit,View', 'must-fill' => true)
        ,array('data' => 'hardwareId', 'desc' => 'Eszköz', 'type' => 'select', 'tags' => 'Add,View,Edit')
    );

/*
 * Sets the class variable : dHardware
 * @author Liszi Dániel
 * @since 2020.12.07
 */
    protected static function setDKnowledge()
    {
        self::$dKnowledge= new dKnowledge();
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

        switch ($array['z']) {
            case 'Add':
                $returnContent .= self::Add($array);
                break;
            case 'View':
                $returnContent .= self::View($array);
                break;
            case 'Delete':
                $returnContent .= self::Delete($array);
                break;
            case 'Edit':
                $returnContent .= self::Edit($array);
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
    public static function Knowledge(array $array = array()): string
    {
        self::setDCombined();
        $returnString = '';
        $Combined = self::$dCombined->Select(array('userId' => $GLOBALS['sessionId']), 'Access_Table');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Combined, 'Access_Access');
        return $returnString;
    }
}

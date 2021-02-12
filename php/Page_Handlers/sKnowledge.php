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

    const KNOWLEDGE = array(
        array('data' => 'knowledgeId', 'desc' => '', 'type' => 'hidden', 'tags' => 'Edit')
        ,array('data' => 'knowledgeTitle', 'desc' => 'Cím', 'type' => 'text', 'tags' => 'Add,Edit,View', 'must-fill' => true)
        ,array('data' => 'knowledgeTypeId', 'desc' => 'Típus', 'type' => 'text', 'tags' => 'Add,Edit,View', 'must-fill' => true)
        ,array('data' => 'knowledgeText', 'desc' => 'Leírás', 'type' => 'select', 'tags' => 'Add,View,Edit')
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
        $returnContent = '';

        $array['defaultData'] = self::KNOWLEDGE;
        $array['origo'] = self::TYPES[$array['y']]['origo'].$array['z'];
        $array['returnPath'] = array('x' => 'Hardware', 'y' => $array['y']);

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
        $Combined = self::$dCombined->Select(array('userId' => $GLOBALS['sessionId']), 'Knowledge_Table');

        if (isset($array['path'])) {
            $returnString .= sCard::Collapsible(sTranslate::Info($array['path']));
        }

        $returnString .= sTables::Prompt($Combined, 'Knowledge_Knowledge');
        return $returnString;
    }

    /*
* Generates Hardware::Add modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function Add(array $array = array()): string
    {
        self::setDKnowledge();
        if (! isset($array['Save'])) {
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">'
                            .sElement::General(array('origo' => $array['origo'], 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input')
                            .sCard::Collapsible(array('header' => 'Általános adatok', 'content' => sElement::General(array('constData' => $array['defaultData'], 'staticData' => array('origo' => $array['origo'], 'tag' => 'Add'),'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                        .'</div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="'.$array['origo'].'-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dKnowledge->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General($array['returnPath'], 'Spinner');
        }
    }

/*
* Generates Hardware::View modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function View(array $array = array()): string
    {
        self::setDKnowledge();
        $Knowledge = (self::$dKnowledge->Select(array('knowledgeId' => (int)$array['dp']), 'byKnowledgeId'))[0];
        return '
            <form method="post" class="form-group col-12" autocomplete="on">
                <div class="form-group col p-0">
                    <div class="col-12 row">'
                        .sCard::Collapsible(array('header' => 'Általános adatok', 'content' => sElement::General(array('constData' => $array['defaultData'], 'staticData' => array('origo' => $array['origo'], 'tag' => 'View'), 'valueData' => $Hardware,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                        .sElement::General(array('origo' => $array['origo'],'data' => 'userName','desc' => 'Hozzáadta','value' => $Knowledge['userName'], 'type' => 'text', 'disabled' => true), 'Input')
                        .sElement::General(array('origo' => $array['origo'],'data' => 'hardwareDate','desc' => 'Hozzáadva','value' => $Knowledge['hardwareDate'], 'type' => 'text', 'disabled' => true), 'Input')
                    .'</div>
                </div>
            </form>';
    }

/*
* Generates Hardware::Edit modal
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function Edit(array $array = array()): string
    {
        self::setDKnowledge();
        if (! isset($array['Save'])) {
            $Knowledge = (self::$dKnowledge->Select(array('knowledgeId' => (int)$array['dp']), 'byKnowledgeId'))[0];
            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">'
                            .sElement::General(array('origo' => $array['origo'], 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input')
                            .sCard::Collapsible(array('header' => 'Általános adatok','content' => sElement::General(array('constData' => $array['defaultData'],'staticData' => array('origo' => $array['origo'],'tag' => 'Edit'),'valueData' => $Knowledge,'selectData' => array('companySiteId' => self::Company_Site_Select())),'Generate_Form')))
                        .'</div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="'.$array['origo'].'-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dKnowledge->Update($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General($array['returnPath'], 'Spinner');
        }
    }

/*
* Deletes selected Hardware
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.12.16
*/
    public static function Delete(array $array = array()): string
    {
            self::setDKnowledge();
            return
                '<h4>'.(
                    (self::$dKnowledge->Delete(
                        array(
                            'knowledgeId' => (int)$array['dp']
                            ,'userId' => $GLOBALS['sessionId']
                        )
                    ))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General($array['returnPath'], 'Spinner');
    }
}

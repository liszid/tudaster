<?php

declare(strict_types=1);

namespace Samples\sTables;

interface KNOWLEDGE
{
    const KNOWLEDGE_KNOWLEDGE = array(
        "tableId" => "tableKnowledgeKnowledge"
        ,"tableRoot" => "Knowledge/Knowledge"
        ,"tableRole" => "canKnowledge"
        ,"data" => array(
            "knowledgeId" => array("text" => "Id", "tooltip" => "")
            ,"knowledgeTitle" => array("text" => "Cím", "tooltip" => "Cím")
            ,"knowledgeTypeName" => array("text" => "Típus", "tooltip" => "Típus")
            ,"knowledgeDate" => array("text" => "Dátum", "tooltip" => "Dátum")
        )
        ,"button" => array(
            array('color' => 'warning', 'fa' => 'th-list', 'action' => 'View', 'tooltip' => 'Megtekintés', 'level' => 1, 'nonModal' => true)
            ,array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit', 'tooltip' => 'Szerkesztés', 'level' => 3, 'nonModal' => true)
            ,array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete', 'tooltip' => 'Törlés', 'level' => 7)
        )
    );
}

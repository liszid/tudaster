<?php

declare(strict_types=1);

namespace Samples\sTables;

interface ADMIN_GROUPS
{
    const ADMIN_GROUPS = array(
        "tableId" => "tableAdminGroups"
        ,"tableRoot" => "Administrative/Groups"
        ,"tableRole" => "mngGroups"
        ,"data" => array(
            "groupId" => array("text" => "Id", "tooltip" => "")
            ,"groupName" => array("text" => "Név", "tooltip" => "")
            ,"groupDesc" => array("text" => "Leírás", "tooltip" => "")
        )
        ,"button" => array(
            array('color' => 'warning', 'fa' => 'th-list', 'action' => 'View', 'tooltip' => 'Megtekintés', 'level' => 1)
            ,array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit', 'tooltip' => 'Szerkesztés', 'level' => 1)
            ,array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete', 'tooltip' => 'Törlés', 'level' => 1)
        )
    );
}

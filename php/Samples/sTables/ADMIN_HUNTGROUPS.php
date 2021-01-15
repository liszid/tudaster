<?php

declare(strict_types=1);

namespace Samples\sTables;

interface ADMIN_HUNTGROUPS
{
    const ADMIN_HUNTGROUPS = array(
        "tableId" => "tableAdminHuntgroups"
        ,"tableRoot" => "Administrative/Huntgroups"
        ,"tableRole" => "mngHuntgroups"
        ,"data" => array(
            "huntgroupId" => array("text" => "Id", "tooltip" => "")
            ,"huntgroupName" => array("text" => "Név", "tooltip" => "")
            ,"huntgroupDesc" => array("text" => "Leírás", "tooltip" => "")
        )
        ,"button" => array(
            array('color' => 'warning', 'fa' => 'th-list', 'action' => 'View', 'tooltip' => 'Megtekintés', 'level' => 1)
            ,array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit', 'tooltip' => 'Szerkesztés', 'level' => 1)
            ,array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete', 'tooltip' => 'Törlés', 'level' => 1)
        )
    );
}

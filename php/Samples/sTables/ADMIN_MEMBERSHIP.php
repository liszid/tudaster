<?php

declare(strict_types=1);

namespace Samples\sTables;

interface ADMIN_MEMBERSHIP
{
    const ADMIN_MEMBERSHIP = array(
        "tableId" => "tableAdminMembership",
        "tableRoot" => "Administrative/Membership",
        "tableRole" => "mngMembers",
        "data" => array(
            "groupMemberId" => array("text" => "Id", "tooltip" => ""),
            "groupName" => array("text" => "Csoportnév", "tooltip" => ""),
            "groupDesc" => array("text" => "Csoport leírás", "tooltip" => ""),
            "userName" => array("text" => "Felhasználónév", "tooltip" => "")
        ),
        "button" => array(
            array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit', 'tooltip' => 'Szerkesztés', 'level' => 1)
        )
    );
}

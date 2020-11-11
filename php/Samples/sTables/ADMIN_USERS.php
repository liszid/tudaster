<?php

declare(strict_types=1);

namespace Samples\sTables;

interface ADMIN_USERS
{
    const ADMIN_USERS = array(
        "tableId" => "tableAdminUsers",
        "tableRoot" => "Administrative/Users",
        "data" => array(
            "userId" => array("text" => "Id", "tooltip" => ""),
            "nameUser" => array("text" => "Felhasználó", "tooltip" => ""),
            "nameLast" => array("text" => "Vezetéknév", "tooltip" => ""),
            "nameFirst" => array("text" => "Keresztnév", "tooltip" => ""),
            "contSite" => array("text" => "Telephely", "tooltip" => ""),
            "contEmail" => array("text" => "E-mail", "tooltip" => ""),
            "contPhone" => array("text" => "Telefon", "tooltip" => "")
        ),
        "button" => array(
            array('color' => 'warning', 'fa' => 'undo', 'action' => 'Reset'),
            array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete')
        )
    );
}

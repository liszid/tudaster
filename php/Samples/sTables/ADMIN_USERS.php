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
            "userName" => array("text" => "Felhasználó", "tooltip" => ""),
            "userLastName" => array("text" => "Vezetéknév", "tooltip" => ""),
            "userFirstName" => array("text" => "Keresztnév", "tooltip" => ""),
            "userContSite" => array("text" => "Telephely", "tooltip" => ""),
            "userContEmail" => array("text" => "E-mail", "tooltip" => ""),
            "userContPhone" => array("text" => "Telefon", "tooltip" => "")
        ),
        "button" => array(
            array('color' => 'warning', 'fa' => 'undo', 'action' => 'Reset'),
            array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete')
        )
    );
}

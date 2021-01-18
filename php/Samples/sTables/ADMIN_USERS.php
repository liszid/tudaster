<?php

declare(strict_types=1);

namespace Samples\sTables;

interface ADMIN_USERS
{
    const ADMIN_USERS = array(
        "tableId" => "tableAdminUsers"
        ,"tableRoot" => "Administrative/Users"
        ,"tableRole" => "mngUsers"
        ,"data" => array(
            "userId" => array("text" => "Id", "tooltip" => "")
            ,"userName" => array("text" => "Felhasználó", "tooltip" => "")
            ,"groupName" => array("text" => "Jogosultság", "tooltip" => "")
            ,"groupDesc" => array("text" => "Jogosultság leírás", "tooltip" => "")
            ,"userContEmail" => array("text" => "E-mail", "tooltip" => "")
/*
            "userLastName" => array("text" => "Vezetéknév", "tooltip" => ""),
            "userFirstName" => array("text" => "Keresztnév", "tooltip" => ""),
            "userContSite" => array("text" => "Telephely", "tooltip" => ""),
            "userContPhone" => array("text" => "Telefon", "tooltip" => "")
*/
        )
        ,"button" => array(
            array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit', 'tooltip' => 'Szerkesztés', 'level' => 1)
            ,array('color' => 'warning', 'fa' => 'undo', 'action' => 'Reset', 'tooltip' => 'Jelszó helyreállítás', 'level' => 1)
            ,array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete', 'tooltip' => 'Törlés', 'level' => 1)
        )
    );
}

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
        )
        ,"button" => array(
            array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit', 'tooltip' => 'Jogosultság kör módosítása', 'level' => 1)
            ,array('color' => 'warning', 'fa' => 'undo', 'action' => 'Reset', 'tooltip' => 'Jelszó helyreállítás', 'level' => 1)
            ,array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete', 'tooltip' => 'Fiók töröltté állítása', 'level' => 1)
        )
    );
}

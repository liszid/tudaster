<?php

declare(strict_types=1);

namespace Samples\sTables;

interface HOME_USERS
{
    const HOME_USERS = array(
        "tableId" => "tableHomeUsers",
        "tableRoot" => "Users",
        "data" => array(
            "userId" => array("text" => "Id", "tooltip" => ""),
            "thumbnail" => array("text" => "Ikon", "tooltip" => ""),
            "nameLast" => array("text" => "Vezetéknév", "tooltip" => ""),
            "nameFirst" => array("text" => "Keresztnév", "tooltip" => ""),
            "contSite" => array("text" => "Telephely", "tooltip" => ""),
            "contEmail" => array("text" => "E-mail", "tooltip" => ""),
            "contPhone" => array("text" => "Telefon", "tooltip" => "")
        ),
        "button" => array()
    );
}

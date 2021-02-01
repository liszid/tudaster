<?php

declare(strict_types=1);

namespace Samples\sTables;

interface USERS
{
    const HOME_USERS = array(
        "tableId" => "tableHomeUsers",
        "tableRoot" => "Users",
        "data" => array(
            "userId" => array("text" => "Id", "tooltip" => ""),
            "userThumbnail" => array("text" => "Ikon", "tooltip" => ""),
            "userLastName" => array("text" => "Vezetéknév", "tooltip" => ""),
            "userFirstName" => array("text" => "Keresztnév", "tooltip" => ""),
            "userContSite" => array("text" => "Telephely", "tooltip" => ""),
            "userContEmail" => array("text" => "E-mail", "tooltip" => ""),
            "userContPhone" => array("text" => "Telefon", "tooltip" => "")
        ),
        "button" => array()
    );
}

<?php

declare(strict_types=1);

namespace Samples\sTables;

interface ADMIN_GROUPS
{
    const ADMIN_GROUPS = array(
        "tableId" => "tableAdminGroups",
        "tableRoot" => "Administrative/Groups",
        "data" => array(
            "groupId" => array("text" => "Id", "tooltip" => ""),
            "groupName" => array("text" => "Név", "tooltip" => ""),
            "groupDesc" => array("text" => "Leírás", "tooltip" => ""),
            "mngGroups" => array("text" => "mG", "tooltip" => "Csoport kezelési engedély"),
            "mngUsers" => array("text" => "mU", "tooltip" => "Felhasználó kezelési engedély"),
            "mngMembers" => array("text" => "mM", "tooltip" => "Csoport tagság kezelési engedély"),
            "mngTools" => array("text" => "mT", "tooltip" => "Adminisztratív eszköz kezelési engedély"),
            "canUsers" => array("text" => "cUs", "tooltip" => "Felhasználói adatok megtekintése"),
            "canCompany" => array("text" => "cC", "tooltip" => "Céges adatok megtekintése/kezelése"),
            "canKnowledge" => array("text" => "cK", "tooltip" => "Tudáscikkek megtekintése/kezelése"),
            "canUsername" => array("text" => "cUn", "tooltip" => "Hozzáféréseknél felhasználói nevek megtekintése/kezelése"),
            "canPassword" => array("text" => "cP", "tooltip" => "Hozzáféréseknél jelszavak megtekintése/kezelése"),
            "canHardware" => array("text" => "cH", "tooltip" => "Hardver adatok megtekintése/kezelése"),
            "canSoftware" => array("text" => "cS", "tooltip" => "Szoftver adatok megtekintése/kezelése"),
            "canEdit" => array("text" => "cE", "tooltip" => "Profil szerkesztési engedély"),
            "canLogin" => array("text" => "cL", "tooltip" => "Bejelentkezési engedély")
        ),
        "button" => array(
            array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit', 'tooltip' => 'Szerkesztés'),
            array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete', 'tooltip' => 'Törlés')
        )
    );
}

<?php

declare(strict_types=1);

$GLOBALS['Database']['Table']['Insert'][0] = "
    INSERT INTO `User`(
        userName,
        pWord,
        userThumbnail,
        userFirstName,
        userLastName,
        userContEmail,
        userContPhone,
        userContSite,
        isDelete
    ) VALUES
        ('admin', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'Admin', '', 'admin@kruppsystem.hu', '0036301234567', 'Törökbálint', 0),
        ('test', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'Test', '', 'teszt@kruppsystem.hu', '0036301234567', 'Törökbálint', 1);";

$GLOBALS['Database']['Table']['Insert'][1] = "
    INSERT INTO `Group`(
        groupName,
        groupDesc,
        canAdministrative,
        mngGroups,
        mngUsers,
        mngMembers,
        mngTools,
        canUsers,
        canCompany,
        canKnowledge,
        canUsername,
        canPassword,
        canHardware,
        canSoftware,
        canEdit,
        canLogin,
        isDelete
    ) VALUES
        ('Adminisztrátor',	'Adminisztratív csoport teljes hozzáféréssel',  1, 1, 1, 1, 1, 1, 7, 7, 7, 7, 7, 7, 1, 1, 0),
        ('Alapértelmezett', 'Alapértelmezett felhasználói csoport',         0, 0, 0, 0, 0, 1, 3, 3, 3, 3, 3, 3, 1, 1, 0),
        ('Korlátozott',     'Korlátozott hozzáféréssel rendelkezö csoport', 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 1, 1, 0),
        ('Törölt',          'Törölt felhasználók csoportja',                0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);";

$GLOBALS['Database']['Table']['Insert'][2] = "
    INSERT INTO `Group_Member`(
        userId,
        groupId,
        isDelete
    ) VALUES
        (1, 1, 0),
        (2, 2, 1);";
$GLOBALS['Database']['Table']['Insert'][3] = "
    INSERT INTO `Company`(
        userId,
        companyName,
        companyDesc,
        companyOwnerFirstName,
        companyOwnerLastName,
        companyAddressCity,
        companyAddressPostcode,
        companyAddressStreet,
        isDelete
    ) VALUES
        (1, 'Krupp-System Kft.', 'Munkahely', 'Péter', 'Krupp', 'Törökbálint', '2045', 'Depo 062/32', 0);
    ";
$GLOBALS['Database']['Table']['Insert'][4] = "
    INSERT INTO `Company_Site_Type`(
        companySiteTypeName,
        isDelete
    ) VALUES
        ('Alapértelmezett', 0),
        ('Cég központ', 0),
        ('Iroda', 0),
        ('Szolgáltató', 0),
        ('Dohány bolt', 0),
        ('Élelmiszer bolt', 0),
        ('Bisztró/ Étterem', 0),
        ('Pékség', 0),
        ('Raktár', 0);";

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
        ('admin', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'Admin', '', 'teszt@kruppsystem.hu', '0036301234567', 'Törökbálint', 0);";

$GLOBALS['Database']['Table']['Insert'][1] = "
    INSERT INTO `Group`(
        groupName,
        groupDesc,
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
        ('Adminisztrátor',	'Adminisztratív csoport teljes hozzáféréssel',  1, 1, 1, 1, 1, 7, 7, 7, 7, 7, 7, 1, 1, 0),
        ('Alapértelmezett', 'Alapértelmezett felhasználói csoport',         0, 0, 0, 0, 1, 3, 3, 3, 3, 3, 3, 1, 1, 0),
        ('Korlátozott',     'Korlátozott hozzáféréssel rendelkezö csoport', 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 1, 1, 0),
        ('Törölt',          'Törölt felhasználók csoportja',                0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);";

$GLOBALS['Database']['Table']['Insert'][2] = "
    INSERT INTO `Group_Member`(
        userId,
        groupId,
        isDelete
    ) VALUES
        (1, 1, 0);";

$GLOBALS['Database']['Table']['Insert'][4] = "
    INSERT INTO `Company_Site_Type`(
        companySiteTypeName,
        isDelete
    ) VALUES
        ('Alapértelmezett', 0);";

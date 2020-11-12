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
        ('admin', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'Admin', '', 'teszt@kruppsystem.hu', '0036301234567', 'Törökbálint', 0),
        ('kruppp', '".md5('kruppp')."', 'black-tie', 'Péter', 'Krupp', 'krupp.peter@kruppsystem.hu', '0036301234567', 'Törökbálint', 1),
        ('szabom', '".md5('szabom')."', 'superpowers', 'Mária', 'Szabó', 'szabo.maria@kruppsystem.hu', '0036301234567', 'Törökbálint', 1),
        ('liszid', '".md5('liszid')."', 'hand-spock-o', 'Dániel', 'Liszi', 'liszi.daniel@kruppsystem.hu', '0036301234567', 'Törökbálint', 1),
        ('bakoczyl', '".md5('bakoczyl')."', 'linux', 'László', 'Bakóczy', 'bakoczy.laszlo@kruppsystem.hu', '0036301234567', 'Törökbálint', 1),
        ('szaboa', '".md5('szaboa')."', 'database', 'Árpád', 'Szabó', 'szabo.arpad@kruppsystem.hu', '0036301234567', 'Törökbálint', 1),
        ('kadag', '".md5('kadag')."', 'coffee', 'Gábor', 'Kada', 'kada.gabor@kruppsystem.hu', '0036301234567', 'Törökbálint', 1),
        ('barthat', '".md5('barthat')."', 'glass', 'Tibor', 'Bartha', 'bartha.tibor@kruppsystem.hu', '0036301234567', 'Törökbálint', 1),
        ('karasza', '".md5('karasza')."', 'forumbee', 'Attila', 'Kárász', 'karasz.attila@kruppsystem.hu', '0036301234567', 'Törökbálint', 1),
        ('lepsist', '".md5('lepsist')."', 'wrench', 'Tamás', 'Lepsis', 'lepsis.tamas@kruppsystem.hu', '0036301234567', 'Törökbálint', 1);";

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
        (1, 1, 0),
        (2, 1, 1),
        (3, 2, 1),
        (4, 2, 1),
        (5, 2, 1),
        (6, 2, 1),
        (7, 2, 1),
        (8, 2, 1),
        (9, 2, 1),
        (10, 2, 1);";

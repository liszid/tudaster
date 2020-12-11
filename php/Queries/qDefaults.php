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
        canEdit,
        canLogin,
        isDelete
    ) VALUES
        ('Adminisztrátor',	'Adminisztratív csoport teljes hozzáféréssel',  1, 1, 1, 1, 1, 1, 7, 7, 7, 7, 7, 1, 1, 0),
        ('Alapértelmezett', 'Alapértelmezett felhasználói csoport',         0, 0, 0, 0, 0, 1, 3, 3, 3, 3, 3, 1, 1, 0),
        ('Korlátozott',     'Korlátozott hozzáféréssel rendelkezö csoport', 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 1, 1, 0),
        ('Törölt',          'Törölt felhasználók csoportja',                0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);";

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
        companyId,
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
        (1, 1, 'Default', '-', '-', '-', '-', '0', '-', 0),
        (2, 1, 'Krupp-System Kft.', 'Munkahely', 'Péter', 'Krupp', 'Törökbálint', '2045', 'Depo 062/32', 1),
        (3, 1, 'Krupp és Társa Kft.', 'Ügyfél', 'József', 'Krupp', 'Budaörs', '2040', 'Szabadság út 52', 1);
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
$GLOBALS['Database']['Table']['Insert'][5] = "
    INSERT INTO `Company_Site`(
        companySiteId,
        companyId,
        userId,
        companySiteName,
        companySiteDesc,
        companySiteOwnerFirstName,
        companySiteOwnerLastName,
        companySiteOwnerEmail,
        companySiteOwnerPhone,
        companySiteSubOwnerFirstName,
        companySiteSubOwnerLastName,
        companySiteSubOwnerEmail,
        companySiteSubOwnerPhone,
        companySiteAddressCity,
        companySiteAddressPostcode,
        companySiteAddressStreet,
        companySiteEmail,
        companySitePhone,
        companySiteTypeId,
        isDelete
    ) VALUES
    (1, 1, 1, 'Default', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 0),
    (2, 2, 1, 'Központ', 'Központi telephely', 'Péter', 'Krupp', 'krupp.peter@kruppsystem.hu', 36301234567,'Mária','Szabó', 'szabo.maria@kruppsystem.hu', 36301234567,'Törökbálint', 2045, 'Depo 062/32', 'iroda@kruppsystem.hu', 36301234567, 2, 1),
    (3, 2, 1, 'Pénzügy', 'Pénzügy', 'Zsuzsanna', 'Borbély', 'borbely.zsuzsanna@kruppsystem.hu', 36301234567,'','', '', 0,'Törökbálint', 2045, 'Depo 062/32', 'penzugy@kruppsystem.hu', 36301234567, 3, 1),
    (4, 2, 1, 'Raktár', 'Központi raktár', 'Tamás', 'Lepsis', 'lepsis.tamas@kruppsystem.hu', 36301234567,'','', '', 0,'Törökbálint', 2045, 'Depo 062/32', 'raktar@kruppsystem.hu', 36301234567, 9, 1),
    (5, 2, 1, 'Informatika', 'Központi informatika iroda', 'László', 'Bakóczy', 'bakoczy.laszlo@kruppsystem.hu', 36301234567,'','', '', 0,'Törökbálint', 2045, 'Depo 062/32', 'informatika@kruppsystem.hu', 36301234567, 4, 1),
    (6, 2, 1, 'Support', 'Central support', 'Tibor', 'Bartha', 'krupp.peter@kruppsystem.hu', 36301234567,'','', '', 0,'Törökbálint', 2045, 'Depo 062/32', 'support@kruppsystem.hu', 36301234567, 4, 1);
";

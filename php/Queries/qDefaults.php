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
        ('admin', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'Admin', '', 'admin@kruppsystem.hu', '0036301234567', 'Törökbálint', 0)
        ,('test1', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test1', '', 'test1@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test2', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test2', '', 'test2@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test3', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test3', '', 'test3@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test4', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test4', '', 'test4@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test5', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test5', '', 'test5@test.hu', '0036301234567', 'Törökbálint', 1);";

$GLOBALS['Database']['Table']['Insert'][1] = "
    INSERT INTO `Group`(
        groupName,
        groupDesc,
        canAdministrative,
        mngGroups,
        mngHuntgroups,
        mngUsers,
        mngTools,
        canUsers,
        canCompany,
        canKnowledge,
        canAccess,
        canHardware,
        canEdit,
        canLogin,
        isDelete
    ) VALUES
        ('Adminisztrátor',	'Adminisztratív jogosultság',                       1, 1, 1, 1, 1, 1, 7, 7, 7, 7, 1, 1, 0),
        ('Alapértelmezett', 'Alapértelmezett jogosultság',                      0, 0, 0, 0, 0, 1, 3, 3, 3, 3, 1, 1, 0),
        ('Korlátozott',     'Korlátozott hozzáféréssel rendelkezö jogosultság', 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 1, 1, 0),
        ('Törölt',          'Törölt felhasználók jogosultsága',                 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);";

$GLOBALS['Database']['Table']['Insert'][2] = "
    INSERT INTO `Group_Member`(
        userId,
        groupId,
        isDelete
    ) VALUES
        (1, 1, 0)
        ,(2, 2, 1)
        ,(3, 2, 1)
        ,(4, 2, 1)
        ,(5, 2, 1)
        ,(6, 2, 1);";
$GLOBALS['Database']['Table']['Insert'][5] = "
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
        (1, 1, 'Default', '-', '-', '-', '-', '0', '-', 0);
    ";
$GLOBALS['Database']['Table']['Insert'][6] = "
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
$GLOBALS['Database']['Table']['Insert'][7] = "
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
    (1, 1, 1, 'Default', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 0);
";
$GLOBALS['Database']['Table']['Insert'][20] = "
    INSERT INTO `Hardware`(
        hardwareName
        ,hardwareDesc
        ,hardwareSerial
        ,hardwareMAC
        ,hardwareIP
        ,hardwareSwitch
        ,hardwareSwitchPort
        ,hardwareVLANName
        ,hardwareVLANNum
        ,hardwareDateIn
        ,hardwareDateOut
        ,hardwareType
        ,userId
        ,companySiteId
        ,isDelete
    ) VALUES
     ('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.1','R1', '01', 'Teszt001', '001','-','-','Computer',1,1,0)
    ,('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.2','R1', '02', 'Teszt001', '001','-','-','Server',1,1,0)
    ,('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.3','R1', '03', 'Teszt001', '001','-','-','Laptop',1,1,0)
    ,('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.4','R1', '04', 'Teszt001', '001','-','-','Printer',1,1,0)
    ,('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.5','R1', '05', 'Teszt001', '001','-','-','Router',1,1,0)
    ,('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.6','R1', '06', 'Teszt001', '001','-','-','Switch',1,1,0)
    ,('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.7','R1', '07', 'Teszt001', '001','-','-','Access_Point',1,1,0)
    ,('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.8','R1', '08', 'Teszt001', '001','-','-','Camera',1,1,0)
    ,('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.9','R1', '09', 'Teszt001', '001','-','-','DVR_CCTV',1,1,0)
    ,('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.10','R1','10', 'Teszt001', '001','-','-','Alarm',1,1,0)
";

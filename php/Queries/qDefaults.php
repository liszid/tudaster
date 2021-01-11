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
        ('admin', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'Admin', '', 'admin@kruppsystem.hu', '0036301234567', 'Törökbálint', 0);";

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
        (1, 1, 0);";
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
        (1, 1, 'Default', '-', '-', '-', '-', '0', '-', 0);
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
    (1, 1, 1, 'Default', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 0);
";
$GLOBALS['Database']['Table']['Insert'][6] = "
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
        ,hardwareGroupTags
        ,userId
        ,companySiteId
        ,isDelete
    ) VALUES
    ('Szamitogep', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.1','R1', '01', 'Teszt001', '001','-','-','Computer','',1,1,0)
    ,('Szerver', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.2','R1', '02', 'Teszt001', '001','-','-','Server','',1,1,0)
    ,('Laptop', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.3','R1', '03', 'Teszt001', '001','-','-','Laptop','',1,1,0)
    ,('Vagyonvedelmi', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.4','R1', '04', 'Teszt001', '001','-','-','Security','',1,1,0)
    ,('Halozati', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.5','R1', '05', 'Teszt001', '001','-','-','Networking','',1,1,0)
    ,('Nyomtato', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.6','R1', '06', 'Teszt001', '001','-','-','Printer','',1,1,0);
";
$GLOBALS['Database']['Table']['Insert'][7] = "
    INSERT INTO `Hardware_Laptop`(
        hardwareId
        ,hardwareLaptopId
        ,hardwareLaptopUser
        ,hardwareLaptopType
        ,hardwareLaptopOS
        ,hardwareLaptopOSVer
        ,hardwareLaptopHDD
        ,hardwareLaptopMEM
        ,hardwareLaptopPROC
        ,hardwareLaptopOperator
    ) VALUES
    ();
";
$GLOBALS['Database']['Table']['Insert'][8] = "
    INSERT INTO `Hardware_Computer`(
        hardwareId
        ,hardwareComputerId
        ,hardwareComputerUser
        ,hardwareComputerType
        ,hardwareComputerUse
        ,hardwareComputerOS
        ,hardwareComputerOSVer
        ,hardwareComputerHDD
        ,hardwareComputerMEM
        ,hardwareComputerPROC
        ,hardwareComputerNetworkPorts
        ,hardwareComputerOperator
    ) VALUES
    ();
";
$GLOBALS['Database']['Table']['Insert'][9] = "
    INSERT INTO `Hardware_Printer`(
        hardwareId
        ,hardwarePrinterId
        ,hardwarePrinterUse
        ,hardwarePrinterType
        ,hardwarePrinterToner
        ,hardwarePrinterOperator
    ) VALUES
    ();
";
$GLOBALS['Database']['Table']['Insert'][10] = "
    INSERT INTO `Hardware_Networking`(
        hardwareId
        ,hardwareNetworkingId
        ,hardwareNetworkingType
        ,hardwareNetworkingUse
        ,hardwareNetworkingOS
        ,hardwareNetworkingOSVer
        ,hardwareNetworkingNetworkPorts
        ,hardwareNetworkingOperator
    ) VALUES
    ();
";
$GLOBALS['Database']['Table']['Insert'][11] = "
    INSERT INTO `Hardware_Server`(
        hardwareId
        ,hardwareServerId
        ,hardwareServerUser
        ,hardwareServerType
        ,hardwareServerUse
        ,hardwareServerOS
        ,hardwareServerOSVer
        ,hardwareServerHDD
        ,hardwareServerMEM
        ,hardwareServerPROC
        ,hardwareServerNetworkPorts
        ,hardwareServerOperator
    ) VALUES
    ();
";
$GLOBALS['Database']['Table']['Insert'][12] = "
    INSERT INTO `Hardware_Security`(
        hardwareId
        ,hardwareSecurityId
        ,hardwareSecurityType
        ,hardwareSecurityUse
        ,hardwareSecurityOS
        ,hardwareSecurityOSVer
        ,hardwareSecurityNetworkPorts
        ,hardwareSecurityOperator
    ) VALUES
    ();
";

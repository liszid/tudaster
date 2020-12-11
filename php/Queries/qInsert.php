<?php

declare(strict_types=1);

$GLOBALS['Database'][0]['Insert'] = "
    INSERT INTO `User`(
        userName,
        pWord,
        userContEmail
    ) VALUES (
        :userName,
        :pWord,
        :userContEmail
    );
";

$GLOBALS['Database'][1]['Insert'] = "
    INSERT INTO `Group`(
        groupName
        ,groupDesc
    ) VALUES (
        :groupName
        ,:groupDesc
    );
";

$GLOBALS['Database'][2]['Insert'] = "
    INSERT INTO `Group_Member`(
        userId,
        groupId
    ) VALUES (
        :userId,
        :groupId
    );
";

$GLOBALS['Database'][3]['Insert'] = "
    INSERT INTO `Company`(
        userId,
        companyName,
        companyDesc
    ) VALUES (
        :userId,
        :companyName,
        :companyDesc
    );
";

$GLOBALS['Database'][4]['Insert'] = "
    INSERT INTO `Company_Site_Type`(
        companySiteTypeId,
        companySiteTypeName
    ) VALUES (
        :companySiteTypeId,
        :companySiteTypeName
    );
";

$GLOBALS['Database'][5]['Insert'] = "
    INSERT INTO `Company_Site`(
        userId,
        companyId,
        companySiteName,
        companySiteDesc,
        companySiteTypeId
    ) VALUES (
        :userId,
        :companyId,
        :companySiteName,
        :companySiteDesc,
        :companySiteTypeId
    );
";

$GLOBALS['Database'][6]['Insert'] = "
    INSERT INTO `Hardware`(
        hardwareName
        ,hardwareDesc
        ,hardwareSerial
        ,hardwareMAC
        ,hardwareIP
        ,userId
        ,companySiteId
    ) VALUES (
        :hardwareName
        ,:hardwareDesc
        ,:hardwareSerial
        ,:hardwareMAC
        ,:hardwareIP
        ,:userId
        ,:companySiteId
    );
";

$GLOBALS['Database'][7]['Insert'] = "
    INSERT INTO `Hardware_Laptop`(
        hardwareId
        ,hardwareLaptopUser
        ,hardwareLaptopType
        ,hardwareLaptopOS
        ,hardwareLaptopOSVer
        ,hardwareLaptopHDD
        ,hardwareLaptopMEM
        ,hardwareLaptopPROC
        ,hardwareLaptopOperator
    ) VALUES (
        :hardwareId
        ,:hardwareLaptopUser
        ,:hardwareLaptopType
        ,:hardwareLaptopOS
        ,:hardwareLaptopOSVer
        ,:hardwareLaptopHDD
        ,:hardwareLaptopMEM
        ,:hardwareLaptopPROC
        ,:hardwareLaptopOperator
    );
";

$GLOBALS['Database'][8]['Insert'] = "
    INSERT INTO `Hardware_PC`(
        hardwareId
        ,hardwarePCUser
        ,hardwarePCType
        ,hardwarePCUse
        ,hardwarePCOS
        ,hardwarePCOSVer
        ,hardwarePCHDD
        ,hardwarePCMEM
        ,hardwarePCPROC
        ,hardwarePCNetworkPorts
        ,hardwarePCOperator
    ) VALUES (
        :hardwareId
        ,:hardwarePCUser
        ,:hardwarePCType
        ,:hardwarePCUse
        ,:hardwarePCOS
        ,:hardwarePCOSVer
        ,:hardwarePCHDD
        ,:hardwarePCMEM
        ,:hardwarePCPROC
        ,:hardwarePCNetworkPorts
        ,:hardwarePCOperator
    );
";

$GLOBALS['Database'][9]['Insert'] = "
    INSERT INTO `Hardware_Printer`(
        hardwareId
        ,hardwarePrinterUse
        ,hardwarePrinterType
        ,hardwarePrinterToner
        ,hardwarePrinterOperator
    ) VALUES (
        :hardwareId
        ,:hardwarePrinterUse
        ,:hardwarePrinterType
        ,:hardwarePrinterToner
        ,:hardwarePrinterOperator
    );
";

$GLOBALS['Database'][10]['Insert'] = "
    INSERT INTO `Hardware_Networking`(
        hardwareId
        ,hardwareNetworkingType
        ,hardwareNetworkingUse
        ,hardwareNetworkingOS
        ,hardwareNetworkingOSVer
        ,hardwareNetworkingNetworkPorts
        ,hardwareNetworkingOperator
    ) VALUES (
        :hardwareId
        ,:hardwareNetworkingType
        ,:hardwareNetworkingUse
        ,:hardwareNetworkingOS
        ,:hardwareNetworkingOSVer
        ,:hardwareNetworkingNetworkPorts
        ,:hardwareNetworkingOperator
    );
";

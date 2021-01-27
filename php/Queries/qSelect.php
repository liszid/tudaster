<?php

declare(strict_types=1);

$GLOBALS['Database']['Select'] = array(
    'Database' => "
        SELECT
            SCHEMA_NAME
        FROM
            INFORMATION_SCHEMA.SCHEMATA
        WHERE
            SCHEMA_NAME = 'ksys_tudaster'",
    'Table' => "
        SELECT
            TABLE_NAME
        FROM
            INFORMATION_SCHEMA.TABLES
        WHERE
            TABLE_SCHEMA=:sqlDB
            AND TABLE_NAME=:tableName"
);

$GLOBALS['Database'][99]['Select'] = array(
    'User_Full' => "
        SELECT
            `User`.userId
            ,`User`.userId
            ,`User`.userName
            ,`User`.userFirstName
            ,`User`.userLastName
            ,`User`.userContEmail
            ,`User`.userContPhone
            ,`User`.userContSite
            ,`User`.userThumbnail
            ,`User`.isDelete
            ,`Group`.*
        FROM `User`
        INNER JOIN `Group_Member` USING (userId)
        INNER JOIN `Group` USING (groupId)
        WHERE `User`.userId=:userId"
    ,'Member_Full' => "
        SELECT
            `User`.userId
            ,`Group_Member`.groupMemberId
            ,`Group`.groupName
            ,`Group`.groupDesc
            ,`User`.userName
            ,`User`.isDelete
        FROM `User`
        INNER JOIN `Group_Member` USING (userId)
        INNER JOIN `Group` USING (groupId)"
    ,'Huntgroup_Members' => "
        SELECT
            `Huntgroup_Member`.huntgroupMemberId
            ,`Huntgroup`.huntgroupName
            ,`Huntgroup`.huntgroupDesc
            ,`User`.userName
            ,`User`.userId
            ,`Huntgroup_Member`.isDelete
        FROM `User`
        INNER JOIN `Huntgroup_Member` USING (userId)
        INNER JOIN `Huntgroup` USING (huntgroupId)
        WHERE `Huntgroup`.huntgroupId=:huntgroupId"
    ,'Company_Site_Table' => "
        SELECT
            `Company`.companyName
            ,`Company_Site_Type`.companySiteTypeName
            ,`Company_Site`.*
        FROM `Company_Site`
        INNER JOIN `Company_Site_Type` USING (companySiteTypeId)
        INNER JOIN `Company` USING (companyId)"
    ,'Company_Site_View' => "
        SELECT
            `Company_Site`.*
            ,`Company`.*
            ,`Company_Site_Type`.companySiteTypeName
            ,`User`.userName
        FROM `Company_Site`
        INNER JOIN `User` USING (userId)
        INNER JOIN `Company_Site_Type` USING (companySiteTypeId)
        INNER JOIN `Company` USING (companyId)
        WHERE companySiteId=:companySiteId"
    ,'Company_Site_Filter' => "
        SELECT
            `Company_Site`.*
            ,`Company_Site_Type`.companySiteTypeName
            ,`Company`.companyId
            ,`Company`.companyName
            ,`Company`.companyDesc
            ,`Company`.companyOwnerFirstName
            ,`Company`.companyOwnerLastName
            ,`Company`.companyAddressCity
            ,`Company`.companyAddressPostcode
            ,`Company`.companyAddressStreet
            ,`User`.userName
        FROM `Company_Site`
        INNER JOIN `User` USING (userId)
        INNER JOIN `Company_Site_Type` USING (companySiteTypeId)
        INNER JOIN `Company` USING (companyId)
        WHERE `Company_Site`.companyId=:companyId"
    ,'Company_Site_Select' => "
        SELECT
            `Company_Site`.companySiteId
            ,`Company_Site`.companySiteName
            ,`Company`.companyName
        FROM `Company_Site`
        INNER JOIN `Company` USING (companyId)"
    ,'Hardware_Members' => "
        SELECT
            `Hardware_Member`.hardwareMemberId
            ,`Huntgroup`.huntgroupId
            ,`Huntgroup`.huntgroupName
            ,`Huntgroup`.huntgroupDesc
            ,`Hardware`.hardwareName
            ,`Hardware`.hardwareId
            ,`Hardware_Member`.isDelete
        FROM `Hardware`
        INNER JOIN `Hardware_Member`USING (hardwareId)
        INNER JOIN `Huntgroup` USING (huntgroupId)
        WHERE `Hardware`.hardwareId=:hardwareId"
    ,'Hardware_Members_By_Type' => "
        SELECT
            `Hardware`.*
            ,`Company_Site`.companySiteName
        FROM `Hardware`
        INNER JOIN `Company_Site` USING (companySiteId)
        LEFT JOIN `Hardware_Member` USING (hardwareId)
        LEFT JOIN `Huntgroup` USING (huntgroupId)
        LEFT JOIN `Huntgroup_Member` USING (huntgroupId)
        WHERE
            `Huntgroup_Member`.userId=:userId
            OR `Hardware`.userId=:userId
        GROUP BY `Hardware`.hardwareId"
    ,'Hardware_Laptop_Table' => "
        SELECT
            `Hardware_Laptop`.hardwareLaptopId
            ,`Hardware`.hardwareName
            ,`Hardware`.hardwareDesc
            ,`Hardware`.hardwareIP
            ,`Hardware`.hardwareSwitch
            ,`Hardware`.hardwareSwitchPort
            ,`Hardware`.isDelete
            ,`Hardware_Laptop`.hardwareLaptopOS
            ,`Hardware_Laptop`.hardwareLaptopType
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM `Hardware`
        INNER JOIN `Hardware_Laptop` USING (hardwareId)
        INNER JOIN `User` USING (userId)
        INNER JOIN `Company_Site` USING (companySiteId)
        LEFT JOIN `Hardware_Member` USING (hardwareId)
        LEFT JOIN `Huntgroup` USING (huntgroupId)
        LEFT JOIN `Huntgroup_Member` USING (huntgroupId)
        WHERE
            `Huntgroup_Member`.userId=:userId
            OR `Hardware`.userId=:userId
        GROUP BY `Hardware_Laptop`.hardwareLaptopId"
    ,'Hardware_Laptop_View' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Laptop`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM `Hardware`
        INNER JOIN `Hardware_Laptop` USING (hardwareId)
        INNER JOIN `User` USING (userId)
        INNER JOIN `Company_Site` USING (companySiteId)
        WHERE `Hardware_Laptop`.hardwareLaptopId =:hardwareLaptopId"
    ,'Hardware_Computer_Table' => "
        SELECT
            `Hardware_Computer`.hardwareComputerId
            ,`Hardware`.hardwareName
            ,`Hardware`.hardwareDesc
            ,`Hardware`.hardwareIP
            ,`Hardware`.hardwareSwitch
            ,`Hardware`.hardwareSwitchPort
            ,`Hardware`.isDelete
            ,`Hardware_Computer`.hardwareComputerUse
            ,`Hardware_Computer`.hardwareComputerType
            ,`Hardware_Computer`.hardwareComputerOS
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM `Hardware`
        INNER JOIN `Hardware_Computer` USING (hardwareId)
        INNER JOIN `User` USING (userId)
        INNER JOIN `Company_Site` USING (companySiteId)
        LEFT JOIN `Hardware_Member` USING (hardwareId)
        LEFT JOIN `Huntgroup` USING (huntgroupId)
        LEFT JOIN `Huntgroup_Member` USING (huntgroupId)
        WHERE
            `Huntgroup_Member`.userId=:userId
            OR `Hardware`.userId=:userId
        GROUP BY `Hardware_Computer`.hardwareComputerId"
    ,'Hardware_Computer_View' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Computer`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM `Hardware`
        INNER JOIN `Hardware_Computer` USING (hardwareId)
        INNER JOIN `User` USING (userId)
        INNER JOIN `Company_Site` USING (companySiteId)
        WHERE `Hardware_Computer`.hardwareComputerId =:hardwareComputerId"
    ,'Hardware_Printer_Table' => "
        SELECT
            `Hardware_Printer`.hardwarePrinterId
            ,`Hardware`.hardwareName
            ,`Hardware`.hardwareDesc
            ,`Hardware`.hardwareIP
            ,`Hardware`.hardwareSwitch
            ,`Hardware`.hardwareSwitchPort
            ,`Hardware`.isDelete
            ,`Hardware_Printer`.hardwarePrinterUse
            ,`Hardware_Printer`.hardwarePrinterType
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM `Hardware`
        INNER JOIN `Hardware_Printer` USING (hardwareId)
        INNER JOIN `User` USING (userId)
        INNER JOIN `Company_Site` USING (companySiteId)
        LEFT JOIN `Hardware_Member` USING (hardwareId)
        LEFT JOIN `Huntgroup` USING (huntgroupId)
        LEFT JOIN `Huntgroup_Member` USING (huntgroupId)
        WHERE
            `Huntgroup_Member`.userId=:userId
            OR `Hardware`.userId=:userId
        GROUP BY `Hardware_Printer`.hardwarePrinterId"
    ,'Hardware_Printer_View' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Printer`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM `Hardware`
        INNER JOIN `Hardware_Printer` USING (hardwareId)
        INNER JOIN `User` USING (userId)
        INNER JOIN `Company_Site` USING (companySiteId)
        WHERE `Hardware_Printer`.hardwarePrinterId =:hardwarePrinterId"
    ,'Hardware_Networking_Table' => "
        SELECT
            `Hardware_Networking`.hardwareNetworkingId
            ,`Hardware`.hardwareName
            ,`Hardware`.hardwareDesc
            ,`Hardware`.hardwareIP
            ,`Hardware`.hardwareSwitch
            ,`Hardware`.hardwareSwitchPort
            ,`Hardware`.isDelete
            ,`Hardware_Networking`.hardwareNetworkingUse
            ,`Hardware_Networking`.hardwareNetworkingType
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM `Hardware`
        INNER JOIN `Hardware_Networking` USING (hardwareId)
        INNER JOIN `User` USING (userId)
        INNER JOIN `Company_Site` USING (companySiteId)
        LEFT JOIN `Hardware_Member` USING (hardwareId)
        LEFT JOIN `Huntgroup` USING (huntgroupId)
        LEFT JOIN `Huntgroup_Member` USING (huntgroupId)
        WHERE
            `Huntgroup_Member`.userId=:userId
            OR `Hardware`.userId=:userId
        GROUP BY `Hardware_Networking`.hardwareNetworkingId"
    ,'Hardware_Networking_View' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Networking`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM `Hardware`
        INNER JOIN `Hardware_Networking` USING (hardwareId)
        INNER JOIN `User` USING (userId)
        INNER JOIN `Company_Site` USING (companySiteId)
        WHERE `Hardware_Networking`.hardwareNetworkingId =:hardwareNetworkingId"
    ,'Hardware_Server_Table' => "
        SELECT
            `Hardware_Server`.hardwareServerId
            ,`Hardware`.hardwareName
            ,`Hardware`.hardwareDesc
            ,`Hardware`.hardwareIP
            ,`Hardware`.hardwareSwitch
            ,`Hardware`.hardwareSwitchPort
            ,`Hardware`.isDelete
            ,`Hardware_Server`.hardwareServerUse
            ,`Hardware_Server`.hardwareServerType
            ,`Hardware_Server`.hardwareServerOS
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM `Hardware`
        INNER JOIN `Hardware_Server` USING (hardwareId)
        INNER JOIN `User` USING (userId)
        INNER JOIN `Company_Site` USING (companySiteId)
        LEFT JOIN `Hardware_Member` USING (hardwareId)
        LEFT JOIN `Huntgroup` USING (huntgroupId)
        LEFT JOIN `Huntgroup_Member` USING (huntgroupId)
        WHERE
            `Huntgroup_Member`.userId=:userId
            OR `Hardware`.userId=:userId
        GROUP BY `Hardware_Server`.hardwareServerId"
    ,'Hardware_Server_View' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Server`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM `Hardware`
        INNER JOIN `Hardware_Server` USING (hardwareId)
        INNER JOIN `User` USING (userId)
        INNER JOIN `Company_Site` USING (companySiteId)
        WHERE `Hardware_Server`.hardwareServerId =:hardwareServerId"
    ,'Hardware_Security_Table' => "
        SELECT
            `Hardware_Security`.hardwareSecurityId
            ,`Hardware`.hardwareName
            ,`Hardware`.hardwareDesc
            ,`Hardware`.hardwareIP
            ,`Hardware`.hardwareSwitch
            ,`Hardware`.hardwareSwitchPort
            ,`Hardware`.isDelete
            ,`Hardware_Security`.hardwareSecurityUse
            ,`Hardware_Security`.hardwareSecurityType
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM `Hardware`
        INNER JOIN `Hardware_Security` USING (hardwareId)
        INNER JOIN `User` USING (userId)
        INNER JOIN `Company_Site` USING (companySiteId)
        LEFT JOIN `Hardware_Member` USING (hardwareId)
        LEFT JOIN `Huntgroup` USING (huntgroupId)
        LEFT JOIN `Huntgroup_Member` USING (huntgroupId)
        WHERE
            `Huntgroup_Member`.userId=:userId
            OR `Hardware`.userId=:userId
        GROUP BY `Hardware_Security`.hardwareSecurityId"
    ,'Hardware_Security_View' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Security`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM `Hardware`
        INNER JOIN `Hardware_Security` USING (hardwareId)
        INNER JOIN `User` USING (userId)
        INNER JOIN `Company_Site` USING (companySiteId)
        WHERE `Hardware_Security`.hardwareSecurityId =:hardwareSecurityId"
    ,'Access_Table' => "
        SELECT
            `Access`.accessId
            ,`Hardware`.hardwareId
            ,`Hardware`.hardwareName
            ,`Hardware`.hardwareDesc
            ,`Hardware`.hardwareIP
            ,`Hardware`.hardwareSwitch
            ,`Hardware`.hardwareSwitchPort
            ,`Hardware`.hardwareType
            ,`Company`.companyName
            ,`Company_Site`.companySiteName
            ,`User`.userName
            ,`Access`.isDelete
        FROM `Access`
        INNER JOIN `Hardware` USING (hardwareId)
        INNER JOIN `User` ON `User`.userId = `Access`.userId
        INNER JOIN `Company_Site` USING (companySiteId)
        INNER JOIN `Company` USING (companyId)
        LEFT JOIN `Access_Member` USING (accessId)
        LEFT JOIN `Huntgroup` USING (huntgroupId)
        LEFT JOIN `Huntgroup_Member` USING (huntgroupId)
        WHERE
            `Huntgroup_Member`.userId=:userId
            OR `Access`.userId=:userId
        GROUP BY `Access`.accessId"
    ,'Access_Members' => "
        SELECT
            `Access_Member`.accessMemberId
            ,`Access_Member`.accessId
            ,`Huntgroup`.huntgroupId
            ,`Huntgroup`.huntgroupName
            ,`Huntgroup`.huntgroupDesc
            ,`Access_Member`.isDelete
        FROM `Access_Member`
        INNER JOIN `Huntgroup` USING (huntgroupId)
        WHERE `Access_Member`.accessId=:accessId"
);

$GLOBALS['Database'][0]['Select'] = array(
    'All' => "
        SELECT
            `User`.userId
            ,`User`.userName
            ,`User`.userFirstName
            ,`User`.userLastName
            ,`User`.userContEmail
            ,`User`.userContPhone
            ,`User`.userContSite
            ,`User`.userThumbnail
            ,`User`.isDelete
        FROM `User`"
    ,'byUserName' => "
        SELECT
            `User`.userId
            ,`User`.userId
            ,`User`.userName
            ,`User`.userFirstName
            ,`User`.userLastName
            ,`User`.userContEmail
            ,`User`.userContPhone
            ,`User`.userContSite
            ,`User`.userThumbnail
            ,`User`.isDelete
        FROM `User`
        WHERE userName=:userName"
    ,'byUserId' => "
        SELECT
            `User`.userId
            ,`User`.userId
            ,`User`.userName
            ,`User`.userFirstName
            ,`User`.userLastName
            ,`User`.userContEmail
            ,`User`.userContPhone
            ,`User`.userContSite
            ,`User`.userThumbnail
            ,`User`.isDelete
        FROM `User`
        WHERE userId=:userId"
    ,'byContEmail' => "
        SELECT
            `User`.userId
            ,`User`.userId
            ,`User`.userName
            ,`User`.userFirstName
            ,`User`.userLastName
            ,`User`.userContEmail
            ,`User`.userContPhone
            ,`User`.userContSite
            ,`User`.userThumbnail
            ,`User`.isDelete
        FROM `User`
        WHERE userContEmail=:userContEmail"
    ,'Login' => "
        SELECT
            userId
        FROM `User`
        WHERE
            userName=:userName
            AND pWord=:pWord"
);

$GLOBALS['Database'][1]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Group`"
    ,'byGroupId' => "
        SELECT
            *
        FROM `Group`
        WHERE groupId=:groupId"
    ,'forMemberEdit' => "
        SELECT
            groupId
            ,groupName
            ,groupDesc
        FROM `Group`"
);

$GLOBALS['Database'][2]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Group_Member`"
    ,'byUserId' => "
        SELECT
            *
        FROM `Group_Member`
        WHERE userId=:userId"
    ,'byGroupId' => "
        SELECT
            *
        FROM `Group_Member`
        WHERE groupId=:groupId"
    ,'byGroupMemberId' => "
        SELECT
            *
        FROM `Group_Member`
        WHERE groupMemberId=:groupMemberId"
);

$GLOBALS['Database'][3]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Huntgroup`"
    ,'byHuntgroupId' => "
        SELECT
            *
        FROM `Huntgroup`
        WHERE huntgroupId=:huntgroupId"
    ,'forMemberEdit' => "
        SELECT
            huntgroupId
            ,huntgroupName
            ,huntgroupDesc
        FROM `Huntgroup`"
);

$GLOBALS['Database'][4]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Huntgroup_Member`"
    ,'byUserId' => "
        SELECT
            *
        FROM `Huntgroup_Member`
        WHERE userId=:userId"
    ,'byHuntgroupId' => "
        SELECT
            *
        FROM `Huntgroup_Member`
        WHERE huntgroupId=:huntgroupId"
    ,'byHuntgroupMemberId' => "
        SELECT
            *
        FROM `Huntgroup_Member`
        WHERE huntgroupMemberId=:huntgroupMemberId"
);

$GLOBALS['Database'][5]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Company`"
    ,'byCompanyId' => "
        SELECT
            *
        FROM `Company`
        WHERE companyId=:companyId"
    ,'forCompanySelect' => "
        SELECT
            companyId
            ,companyName
        FROM `Company`"
    ,'byUserId' => "
        SELECT
            userId
        FROM `Company`
        WHERE userId=:userId"
);

$GLOBALS['Database'][6]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Company_Site_Type`"
);

$GLOBALS['Database'][7]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Company_Site`"
    ,'byCompanyId' => "
        SELECT
            *
        FROM `Company_Site`
        WHERE companyId=:companyId"
    ,'byCompanySiteId' => "
        SELECT
            *
        FROM `Company_Site`
        WHERE companySiteId=:companySiteId"
    ,'byUserId' => "
        SELECT
            userId
        FROM `Company_Site`
        WHERE userId=:userId"
);


$GLOBALS['Database'][10]['Select'] = array(
    'All' => "
        SELECT
            `Hardware`.*
            ,`Company_Site`.companySiteName
        FROM `Company_Site`
        INNER JOIN `Hardware` USING (companySiteId)"
    ,'byHardwareId' => "
        SELECT
            *
        FROM `Hardware`
        WHERE hardwareId=:hardwareId"
    ,'byUserId_Last' => "
        SELECT
            hardwareId
        FROM `Hardware`
        WHERE userId=:userId
        ORDER BY hardwareId DESC LIMIT 1"
    ,'byUserId' => "
        SELECT
            userId
        FROM `Hardware`
        WHERE userId=:userId"
);

$GLOBALS['Database'][11]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Hardware_Laptop`"
    ,'byHardwareLaptopId' => "
        SELECT
            hardwareId
        FROM `Hardware_Laptop`
        WHERE hardwareLaptopId=:hardwareLaptopId"
    ,'byHardwareId' => "
        SELECT
            *
        FROM `Hardware_Laptop`
        WHERE hardwareId=:hardwareId"
);

$GLOBALS['Database'][12]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Hardware_Computer`"
    ,'byHardwareComputerId' => "
        SELECT
            hardwareId
        FROM `Hardware_Computer`
        WHERE hardwareComputerId=:hardwareComputerId"
    ,'byHardwareId' => "
        SELECT
            *
        FROM `Hardware_Computer`
        WHERE hardwareId=:hardwareId"
);

$GLOBALS['Database'][13]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Hardware_Printer`"
    ,'byHardwarePrinterId' => "
        SELECT
            hardwareId
        FROM `Hardware_Printer`
        WHERE hardwarePrinterId=:hardwarePrinterId"
    ,'byHardwareId' => "
        SELECT
            *
        FROM `Hardware_Printer`
        WHERE hardwareId=:hardwareId"
);

$GLOBALS['Database'][14]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Hardware_Networking`"
    ,'byHardwareNetworkingId' => "
        SELECT
            hardwareId
        FROM `Hardware_Networking`
        WHERE hardwareNetworkingId=:hardwareNetworkingId"
    ,'byHardwareId' => "
        SELECT
            *
        FROM `Hardware_Networking`
        WHERE hardwareId=:hardwareId"
);

$GLOBALS['Database'][15]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Hardware_Server`"
    ,'byHardwareServerId' => "
        SELECT
            hardwareId
        FROM `Hardware_Server`
        WHERE hardwareServerId=:hardwareServerId"
    ,'byHardwareId' => "
        SELECT
            *
        FROM `Hardware_Server`
        WHERE hardwareId=:hardwareId"
);

$GLOBALS['Database'][16]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Hardware_Security`"
    ,'byHardwareSecurityId' => "
        SELECT
            hardwareId
        FROM `Hardware_Security`
        WHERE hardwareSecurityId=:hardwareSecurityId"
    ,'byHardwareId' => "
        SELECT
            *
        FROM `Hardware_Security`
        WHERE hardwareId=:hardwareId"
);

$GLOBALS['Database'][29]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Hardware_Member`"
    ,'byHardwareId' => "
        SELECT
            *
        FROM `Hardware_Member`
        WHERE hardwareId=:hardwareId"
    ,'byHuntgroupId' => "
        SELECT
            *
        FROM `Hardware_Member`
        WHERE huntgroupId=:huntgroupId"
    ,'byHardwareMemberId' => "
        SELECT
            *
        FROM `Hardware_Member`
        WHERE hardwareMemberId=:hardwareMemberId"
);

$GLOBALS['Database'][30]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Access`"
    ,'byAccessId' => "
        SELECT
            *
        FROM `Access`
        WHERE accessId=:accessId"
    ,'byUserId' => "
        SELECT
            userId
        FROM `Access`
        WHERE userId=:userId"
);

$GLOBALS['Database'][31]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM `Access_Member`"
    ,'byAccessId' => "
        SELECT
            *
        FROM `Access_Member`
        WHERE accessId=:accessId"
    ,'byHuntgroupId' => "
        SELECT
            *
        FROM `Access_Member`
        WHERE huntgroupId=:huntgroupId"
    ,'byAccessMemberId' => "
        SELECT
            *
        FROM `Access_Member`
        WHERE accessMemberId=:accessMemberId"
);

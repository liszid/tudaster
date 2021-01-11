<?php

declare(strict_types=1);

$GLOBALS['Database']['Select'] = array(
    'Database' => "
        SELECT
            SCHEMA_NAME
        FROM
            INFORMATION_SCHEMA.SCHEMATA
        WHERE
            SCHEMA_NAME = 'ksys_tudaster'
    ",
    'Table' => "
        SELECT
            TABLE_NAME
        FROM
            INFORMATION_SCHEMA.TABLES
        WHERE
            TABLE_SCHEMA=:sqlDB
            AND TABLE_NAME=:tableName
    "
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
        FROM
        (
            (
                `User`
                    INNER JOIN `Group_Member`
                    ON `User`.userId = `Group_Member`.userId
            )
            INNER JOIN
                `Group`
            ON
                `Group`.groupId = `Group_Member`.groupId
        )
        WHERE
            `User`.userId=:userId
    "
    ,'Member_Full' => "
        SELECT
            `Group_Member`.groupMemberId
            ,`Group`.groupName
            ,`Group`.groupDesc
            ,`User`.userName
            ,`Group_Member`.isDelete
        FROM
        (
            (
                `User`
                    INNER JOIN
                        `Group_Member`
                    ON
                        `User`.userId = `Group_Member`.userId
            )
            INNER JOIN
                `Group`
            ON
                `Group`.groupId = `Group_Member`.groupId
        )
    "
    ,'Company_Site_Table' => "
        SELECT
            `Company_Site`.companySiteId
            ,`Company_Site`.companyId
            ,`Company_Site`.userId
            ,`Company_Site`.companySiteName
            ,`Company_Site`.companySiteTypeId
            ,`Company_Site`.companySiteDesc
            ,`Company_Site`.companySitePhone
            ,`Company_Site`.companySiteEmail
            ,`Company_Site`.companySiteAddressCity
            ,`Company_Site`.companySiteAddressPostcode
            ,`Company_Site`.companySiteAddressStreet
            ,`Company_Site`.companySiteOwnerFirstName
            ,`Company_Site`.companySiteOwnerLastName
            ,`Company_Site`.companySiteOwnerEmail
            ,`Company_Site`.companySiteOwnerPhone
            ,`Company_Site`.companySiteSubOwnerFirstName
            ,`Company_Site`.companySiteSubOwnerLastName
            ,`Company_Site`.companySiteSubOwnerEmail
            ,`Company_Site`.companySiteSubOwnerPhone
            ,`Company`.companyName
            ,`Company_Site_Type`.companySiteTypeName
            ,`Company_Site_Type`.isDelete
        FROM
        (
            (
                `Company_Site`
                INNER JOIN
                    `Company_Site_Type`
                ON
                    `Company_Site`.companySiteTypeId = `Company_Site_Type`.companySiteTypeId
            )
            INNER JOIN
                `Company`
            ON
                `Company`.companyId = `Company_Site`.companyId
        )
    "
    ,'Company_Site_View' => "
        SELECT
            `Company_Site`.companySiteId
            ,`Company_Site`.companyId
            ,`Company_Site`.userId
            ,`Company_Site`.companySiteName
            ,`Company_Site`.companySiteTypeId
            ,`Company_Site`.companySiteDesc
            ,`Company_Site`.companySitePhone
            ,`Company_Site`.companySiteEmail
            ,`Company_Site`.companySiteAddressCity
            ,`Company_Site`.companySiteAddressPostcode
            ,`Company_Site`.companySiteAddressStreet
            ,`Company_Site`.companySiteOwnerFirstName
            ,`Company_Site`.companySiteOwnerLastName
            ,`Company_Site`.companySiteOwnerEmail
            ,`Company_Site`.companySiteOwnerPhone
            ,`Company_Site`.companySiteSubOwnerFirstName
            ,`Company_Site`.companySiteSubOwnerLastName
            ,`Company_Site`.companySiteSubOwnerEmail
            ,`Company_Site`.companySiteSubOwnerPhone
            ,`Company`.companyId
            ,`Company`.companyName
            ,`Company`.companyDesc
            ,`Company`.companyOwnerFirstName
            ,`Company`.companyOwnerLastName
            ,`Company`.companyAddressCity
            ,`Company`.companyAddressPostcode
            ,`Company`.companyAddressStreet
            ,`Company_Site_Type`.companySiteTypeName
            ,`User`.userName
        FROM
        (
            (
                (
                    `Company_Site`
                    INNER JOIN
                        `User`
                    ON
                        `Company_Site`.userId = `User`.userId
                )
                INNER JOIN
                    `Company_Site_Type`
                ON
                    `Company_Site`.companySiteTypeId = `Company_Site_Type`.companySiteTypeId
            )
            INNER JOIN
                `Company`
            ON
                `Company`.companyId = `Company_Site`.companyId
        )
        WHERE
            companySiteId=:companySiteId
    "
    ,'Company_Site_Filter' => "
        SELECT
            `Company_Site`.companySiteId
            ,`Company_Site`.companyId
            ,`Company_Site`.userId
            ,`Company_Site`.companySiteName
            ,`Company_Site`.companySiteTypeId
            ,`Company_Site`.companySiteDesc
            ,`Company_Site`.companySitePhone
            ,`Company_Site`.companySiteEmail
            ,`Company_Site`.companySiteAddressCity
            ,`Company_Site`.companySiteAddressPostcode
            ,`Company_Site`.companySiteAddressStreet
            ,`Company_Site`.companySiteOwnerFirstName
            ,`Company_Site`.companySiteOwnerLastName
            ,`Company_Site`.companySiteOwnerEmail
            ,`Company_Site`.companySiteOwnerPhone
            ,`Company_Site`.companySiteSubOwnerFirstName
            ,`Company_Site`.companySiteSubOwnerLastName
            ,`Company_Site`.companySiteSubOwnerEmail
            ,`Company_Site`.companySiteSubOwnerPhone
            ,`Company_Site`.isDelete
            ,`Company`.companyId
            ,`Company`.companyName
            ,`Company`.companyDesc
            ,`Company`.companyOwnerFirstName
            ,`Company`.companyOwnerLastName
            ,`Company`.companyAddressCity
            ,`Company`.companyAddressPostcode
            ,`Company`.companyAddressStreet
            ,`Company_Site_Type`.companySiteTypeName
            ,`User`.userName
        FROM
        (
            (
                (
                    `Company_Site`
                    INNER JOIN
                        `User`
                    ON
                        `Company_Site`.userId = `User`.userId
                )
                INNER JOIN
                    `Company_Site_Type`
                ON
                    `Company_Site`.companySiteTypeId = `Company_Site_Type`.companySiteTypeId
            )
            INNER JOIN
                `Company`
            ON
                `Company`.companyId = `Company_Site`.companyId
        )
        WHERE
            `Company_Site`.companyId=:companyId
    "
    ,'Company_Site_Select' => "
        SELECT
            `Company_Site`.companySiteId
            ,`Company_Site`.companySiteName
            ,`Company`.companyName
        FROM
            `Company_Site`
        INNER JOIN
            `Company`
        ON
            `Company`.companyId = `Company_Site`.companyId
    "
    ,'Hardware_Laptop_Table' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Laptop`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM
        (
            (
                (
                    `Hardware`
                    INNER JOIN
                        `Hardware_Laptop`
                    ON
                        `Hardware`.hardwareId = `Hardware_Laptop`.hardwareId
                )
                INNER JOIN
                    `User`
                ON
                    `Hardware`.userId = `User`.userId
            )
            INNER JOIN
                `Company_Site`
            ON
                `Hardware`.companySiteId = `Company_Site`.companySiteId
        )
    "
    ,'Hardware_Laptop_View' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Laptop`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM
        (
            (
                (
                    `Hardware`
                    INNER JOIN
                        `Hardware_Laptop`
                    ON
                        `Hardware`.hardwareId = `Hardware_Laptop`.hardwareId
                )
                INNER JOIN
                    `User`
                ON
                    `Hardware`.userId = `User`.userId
            )
            INNER JOIN
                `Company_Site`
            ON
                `Hardware`.companySiteId = `Company_Site`.companySiteId
        )
        WHERE
            `Hardware_Laptop`.hardwareLaptopId =:hardwareLaptopId
    "
    ,'Hardware_Computer_Table' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Computer`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM
        (
            (
                (
                    `Hardware`
                    INNER JOIN
                        `Hardware_Computer`
                    ON
                        `Hardware`.hardwareId = `Hardware_Computer`.hardwareId
                )
                INNER JOIN
                    `User`
                ON
                    `Hardware`.userId = `User`.userId
            )
            INNER JOIN
                `Company_Site`
            ON
                `Hardware`.companySiteId = `Company_Site`.companySiteId
        )
    "
    ,'Hardware_Computer_View' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Computer`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM
        (
            (
                (
                    `Hardware`
                    INNER JOIN
                        `Hardware_Computer`
                    ON
                        `Hardware`.hardwareId = `Hardware_Computer`.hardwareId
                )
                INNER JOIN
                    `User`
                ON
                    `Hardware`.userId = `User`.userId
            )
            INNER JOIN
                `Company_Site`
            ON
                `Hardware`.companySiteId = `Company_Site`.companySiteId
        )
        WHERE
            `Hardware_Computer`.hardwareComputerId =:hardwareComputerId
    "
    ,'Hardware_Printer_Table' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Printer`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM
        (
            (
                (
                    `Hardware`
                    INNER JOIN
                        `Hardware_Printer`
                    ON
                        `Hardware`.hardwareId = `Hardware_Printer`.hardwareId
                )
                INNER JOIN
                    `User`
                ON
                    `Hardware`.userId = `User`.userId
            )
            INNER JOIN
                `Company_Site`
            ON
                `Hardware`.companySiteId = `Company_Site`.companySiteId
        )
    "
    ,'Hardware_Printer_View' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Printer`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM
        (
            (
                (
                    `Hardware`
                    INNER JOIN
                        `Hardware_Printer`
                    ON
                        `Hardware`.hardwareId = `Hardware_Printer`.hardwareId
                )
                INNER JOIN
                    `User`
                ON
                    `Hardware`.userId = `User`.userId
            )
            INNER JOIN
                `Company_Site`
            ON
                `Hardware`.companySiteId = `Company_Site`.companySiteId
        )
        WHERE
            `Hardware_Printer`.hardwarePrinterId =:hardwarePrinterId
    "
    ,'Hardware_Networking_Table' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Networking`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM
        (
            (
                (
                    `Hardware`
                    INNER JOIN
                        `Hardware_Networking`
                    ON
                        `Hardware`.hardwareId = `Hardware_Networking`.hardwareId
                )
                INNER JOIN
                    `User`
                ON
                    `Hardware`.userId = `User`.userId
            )
            INNER JOIN
                `Company_Site`
            ON
                `Hardware`.companySiteId = `Company_Site`.companySiteId
        )
    "
    ,'Hardware_Networking_View' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Networking`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM
        (
            (
                (
                    `Hardware`
                    INNER JOIN
                        `Hardware_Networking`
                    ON
                        `Hardware`.hardwareId = `Hardware_Networking`.hardwareId
                )
                INNER JOIN
                    `User`
                ON
                    `Hardware`.userId = `User`.userId
            )
            INNER JOIN
                `Company_Site`
            ON
                `Hardware`.companySiteId = `Company_Site`.companySiteId
        )
        WHERE
            `Hardware_Networking`.hardwareNetworkingId =:hardwareNetworkingId
    "
    ,'Hardware_Server_Table' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Server`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM
        (
            (
                (
                    `Hardware`
                    INNER JOIN
                        `Hardware_Server`
                    ON
                        `Hardware`.hardwareId = `Hardware_Server`.hardwareId
                )
                INNER JOIN
                    `User`
                ON
                    `Hardware`.userId = `User`.userId
            )
            INNER JOIN
                `Company_Site`
            ON
                `Hardware`.companySiteId = `Company_Site`.companySiteId
        )
    "
    ,'Hardware_Server_View' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Server`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM
        (
            (
                (
                    `Hardware`
                    INNER JOIN
                        `Hardware_Server`
                    ON
                        `Hardware`.hardwareId = `Hardware_Server`.hardwareId
                )
                INNER JOIN
                    `User`
                ON
                    `Hardware`.userId = `User`.userId
            )
            INNER JOIN
                `Company_Site`
            ON
                `Hardware`.companySiteId = `Company_Site`.companySiteId
        )
        WHERE
            `Hardware_Server`.hardwareServerId =:hardwareServerId
    "
    ,'Hardware_Security_Table' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Security`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM
        (
            (
                (
                    `Hardware`
                    INNER JOIN
                        `Hardware_Security`
                    ON
                        `Hardware`.hardwareId = `Hardware_Security`.hardwareId
                )
                INNER JOIN
                    `User`
                ON
                    `Hardware`.userId = `User`.userId
            )
            INNER JOIN
                `Company_Site`
            ON
                `Hardware`.companySiteId = `Company_Site`.companySiteId
        )
    "
    ,'Hardware_Security_View' => "
        SELECT
            `Hardware`.*
            ,`Hardware_Security`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM
        (
            (
                (
                    `Hardware`
                    INNER JOIN
                        `Hardware_Security`
                    ON
                        `Hardware`.hardwareId = `Hardware_Security`.hardwareId
                )
                INNER JOIN
                    `User`
                ON
                    `Hardware`.userId = `User`.userId
            )
            INNER JOIN
                `Company_Site`
            ON
                `Hardware`.companySiteId = `Company_Site`.companySiteId
        )
        WHERE
            `Hardware_Security`.hardwareSecurityId =:hardwareSecurityId
    "
    ,'Access_Table' => "
        SELECT
            `Access`.*
            ,`Hardware`.hardwareName
            ,`Hardware`.hardwareDesc
            ,`Hardware`.hardwareSerial
            ,`Hardware`.hardwareMAC
            ,`Hardware`.hardwareIP
            ,`Hardware`.hardwareSwitch
            ,`Hardware`.hardwareSwitchPort
            ,`Hardware`.hardwareVLANName
            ,`Hardware`.hardwareVLANNum
            ,`Hardware`.hardwareDateIn
            ,`Hardware`.hardwareDateOut
            ,`Hardware`.hardwareType
            ,`Hardware`.hardwareGroupTags
            ,`User`.userName
            ,`Company_Site`.companySiteName
            ,`Company`.companyName
        FROM
        (
            (
                (
                    (
                        `Access`
                        INNER JOIN
                            `Hardware`
                        ON
                            `Access`.hardwareId = `Hardware`.hardwareId
                    )
                    INNER JOIN
                        `User`
                    ON
                        `Hardware`.userId = `User`.userId
                )
                INNER JOIN
                    `Company_Site`
                ON
                    `Hardware`.companySiteId = `Company_Site`.companySiteId
            )
            INNER JOIN
                `Company`
            ON
                `Company`.companyId = `Company_Site`.companyId
        )
    "
);

$GLOBALS['Database'][0]['Select'] = array(
    'All' => "
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
        FROM
            `User`"
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
        FROM
            `User`
        WHERE
            userName=:userName"
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
        FROM
            `User`
        WHERE
            userId=:userId"
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
        FROM
            `User`
        WHERE
            userContEmail=:userContEmail"
    ,'Login' => "
        SELECT
            userId
        FROM
            `User`
        WHERE
            userName=:userName
            AND pWord=:pWord"
);

$GLOBALS['Database'][1]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Group`"
    ,'byGroupId' => "
        SELECT
            *
        FROM
            `Group`
        WHERE
            groupId=:groupId"
    ,'forMemberEdit' => "
        SELECT
            groupId
            ,groupName
            ,groupDesc
        FROM
            `Group`"
);

$GLOBALS['Database'][2]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Group_Member`"
    ,'byUserId' => "
        SELECT
            *
        FROM
            `Group_Member`
        WHERE
            userId=:userId"
    ,'byGroupId' => "
        SELECT
            *
        FROM
            `Group_Member`
        WHERE
            groupId=:groupId"
    ,'byGroupMemberId' => "
        SELECT
            *
        FROM
            `Group_Member`
        WHERE
            groupMemberId=:groupMemberId"
);

$GLOBALS['Database'][3]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Company`"
    ,'byCompanyId' => "
        SELECT
            *
        FROM
            `Company`
        WHERE
            companyId=:companyId"
    ,'forCompanySelect' => "
        SELECT
            companyId
            ,companyName
        FROM
            `Company`
    "
);

$GLOBALS['Database'][4]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Company_Site_Type`"
);

$GLOBALS['Database'][5]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Company_Site`"
    ,'byCompanyId' => "
        SELECT
            *
        FROM
            `Company_Site`
        WHERE
            companyId=:companyId"
    ,'byCompanySiteId' => "
        SELECT
            *
        FROM
            `Company_Site`
        WHERE
            companySiteId=:companySiteId"
);


$GLOBALS['Database'][6]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Hardware`"
    ,'byUserId_Last' => "
        SELECT
            hardwareId
        FROM
            `Hardware`
        WHERE
            userId=:userId
        ORDER BY hardwareId DESC LIMIT 1
    "
);

$GLOBALS['Database'][7]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Hardware_Laptop`"
    ,'byHardwareLaptopId' => "
        SELECT
            hardwareId
        FROM
            `Hardware_Laptop`
        WHERE
            hardwareLaptopId=:hardwareLaptopId
    "
);

$GLOBALS['Database'][8]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Hardware_Computer`"
    ,'byHardwareComputerId' => "
        SELECT
            hardwareId
        FROM
            `Hardware_Computer`
        WHERE
            hardwareComputerId=:hardwareComputerId
    "
);

$GLOBALS['Database'][9]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Hardware_Printer`"
    ,'byHardwarePrinterId' => "
        SELECT
            hardwareId
        FROM
            `Hardware_Printer`
        WHERE
            hardwarePrinterId=:hardwarePrinterId
    "
);

$GLOBALS['Database'][10]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Hardware_Networking`"
    ,'byHardwareNetworkingId' => "
        SELECT
            hardwareId
        FROM
            `Hardware_Networking`
        WHERE
            hardwareNetworkingId=:hardwareNetworkingId
    "
);

$GLOBALS['Database'][11]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Hardware_Server`"
    ,'byHardwareServerId' => "
        SELECT
            hardwareId
        FROM
            `Hardware_Server`
        WHERE
            hardwareServerId=:hardwareServerId
    "
);

$GLOBALS['Database'][12]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Hardware_Security`"
    ,'byHardwareSecurityId' => "
        SELECT
            hardwareId
        FROM
            `Hardware_Security`
        WHERE
            hardwareSecurityId=:hardwareSecurityId
    "
);

$GLOBALS['Database'][13]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Access`"
    ,'byAccessId' => "
        SELECT
            *
        FROM
            `Access`
        WHERE
            accessId=:accessId
    "
);

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
    ",

    'Member_Full' => "
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
    ",
    'Company_Site_Table' => "
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
    ",
    'Company_Site_View' => "
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
    ",

    'Company_Site_Filter' => "
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
    ",
    'Hardware_Laptop_Table' => "
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
    ",
    'Hardware_PC_Table' => "
        SELECT
            `Hardware`.*
            ,`Hardware_PC`.*
            ,`User`.userName
            ,`Company_Site`.companySiteName
        FROM
        (
            (
                (
                    `Hardware`
                    INNER JOIN
                        `Hardware_PC`
                    ON
                        `Hardware`.hardwareId = `Hardware_PC`.hardwareId
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
    ",
    'Hardware_Printer_Table' => "
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
    ",
    'Hardware_Networking_Table' => "
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
    ",
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
            `User`",

    'byUserName' => "
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
            userName=:userName",

    'byUserId' => "
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
            userId=:userId",

    'byContEmail' => "
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
            userContEmail=:userContEmail",

    'Login' => "
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
            `Group`",

    'byGroupId' => "
        SELECT
            *
        FROM
            `Group`
        WHERE
            groupId=:groupId",

    'forMemberEdit' => "
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
            `Group_Member`",

    'byUserId' => "
        SELECT
            *
        FROM
            `Group_Member`
        WHERE
            userId=:userId",

    'byGroupId' => "
        SELECT
            *
        FROM
            `Group_Member`
        WHERE
            groupId=:groupId",
    'byGroupMemberId' => "
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
            `Company`",

    'byCompanyId' => "
        SELECT
            *
        FROM
            `Company`
        WHERE
            companyId=:companyId",

    'forCompanySelect' => "
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
            `Company_Site`",

    'byCompanyId' => "
        SELECT
            *
        FROM
            `Company_Site`
        WHERE
            companyId=:companyId",

    'byCompanySiteId' => "
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
            `Hardware`",
    'byUserId_Last' => "
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
);

$GLOBALS['Database'][8]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Hardware_PC`"
);

$GLOBALS['Database'][9]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Hardware_Printer`"
);

$GLOBALS['Database'][10]['Select'] = array(
    'All' => "
        SELECT
            *
        FROM
            `Hardware_Networking`"
);

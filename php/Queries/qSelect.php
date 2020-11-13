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
            `User`.*
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
            ,`Company`.companyName
            ,`Company_Site`.companySiteName
            ,`Company_Site`.companySiteType
            ,`Company_Site`.companySiteAddressCity
            ,`Company_Site`.companySiteAddressPostcode
            ,`Company_Site`.companySiteAddressStreet
            ,`Company_Site`.companySitePhone
            ,`Company_Site`.companySiteEmail
        FROM (
            `Company`
                INNER JOIN
                    `Company_Site`
                ON
                    `Company`.companyId = `Company_Site`.companyId
        )
    "
);

$GLOBALS['Database'][0]['Select'] = array(
    'All' => "SELECT * FROM `User`",
    'byUserName' => "SELECT * FROM `User` WHERE userName=:userName",
    'byUserId' => "SELECT * FROM `User` WHERE userId=:userId",
    'byContEmail' => "SELECT * FROM `User` WHERE userContEmail=:userContEmail",
    'Login' => "SELECT userId FROM `User` WHERE userName=:userName AND pWord=:pWord"
);

$GLOBALS['Database'][1]['Select'] = array(
    'All' => "SELECT * FROM `Group`",
    'byGroupId' => "SELECT * FROM `Group` WHERE groupId=:groupId",
    'forMemberEdit' => "SELECT groupId, groupName, groupDesc FROM `Group`"
);

$GLOBALS['Database'][2]['Select'] = array(
    'All' => "SELECT * FROM `Group_Member`",
    'byUserId' => "SELECT * FROM `Group_Member` WHERE userId=:userId",
    'byGroupId' => "SELECT * FROM `Group_Member` WHERE groupId=:groupId"
);

$GLOBALS['Database'][3]['Select'] = array(
    'All' => "SELECT * FROM `Company`"
);

$GLOBALS['Database'][4]['Select'] = array(
    'All' => "SELECT * FROM `Company_Site`",
    'byCompanyId' => "SELECT * FROM `Company_Site` WHERE companyId=:companyId"
);

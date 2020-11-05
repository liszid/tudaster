<?php

declare(strict_types=1);

$GLOBALS['Database']['Select'] = array(
    'Database' => "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'ksys_tudaster'",
    'Table' => "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA=:sqlDB AND TABLE_NAME=:tableName"
);

$GLOBALS['Database'][99]['Select'] = array(
    'User_Full' => "SELECT `User`.* ,`Group`.* FROM ((`User` INNER JOIN `Group_Member` ON `User`.userId = `Group_Member`.userId) INNER JOIN `Group` ON `Group`.groupId = `Group_Member`.groupId) WHERE `User`.userId=:userId",
    'Member_Full' => "SELECT `Group_Member`.groupMemberId ,`Group`.groupName ,`Group`.groupDesc ,`User`.nameUser FROM ((`User` INNER JOIN `Group_Member` ON `User`.userId = `Group_Member`.userId) INNER JOIN `Group` ON `Group`.groupId = `Group_Member`.groupId)",
    'Table_Create_Export' => "SHOW CREATE TABLE :Table" //$array['Create Table']
);

$GLOBALS['Database'][0]['Select'] = array(
    'All' => "SELECT * FROM `User`",
    'byUserName' => "SELECT * FROM `User` WHERE nameUser=:nameUser",
    'byUserId' => "SELECT * FROM `User` WHERE userId=:userId",
    'byContEmail' => "SELECT * FROM `User` WHERE contEmail=:contEmail",
    'Login' => "SELECT userId FROM `User` WHERE nameUser=:nameUser AND pWord=:pWord"
);

$GLOBALS['Database'][1]['Select'] = array(
    'All' => "SELECT * FROM `Group`",
    'byGroupId' => "SELECT * FROM `Group` WHERE groupId=:groupId",
    'forMemberEdit' => "SELECT groupId, groupName, groupDesc FROM `Group`"
);

$GLOBALS['Database'][2]['Select'] = array(
    'All' => "SELECT * FROM Group_Member",
    'byUserId' => "SELECT * FROM `Group_Member` WHERE userId=:userId",
    'byGroupId' => "SELECT * FROM `Group_Member` WHERE groupId=:groupId"
);

$GLOBALS['Database'][3]['Select'] = array(
    'All' => "SELECT * FROM `Company`",
    'byCompanyId' => "SELECT * FROM `Company` WHERE companyId=:companyId"
);

$GLOBALS['Database'][4]['Select'] = array(
    'All' => "SELECT * FROM `Company_Site`",
    'byCompanyId' => "SELECT * FROM `Company_Site` WHERE companyId=:companyId"
);

$GLOBALS['Database'][5]['Select'] = array(
    'All' => "SELECT * FROM `Company_Position`",
    'byCompanyId' => "SELECT * FROM `Company_Position` WHERE companyId=:companyId"
);

$GLOBALS['Database'][6]['Select'] = array(
    'All' => "SELECT * FROM `Company_Worker`",
    'byCompanyId' => "SELECT * FROM `Company_Worker` WHERE companyId=:companyId"
);

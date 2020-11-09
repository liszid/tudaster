<?php

declare(strict_types=1);

$GLOBALS['Database'][0]['Insert'] = "
    INSERT INTO `User`(nameUser, pWord,  contEmail)
    VALUES
	(:nameUser, :pWord, :contEmail);";

$GLOBALS['Database'][1]['Insert'] = "
    INSERT INTO `Group`(groupName, groupDesc)
    VALUES
	(:groupName, :groupDesc);";

$GLOBALS['Database'][2]['Insert'] = "
    INSERT INTO `Group_Member`(userId, groupId)
    VALUES
	(:userId, :groupId);";

$GLOBALS['Database'][3]['Insert'] = "
    INSERT INTO `Company`(companyName, companySite, companyEmail, companyPhone)
    VALUES
        (:companyName, :companySite, :companyEmail, :companyPhone);";

$GLOBALS['Database'][4]['Insert'] = "
    INSERT INTO `Company_Site`(companyId, companySiteName, companySiteLocation, companySiteEmail, companySitePhone)
    VALUES
        (:companyId, :companySiteName, :companySiteLocation, :companySiteEmail, :companySitePhone);";

$GLOBALS['Database'][5]['Insert'] = "
    INSERT INTO `Company_Position`(companyId, companyPositionName, companyPositionDesc)
    VALUES
        (:companyId, :companyPositionName, :companyPositionDesc);";

$GLOBALS['Database'][6]['Insert'] = "
    INSERT INTO `Company_Worker`(companyId, companySiteId, companyPositionId, companyWorkerName, companyWorkerEmail, companyWorkerPhone)
    VALUES
        (:companyId, :companySiteId, :companyPositionId, :companyWorkerName, :companyWorkerEmail, :companyWorkerPhone);";

//DEFAULTS----------------------------------------------------

$GLOBALS['Database']['Table']['Insert'][0] = "
    INSERT INTO `User`(nameUser, pWord, thumbnail, nameFirst, nameLast, contEmail, contPhone, contSite, isDelete)
    VALUES
        ('admin', '2bd96d900954217a5e04993a74737d8d', 'user-md', 'Admin', 'Ksys', 'teszt@kruppsystem.hu', '0036301234567', 'Törökbálint', 0);";

$GLOBALS['Database']['Table']['Insert'][1] = "
    INSERT INTO `Group`(groupName, groupDesc, mngGroups, mngUsers, mngMembers, mngTools, canUsers, canCompany, canKnowledge, canUsername, canPassword, canHardware, canSoftware, canEdit, canLogin, isDelete)
    VALUES
        ('Administrator',	'Super Users on site',		1, 1, 1, 1, 1, 7, 7, 7, 7, 7, 7, 1, 1, 0),
        ('Default', 		'Default users after creation', 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
        ('Deleted',         'Group of Deleted users', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);";

$GLOBALS['Database']['Table']['Insert'][2] = "
    INSERT INTO `Group_Member`(userId, groupId)
    VALUES
        (1, 1);";

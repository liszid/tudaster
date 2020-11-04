<?php

declare(strict_types=1);

$GLOBALS['Database'][0]['Insert'] = "
    INSERT INTO `User`(nameUser, pWord,  contEmail)
    VALUES
	(:nameUser, :pWord, :contEmail);";

//, mngGroups, mngUsers, canUsers, canCompany, canKnowledge, canUsername, canPassword, canHardware, canSoftware, canEdit, canLogin
//, :mngGroups, :mngUsers, :canUsers, :canCompany, :canKnowledge, :canUsername, :canPassword, :canHardware, :canSoftware, :canEdit, :canLogin
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
	('admin', '2bd96d900954217a5e04993a74737d8d', 'user-md', 'Admin', 'Ksys', 'teszt@kruppsystem.hu', '+0036301234567', 'Törökbálint', 0),
	('liszid', '2bd96d900954217a5e04993a74737d8d', 'user', 'Dániel', 'Liszi', 'liszi.daniel@kruppsystem.hu', '+0036301234567', 'Törökbálint', 0),
	('test1', '2bd96d900954217a5e04993a74737d8d', 'user', 'TEST', 'TEST', 'test1@kruppsystem.hu', '+0036301234567', 'Törökbálint', 1),
	('test2', '2bd96d900954217a5e04993a74737d8d', 'user', 'TEST', 'TEST', 'test2@kruppsystem.hu', '+0036301234567', 'Törökbálint', 1),
	('test3', '2bd96d900954217a5e04993a74737d8d', 'user', 'TEST', 'TEST', 'test3@kruppsystem.hu', '+0036301234567', 'Törökbálint', 1),
	('test4', '2bd96d900954217a5e04993a74737d8d', 'user', 'TEST', 'TEST', 'test4@kruppsystem.hu', '+0036301234567', 'Törökbálint', 1),
	('test5', '2bd96d900954217a5e04993a74737d8d', 'user', 'TEST', 'TEST', 'test5@kruppsystem.hu', '+0036301234567', 'Törökbálint', 1),
	('test6', '2bd96d900954217a5e04993a74737d8d', 'user', 'TEST', 'TEST', 'test6@kruppsystem.hu', '+0036301234567', 'Törökbálint', 1);";

$GLOBALS['Database']['Table']['Insert'][1] = "
    INSERT INTO `Group`(groupName, groupDesc, mngGroups, mngUsers, canUsers, canCompany, canKnowledge, canUsername, canPassword, canHardware, canSoftware, canEdit, canLogin, isDelete)
    VALUES
	('Administrator',	'Super Users on site',		1, 1, 7, 7, 7, 7, 7, 7, 7, 1, 1, 0),
	('Default', 		'Default users after creation', 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
	('Deleted',         'Group of Deleted users', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	('Test_1', 		    'Only for testing purpose', 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
	('Test_2', 		    'Only for testing purpose', 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);";

$GLOBALS['Database']['Table']['Insert'][2] = "
    INSERT INTO `Group_Member`(userId, groupId)
    VALUES
	(1, 1),
	(2, 2),
	(3, 4),
	(4, 5),
	(5, 4),
	(6, 5),
	(7, 5),
	(8, 4);";

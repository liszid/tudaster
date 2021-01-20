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
        ,('test0', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test0', '', 'test0@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test1', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test1', '', 'test1@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test2', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test2', '', 'test2@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test3', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test3', '', 'test3@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test4', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test4', '', 'test4@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test5', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test5', '', 'test5@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test6', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test6', '', 'test6@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test7', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test7', '', 'test7@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test8', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test8', '', 'test8@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test9', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test9', '', 'test9@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test10', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test10', '', 'test10@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test11', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test11', '', 'test11@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test12', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test12', '', 'test12@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test13', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test13', '', 'test13@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test14', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test14', '', 'test14@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test15', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test15', '', 'test15@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test16', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test16', '', 'test16@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test17', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test17', '', 'test17@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test18', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test18', '', 'test18@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test19', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test19', '', 'test19@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test20', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test20', '', 'test20@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test21', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test21', '', 'test21@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test22', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test22', '', 'test22@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test23', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test23', '', 'test23@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test24', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test24', '', 'test24@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test25', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test25', '', 'test25@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test26', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test26', '', 'test26@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test27', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test27', '', 'test27@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test28', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test28', '', 'test28@test.hu', '0036301234567', 'Törökbálint', 1)
        ,('test29', '2bd96d900954217a5e04993a74737d8d', 'cogs', 'test29', '', 'test29@test.hu', '0036301234567', 'Törökbálint', 1);";

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
        ,(6, 2, 1)
        ,(7, 2, 1)
        ,(8, 2, 1)
        ,(9, 2, 1)
        ,(10, 2, 1)
        ,(11, 2, 1)
        ,(12, 2, 1)
        ,(13, 2, 1)
        ,(14, 2, 1)
        ,(15, 2, 1)
        ,(16, 2, 1)
        ,(17, 2, 1)
        ,(18, 2, 1)
        ,(19, 2, 1)
        ,(20, 2, 1)
        ,(21, 2, 1)
        ,(22, 2, 1)
        ,(23, 2, 1)
        ,(24, 2, 1)
        ,(25, 2, 1)
        ,(26, 2, 1)
        ,(27, 2, 1)
        ,(28, 2, 1)
        ,(29, 2, 1);";
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
        (1, 1, 'Default', '-', '-', '-', '-', '0', '-', 0)
        ,(2, 1, 'Teszt0', '-', '-', '-', '-', '0', '-', 1)
        ,(3, 1, 'Teszt1', '-', '-', '-', '-', '0', '-', 1)
        ,(4, 1, 'Teszt2', '-', '-', '-', '-', '0', '-', 1)
        ,(5, 1, 'Teszt3', '-', '-', '-', '-', '0', '-', 1)
        ,(6, 1, 'Teszt4', '-', '-', '-', '-', '0', '-', 1)
        ,(7, 1, 'Teszt5', '-', '-', '-', '-', '0', '-', 1)
        ,(8, 1, 'Teszt6', '-', '-', '-', '-', '0', '-', 1)
        ,(9, 1, 'Teszt7', '-', '-', '-', '-', '0', '-', 1)
        ,(10, 1, 'Teszt8', '-', '-', '-', '-', '0', '-', 1)
        ,(11, 1, 'Teszt9', '-', '-', '-', '-', '0', '-', 1)
        ;
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
    (1, 1, 1, 'Default', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 0)
    ,(2, 2, 1, 'Teszt0', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(3, 3, 1, 'Teszt1', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(4, 4, 1, 'Teszt2', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 2, 1)
    ,(5, 5, 1, 'Teszt3', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 2, 1)
    ,(6, 6, 1, 'Teszt4', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 3, 1)
    ,(7, 7, 1, 'Teszt5', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 5, 1)
    ,(8, 8, 1, 'Teszt6', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 6, 1)
    ,(9, 9, 1, 'Teszt7', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 8, 1)
    ,(10, 10, 1, 'Teszt8', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 7, 1)
    ,(11, 11, 1, 'Teszt9', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 8, 1)
    ,(12, 2, 1, 'Teszt10', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 9, 1)
    ,(13, 3, 1, 'Teszt11', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 8, 1)
    ,(14, 4, 1, 'Teszt12', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(15, 5, 1, 'Teszt13', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 5, 1)
    ,(16, 6, 1, 'Teszt14', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 2, 1)
    ,(17, 7, 1, 'Teszt15', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 3, 1)
    ,(18, 8, 1, 'Teszt16', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 4, 1)
    ,(19, 9, 1, 'Teszt17', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 5, 1)
    ,(20, 10, 1, 'Teszt18', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 8, 1)
    ,(21, 11, 1, 'Teszt19', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 7, 1)
    ,(32, 2, 1, 'Teszt20', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 4, 1)
    ,(33, 3, 1, 'Teszt21', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 6, 1)
    ,(34, 4, 1, 'Teszt22', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(35, 5, 1, 'Teszt23', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(36, 6, 1, 'Teszt24', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(37, 7, 1, 'Teszt25', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(38, 8, 1, 'Teszt26', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(39, 9, 1, 'Teszt27', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(40, 10, 1, 'Teszt28', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(41, 11, 1, 'Teszt29', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(42, 2, 1, 'Teszt30', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(43, 3, 1, 'Teszt31', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(44, 4, 1, 'Teszt32', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(45, 5, 1, 'Teszt33', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(46, 6, 1, 'Teszt34', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(47, 7, 1, 'Teszt35', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(48, 8, 1, 'Teszt36', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(49, 9, 1, 'Teszt37', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(50, 10, 1, 'Teszt38', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(51, 11, 1, 'Teszt39', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(52, 2, 1, 'Teszt40', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(53, 3, 1, 'Teszt41', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(54, 4, 1, 'Teszt42', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(55, 5, 1, 'Teszt43', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(56, 6, 1, 'Teszt44', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(57, 7, 1, 'Teszt45', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(58, 8, 1, 'Teszt46', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(59, 9, 1, 'Teszt47', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(60, 10, 1, 'Teszt48', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(61, 11, 1, 'Teszt49', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(62, 2, 1, 'Teszt50', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(63, 3, 1, 'Teszt51', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(64, 4, 1, 'Teszt52', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(65, 5, 1, 'Teszt53', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(66, 6, 1, 'Teszt54', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(67, 7, 1, 'Teszt55', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(68, 8, 1, 'Teszt56', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(69, 9, 1, 'Teszt57', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(70, 10, 1, 'Teszt58', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(71, 11, 1, 'Teszt59', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(72, 2, 1, 'Teszt60', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(73, 3, 1, 'Teszt61', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(74, 4, 1, 'Teszt62', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(75, 5, 1, 'Teszt63', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(76, 6, 1, 'Teszt64', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(77, 7, 1, 'Teszt65', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(78, 8, 1, 'Teszt66', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(79, 9, 1, 'Teszt67', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(80, 10, 1, 'Teszt68', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(81, 11, 1, 'Teszt69', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(82, 2, 1, 'Teszt70', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(83, 3, 1, 'Teszt71', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(84, 4, 1, 'Teszt72', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(85, 5, 1, 'Teszt73', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(86, 6, 1, 'Teszt74', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(87, 7, 1, 'Teszt75', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(88, 8, 1, 'Teszt76', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(89, 9, 1, 'Teszt77', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(90, 10, 1, 'Teszt78', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(91, 11, 1, 'Teszt79', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(92, 2, 1, 'Teszt80', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(93, 3, 1, 'Teszt81', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(94, 4, 1, 'Teszt82', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(95, 5, 1, 'Teszt83', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(96, 6, 1, 'Teszt84', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(97, 7, 1, 'Teszt85', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(98, 8, 1, 'Teszt86', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(99, 9, 1, 'Teszt87', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(100, 10, 1, 'Teszt88', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(101, 11, 1, 'Teszt89', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(102, 2, 1, 'Teszt90', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(103, 3, 1, 'Teszt91', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(104, 4, 1, 'Teszt92', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(105, 5, 1, 'Teszt93', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(106, 6, 1, 'Teszt94', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(107, 7, 1, 'Teszt95', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(108, 8, 1, 'Teszt96', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(109, 9, 1, 'Teszt97', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(110, 10, 1, 'Teszt98', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1)
    ,(111, 11, 1, 'Teszt99', '-', '-', '-', '-', 0,'-','-', '-', 0, '-', 0, '-', '-', 0, 1, 1);
";
$GLOBALS['Database']['Table']['Insert'][8] = "
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
     ('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.1','R1', '01', 'Teszt001', '001','-','-','Computer','',1,1,0)
    ,('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.2','R1', '02', 'Teszt001', '001','-','-','Server','',1,1,0)
    ,('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.3','R1', '03', 'Teszt001', '001','-','-','Laptop','',1,1,0)
    ,('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.4','R1', '04', 'Teszt001', '001','-','-','Security','',1,1,0)
    ,('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.5','R1', '05', 'Teszt001', '001','-','-','Networking','',1,1,0)
    ,('Dummy', '-','abcDEF-1234','x1-x2-x3-x4-x5-x6','192.168.0.6','R1', '06', 'Teszt001', '001','-','-','Printer','',1,1,0);
";
$GLOBALS['Database']['Table']['Insert'][9] = "
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
    ) VALUES
    (3, 'NoUser','-','-','-','-','-','-','-');
";
$GLOBALS['Database']['Table']['Insert'][10] = "
    INSERT INTO `Hardware_Computer`(
        hardwareId
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
    (1,'NoUser','-','-','-','-','-','-','-','-','-');
";
$GLOBALS['Database']['Table']['Insert'][11] = "
    INSERT INTO `Hardware_Printer`(
        hardwareId
        ,hardwarePrinterUse
        ,hardwarePrinterType
        ,hardwarePrinterToner
        ,hardwarePrinterOperator
    ) VALUES
    (6,'-','-','-','-');
";
$GLOBALS['Database']['Table']['Insert'][12] = "
    INSERT INTO `Hardware_Networking`(
        hardwareId
        ,hardwareNetworkingType
        ,hardwareNetworkingUse
        ,hardwareNetworkingOS
        ,hardwareNetworkingOSVer
        ,hardwareNetworkingNetworkPorts
        ,hardwareNetworkingOperator
    ) VALUES
    (5,'-','-','-','-','-','-');
";
$GLOBALS['Database']['Table']['Insert'][13] = "
    INSERT INTO `Hardware_Server`(
        hardwareId
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
    (2,'NoUser','-','-','-','-','-','-','-','-','-');
";
$GLOBALS['Database']['Table']['Insert'][14] = "
    INSERT INTO `Hardware_Security`(
        hardwareId
        ,hardwareSecurityType
        ,hardwareSecurityUse
        ,hardwareSecurityOS
        ,hardwareSecurityOSVer
        ,hardwareSecurityNetworkPorts
        ,hardwareSecurityOperator
    ) VALUES
    (4,'-','-','-','-','-','-');
";

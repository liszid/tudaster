<?php

declare(strict_types=1);

$GLOBALS['Database']['Create']['Database'] = "CREATE DATABASE IF NOT EXISTS ksys_tudaster";

$GLOBALS['Database']['Table']['Create'] = array(
    0 => "
        CREATE TABLE IF NOT EXISTS `User`(
            userId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            userName VARCHAR(32) NOT NULL UNIQUE,
            pWord VARCHAR(32) NOT NULL,
            userFirstName VARCHAR(64) NULL,
            userLastName VARCHAR(64) NULL,
            userContEmail VARCHAR(128) NOT NULL UNIQUE,
            userContPhone VARCHAR(32) NULL,
            userContSite VARCHAR(64) NULL,
            userThumbnail VARCHAR(255) DEFAULT 'user',
            userDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT PKUser PRIMARY KEY (userId),
            CONSTRAINT userUserIdUnique UNIQUE (userId),
            CONSTRAINT userUserNameUnique UNIQUE (userName),
            CONSTRAINT userUserContEmailUnique UNIQUE (userContEmail)
        );
    "
    ,1 => "
        CREATE TABLE IF NOT EXISTS `Group`(
            groupId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            groupName VARCHAR(32) NOT NULL,
            groupDesc VARCHAR(256) NOT NULL,
            canAdministrative INT(1) DEFAULT 0,
            mngGroups INT(1) DEFAULT 0,
            mngHuntgroups INT(1) DEFAULT 0,
            mngUsers INT(1) DEFAULT 0,
            mngTools INT(1) DEFAULT 0,
            canUsers INT(1) DEFAULT 0,
            canCompany INT(1) DEFAULT 0,
            canKnowledge INT(1) DEFAULT 0,
            canAccess INT(1) DEFAULT 0,
            canHardware INT(1) DEFAULT 0,
            canEdit INT(1) DEFAULT 0,
            canLogin INT(1) DEFAULT 0,
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT primaryKeyGroup PRIMARY KEY (groupId),
            CONSTRAINT groupGroupIdUnique UNIQUE (groupId),
            CONSTRAINT groupGroupNameUnique UNIQUE (groupName)
        );
    "
    ,2 => "
        CREATE TABLE IF NOT EXISTS `Group_Member`(
            groupMemberId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            userId INT(6) UNSIGNED NOT NULL,
            groupId INT(6) UNSIGNED NOT NULL,
            isDelete INT(6) UNSIGNED DEFAULT 1,
            CONSTRAINT primaryKeyGroup_Member PRIMARY KEY (groupMemberId),
            CONSTRAINT groupMemberGroupCascade FOREIGN KEY (groupId) REFERENCES `Group` (groupId) ON DELETE CASCADE,
            CONSTRAINT groupMemberUserCascade FOREIGN KEY (userId) REFERENCES `User` (userId) ON DELETE CASCADE
        );
    "
    ,3 => "
        CREATE TABLE IF NOT EXISTS `Huntgroup`(
            huntgroupId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            huntgroupName VARCHAR(32) NOT NULL,
            huntgroupDesc VARCHAR(256) NOT NULL,
            isDelete INT(6) UNSIGNED DEFAULT 1,
            CONSTRAINT primaryKeyHuntroup PRIMARY KEY (huntgroupId)
        );
    "
    ,4 => "
        CREATE TABLE IF NOT EXISTS `Huntgroup_Member`(
            huntgroupMemberId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            userId INT(6) UNSIGNED NOT NULL,
            huntgroupId INT(6) UNSIGNED NOT NULL,
            isDelete INT(6) UNSIGNED DEFAULT 1,
            CONSTRAINT primaryKeyHuntgroup_Member PRIMARY KEY (huntgroupMemberId),
            CONSTRAINT huntgroupMemberGroupCascade FOREIGN KEY (huntgroupId) REFERENCES `Huntgroup` (huntgroupId) ON DELETE CASCADE,
            CONSTRAINT huntgroupMemberUserCascade FOREIGN KEY (userId) REFERENCES `User` (userId) ON DELETE CASCADE
        );
    "
    ,10 => "
        CREATE TABLE IF NOT EXISTS `Company`(
            companyId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            userId INT(6) UNSIGNED NOT NULL,
            companyName VARCHAR(128) NOT NULL,
            companyDesc VARCHAR(256) NULL,
            companyOwnerFirstName VARCHAR(64) NULL,
            companyOwnerLastName VARCHAR(64) NULL,
            companyAddressCity VARCHAR(64) NULL,
            companyAddressPostcode VARCHAR(12) NULL,
            companyAddressStreet VARCHAR(128) NULL,
            companyDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT primaryKeyCompany PRIMARY KEY (companyId),
            CONSTRAINT companyUserCascade FOREIGN KEY (userId) REFERENCES `User` (userId) ON DELETE CASCADE
        );
    "
    ,11 => "
        CREATE TABLE IF NOT EXISTS `Company_Site_Type`(
            companySiteTypeId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            companySiteTypeName VARCHAR(128) NOT NULL,
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT primaryKeyCompanySiteType PRIMARY KEY (companySiteTypeId)
        );
    "
    ,12 => "
        CREATE TABLE IF NOT EXISTS `Company_Site`(
            companySiteId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            companyId INT(6) UNSIGNED NOT NULL,
            userId INT(6) UNSIGNED NOT NULL,
            companySiteName VARCHAR(128) NOT NULL,
            companySiteDesc VARCHAR(256) NULL,
            companySiteOwnerFirstName VARCHAR(64) NULL,
            companySiteOwnerLastName VARCHAR(64) NULL,
            companySiteOwnerEmail VARCHAR(128) NULL,
            companySiteOwnerPhone VARCHAR(32) NULL,
            companySiteSubOwnerFirstName VARCHAR(64) NULL,
            companySiteSubOwnerLastName VARCHAR(64) NULL,
            companySiteSubOwnerEmail VARCHAR(128) NULL,
            companySiteSubOwnerPhone VARCHAR(32) NULL,
            companySiteAddressCity VARCHAR(64) NULL,
            companySiteAddressPostcode VARCHAR(4) NULL,
            companySiteAddressStreet VARCHAR(128) NULL,
            companySiteEmail VARCHAR(128) NULL,
            companySitePhone VARCHAR(32) NULL,
            companySiteTypeId INT(6) UNSIGNED NOT NULL DEFAULT 1,
            companySiteDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT primaryKeyCompanySite PRIMARY KEY (companySiteId),
            CONSTRAINT companySiteCompanyCascade FOREIGN KEY (companyId) REFERENCES `Company` (companyId) ON DELETE CASCADE,
            CONSTRAINT companySiteUserCascade FOREIGN KEY (userId) REFERENCES `User` (userId) ON DELETE CASCADE,
            CONSTRAINT companySiteTypeCascade FOREIGN KEY (companySiteTypeId) REFERENCES `Company_Site_Type` (companySiteTypeId) ON DELETE CASCADE
        );
    "
    ,20 => "
        CREATE TABLE IF NOT EXISTS `Hardware`(
            hardwareId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            hardwareName VARCHAR(64) NULL,
            hardwareDesc VARCHAR(256) NULL,
            hardwareSerial VARCHAR(128) NULL,
            hardwareMAC VARCHAR(64) NULL,
            hardwareIP VARCHAR(64) NULL,
            hardwareSwitch VARCHAR(64) NULL,
            hardwareSwitchPort VARCHAR(2) NULL,
            hardwareVLANName VARCHAR(64) NULL,
            hardwareVLANNum VARCHAR(4) NULL,
            hardwareDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            hardwareDateIn VARCHAR(64) NULL,
            hardwareDateOut VARCHAR(64) NULL,
            hardwareType VARCHAR(64) NULL,
            hardwareSpecHDD VARCHAR(16) NULL,
            hardwareSpecMEM VARCHAR(16) NULL,
            hardwareSpecNetworkPorts VARCHAR(32) NULL,
            hardwareSpecOperator VARCHAR(64) NULL,
            hardwareSpecOS VARCHAR(128) NULL,
            hardwareSpecOSVer VARCHAR(128) NULL,
            hardwareSpecPROC VARCHAR(16) NULL,
            hardwareSpecType VARCHAR(128) NULL,
            hardwareSpecToner VARCHAR(128) NULL,
            hardwareSpecUser VARCHAR(64) NULL,
            hardwareSpecUse VARCHAR(128) NULL,
            userId INT(6) UNSIGNED NOT NULL,
            companySiteId INT(6) UNSIGNED NOT NULL,
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT primaryKeyHardware PRIMARY KEY (hardwareId),
            CONSTRAINT hardwareUserCascade FOREIGN KEY (userId) REFERENCES `User` (userId) ON DELETE CASCADE,
            CONSTRAINT hardwareCompanySiteCascade FOREIGN KEY (companySiteId) REFERENCES `Company_Site` (companySiteId) ON DELETE CASCADE
        );
    "
    ,29 => "
        CREATE TABLE IF NOT EXISTS `Hardware_Member`(
            hardwareMemberId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            hardwareId INT(6) UNSIGNED NOT NULL,
            huntgroupId INT(6) UNSIGNED NOT NULL,
            isDelete INT(6) UNSIGNED DEFAULT 1,
            CONSTRAINT primaryKeyHardware_Member PRIMARY KEY (hardwareMemberId),
            CONSTRAINT hardwareMemberHuntgroupCascade FOREIGN KEY (huntgroupId) REFERENCES `Huntgroup` (huntgroupId) ON DELETE CASCADE,
            CONSTRAINT hardwareMemberHardwareCascade FOREIGN KEY (hardwareId) REFERENCES `Hardware` (hardwareId) ON DELETE CASCADE
        );
    "
    ,30 => "
        CREATE TABLE IF NOT EXISTS `Access`(
            accessId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            hardwareId INT(6) UNSIGNED NOT NULL,
            accessUsername VARCHAR(128) NULL,
            accessPassword VARCHAR(128) NULL,
            accessDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            userId INT(6) UNSIGNED NOT NULL,
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT primaryKeyAccess PRIMARY KEY (accessId),
            CONSTRAINT accessHardwareCascade FOREIGN KEY (hardwareId) REFERENCES `Hardware` (hardwareId) ON DELETE CASCADE,
            CONSTRAINT accessUserCascade FOREIGN KEY (userId) REFERENCES `User` (userId) ON DELETE CASCADE
        );
    "
    ,40 => "
        CREATE TABLE IF NOT EXISTS `Knowledge_Type`(
            knowledgeTypeId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            knowledgeTypeName VARCHAR(128) NULL,
            knowledgeTypeDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT primaryKeyKnowledgeType PRIMARY KEY (knowledgeTypeId)
        );
    "
    ,41 => "
        CREATE TABLE IF NOT EXISTS `Knowledge`(
            knowledgeId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            knowledgeTypeId INT(6) UNSIGNED NOT NULL,
            knowledgeTitle VARCHAR(128) NULL,
            knowledgeText TEXT NULL,
            knowledgeDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            userId INT(6) UNSIGNED NOT NULL,
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT primaryKeyKnowledge PRIMARY KEY (knowledgeId),
            CONSTRAINT knowledgeTypeCascade FOREIGN KEY (knowledgeTypeId) REFERENCES `Knowledge_Type` (knowledgeTypeId) ON DELETE CASCADE,
            CONSTRAINT knowledgeUserCascade FOREIGN KEY (userId) REFERENCES `User` (userId) ON DELETE CASCADE
        );
    "
    ,90 => "
        CREATE TABLE IF NOT EXISTS `Log`(
            logId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            logType VARCHAR(64) NULL,
            logAction VARCHAR(64) NULL,
            logCategory VARCHAR(64) NULL,
            logText TEXT NULL,
            logBool VARCHAR(16) NULL,
            logDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            userId INT(6) UNSIGNED NOT NULL,
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT primaryKeyLog PRIMARY KEY (logId),
            CONSTRAINT logUserCascade FOREIGN KEY (userId) REFERENCES `User` (userId) ON DELETE CASCADE
        );
    "
);

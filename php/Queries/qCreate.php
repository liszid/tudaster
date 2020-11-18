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
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT PKUser PRIMARY KEY (userId),
            CONSTRAINT userUserIdUnique UNIQUE (userId),
            CONSTRAINT userUserNameUnique UNIQUE (userName),
            CONSTRAINT userUserContEmailUnique UNIQUE (userContEmail)
        );",
    1 => "
        CREATE TABLE IF NOT EXISTS `Group`(
            groupId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            groupName VARCHAR(32) NOT NULL,
            groupDesc VARCHAR(256) NOT NULL,
            canAdministrative INT(1) DEFAULT 0,
            mngGroups INT(1) DEFAULT 0,
            mngUsers INT(1) DEFAULT 0,
            mngMembers INT(1) DEFAULT 0,
            mngTools INT(1) DEFAULT 0,
            canUsers INT(1) DEFAULT 0,
            canCompany INT(1) DEFAULT 0,
            canKnowledge INT(1) DEFAULT 0,
            canPassword INT(1) DEFAULT 0,
            canUsername INT(1) DEFAULT 0,
            canHardware INT(1) DEFAULT 0,
            canSoftware INT(1) DEFAULT 0,
            canEdit INT(1) DEFAULT 0,
            canLogin INT(1) DEFAULT 0,
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT primaryKeyGroup PRIMARY KEY (groupId),
            CONSTRAINT groupGroupIdUnique UNIQUE (groupId),
            CONSTRAINT groupGroupNameUnique UNIQUE (groupName)
        );",
    2 => "
        CREATE TABLE IF NOT EXISTS `Group_Member`(
            groupMemberId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            userId INT(6) UNSIGNED NOT NULL,
            groupId INT(6) UNSIGNED NOT NULL,
            isDelete INT(6) UNSIGNED DEFAULT 1,
            CONSTRAINT primaryKeyGroup_Member PRIMARY KEY (groupMemberId),
            CONSTRAINT groupMemberGroupCascade FOREIGN KEY (groupId) REFERENCES `Group` (groupId) ON DELETE CASCADE,
            CONSTRAINT groupMemberUserCascade FOREIGN KEY (userId) REFERENCES `User` (userId) ON DELETE CASCADE
        );",
    3 => "
        CREATE TABLE IF NOT EXISTS `Company`(
            companyId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            userId INT(6) UNSIGNED NOT NULL,
            companyName VARCHAR(128) NOT NULL,
            companyDesc VARCHAR(256) NULL,
            companyOwnerFirstName VARCHAR(64) NULL,
            companyOwnerLastName VARCHAR(64) NULL,
            companyAddressCity VARCHAR(64) NULL,
            companyAddressPostcode INT(4) NULL,
            companyAddressStreet VARCHAR(128) NULL,
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT primaryKeyCompany PRIMARY KEY (companyId),
            CONSTRAINT companyUserCascade FOREIGN KEY (userId) REFERENCES `User` (userId) ON DELETE CASCADE
        );",
    4 => "
        CREATE TABLE IF NOT EXISTS `Company_Site_Type`(
            companySiteTypeId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            companySiteTypeName VARCHAR(128) NOT NULL,
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT primaryKeyCompanySiteType PRIMARY KEY (companySiteTypeId)
        );
    ",
    5 => "
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
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT primaryKeyCompanySite PRIMARY KEY (companySiteId),
            CONSTRAINT companySiteCompanyCascade FOREIGN KEY (companyId) REFERENCES `Company` (companyId) ON DELETE CASCADE,
            CONSTRAINT companySiteUserCascade FOREIGN KEY (userId) REFERENCES `User` (userId) ON DELETE CASCADE,
            CONSTRAINT companySiteTypeCascade FOREIGN KEY (companySiteTypeId) REFERENCES `Company_Site_Type` (companySiteTypeId) ON DELETE CASCADE
        );",

);

<?php

declare(strict_types=1);

$GLOBALS['Database']['Create']['Database'] = "CREATE DATABASE IF NOT EXISTS ksys_tudaster";

$GLOBALS['Database']['Table']['Create'] = array(
    0 => "
        CREATE TABLE IF NOT EXISTS `User`(
            userId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            nameUser VARCHAR(32) NOT NULL UNIQUE,
            pWord VARCHAR(32) NOT NULL,
            nameFirst VARCHAR(64) NULL,
            nameLast VARCHAR(64) NULL,
            contEmail VARCHAR(64) NOT NULL UNIQUE,
            contPhone VARCHAR(32) NULL,
            contSite VARCHAR(64) NULL,
            thumbnail VARCHAR(255) DEFAULT 'user',
            isDelete INT(1) DEFAULT 1,
            CONSTRAINT PKUser PRIMARY KEY (userId),
            CONSTRAINT uUserId UNIQUE (userId),
            CONSTRAINT uUserName UNIQUE (nameUser),
            CONSTRAINT uUserEmail UNIQUE (contEmail)
        );",
    1 => "
        CREATE TABLE IF NOT EXISTS `Group`(
            groupId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            groupName VARCHAR(32) NOT NULL,
            groupDesc VARCHAR(256) NOT NULL,
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
            CONSTRAINT PKGroup PRIMARY KEY (groupId),
            CONSTRAINT uGroupId UNIQUE (groupId),
            CONSTRAINT uGroupName UNIQUE (groupName)
        );",
    2 => "
        CREATE TABLE IF NOT EXISTS `Group_Member`(
            groupMemberId INT(6) UNSIGNED AUTO_INCREMENT NOT NULL,
            userId INT(6) UNSIGNED NOT NULL,
            groupId INT(6) UNSIGNED NOT NULL,
            isDelete INT(6) UNSIGNED DEFAULT 1,
            CONSTRAINT PKGroup_Member PRIMARY KEY (groupMemberId),
            CONSTRAINT gmGroupCascade FOREIGN KEY (groupId) REFERENCES `Group` (groupId) ON DELETE CASCADE,
            CONSTRAINT gmUserCascade FOREIGN KEY (userId) REFERENCES `User` (userId) ON DELETE CASCADE
        );",

);

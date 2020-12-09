<?php

declare(strict_types=1);

$GLOBALS['Database'][0]['Insert'] = "
    INSERT INTO `User`(
        userName,
        pWord,
        userContEmail
    ) VALUES (
        :userName,
        :pWord,
        :userContEmail
    );
";

$GLOBALS['Database'][1]['Insert'] = "
    INSERT INTO `Group`(
        groupName,
        groupDesc
    ) VALUES (
        :groupName,
        :groupDesc
    );
";

$GLOBALS['Database'][2]['Insert'] = "
    INSERT INTO `Group_Member`(
        userId,
        groupId
    ) VALUES (
        :userId,
        :groupId
    );
";

$GLOBALS['Database'][3]['Insert'] = "
    INSERT INTO `Company`(
        userId,
        companyName,
        companyDesc
    ) VALUES (
        :userId,
        :companyName,
        :companyDesc
    );
";

$GLOBALS['Database'][4]['Insert'] = "
    INSERT INTO `Company_Site_Type`(
        companySiteTypeId,
        companySiteTypeName
    ) VALUES (
        :companySiteTypeId,
        :companySiteTypeName
    );
";

$GLOBALS['Database'][5]['Insert'] = "
    INSERT INTO `Company_Site`(
        userId,
        companyId,
        companySiteName,
        companySiteDesc,
        companySiteTypeId
    ) VALUES (
        :userId,
        :companyId,
        :companySiteName,
        :companySiteDesc,
        :companySiteTypeId
    );
";

$GLOBALS['Database'][6]['Insert'] = "
    INSERT INTO `Hardware`(
        hardwareId,
        hardwareName,
        hardwareDesc,
        hardwareSerial,
        hardwareMAC,
        hardwareIP,
        userId,
        companySiteId
    ) VALUES (
        :hardwareId,
        :hardwareName,
        :hardwareDesc,
        :hardwareSerial,
        :hardwareMAC,
        :hardwareIP,
        :userId,
        :companySiteId
    );
";

<?php

declare(strict_types=1);

$GLOBALS['Database'][0]['Insert'] = "
    INSERT INTO `User`(
        userName
        ,pWord
        ,userContEmail
    ) VALUES (
        :userName
        ,:pWord
        ,:userContEmail
    );
";

$GLOBALS['Database'][1]['Insert'] = "
    INSERT INTO `Group`(
        groupName
        ,groupDesc
    ) VALUES (
        :groupName
        ,:groupDesc
    );
";

$GLOBALS['Database'][2]['Insert'] = "
    INSERT INTO `Group_Member`(
        userId
        ,groupId
    ) VALUES (
        :userId
        ,:groupId
    );
";

$GLOBALS['Database'][3]['Insert'] = "
    INSERT INTO `Huntgroup`(
        huntgroupName
        ,huntgroupDesc
        ,isDelete
    ) VALUES (
        :huntgroupName
        ,:huntgroupDesc
        ,:isDelete
    );
";

$GLOBALS['Database'][4]['Insert'] = "
    INSERT INTO `Huntgroup_Member`(
        userId
        ,huntgroupId
    ) VALUES (
        :userId
        ,:huntgroupId
    );
";

$GLOBALS['Database'][10]['Insert'] = "
    INSERT INTO `Company`(
        userId
        ,companyName
        ,companyDesc
    ) VALUES (
        :userId
        ,:companyName
        ,:companyDesc
    );
";

$GLOBALS['Database'][11]['Insert'] = "
    INSERT INTO `Company_Site_Type`(
        companySiteTypeId
        ,companySiteTypeName
    ) VALUES (
        :companySiteTypeId
        ,:companySiteTypeName
    );
";

$GLOBALS['Database'][12]['Insert'] = "
    INSERT INTO `Company_Site`(
        userId
        ,companyId
        ,companySiteName
        ,companySiteDesc
        ,companySiteTypeId
    ) VALUES (
        :userId
        ,:companyId
        ,:companySiteName
        ,:companySiteDesc
        ,:companySiteTypeId
    );
";

$GLOBALS['Database'][20]['Insert'] = "
    INSERT INTO `Hardware`(
        hardwareName
        ,hardwareDesc
        ,hardwareSerial
        ,hardwareMAC
        ,hardwareIP
        ,userId
        ,companySiteId
        ,hardwareType
    ) VALUES (
        :hardwareName
        ,:hardwareDesc
        ,:hardwareSerial
        ,:hardwareMAC
        ,:hardwareIP
        ,:userId
        ,:companySiteId
        ,:hardwareType
    );
";

$GLOBALS['Database'][29]['Insert'] = "
    INSERT INTO `Hardware_Member`(
        hardwareId
        ,huntgroupId
    ) VALUES (
        :hardwareId
        ,:huntgroupId
    );
";

$GLOBALS['Database'][30]['Insert'] = "
    INSERT INTO `Access`(
        hardwareId
        ,accessUsername
        ,accessPassword
        ,userId
    ) VALUES (
        :hardwareId
        ,:accessUsername
        ,:accessPassword
        ,:userId
    );
";

$GLOBALS['Database'][31]['Insert'] = "
    INSERT INTO `Access_Member`(
        accessId
        ,huntgroupId
    ) VALUES (
        :accessId
        ,:huntgroupId
    );
";

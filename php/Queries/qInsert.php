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
    );";

$GLOBALS['Database'][1]['Insert'] = "
    INSERT INTO `Group`(
        groupName,
        groupDesc
    ) VALUES (
        :groupName,
        :groupDesc
    );";

$GLOBALS['Database'][2]['Insert'] = "
    INSERT INTO `Group_Member`(
        userId,
        groupId
    ) VALUES (
        :userId,
        :groupId
    );";

$GLOBALS['Database'][3]['Insert'] = "
    INSERT INTO `Company`(
        companyName,
        companyDesc,
        companyOwnerFirstName,
        companyOwnerLastName,
        companyAddressCity,
        companyAddressPostcode,
        companyAddressStreet
    ) VALUES (
        :companyName,
        :companyDesc,
        :companyOwnerFirstName,
        :companyOwnerLastName,
        :companyAddressCity,
        :companyAddressPostcode,
        :companyAddressStreet
    );";

$GLOBALS['Database'][4]['Insert'] = "
    INSERT INTO `Company_Site`(
        companyId,
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
        companySiteType
    ) VALUES (
        :companyId,
        :companySiteName,
        :companySiteDesc,
        :companySiteOwnerFirstName,
        :companySiteOwnerLastName,
        :companySiteOwnerEmail,
        :companySiteOwnerPhone,
        :companySiteSubOwnerFirstName,
        :companySiteSubOwnerLastName,
        :companySiteSubOwnerEmail,
        :companySiteSubOwnerPhone,
        :companySiteAddressCity,
        :companySiteAddressPostcode,
        :companySiteAddressStreet,
        :companySiteEmail,
        :companySitePhone,
        :companySiteType
    );";

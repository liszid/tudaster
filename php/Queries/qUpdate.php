<?php

declare(strict_types=1);

$GLOBALS['Database']['0']['Update'] = array(
    "Profile" => "
        UPDATE
            `User`
        SET
            userFirstName=:userFirstName
            ,userLastName=:userLastName
            ,userContSite=:userContSite
            ,userContPhone=:userContPhone
            ,userThumbnail=:userThumbnail
        WHERE
            userId=:userId",

    "Reset" => "
        UPDATE
            `User`
        SET
            pWord=MD5(userName)
        WHERE
            userId=:userId"
);

$GLOBALS['Database']['1']['Update'] = "
    UPDATE
        `Group`
    SET
        canAdministrative=:canAdministrative
        ,mngGroups=:mngGroups
        ,mngUsers=:mngUsers
        ,mngMembers=:mngMembers
        ,mngTools=:mngTools
        ,canUsers=:canUsers
        ,canCompany=:canCompany
        ,canKnowledge=:canKnowledge
        ,canUsername=:canUsername
        ,canPassword=:canPassword
        ,canHardware=:canHardware
        ,canSoftware=:canSoftware
        ,canEdit=:canEdit
        ,canLogin=:canLogin
    WHERE
        groupId=:groupId";

$GLOBALS['Database']['2']['Update'] = array(
    "byUserId" => "
        UPDATE
            `Group_Member`
        SET
            groupId=:groupId
        WHERE userId=:userId",

    "byGroupMemberId" => "
        UPDATE
            `Group_Member`
        SET
            groupId=:groupId
        WHERE groupMemberId=:groupMemberId"
);

$GLOBALS['Database']['3']['Update'] = "
    UPDATE
        `Company`
    SET
        companyDesc=:companyDesc
        ,companyOwnerFirstName=:companyOwnerFirstName
        ,companyOwnerLastName=:companyOwnerLastName
        ,companyAddressCity=:companyAddressCity
        ,companyAddressPostcode=:companyAddressPostcode
        ,companyAddressStreet=:companyAddressStreet
    WHERE
        companyId=:companyId
        AND userId=:userId";

$GLOBALS['Database']['5']['Update'] = "
    UPDATE
        `Company_Site`
    SET
        companySiteDesc=:companySiteDesc
        ,companySiteOwnerFirstName=:companySiteOwnerFirstName
        ,companySiteOwnerLastName=:companySiteOwnerLastName
        ,companySiteOwnerEmail=:companySiteOwnerEmail
        ,companySiteOwnerPhone=:companySiteOwnerPhone
        ,companySiteSubOwnerFirstName=:companySiteSubOwnerFirstName
        ,companySiteSubOwnerLastName=:companySiteSubOwnerLastName
        ,companySiteSubOwnerEmail=:companySiteSubOwnerEmail
        ,companySiteSubOwnerPhone=:companySiteSubOwnerPhone
        ,companySiteAddressCity=:companySiteAddressCity
        ,companySiteAddressPostcode=:companySiteAddressPostcode
        ,companySiteAddressStreet=:companySiteAddressStreet
        ,companySiteEmail=:companySiteEmail
        ,companySitePhone=:companySitePhone
        ,companySiteTypeId=:companySiteTypeId
    WHERE
        companySiteId=:companySiteId
        AND userId=:userId
";

$GLOBALS['Database']['6']['Update'] = "
    UPDATE
        `Hardware`
    SET
        hardwareName=:hardwareName
        ,hardwareDesc=:hardwareDesc
        ,hardwareSerial=:hardwareSerial
        ,hardwareMAC=:hardwareMAC
        ,hardwareIP=:hardwareIP
        ,hardwareSwitch=:hardwareSwitch
        ,hardwareSwitchPort=:hardwareSwitchPort
        ,hardwareVLANName=:hardwareVLANName
        ,hardwareVLANNum=:hardwareVLANNum
        ,hardwareDateIn=:hardwareDateIn
        ,hardwareDateOut=:hardwareDateOut
        ,companySiteId=:companySiteId
    WHERE
        hardwareId=:hardwareId
        AND userId=:userId
";

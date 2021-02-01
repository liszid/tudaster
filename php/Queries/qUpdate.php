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
        ,mngHuntgroups=:mngHuntgroups
        ,mngTools=:mngTools
        ,canUsers=:canUsers
        ,canCompany=:canCompany
        ,canKnowledge=:canKnowledge
        ,canAccess=:canAccess
        ,canHardware=:canHardware
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
        `Huntgroup`
    SET
        huntgroupName=:huntgroupName
        ,huntgroupDesc=:huntgroupDesc
    WHERE
        huntgroupId=:huntgroupId";

$GLOBALS['Database']['4']['Update'] = array(
    "byUserId" => "
        UPDATE
            `Huntgroup_Member`
        SET
            huntgroupId=:huntgroupId
        WHERE
            userId=:userId",

    "byHuntgroupMemberId" => "
        UPDATE
            `Huntgroup_Member`
        SET
            huntgroupId=:huntgroupId
        WHERE
            huntgroupMemberId=:huntgroupMemberId"
);

$GLOBALS['Database']['10']['Update'] = "
    UPDATE
        `Company`
    SET
        companyName=:companyName
        ,companyDesc=:companyDesc
        ,companyOwnerFirstName=:companyOwnerFirstName
        ,companyOwnerLastName=:companyOwnerLastName
        ,companyAddressCity=:companyAddressCity
        ,companyAddressPostcode=:companyAddressPostcode
        ,companyAddressStreet=:companyAddressStreet
    WHERE
        companyId=:companyId
";

$GLOBALS['Database']['12']['Update'] = "
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
";

$GLOBALS['Database']['20']['Update'] = "
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
        ,hardwareSpecHDD=:hardwareSpecHDD
        ,hardwareSpecMEM=:hardwareSpecMEM
        ,hardwareSpecNetworkPorts=:hardwareSpecNetworkPorts
        ,hardwareSpecOperator=:hardwareSpecOperator
        ,hardwareSpecOS=:hardwareSpecOS
        ,hardwareSpecOSVer=:hardwareSpecOSVer
        ,hardwareSpecPROC=:hardwareSpecPROC
        ,hardwareSpecType=:hardwareSpecType
        ,hardwareSpecToner=:hardwareSpecToner
        ,hardwareSpecUser=:hardwareSpecUser
        ,hardwareSpecUse=:hardwareSpecUse
        ,companySiteId=:companySiteId
    WHERE
        hardwareId=:hardwareId
";

$GLOBALS['Database'][30]['Update'] = "
    UPDATE
        `Access`
    SET
        accessUsername=:accessUsername
        ,accessPassword=:accessPassword
        ,hardwareId=:hardwareId
    WHERE
        accessId=:accessId
";

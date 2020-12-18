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
";

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
";

$GLOBALS['Database'][7]['Update'] = "
    UPDATE
        `Hardware_Laptop`
    SET
        hardwareLaptopUser=:hardwareLaptopUser
        ,hardwareLaptopType=:hardwareLaptopType
        ,hardwareLaptopOS=:hardwareLaptopOS
        ,hardwareLaptopOSVer=:hardwareLaptopOSVer
        ,hardwareLaptopHDD=:hardwareLaptopHDD
        ,hardwareLaptopMEM=:hardwareLaptopMEM
        ,hardwareLaptopPROC=:hardwareLaptopPROC
        ,hardwareLaptopOperator=:hardwareLaptopOperator
    WHERE
        hardwareLaptopId=:hardwareLaptopId
";

$GLOBALS['Database'][8]['Update'] = "
    UPDATE
        `Hardware_PC`
    SET
        hardwarePCUser=:hardwarePCUser
        ,hardwarePCType=:hardwarePCType
        ,hardwarePCUse=:hardwarePCUse
        ,hardwarePCOS=:hardwarePCOS
        ,hardwarePCOSVer=:hardwarePCOSVer
        ,hardwarePCHDD=:hardwarePCHDD
        ,hardwarePCMEM=:hardwarePCMEM
        ,hardwarePCPROC=:hardwarePCPROC
        ,hardwarePCNetworkPorts=:hardwarePCNetworkPorts
        ,hardwarePCOperator=:hardwarePCOperator
    WHERE
        hardwarePCId=:hardwarePCId
";

$GLOBALS['Database'][9]['Update'] = "
    UPDATE
        `Hardware_Printer`
    SET
        hardwarePrinterUse=:hardwarePrinterUse
        ,hardwarePrinterType=:hardwarePrinterType
        ,hardwarePrinterToner=:hardwarePrinterToner
        ,hardwarePrinterOperator=:hardwarePrinterOperator
    WHERE
        hardwarePrinterId=:hardwarePrinterId
";

$GLOBALS['Database'][10]['Update'] = "
    UPDATE
        `Hardware_Networking`
    SET
        hardwareNetworkingType=:hardwareNetworkingType
        ,hardwareNetworkingUse=:hardwareNetworkingUse
        ,hardwareNetworkingOS=:hardwareNetworkingOS
        ,hardwareNetworkingOSVer=:hardwareNetworkingOSVer
        ,hardwareNetworkingNetworkPorts=:hardwareNetworkingNetworkPorts
        ,hardwareNetworkingOperator=:hardwareNetworkingOperator
    WHERE
        hardwareNetworkingId=:hardwareNetworkingId
";

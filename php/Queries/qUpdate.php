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
        ,mngHuntgroups=:mngHuntgroups
        ,mngHGMembers=:mngHGMembers
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

$GLOBALS['Database']['5']['Update'] = "
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

$GLOBALS['Database']['7']['Update'] = "
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

$GLOBALS['Database']['8']['Update'] = "
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

$GLOBALS['Database'][9]['Update'] = "
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

$GLOBALS['Database'][10]['Update'] = "
    UPDATE
        `Hardware_Computer`
    SET
        hardwareComputerUser=:hardwareComputerUser
        ,hardwareComputerType=:hardwareComputerType
        ,hardwareComputerUse=:hardwareComputerUse
        ,hardwareComputerOS=:hardwareComputerOS
        ,hardwareComputerOSVer=:hardwareComputerOSVer
        ,hardwareComputerHDD=:hardwareComputerHDD
        ,hardwareComputerMEM=:hardwareComputerMEM
        ,hardwareComputerPROC=:hardwareComputerPROC
        ,hardwareComputerNetworkPorts=:hardwareComputerNetworkPorts
        ,hardwareComputerOperator=:hardwareComputerOperator
    WHERE
        hardwareComputerId=:hardwareComputerId
";

$GLOBALS['Database'][11]['Update'] = "
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

$GLOBALS['Database'][12]['Update'] = "
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

$GLOBALS['Database'][13]['Update'] = "
    UPDATE
        `Hardware_Server`
    SET
        hardwareServerUser=:hardwareServerUser
        ,hardwareServerType=:hardwareServerType
        ,hardwareServerUse=:hardwareServerUse
        ,hardwareServerOS=:hardwareServerOS
        ,hardwareServerOSVer=:hardwareServerOSVer
        ,hardwareServerHDD=:hardwareServerHDD
        ,hardwareServerMEM=:hardwareServerMEM
        ,hardwareServerPROC=:hardwareServerPROC
        ,hardwareServerNetworkPorts=:hardwareServerNetworkPorts
        ,hardwareServerOperator=:hardwareServerOperator
    WHERE
        hardwareServerId=:hardwareServerId
";

$GLOBALS['Database'][14]['Update'] = "
    UPDATE
        `Hardware_Security`
    SET
        hardwareSecurityType=:hardwareSecurityType
        ,hardwareSecurityUse=:hardwareSecurityUse
        ,hardwareSecurityOS=:hardwareSecurityOS
        ,hardwareSecurityOSVer=:hardwareSecurityOSVer
        ,hardwareSecurityNetworkPorts=:hardwareSecurityNetworkPorts
        ,hardwareSecurityOperator=:hardwareSecurityOperator
    WHERE
        hardwareSecurityId=:hardwareSecurityId
";

$GLOBALS['Database'][15]['Update'] = "
    UPDATE
        `Access`
    SET
        accessUsername=:accessUsername
        ,accessPassword=:accessPassword
        ,hardwareId=:hardwareId
    WHERE
        accessId=:accessId
";

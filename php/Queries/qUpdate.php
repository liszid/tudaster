<?php

declare(strict_types=1);

$GLOBALS['Database']['0']['Update'] = array(
    "Profile" => "
        UPDATE `User` SET
            userFirstName=:userFirstName
            ,userLastName=:userLastName
            ,userContSite=:userContSite
            ,userContPhone=:userContPhone
            ,userThumbnail=:userThumbnail
        WHERE userId=:userId",
    "Reset" => "
        UPDATE `User` SET
            pWord=MD5(userName)
        WHERE userId=:userId"
);

$GLOBALS['Database']['1']['Update'] = "
    UPDATE `Group` SET
        mngGroups=:mngGroups
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
    WHERE groupId=:groupId";

$GLOBALS['Database']['2']['Update'] = array(
    "byUserId" => "
        UPDATE `Group_Member` SET
            groupId=:groupId
        WHERE userId=:userId",
    "byGroupMemberId" => "
        UPDATE `Group_Member` SET
            groupId=:groupId
        WHERE groupMemberId=:groupMemberId"
);

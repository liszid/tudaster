<?php

declare(strict_types=1);

$GLOBALS['Database']['0']['Update'] = array(
    "Profile" => "
        UPDATE `User` SET
            nameFirst=:nameFirst
            ,nameLast=:nameLast
            ,contSite=:contSite
            ,contPhone=:contPhone
            ,thumbnail=:thumbnail
        WHERE userId=:userId",
    "Reset" => "
        UPDATE `User` SET
            pWord=MD5(nameUser)
        WHERE userId=:userId"
);

$GLOBALS['Database']['1']['Update'] = "
    UPDATE `Group` SET
        mngGroups=:mngGroups
        ,mngUsers=:mngUsers
        ,mngMembers=:mngMembers
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

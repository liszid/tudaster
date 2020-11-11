<?php

declare(strict_types=1);

$GLOBALS['Database'][0]['Insert'] = "
    INSERT INTO `User`(userName, pWord,  userContEmail)
    VALUES
	(:userName, :pWord, :userContEmail);";

$GLOBALS['Database'][1]['Insert'] = "
    INSERT INTO `Group`(groupName, groupDesc)
    VALUES
	(:groupName, :groupDesc);";

$GLOBALS['Database'][2]['Insert'] = "
    INSERT INTO `Group_Member`(userId, groupId)
    VALUES
	(:userId, :groupId);";

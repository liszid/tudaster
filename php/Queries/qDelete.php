<?php

declare(strict_types=1);

$GLOBALS['SQL'][0]['Delete'] = "DELETE FROM `User` WHERE userId=:userId";

$GLOBALS['SQL'][1]['Delete'] = "DELETE FROM `Group` WHERE groupId=:groupId";

$GLOBALS['SQL'][2]['Delete'] = "DELETE FROM `Group_Member` WHERE userId=:userId";
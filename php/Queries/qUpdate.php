<?php

declare(strict_types=1);

$GLOBALS['Database']['0']['Update'] = "UPDATE `User` SET nameFirst=:nameFirst ,nameLast=:nameLast ,contSite=:contSite ,contPhone=:contPhone ,thumbnail=:thumbnail WHERE userId=:userId";

$GLOBALS['Database']['1']['Update'] = "UPDATE `Group` SET groupDesc=:groupDesc ,mngGroups=:mngGroups ,mngUsers=:mngUsers ,canUsers=:canUsers ,canKnowledge=:canKnowledge ,canUsername=:canUsername ,canPassword=:canPassword ,canHardware=:canHardware, canSoftware=:canSoftware ,canEdit=:canEdit ,canLogin=:canLogin WHERE groupId=:groupId";

$GLOBALS['Database']['2']['Update'] = "UPDATE `Group_Member` SET groupId=:groupId WHERE userId=:userId";

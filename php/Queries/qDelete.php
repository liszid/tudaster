<?php

declare(strict_types=1);

$GLOBALS['Database'][0]['Delete'] = "DELETE FROM `User` WHERE userId=:userId";

$GLOBALS['Database'][1]['Delete'] = "DELETE FROM `Group` WHERE groupId=:groupId";

$GLOBALS['Database'][2]['Delete'] = "DELETE FROM `Group_Member` WHERE userId=:userId";

$GLOBALS['Database'][3]['Delete'] = "DELETE FROM `Huntgroup` WHERE huntgroupId=:huntgroupId";

$GLOBALS['Database'][4]['Delete'] = "DELETE FROM `Huntgroup_Member` WHERE huntgroupId=:huntgroupId AND userId=:userId";

$GLOBALS['Database'][10]['Delete'] = "DELETE FROM `Company` WHERE companyId=:companyId";

$GLOBALS['Database'][11]['Delete'] = "DELETE FROM `Company_Site_Type` WHERE companySiteTypeId=:companySiteTypeId";

$GLOBALS['Database'][12]['Delete'] = "DELETE FROM `Company_Site` WHERE companySiteId=:companySiteId";

$GLOBALS['Database'][20]['Delete'] = "DELETE FROM `Hardware` WHERE hardwareId=:hardwareId";

$GLOBALS['Database'][29]['Delete'] = "DELETE FROM `Hardware_Member` WHERE huntgroupId=:huntgroupId AND hardwareId=:hardwareId";

$GLOBALS['Database'][30]['Delete'] = "DELETE FROM `Access` WHERE accessId=:accessId";

$GLOBALS['Database'][31]['Delete'] = "DELETE FROM `Access_Member` WHERE huntgroupId=:huntgroupId AND accessId=:accessId";

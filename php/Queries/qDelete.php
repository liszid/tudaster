<?php

declare(strict_types=1);

$GLOBALS['Database'][0]['Delete'] = "DELETE FROM `User` WHERE userId=:userId";

$GLOBALS['Database'][1]['Delete'] = "DELETE FROM `Group` WHERE groupId=:groupId";

$GLOBALS['Database'][2]['Delete'] = "DELETE FROM `Group_Member` WHERE userId=:userId";

$GLOBALS['Database'][3]['Delete'] = "DELETE FROM `Company` WHERE companyId=:companyId";

$GLOBALS['Database'][4]['Delete'] = "DELETE FROM `Company_Site_Type` WHERE companySiteTypeId=:companySiteTypeId";

$GLOBALS['Database'][5]['Delete'] = "DELETE FROM `Company_Site` WHERE companySiteId=:companySiteId";

$GLOBALS['Database'][6]['Delete'] = "DELETE FROM `Hardware` WHERE hardwareId=:hardwareId";

$GLOBALS['Database'][13]['Delete'] = "DELETE FROM `Access` WHERE accessId=:accessId";

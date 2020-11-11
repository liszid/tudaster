<?php

declare(strict_types=1);

namespace Samples\sTables;

interface COMPANY_SITE
{
    const COMPANY_SITE = array(
        "tableId" => "tableHomeUsers",
        "tableRoot" => "Users",
        "data" => array(
            "companySiteId" => array("text" => "Id", "tooltip" => ""),
            "companyName" => array("text" => "Id", "tooltip" => ""),
            "companySiteName" => array("text" => "Id", "tooltip" => ""),
            "companySiteType" => array("text" => "Id", "tooltip" => ""),
            "companySiteAddressCity" => array("text" => "Id", "tooltip" => ""),
            "companySiteAddressPostcode" => array("text" => "Id", "tooltip" => ""),
            "companySiteAddressStreet" => array("text" => "Id", "tooltip" => ""),
            "companySitePhone" => array("text" => "Id", "tooltip" => ""),
            "companySiteEmail" => array("text" => "Id", "tooltip" => "")
        ),
        "button" => array()
    );
}

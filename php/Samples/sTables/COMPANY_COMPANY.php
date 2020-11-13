<?php

declare(strict_types=1);

namespace Samples\sTables;

interface COMPANY_COMPANY
{
    const COMPANY_COMPANY = array(
        "tableId" => "tableHomeUsers",
        "tableRoot" => "Users",
        "data" => array(
            "companyId" => array("text" => "Id", "tooltip" => ""),
            "companyName" => array("text" => "Név", "tooltip" => "Cég neve"),
            "companyDesc" => array("text" => "Leírás", "tooltip" => "Cég leírása"),
            "companyOwnerFirstName" => array("text" => "T. K. Név", "tooltip" => "Cég tulajdonos keresztneve"),
            "companyOwnerLastName" => array("text" => "T. V. Név", "tooltip" => "Cég tulajdonos vezetékneve"),
            "companyAddressCity" => array("text" => "Város", "tooltip" => "Cég központ címe: Város"),
            "companyAddressPostcode" => array("text" => "IRSZ", "tooltip" => "Cég központ címe: Irányítószám"),
            "companyAddressStreet" => array("text" => "Utca", "tooltip" => "Cég központ címe: Utca, házszám")
        ),
        "button" => array(
            array('color' => 'warning', 'fa' => 'pencil', 'action' => 'View'),
            array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit'),
            array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete')
        )
    );
}

<?php

declare(strict_types=1);

namespace Samples\sTables;

interface COMPANY_SITE
{
    const COMPANY_SITE = array(
        "tableId" => "tableCompanySite",
        "tableRoot" => "Company/Site",
        "data" => array(
            "companySiteId" => array("text" => "Id", "tooltip" => ""),
            "companyName" => array("text" => "Cég név", "tooltip" => "Cég neve"),
            "companySiteName" => array("text" => "T.hely név", "tooltip" => "Telephely neve"),
            "companySiteTypeName" => array("text" => "T.hely típus", "tooltip" => "Telephely típusa"),
            "companySiteAddressCity" => array("text" => "Város", "tooltip" => "Telephely címe: Város"),
            "companySiteAddressPostcode" => array("text" => "IRSZ", "tooltip" => "Telephely címe: Irányítószám"),
            "companySiteAddressStreet" => array("text" => "Utca", "tooltip" => "Telephely címe: Utca, házszám"),
            "companySitePhone" => array("text" => "Telefonszám", "tooltip" => "Telephely telefonszáma"),
            "companySiteEmail" => array("text" => "E-mail", "tooltip" => "Telephely e-mail címe")
        ),
        "button" => array(
            array('color' => 'warning', 'fa' => 'th-list', 'action' => 'View'),
            array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit'),
            array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete')
        )
    );
}

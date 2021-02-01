<?php

declare(strict_types=1);

namespace Samples\sTables;

interface COMPANY
{
    const COMPANY_COMPANY = array(
        "tableId" => "tableCompanyCompany"
        ,"tableRoot" => "Company/Company"
        ,"tableRole" => "canCompany"
        ,"data" => array(
            "companyId" => array("text" => "Id", "tooltip" => "")
            ,"companyName" => array("text" => "Név", 'action' => 'Filter')
            ,"companyDesc" => array("text" => "Leírás", "tooltip" => "Cég leírása")
            ,"companyOwnerFirstName" => array("text" => "T. K. Név", "tooltip" => "Cég tulajdonos keresztneve")
            ,"companyOwnerLastName" => array("text" => "T. V. Név", "tooltip" => "Cég tulajdonos vezetékneve")
            ,"companyAddressCity" => array("text" => "Város", "tooltip" => "Cég központ címe: Város")
            ,"companyAddressPostcode" => array("text" => "IRSZ", "tooltip" => "Cég központ címe: Irányítószám")
            ,"companyAddressStreet" => array("text" => "Utca", "tooltip" => "Cég központ címe: Utca, házszám")
        )
        ,"button" => array(
            array('color' => 'warning', 'fa' => 'th-list', 'action' => 'View', 'tooltip' => 'Megtekintés', 'level' => 1)
            ,array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit', 'tooltip' => 'Szerkesztés', 'level' => 3)
            ,array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete', 'tooltip' => 'Törlés', 'level' => 7)
        )
    );

    const COMPANY_SITE = array(
        "tableId" => "tableCompanySite"
        ,"tableRoot" => "Company/Site"
        ,"tableRole" => "canCompany"
        ,"data" => array(
            "companySiteId" => array("text" => "Id", "tooltip" => "")
            ,"companyName" => array("text" => "Cég név", "tooltip" => "Cég neve")
            ,"companySiteName" => array("text" => "T.hely név", "tooltip" => "Telephely neve")
            ,"companySiteTypeName" => array("text" => "T.hely típus", "tooltip" => "Telephely típusa")
            ,"companySiteAddressCity" => array("text" => "Város", "tooltip" => "Telephely címe: Város")
            ,"companySiteAddressPostcode" => array("text" => "IRSZ", "tooltip" => "Telephely címe: Irányítószám")
            ,"companySiteAddressStreet" => array("text" => "Utca", "tooltip" => "Telephely címe: Utca, házszám")
            ,"companySitePhone" => array("text" => "Telefonszám", "tooltip" => "Telephely telefonszáma")
            ,"companySiteEmail" => array("text" => "E-mail", "tooltip" => "Telephely e-mail címe")
        )
        ,"button" => array(
            array('color' => 'warning', 'fa' => 'th-list', 'action' => 'View', 'tooltip' => 'Megtekintés', 'level' => 1)
            ,array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit', 'tooltip' => 'Szerkesztés', 'level' => 3)
            ,array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete', 'tooltip' => 'Törlés', 'level' => 7)
        )
    );

    const COMPANY_SITE_FILTER = array(
        "tableId" => "tableCompanySite"
        ,"tableRoot" => "Company/Site"
        ,"tableRole" => "canCompany"
        ,"data" => array(
            "companySiteId" => array("text" => "Id", "tooltip" => "")
            ,"companySiteName" => array("text" => "Név", "tooltip" => "Telephely neve")
            ,"companySiteTypeName" => array("text" => "Típus", "tooltip" => "Telephely típusa")
        )
        ,"button" => array(
            array('color' => 'warning', 'fa' => 'th-list', 'action' => 'View', 'tooltip' => 'Megtekintés', 'level' => 1)
            ,array('color' => 'warning', 'fa' => 'pencil', 'action' => 'Edit', 'tooltip' => 'Szerkesztés', 'level' => 3)
            ,array('color' => 'danger', 'fa' => 'trash', 'action' => 'Delete', 'tooltip' => 'Törlés', 'level' => 7)
        )
    );
}

<?php

declare(strict_types=1);

namespace Samples\sTranslate;

interface TRANSLATE
{
    const TRANSLATE = array(
	    "Administrative" => array(
	        "navbar" => "Admin"
	        ,"fa" => "pencil-square"
	        ,"title" => "Adminisztráció"
	        ,"help" => "Az Adminisztrativ felulet hasznalatahoz kattintson a kartyara"
	        ,"card" => ""
	    )
        ,"Administrative/Users" => array(
    	    "navbar" => "Felhasználók"
    	    ,"fa" => "user"
    	    ,"title" => "Felhasználók kezelése"
    	    ,"help" => "A Felhasználók kezeléséhez kattintson a menüsorban az 'Admin' gombra és ott válassza a 'Felhasználók' menüpontot"
    	    ,"card" => "Felhasználók szerkesztéséhez kattintson a kártyára"
    	    ,"info" => array(
                'color' => 'success'
                ,'header' => 'Információ'
                ,'addButton' => true
                ,'title' => ''
                ,'content' => '
                    <p>Az új felhasználó alapértelmett jelszava a felhasználói neve, illetve csoportja a 2-es ID-val rendelkezö "Default" csoport</p>
                    <b>Felhasználói jelszó alaphelyzetbe állítása: </b><a class="btn btn-warning btn-sm"><i class="fa fa-undo" aria-hidden="true"></i></a><br />
                    <b>Felhasználói fiók törlése: </b><a class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>'
                )
    	)
    	,"Administrative/Users/Edit" => array(
            "navbar" => "Jogosultsági kör kezelése"
            ,"fa" => "user"
            ,"title" => "Jogosultsági kör kezelése"
            ,"help" => ""
            ,"card" => ""
        )
    	,"Administrative/Users/Reset" => array(
            "navbar" => "Jelszó helyreállítás"
            ,"fa" => "user"
            ,"title" => "Jelszó helyreállítás"
            ,"help" => ""
            ,"card" => ""
        )
        ,"Administrative/Users/Delete" => array(
            "navbar" => "Felhasználó törlése"
            ,"fa" => "user"
            ,"title" => "Felhasználó törlése"
            ,"help" => ""
            ,"card" => ""
        )
        ,"Administrative/Groups" => array(
    	    "navbar" => "Jogosultságok"
    	    ,"fa" => "users"
    	    ,"title" => "Jogosultsági körök kezelése"
    	    ,"help" => "Jogosultságok kezeléséhez kattintson a menüsorban az 'Admin' gombra és ott válassza a 'Csoportok' menüpontot"
    	    ,"card" => "Jogosultságoszerkesztéséhez kattintson a kártyára"
    	    ,"info" => array(
                'color' => 'success'
                ,'header' => 'Információ'
                ,'addButton' => true
                ,'title' => ''
                ,'content' => '
                    <b>cA</b> - Adminisztrativ engedély<br />
                    <b>mU</b> - Felhasználók kezelése<br />
                    <b>mG</b> - Felhasználói jogosultságok kezelése<br />
                    <b>mM</b> - Felhasználói jogosiltsági tagságok szerkesztése<br />
                    <b>mHGG</b> - Felhasználói csoportok kezelése<br />
                    <b>mHGM</b> - Felhasználói csoport tagságok szerkesztése<br />
                    <b>mT</b> - Adminisztratív eszközök kezelése<br />
                    <b>cUs</b> - Regisztráltak megtekintése  <br />
                    <b>cC</b> - Cégek jogosultság <br />
                    <b>cK</b> - Tudáscikkek jogosultság <br />
                    <b>cUn</b> - Hozzáférések alap jogosultság <br />
                    <b>cP</b> - Hozzáférések emelt jogosultság <br />
                    <b>cH</b> - Hardver jogosultság <br />
                    <b>cE</b> - Profil szerkesztés <br />
                    <b>cL</b> - Bejelentkezés <br />
                    <br />
                    <b>Jogosultsági kör szerkesztése: </b><a class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a> <br />
                    <b>Jogosultsági kör törlése: </b><a class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>'
                )
    	)
    	,"Administrative/Groups/Edit" => array(
            "navbar" => "Jogosultsági kör szerkesztése"
            ,"fa" => "users"
            ,"title" => "Jogosultsági kör szerkesztése"
            ,"help" => ""
            ,"card" => ""
        )
        ,"Administrative/Groups/Delete" => array(
            "navbar" => "Jogosultsági kör törlése"
            ,"fa" => "users"
            ,"title" => "Jogosultsági kör törlése"
            ,"help" => ""
            ,"card" => ""
        )
    	,"Administrative/Membership" => array(
    	    "navbar" => "Jogosultsági tagságok"
    	    ,"fa" => "vcard"
    	    ,"title" => "Jogosultsági tagságok kezelése"
    	    ,"help" => "Jogosultsági tagságok kezeléséhez kattintson a menüsorban az 'Admin' gombra és ott válassza a 'Tagságok' menüpontot"
            ,"card" => "Jogosultsági tagságok szerkesztéséhez kattintson a kártyára"
            ,"info" => array(
                'color' => 'success'
                ,'header' => 'Információ'
                ,'title' => ''
                ,'content' => '
                    <b>Jogosultsági tagság szerkesztése: </b><a class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>'
            )
    	)
    	,"Administrative/Membership/Edit" => array(
            "navbar" => "Jogosultság tagság szerkesztése"
            ,"fa" => "vcard"
            ,"title" => "Jogosultság tagság szerkesztése"
            ,"help" => ""
            ,"card" => ""
        )
        ,"Administrative/Membership/Delete" => array(
            "navbar" => "Jogosultság tagság törlése"
            ,"fa" => "vcard"
            ,"title" => "Jogosultság tagság törlése"
            ,"help" => ""
            ,"card" => ""
        )
        ,"Administrative/Huntgroups" => array(
    	    "navbar" => "Csoportok"
    	    ,"fa" => "users"
    	    ,"title" => "Csoportok kezelése"
    	    ,"help" => "Csoportok kezeléséhez kattintson a menüsorban az 'Admin' gombra és ott válassza a 'Csoportok' menüpontot"
    	    ,"card" => "Csoportok szerkesztéséhez kattintson a kártyára"
    	    ,"info" => array(
                'color' => 'success'
                ,'header' => 'Információ'
                ,'addButton' => true
                ,'title' => ''
                ,'content' => ''
                )
    	)
    	,"Administrative/Huntgroups/Edit" => array(
            "navbar" => "Csoport szerkesztése"
            ,"fa" => "users"
            ,"title" => "Csoport szerkesztése"
            ,"help" => ""
            ,"card" => ""
        )
    	,"Administrative/Huntgroups/View" => array(
            "navbar" => "Csoport megtekintése"
            ,"fa" => "users"
            ,"title" => "Csoport megtekintése"
            ,"help" => ""
            ,"card" => ""
        )
        ,"Administrative/Huntgroups/Delete" => array(
            "navbar" => "Csoport törlése"
            ,"fa" => "users"
            ,"title" => "Csoport törlése"
            ,"help" => ""
            ,"card" => ""
        )
    	,"Administrative/Tools" => array(
    	    "navbar" => "Eszközök"
    	    ,"fa" => "wrench"
    	    ,"title" => "Segéd eszközök"
    	    ,"help" => ""
            ,"card" => "Adminisztratív segéd eszközökért kattintson a kártyára"
            ,"info" => array(
                'color' => 'success'
                ,'header' => 'Információ'
                ,'title' => ''
                ,'content' => '
                    <b>Adatbázis törlése: </b> Eldobja az aktuális adatbázist, és újra építi
                '
            )
    	)
    	,"Users" => array(
    	    "navbar" => "Felhasználók"
            ,"fa" => "user"
            ,"title" => "Felhasználók megtekintése"
            ,"help" => "Regisztrált felhasználók megtekintéséhez kattintson a menüsorban a 'Felhasználók' gombra"
            ,"card" => "Regisztrált felhasználók megtekintéséhez kattintson a kártyára"
    	)
        ,"Home" => array(
    	    "navbar" => "Főoldal"
    	    ,"fa" => "home"
    	    ,"title" => "Főoldal"
    	    ,"help" => ""
            ,"card" => ""
    	)
        ,"Knowledge" => array(
    	    "navbar" => "Tudáscikkek"
    	    ,"fa" => "info"
    	    ,"title" => "Tudáscikkek"
    	    ,"help" => "Tudáscikkek olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Tudáscikk' gombra kattintva a menüsávban"
            ,"card" => "Tudáscikkek megtekintéséhez kattintson a kártyára"
    	)
        ,"Accesses" => array(
    	    "navbar" => "Hozzáférések"
    	    ,"fa" => "user-secret"
    	    ,"title" => "Hozzáférési adatok"
    	    ,"help" => "Hozzáférési adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hozzáférés' gombra kattintva a menüsávban"
            ,"card" => "Hozzáférési adatok megtekintéséhez kattintson a kártyára"
    	)
    	,"Accesses/Access" => array(
    	    "navbar" => "Hozzáférések"
    	    ,"fa" => "user-secret"
    	    ,"title" => "Hozzáférési adatok"
    	    ,"help" => "Hozzáférési adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hozzáférés' gombra kattintva a menüsávban"
            ,"card" => "Hozzáférési adatok megtekintéséhez kattintson a kártyára"
            ,"info" => array(
                'addButton' => true
                ,'title' => ''
                ,'content' => ''
            )
    	)
    	,"Accesses/Access/Add" => array(
            "navbar" => "Hozzáférések hozzáadása"
    	    ,"fa" => "user-secret"
    	    ,"title" => "Hozzáférési adatok hozzáadása"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Accesses/Access/Edit" => array(
            "navbar" => "Hozzáférések szerkesztése"
    	    ,"fa" => "user-secret"
    	    ,"title" => "Hozzáférési adatok szerkesztése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Accesses/Access/View" => array(
            "navbar" => "Hozzáférések megtekintése"
    	    ,"fa" => "user-secret"
    	    ,"title" => "Hozzáférési adatok megtekintése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Accesses/Access/Delete" => array(
            "navbar" => "Hozzáférések törlése"
    	    ,"fa" => "user-secret"
    	    ,"title" => "Hozzáférési adatok törlése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware" => array(
    	    "navbar" => "Hardverek"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Hardver adatok"
    	    ,"help" => "Hardver adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hardver' gombra kattintva a menüsávban"
            ,"card" => "Hardver adatok megtekintéséhez kattintson a kártyára"
    	)
    	,"Hardware/Hardware" => array(
    	    "navbar" => "Minden eszköz"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Minden eszköz adata"
    	    ,"help" => "Minden eszköz adatának olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hardver' gombra kattintva a menüsávban"
            ,"card" => "Minden eszköz adatának megtekintéséhez kattintson a kártyára"
    	)
    	,"Hardware/Laptop" => array(
    	    "navbar" => "Laptopok"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Laptop adatok"
    	    ,"help" => "Laptop adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hardver' gombra kattintva a menüsávban"
            ,"card" => "Laptop adatok megtekintéséhez kattintson a kártyára"
            ,"info" => array(
                'addButton' => true
                ,'title' => ''
                ,'content' => ''
            )
    	)
    	,"Hardware/Laptop/Add" => array(
            "navbar" => "Laptopok hozzáadása"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Laptop adatok hozzáadása"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Laptop/Edit" => array(
            "navbar" => "Laptopok szerkesztése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Laptop adatok szerkesztése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Laptop/View" => array(
            "navbar" => "Laptopok megtekintése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Laptop adatok megtekintése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Laptop/Delete" => array(
            "navbar" => "Laptopok törlése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Laptop adatok törlése"
    	    ,"help" => ""
            ,"card" => ""
        )
    	,"Hardware/Computer" => array(
    	    "navbar" => "Számítógépek"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Számítógép adatok"
    	    ,"help" => "Számítógép adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hardver' gombra kattintva a menüsávban"
            ,"card" => "Számítógép adatok megtekintéséhez kattintson a kártyára"
            ,"info" => array(
                'addButton' => true
                ,'title' => ''
                ,'content' => ''
            )
    	)
    	,"Hardware/Computer/Add" => array(
            "navbar" => "Számítógépek hozzáadása"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Számítógép adatok hozzáadása"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Computer/Edit" => array(
            "navbar" => "Számítógépek szerkesztése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Számítógép adatok szerkesztése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Computer/View" => array(
            "navbar" => "Számítógépek megtekintése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Számítógép adatok megtekintése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Computer/Delete" => array(
            "navbar" => "Számítógépek törlése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Számítógép adatok törlése"
    	    ,"help" => ""
            ,"card" => ""
        )
    	,"Hardware/Server" => array(
    	    "navbar" => "Szerverek"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Szerver adatok"
    	    ,"help" => "Szerver adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hardver' gombra kattintva a menüsávban"
            ,"card" => "Szerver adatok megtekintéséhez kattintson a kártyára"
            ,"info" => array(
                'addButton' => true
                ,'title' => ''
                ,'content' => ''
            )
    	)
    	,"Hardware/Server/Add" => array(
            "navbar" => "Szerverek hozzáadása"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Szerver adatok hozzáadása"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Server/Edit" => array(
            "navbar" => "Szerverek szerkesztése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Szerver adatok szerkesztése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Server/View" => array(
            "navbar" => "Szerverek megtekintése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Szerver adatok megtekintése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Server/Delete" => array(
            "navbar" => "Szerverek törlése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Szerver adatok törlése"
    	    ,"help" => ""
            ,"card" => ""
        )
    	,"Hardware/Security" => array(
    	    "navbar" => "Vagyonvédelmi eszközök"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Vagyonvédelmi eszköz adatok"
    	    ,"help" => "Vagyonvédelmi eszköz adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hardver' gombra kattintva a menüsávban"
            ,"card" => "Vagyonvédelmi eszköz adatok megtekintéséhez kattintson a kártyára"
            ,"info" => array(
                'addButton' => true
                ,'title' => ''
                ,'content' => ''
            )
    	)
    	,"Hardware/Security/Add" => array(
            "navbar" => "Vagyonvédelmi eszközök hozzáadása"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Vagyonvédelmi eszköz adatok hozzáadása"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Security/Edit" => array(
            "navbar" => "Vagyonvédelmi eszközök szerkesztése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Vagyonvédelmi eszköz adatok szerkesztése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Security/View" => array(
            "navbar" => "Vagyonvédelmi eszközök megtekintése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Vagyonvédelmi eszköz adatok megtekintése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Security/Delete" => array(
            "navbar" => "Vagyonvédelmi eszközök törlése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Vagyonvédelmi eszköz adatok törlése"
    	    ,"help" => ""
            ,"card" => ""
        )
    	,"Hardware/Printer" => array(
    	    "navbar" => "Nyomtatók"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Nyomtató adatok"
    	    ,"help" => "Nyomtató adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hardver' gombra kattintva a menüsávban"
            ,"card" => "Nyomtató adatok megtekintéséhez kattintson a kártyára"
            ,"info" => array(
                'addButton' => true
                ,'title' => ''
                ,'content' => ''
            )
    	)
    	,"Hardware/Printer/Add" => array(
            "navbar" => "Nyomtatók hozzáadása"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Nyomtató adatok hozzáadása"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Printer/Edit" => array(
            "navbar" => "Nyomtatók szerkesztése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Nyomtató adatok szerkesztése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Printer/View" => array(
            "navbar" => "Nyomtatók megtekintése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Nyomtató adatok megtekintése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Printer/Delete" => array(
            "navbar" => "Nyomtatók törlése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Nyomtató adatok törlése"
    	    ,"help" => ""
            ,"card" => ""
        )
    	,"Hardware/Networking" => array(
    	    "navbar" => "Hálózati eszközök"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Hálózati eszköz adatok"
    	    ,"help" => "Hálózati eszköz adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hardver' gombra kattintva a menüsávban"
            ,"card" => "Hálózati eszköz adatok megtekintéséhez kattintson a kártyára"
            ,"info" => array(
                'addButton' => true
                ,'title' => ''
                ,'content' => ''
            )
    	)
    	,"Hardware/Networking/Add" => array(
            "navbar" => "Hálózati eszközök hozzáadása"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Hálózati eszköz adatok hozzáadása"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Networking/Edit" => array(
            "navbar" => "Hálózati eszközök szerkesztése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Hálózati eszköz adatok szerkesztése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Networking/View" => array(
            "navbar" => "Hálózati eszközök megtekintése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Hálózati eszköz adatok megtekintése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Hardware/Networking/Delete" => array(
            "navbar" => "Hálózati eszközök törlése"
    	    ,"fa" => "hdd-o"
    	    ,"title" => "Hálózati eszköz adatok törlése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Company" => array(
    	    "navbar" => "Ügyfelek"
    	    ,"fa" => "building-o"
    	    ,"title" => "Ügyfél adatok"
    	    ,"help" => "Ügyfekkel kapcsolatos adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Cégek' gombra kattintva a menüsávban"
            ,"card" => "Ügyfekkel kapcsolatos adatok megtekintéséhez kattintson a kártyára"
    	)
    	,"Company/Company" => array(
    	    "navbar" => "Cég"
    	    ,"fa" => "building-o"
    	    ,"title" => "Cég adatok"
    	    ,"help" => "Céges adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Cégek' gombra kattintva a menüsávban"
            ,"card" => "Céges adatok megtekintéséhez kattintson a kártyára"
            ,"info" => array(
                'color' => 'success'
                ,'header' => 'Információ'
                ,'addButton' => true
                ,'title' => ''
                ,'content' => '
                    <b>T. K. Név:</b> Cég tulajdonos keresztneve<br />
                    <b>T. V. Név:</b> Cég tulajdonos vezetékneve<br />
                    <b>Város:</b> Cég központ címe: Város<br />
                    <b>IRSZ:</b> Cég központ címe: Irányítószám<br />
                    <b>Utca:</b> Cég központ címe: Utca, házszám<br />
                    <b>Adatok megtekintése:</b> <a class="btn btn-warning btn-sm"><i class="fa fa-th-list" aria-hidden="true"></i></a><br />
                    <b>Cég szerkesztése:</b> <a class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a><br />
                    <b>Eltávolítás:</b> <a class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a><br />
                '
            )
    	)
    	,"Company/Company/Filter" => array(
            "navbar" => "Cég szűrése"
    	    ,"fa" => "building-o"
    	    ,"title" => "Cég adatok szűrése"
    	    ,"help" => ""
            ,"card" => ""
        )
    	,"Company/Company/Add" => array(
            "navbar" => "Cég hozzáadása"
    	    ,"fa" => "building-o"
    	    ,"title" => "Cég adatok hozzáadása"
    	    ,"help" => ""
            ,"card" => ""
        )
    	,"Company/Company/Edit" => array(
            "navbar" => "Cég szerkesztése"
    	    ,"fa" => "building-o"
    	    ,"title" => "Cég adatok szerkesztése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Company/Company/View" => array(
            "navbar" => "Cég megtekintése"
    	    ,"fa" => "building-o"
    	    ,"title" => "Cég adatok megtekintése"
    	    ,"help" => ""
            ,"card" => ""
        )
    	,"Company/Company/Delete" => array(
            "navbar" => "Cég törlése"
    	    ,"fa" => "building-o"
    	    ,"title" => "Cég adatok törlése"
    	    ,"help" => ""
            ,"card" => ""
        )
    	,"Company/Site" => array(
    	    "navbar" => "Telephely"
    	    ,"fa" => "building-o"
    	    ,"title" => "Telephely adatok"
    	    ,"help" => "Céges telephely adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Cégek' gombra kattintva a menüsávban"
            ,"card" => "Céges telephely adatok megtekintéséhez kattintson a kártyára"
            ,"info" => array(
                'color' => 'success'
                ,'header' => 'Információ'
                ,'addButton' => true
                ,'title' => ''
                ,'content' => '
                    <b>T.hely név:</b> Telephely neve<br />
                    <b>T.hely típus:</b> Telephely típusa<br />
                    <b>Város: Telephely címe:</b> Város<br />
                    <b>IRSZ: Telephely címe:</b> Irányítószám<br />
                    <b>Utca: Telephely címe:</b> Utca, házszám<br />
                    <b>Telefonszám:</b> Telephely telefonszáma<br />
                    <b>E-mail:</b> Telephely e-mail címe<br />
                    <b>Adatok megtekintése:</b> <a class="btn btn-warning btn-sm"><i class="fa fa-th-list" aria-hidden="true"></i></a><br />
                    <b>Telephely szerkesztése:</b> <a class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a><br />
                    <b>Eltávolítás:</b> <a class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a><br />
                '
            )
    	)
    	,"Company/Site/Add" => array(
            "navbar" => "Telephely hozzáadása"
    	    ,"fa" => "building-o"
    	    ,"title" => "Telephely adatok hozzáadása"
    	    ,"help" => ""
            ,"card" => ""
        )
    	,"Company/Site/Edit" => array(
            "navbar" => "Telephely szerkesztése"
    	    ,"fa" => "building-o"
    	    ,"title" => "Telephely adatok szerkesztése"
    	    ,"help" => ""
            ,"card" => ""
        )
        ,"Company/Site/View" => array(
            "navbar" => "Telephely megtekintése"
    	    ,"fa" => "building-o"
    	    ,"title" => "Telephely adatok megtekintése"
    	    ,"help" => ""
            ,"card" => ""
        ),
    	"Company/Site/Delete" => array(
            "navbar" => "Telephely törlése"
    	    ,"fa" => "building-o"
    	    ,"title" => "Telephely adatok törlése"
    	    ,"help" => ""
            ,"card" => ""
        )
    	,"Login" => array(
    	    "navbar" => "Bejelentkezés"
    	    ,"fa" => "sign-in"
    	    ,"title" => "Bejelentkezés"
    	    ,"help" => ""
            ,"card" => ""
    	)
    	,"Logout" => array(
    	    "navbar" => "Kijelentkezés"
            ,"fa" => "sign-out"
            ,"title" => "Kijelentkezés"
            ,"help" => ""
            ,"card" => ""
    	)
    	,"Profile" => array(
    	    "navbar" => "Profil"
    	    ,"fa" => "user"
    	    ,"title" => "Profil"
    	    ,"help" => "Profilja szerkesztéséhez kattintson a menüsávban a 'Profil' gombra és a 'Profil' oldalon a 'Szerkesztés' gombra"
            ,"card" => "Profilja szerkesztéséhez kattintson a menüsávban a 'Profil' gombra és a 'Profil' oldalon a 'Szerkesztés' gombra"
    	)
    );
}

<?php

declare(strict_types=1);

namespace Samples\sTranslate;

interface TRANSLATE
{
    const TRANSLATE = array(
	    "Administrative" => array(
	        "navbar" => "Admin",
	        "fa" => "pencil-square",
	        "title" => "Adminisztráció",
	        "help" => "Az Adminisztrativ felulet hasznalatahoz kattintson a kartyara",
	        "card" => ""
	    ),
        "Administrative/Users" => array(
    	    "navbar" => "Felhasználók",
    	    "fa" => "user",
    	    "title" => "Felhasználók kezelése",
    	    "help" => "A Felhasználók kezeléséhez kattintson a menüsorban az 'Admin' gombra és ott válassza a 'Felhasználók' menüpontot",
    	    "card" => "Felhasználók szerkesztéséhez kattintson a kártyára",
    	    "info" => array(
                'color' => 'success',
                'header' => 'Információ',
                'addButton' => true,
                'title' => '',
                'content' => '
                    <p>Az új felhasználó alapértelmett jelszava a felhasználói neve, illetve csoportja a 2-es ID-val rendelkezö "Default" csoport</p>
                    <b>Felhasználói jelszó alaphelyzetbe állítása: </b><a class="btn btn-warning btn-sm"><i class="fa fa-undo" aria-hidden="true"></i></a><br />
                    <b>Felhasználói fiók törlése: </b><a class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>'
                )
    	),
    	"Administrative/Users/Reset" => array(
            "navbar" => "Jelszó helyreállítás",
            "fa" => "user",
            "title" => "Jelszó helyreállítás",
            "help" => "",
            "card" => ""
        ),
        "Administrative/Users/Delete" => array(
            "navbar" => "Felhasználó törlése",
            "fa" => "user",
            "title" => "Felhasználó törlése",
            "help" => "",
            "card" => ""
        ),
        "Administrative/Groups" => array(
    	    "navbar" => "Csoportok",
    	    "fa" => "users",
    	    "title" => "Csoportok kezelése",
    	    "help" => "A Csoportok kezeléséhez kattintson a menüsorban az 'Admin' gombra és ott válassza a 'Csoportok' menüpontot",
    	    "card" => "Csoportok szerkesztéséhez kattintson a kártyára",
    	    "info" => array(
                'color' => 'success',
                'header' => 'Információ',
                'addButton' => true,
                'title' => '',
                'content' => '
                    <b>cA</b> - Adminisztrativ engedély<br />
                    <b>mG</b> - Felhasználói csoportok kezelése<br />
                    <b>mU</b> - Felhasználók kezelése<br />
                    <b>mM</b> - Felhasználói csoport tagságok szerkesztése<br />
                    <b>mT</b> - Adminisztratív eszközök kezelése<br />
                    <b>cUs</b> - Regisztráltak megtekintése  <br />
                    <b>cC</b> - Cégek jogosultság <br />
                    <b>cK</b> - Tudáscikkek jogosultság <br />
                    <b>cUn</b> - Hozzáférések alap jogosultság <br />
                    <b>cP</b> - Hozzáférések emelt jogosultság <br />
                    <b>cH</b> - Hardver jogosultság <br />
                    <b>cS</b> - Szoftver jogosultság <br />
                    <b>cE</b> - Profil szerkesztés <br />
                    <b>cL</b> - Bejelentkezés <br />
                    <br />
                    <b>Csoport szerkesztése: </b><a class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a> <br />
                    <b>Csoport törlése: </b><a class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>'
                )
    	),
    	"Administrative/Groups/Edit" => array(
            "navbar" => "Csoport szerkesztése",
            "fa" => "users",
            "title" => "Csoport szerkesztése",
            "help" => "",
            "card" => ""
        ),
        "Administrative/Groups/Delete" => array(
            "navbar" => "Csoport törlése",
            "fa" => "users",
            "title" => "Csoport törlése",
            "help" => "",
            "card" => ""
        ),
    	"Administrative/Membership" => array(
    	    "navbar" => "Tagságok",
    	    "fa" => "vcard",
    	    "title" => "Csoport tagságok kezelése",
    	    "help" => "A Csoport tagságok kezeléséhez kattintson a menüsorban az 'Admin' gombra és ott válassza a 'Tagságok' menüpontot",
            "card" => "Csoport tagságok szerkesztéséhez kattintson a kártyára",
            "info" => array(
                'color' => 'success',
                'header' => 'Információ',
                'title' => '',
                'content' => '
                    <b>Csoport tagság szerkesztése: </b><a class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>'
            )
    	),
    	"Administrative/Membership/Edit" => array(
            "navbar" => "Tagság szerkesztése",
            "fa" => "vcard",
            "title" => "Csoporttagság szerkesztése",
            "help" => "",
            "card" => ""
        ),
        "Administrative/Membership/Delete" => array(
            "navbar" => "Tagság törlése",
            "fa" => "vcard",
            "title" => "Csoporttagság törlése",
            "help" => "",
            "card" => ""
        ),
    	"Administrative/Tools" => array(
    	    "navbar" => "Eszközök",
    	    "fa" => "wrench",
    	    "title" => "Segéd eszközök",
    	    "help" => "",
            "card" => "Adminisztratív segéd eszközökért kattintson a kártyára",
            "info" => array(
                'color' => 'success',
                'header' => 'Információ',
                'title' => '',
                'content' => '
                    <b>Adatbázis törlése: </b> Eldobja az aktuális adatbázist, és újra építi
                '
            )
    	),
    	"Users" => array(
    	    "navbar" => "Felhasználók",
            "fa" => "user",
            "title" => "Felhasználók megtekintése",
            "help" => "Regisztrált felhasználók megtekintéséhez kattintson a menüsorban a 'Felhasználók' gombra",
            "card" => "Regisztrált felhasználók megtekintéséhez kattintson a kártyára"
    	),
        "Home" => array(
    	    "navbar" => "Főoldal",
    	    "fa" => "home",
    	    "title" => "Főoldal",
    	    "help" => "",
            "card" => ""
    	),
        "Knowledge" => array(
    	    "navbar" => "Tudáscikkek",
    	    "fa" => "info",
    	    "title" => "Tudáscikkek",
    	    "help" => "Tudáscikkek olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Tudáscikk' gombra kattintva a menüsávban",
            "card" => "Tudáscikkek megtekintéséhez kattintson a kártyára"
    	),
        "Accesses" => array(
    	    "navbar" => "Hozzáférések",
    	    "fa" => "user-secret",
    	    "title" => "Hozzáférési adatok",
    	    "help" => "Hozzáférési adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hozzáférés' gombra kattintva a menüsávban",
            "card" => "Hozzáférési adatok megtekintéséhez kattintson a kártyára"
    	),
        "Hardware" => array(
    	    "navbar" => "Hardverek",
    	    "fa" => "hdd-o",
    	    "title" => "Hardver adatok",
    	    "help" => "Hardver adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hardver' gombra kattintva a menüsávban",
            "card" => "Hardver adatok megtekintéséhez kattintson a kártyára"
    	),
    	"Hardware/Laptop" => array(
    	    "navbar" => "Laptopok",
    	    "fa" => "hdd-o",
    	    "title" => "Laptop adatok",
    	    "help" => "Laptop adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hardver' gombra kattintva a menüsávban",
            "card" => "Laptop adatok megtekintéséhez kattintson a kártyára"
    	),
    	"Hardware/PC" => array(
    	    "navbar" => "Számítógépek/Szerverek",
    	    "fa" => "hdd-o",
    	    "title" => "Számítógép/Szerver adatok",
    	    "help" => "Számítógép/Szerver adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hardver' gombra kattintva a menüsávban",
            "card" => "Számítógép/Szerver adatok megtekintéséhez kattintson a kártyára"
    	),
    	"Hardware/Printer" => array(
    	    "navbar" => "Nyomtatók",
    	    "fa" => "hdd-o",
    	    "title" => "Nyomtató adatok",
    	    "help" => "Nyomtató adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hardver' gombra kattintva a menüsávban",
            "card" => "Nyomtató adatok megtekintéséhez kattintson a kártyára"
    	),
    	"Hardware/Networking" => array(
    	    "navbar" => "Hálózati eszközök",
    	    "fa" => "hdd-o",
    	    "title" => "Hálózati eszköz adatok",
    	    "help" => "Hálózati eszköz adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hardver' gombra kattintva a menüsávban",
            "card" => "Hálózati eszköz adatok megtekintéséhez kattintson a kártyára"
    	),
        "Software" => array(
    	    "navbar" => "Szoftverek",
    	    "fa" => "file-o",
    	    "title" => "Szoftver adatok",
    	    "help" => "Szoftver olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Szoftver' gombra kattintva a menüsávban",
            "card" => "Szoftver adatok megtekintéséhez kattintson a kártyára"
    	),
        "Company" => array(
    	    "navbar" => "Ügyfelek",
    	    "fa" => "building-o",
    	    "title" => "Ügyfél adatok",
    	    "help" => "Ügyfekkel kapcsolatos adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Cégek' gombra kattintva a menüsávban",
            "card" => "Ügyfekkel kapcsolatos adatok megtekintéséhez kattintson a kártyára"
    	),
    	"Company/Company" => array(
    	    "navbar" => "Cég",
    	    "fa" => "building-o",
    	    "title" => "Cég adatok",
    	    "help" => "Céges adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Cégek' gombra kattintva a menüsávban",
            "card" => "Céges adatok megtekintéséhez kattintson a kártyára",
            "info" => array(
                'color' => 'success',
                'header' => 'Információ',
                'addButton' => true,
                'title' => '',
                'content' => '
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
    	),
    	"Company/Company/Filter" => array(
            "navbar" => "Cég szűrése",
    	    "fa" => "building-o",
    	    "title" => "Cég adatok szűrése",
    	    "help" => "",
            "card" => ""
        ),
    	"Company/Company/Add" => array(
            "navbar" => "Cég hozzáadása",
    	    "fa" => "building-o",
    	    "title" => "Cég adatok hozzáadása",
    	    "help" => "",
            "card" => ""
        ),
    	"Company/Company/Edit" => array(
            "navbar" => "Cég szerkesztése",
    	    "fa" => "building-o",
    	    "title" => "Cég adatok szerkesztése",
    	    "help" => "",
            "card" => ""
        ),
        "Company/Company/View" => array(
            "navbar" => "Cég megtekintése",
    	    "fa" => "building-o",
    	    "title" => "Cég adatok megtekintése",
    	    "help" => "",
            "card" => ""
        ),
    	"Company/Company/Delete" => array(
            "navbar" => "Cég törlése",
    	    "fa" => "building-o",
    	    "title" => "Cég adatok törlése",
    	    "help" => "",
            "card" => ""
        ),
    	"Company/Site" => array(
    	    "navbar" => "Telephely",
    	    "fa" => "building-o",
    	    "title" => "Telephely adatok",
    	    "help" => "Céges telephely adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Cégek' gombra kattintva a menüsávban",
            "card" => "Céges telephely adatok megtekintéséhez kattintson a kártyára",
            "info" => array(
                'color' => 'success',
                'header' => 'Információ',
                'addButton' => true,
                'title' => '',
                'content' => '
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
    	),
    	"Company/Site/Add" => array(
            "navbar" => "Telephely hozzáadása",
    	    "fa" => "building-o",
    	    "title" => "Telephely adatok hozzáadása",
    	    "help" => "",
            "card" => ""
        ),
    	"Company/Site/Edit" => array(
            "navbar" => "Telephely szerkesztése",
    	    "fa" => "building-o",
    	    "title" => "Telephely adatok szerkesztése",
    	    "help" => "",
            "card" => ""
        ),
        "Company/Site/View" => array(
            "navbar" => "Telephely megtekintése",
    	    "fa" => "building-o",
    	    "title" => "Telephely adatok megtekintése",
    	    "help" => "",
            "card" => ""
        ),
    	"Company/Site/Delete" => array(
            "navbar" => "Telephely törlése",
    	    "fa" => "building-o",
    	    "title" => "Telephely adatok törlése",
    	    "help" => "",
            "card" => ""
        ),
    	"Login" => array(
    	    "navbar" => "Bejelentkezés",
    	    "fa" => "sign-in",
    	    "title" => "Bejelentkezés",
    	    "help" => "",
            "card" => ""
    	),
    	"Logout" => array(
    	    "navbar" => "Kijelentkezés",
            "fa" => "sign-out",
            "title" => "Kijelentkezés",
            "help" => "",
            "card" => ""
    	),
    	"Profile" => array(
    	    "navbar" => "Profil",
    	    "fa" => "user",
    	    "title" => "Profil",
    	    "help" => "Profilja szerkesztéséhez kattintson a menüsávban a 'Profil' gombra és a 'Profil' oldalon a 'Szerkesztés' gombra",
            "card" => "Profilja szerkesztéséhez kattintson a menüsávban a 'Profil' gombra és a 'Profil' oldalon a 'Szerkesztés' gombra"
    	)
    );
}

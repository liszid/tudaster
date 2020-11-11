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
    	    "title" => "Felhasználók",
    	    "help" => "A Felhasználók kezeléséhez kattintson a menüsorban az 'Admin' gombra és ott válassza a 'Felhasználók' menüpontot",
    	    "card" => "Felhasználók szerkesztéséhez kattintson a kártyára",
    	    "info" => array(
                'color' => 'success',
                'header' => 'Információ',
                'addButton' => true,
                'title' => '',
                'text' => '
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
    	    "title" => "Csoportok",
    	    "help" => "A Csoportok kezeléséhez kattintson a menüsorban az 'Admin' gombra és ott válassza a 'Csoportok' menüpontot",
    	    "card" => "Csoportok szerkesztéséhez kattintson a kártyára",
    	    "info" => array(
                'color' => 'success',
                'header' => 'Információ',
                'addButton' => true,
                'title' => '',
                'text' => '
                    <b>mG</b> - Csoportok kezelése <br />
                    <b>mU</b> - Felhasználók kezelése <br />
                    <b>mM</b> - Csoport tagságok szerkesztése<br />
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
    	    "title" => "Csoport tagságok",
    	    "help" => "A Csoport tagságok kezeléséhez kattintson a menüsorban az 'Admin' gombra és ott válassza a 'Tagságok' menüpontot",
            "card" => "Csoport tagságok szerkesztéséhez kattintson a kártyára",
            "info" => array(
                'color' => 'success',
                'header' => 'Információ',
                'title' => '',
                'text' => '
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
                'text' => '
                    <b>Adatbázis törlése: </b> Eldobja az aktuális adatbázist, és újra építi
                '
            )
    	),
    	"Users" => array(
    	    "navbar" => "Felhasználók",
            "fa" => "user",
            "title" => "Felhasználók",
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
            "card" => "Céges adatok megtekintéséhez kattintson a kártyára"
    	),
    	"Company/Sites" => array(
    	    "navbar" => "Telephely",
    	    "fa" => "building-o",
    	    "title" => "Cég adatok",
    	    "help" => "Céges telephely adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Cégek' gombra kattintva a menüsávban",
            "card" => "Céges telephely adatok megtekintéséhez kattintson a kártyára"
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

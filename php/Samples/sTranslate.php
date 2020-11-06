<?php

declare(strict_types=1);

namespace Samples;

use PreLoad\{
    Valid,
    Check,
    Log
};

class sTranslate {
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
    	    "navbar" => "Cégek",
    	    "fa" => "building-o",
    	    "title" => "Cég adatok",
    	    "help" => "Céges adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Cégek' gombra kattintva a menüsávban",
            "card" => "Céges adatok megtekintéséhez kattintson a kártyára"
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

    const ROLE = array(
        'mngUsers' => array(
    	    'color' => 'success',
    	    'header' => 'Elérhető funkció',
    	    'respective' => 'Administrative/Users',
    	    'short' => 'mG',
    	    'desc' => 'Csoportok kezelése'
    	),
        'mngGroups' => array(
    	    'color' => 'info',
    	    'header' => 'Fejlesztés alatt álló funkció',
    	    'respective' => 'Administrative/Groups',
    	    'short' => 'mU',
    	    'desc' => 'Felhasználók kezelése'
    	),
        'mngMembers' => array(
    	    'color' => 'success',
    	    'header' => 'Elérhető funkció',
    	    'respective' => 'Administrative/Membership',
    	    'short' => 'mM',
    	    'desc' => 'Csoport tagságok szerkesztése'
    	),
        'canEdit' => array(
    	    'color' => 'success',
    	    'header' => 'Elérhető funkció',
    	    'respective' => 'Profile',
    	    'short' => 'cE',
    	    'desc' => 'Profil szerkesztés'
    	),
        'canUsers' => array(
    	    'color' => 'success',
    	    'header' => 'Elérhető funkció',
    	    'respective' => 'Users',
    	    'short' => 'cUs',
    	    'desc' => 'Regisztráltak megtekintése'
    	),
        'canKnowledge' => array(
    	    'color' => 'secondary',
    	    'header' => 'Jövendőbeli funkció',
    	    'respective' => 'Knowledge',
    	    'short' => 'cK',
    	    'desc' => 'Tudáscikkek jogosultság'
    	),
        'canUsername' => array(
    	    'color' => 'secondary',
    	    'header' => 'Jövendőbeli funkció',
    	    'respective' => 'Accesses',
    	    'short' => 'cUn',
    	    'desc' => 'Hozzáférések alap jogosultság'
        ),
        'canPassword' => array(
    	    'color' => 'secondary',
    	    'header' => 'Jövendőbeli funkció',
    	    'respective' => 'Accesses',
    	    'short' => 'cP',
    	    'desc' => 'Hozzáférések emelt jogosultság'
    	),
        'canHardware' => array(
    	    'color' => 'secondary',
    	    'header' => 'Jövendőbeli funkció',
    	    'respective' => 'Hardware',
    	    'short' => 'cH',
    	    'desc' => 'Hardver jogosultság'
    	),
        'canSoftware' => array(
    	    'color' => 'secondary',
    	    'header' => 'Jövendőbeli funkció',
    	    'respective' => 'Software',
    	    'short' => 'cS',
    	    'desc' => 'Szoftver jogosultság'
    	),
        'canCompany' => array(
    	    'color' => 'secondary',
    	    'header' => 'Jövendőbeli funkció',
    	    'respective' => 'Company',
    	    'short' => 'cC',
    	    'desc' => 'Cégek jogosultság'
    	)
    );

    const ACTION = array(
        'Success' => array(
            'content' => 'Sikeres müvelet!'
        ),
        'Fail' => array(
            'content' => 'Sikertelen müvelet!'
        )
    );

/*
 * Prompts respective name from array[type]
 * @param $string string
 * @param $type string
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.26
 */
    public static function Prompt(string $string, string $type = 'navbar'): string
    {
        if (array_key_exists($string, self::TRANSLATE)) {
    	    return  self::TRANSLATE[$string][$type];
    	} else {
    	    return 'Ismeretlen kifejezés';
    	}
    }

/*
 * Returns the info array of the key if exists
 * @param $string string
 * @return array
 * @author Liszi Dániel
 * @since 2020.10.26
 */
    public static function Info(string $string): array
    {
        if (array_key_exists($string, self::TRANSLATE)) {
            if(isset(self::TRANSLATE[$string]['info'])) {
                $array = self::TRANSLATE[$string]['info'];
                $array['path'] = $string;
                return  $array;
    	    } else {
                return array();
    	    }
    	} else {
    	    return array();
    	}
    }

/*
 * Returns a HTML Title on set size
 * @param $array array
 * @param $size int
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Title(string $string, int $size = 1): string
    {
	    if (array_key_exists($string, self::TRANSLATE)) {
	        return '<h'.$size.'><i class="fa fa-'.self::TRANSLATE[$string]['fa'].'" aria-hidden="true"></i> '.self::TRANSLATE[$string]['title'].'</h'.$size.'>';
	    } else {
	        return '<h'.$size.'><i class="fa fa-question" aria-hidden="true"></i> Ismeretlen</h'.$size.'>';
	    }
    }
}

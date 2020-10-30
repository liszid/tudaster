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
	    "help" => "",
	    "card" => ""
	),
        "Administrative/Users" => array(
    	    "navbar" => "Felhasználók",
    	    "fa" => "user",
    	    "title" => "Felhasználók",
    	    "help" => "A Felhasználók kezeléséhez kattintson a menüsorban az 'Admin' gombra és ott válassza a 'Felhasználók' menüpontot",
    	    "card" => "Felhasználók szerkesztéséhez kattintson a kártyára"
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
    	    "card" => "Csoportok szerkesztéséhez kattintson a kártyára"
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
            "card" => "Csoport tagságok szerkesztéséhez kattintson a kártyára"
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
            "card" => ""
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
            "card" => ""
    	),
        "Accesses" => array(
    	    "navbar" => "Hozzáférések",
    	    "fa" => "user-secret",
    	    "title" => "Hozzáférési adatok",
    	    "help" => "Hozzáférési adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hozzáférés' gombra kattintva a menüsávban",
            "card" => ""
    	),
        "Hardware" => array(
    	    "navbar" => "Hardverek",
    	    "fa" => "hdd-o",
    	    "title" => "Hardver adatok",
    	    "help" => "Hardver adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Hardver' gombra kattintva a menüsávban",
            "card" => ""
    	),
        "Software" => array(
    	    "navbar" => "Szoftverek",
    	    "fa" => "file-o",
    	    "title" => "Szoftver adatok",
    	    "help" => "Szoftver olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Szoftver' gombra kattintva a menüsávban",
            "card" => ""
    	),
        "Company" => array(
    	    "navbar" => "Cégek",
    	    "fa" => "building-o",
    	    "title" => "Cég adatok",
    	    "help" => "Céges adatok olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a 'Cégek' gombra kattintva a menüsávban",
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
    	    "help" => "Profilod szerkesztéséhez kattints a menüsávban a \'Profil\' gombra és a \'Profil\' oldalon a \'Szerkesztés\' gombra kattintva",
            "card" => ""
    	)
    );
    const ROLE = array(
        'mngUsers' => array(
    	    'color' => 'info',
    	    'header' => 'Fejlesztés alatt álló funkció',
    	    'respective' => 'Administrative/Users'
    	),
        'mngGroups' => array(
    	    'color' => 'info',
    	    'header' => 'Fejlesztés alatt álló funkció',
    	    'respective' => 'Administrative/Groups'
    	),
        'mngMembers' => array(
    	    'color' => 'info',
    	    'header' => 'Fejlesztés alatt álló funkció',
    	    'respective' => 'Administrative/Membership'
    	),
        'canEdit' => array(
    	    'color' => 'success',
    	    'header' => 'Elérhető funkció',
    	    'respective' => 'Profile'
    	),
        'canUsers' => array(
    	    'color' => 'success',
    	    'header' => 'Elérhető funkció',
    	    'respective' => 'Users'
    	),
        'canKnowledge' => array(
    	    'color' => 'secondary',
    	    'header' => 'Jövendőbeli funkció',
    	    'respective' => 'Knowledge'
    	),
        'canUsername' => array(
    	    'color' => 'secondary',
    	    'header' => 'Jövendőbeli funkció',
    	    'respective' => 'Accesses'
        ),
        'canPassword' => array(
    	    'color' => 'secondary',
    	    'header' => 'Jövendőbeli funkció',
    	    'respective' => 'Accesses'
    	),
        'canHardware' => array(
    	    'color' => 'secondary',
    	    'header' => 'Jövendőbeli funkció',
    	    'respective' => 'Hardware'
    	),
        'canSoftware' => array(
    	    'color' => 'secondary',
    	    'header' => 'Jövendőbeli funkció',
    	    'respective' => 'Software'
    	),
        'canCompany' => array(
    	    'color' => 'secondary',
    	    'header' => 'Jövendőbeli funkció',
    	    'respective' => 'Company'
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
 * Returns Card array for the corresponding Role
 * @param $string string
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Card(string $string): array
    {
	if (array_key_exists($string, self::ROLE)) {
	    if (array_key_exists(self::ROLE[$string]['respective'], self::TRANSLATE)) {
		return array('color' => self::ROLE[$string]['color'], 'header' => self::ROLE[$string]['header'], 'title' => self::TRANSLATE[self::ROLE[$string]['respective']]['title'], 'text' => self::TRANSLATE[self::ROLE[$string]['respective']]['help']);
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
<?php

declare(strict_types=1);

namespace Samples\sTranslate;

interface ROLE
{
    const ROLE = array(
        'canAdministrative' => array(
            'color' => 'success',
    	    'header' => 'Elérhető funkció',
    	    'respective' => 'Administrative',
    	    'short' => 'cA',
    	    'desc' => 'Adminisztrativ engedély',
    	    'select_type' => 'state'
        ),
        'mngUsers' => array(
    	    'color' => 'success',
    	    'header' => 'Elérhető funkció',
    	    'respective' => 'Administrative/Users',
    	    'short' => 'mG',
    	    'desc' => 'Csoportok kezelése',
    	    'select_type' => 'state'
    	),
        'mngGroups' => array(
    	    'color' => 'success',
    	    'header' => 'Elérhet funkció',
    	    'respective' => 'Administrative/Groups',
    	    'short' => 'mU',
    	    'desc' => 'Felhasználók kezelése',
    	    'select_type' => 'state'
    	),
        'mngMembers' => array(
    	    'color' => 'success',
    	    'header' => 'Elérhető funkció',
    	    'respective' => 'Administrative/Membership',
    	    'short' => 'mM',
    	    'desc' => 'Csoport tagságok szerkesztése',
    	    'select_type' => 'state'
    	),
    	'mngTools' => array(
    	    'color' => 'success',
    	    'header' => 'Bövíthetö funkció',
    	    'respective' => 'Administrative/Tools',
    	    'short' => 'mT',
    	    'desc' => 'Adminisztratív eszközök kezelése',
    	    'select_type' => 'state'
    	),
        'canEdit' => array(
    	    'color' => 'success',
    	    'header' => 'Elérhető funkció',
    	    'respective' => 'Profile',
    	    'short' => 'cE',
    	    'desc' => 'Profil szerkesztés',
    	    'select_type' => 'state'
    	),
    	'canLogin' => array(
    	    'color' => 'success',
    	    'header' => 'Elérhető funkció',
    	    'respective' => 'Profile',
    	    'short' => 'cE',
    	    'desc' => 'Bejelentkezési engedély',
    	    'select_type' => 'state'
    	),
        'canUsers' => array(
    	    'color' => 'success',
    	    'header' => 'Elérhető funkció',
    	    'respective' => 'Users',
    	    'short' => 'cUs',
    	    'desc' => 'Regisztráltak megtekintése',
    	    'select_type' => 'state'
    	),
        'canKnowledge' => array(
    	    'color' => 'secondary',
    	    'header' => 'Jövendőbeli funkció',
    	    'respective' => 'Knowledge',
    	    'short' => 'cK',
    	    'desc' => 'Tudáscikkek jogosultság',
    	    'select_type' => 'access'
    	),
        'canUsername' => array(
    	    'color' => 'primary',
    	    'header' => 'Fejlesztés alatti funkció',
    	    'respective' => 'Accesses',
    	    'short' => 'cUn',
    	    'desc' => 'Hozzáférések alap jogosultság',
    	    'select_type' => 'access'
        ),
        'canPassword' => array(
    	    'color' => 'primary',
    	    'header' => 'Fejlesztés alatti funkció',
    	    'respective' => 'Accesses',
    	    'short' => 'cP',
    	    'desc' => 'Hozzáférések emelt jogosultság',
    	    'select_type' => 'access'
    	),
        'canHardware' => array(
    	    'color' => 'success',
    	    'header' => 'Elérhető funkció',
    	    'respective' => 'Hardware',
    	    'short' => 'cH',
    	    'desc' => 'Hardver jogosultság',
    	    'select_type' => 'access'
    	),
        'canCompany' => array(
    	    'color' => 'success',
    	    'header' => 'Elérhető funkció',
    	    'respective' => 'Company',
    	    'short' => 'cC',
    	    'desc' => 'Cégek jogosultság',
    	    'select_type' => 'access'
    	)
    );
}

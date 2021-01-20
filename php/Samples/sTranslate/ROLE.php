<?php

declare(strict_types=1);

namespace Samples\sTranslate;

interface ROLE
{
    const ROLE = array(
        'canAdministrative' => array(
            'color' => 'success'
    	    ,'header' => 'Elérhető funkció'
    	    ,'respective' => 'Administrative'
    	    ,'short' => 'cA'
    	    ,'desc' => '<b>Adminisztrativ</b> engedély'
    	    ,'select_type' => 'state'
        )
        ,'mngUsers' => array(
    	    'color' => 'success'
    	    ,'header' => 'Elérhet funkció'
    	    ,'respective' => 'Administrative/Users'
    	    ,'short' => 'mU'
    	    ,'desc' => '<b>Felhasználók</b> kezelése'
    	    ,'select_type' => 'state'
    	)
        ,'mngGroups' => array(
    	    'color' => 'success'
    	    ,'header' => 'Elérhető funkció'
    	    ,'respective' => 'Administrative/Groups'
    	    ,'short' => 'mG'
    	    ,'desc' => '<b>Jogosultságkörök</b> kezelése'
    	    ,'select_type' => 'state'
    	)
    	,'mngHuntgroups' => array(
    	    'color' => 'success'
    	    ,'header' => 'Elérhet funkció'
    	    ,'respective' => 'Administrative/Huntgroups'
    	    ,'short' => 'mHGG'
    	    ,'desc' => '<b>Csoportok</b> kezelése'
    	    ,'select_type' => 'state'
    	)
    	,'mngTools' => array(
    	    'color' => 'success'
    	    ,'header' => 'Bövíthetö funkció'
    	    ,'respective' => 'Administrative/Tools'
    	    ,'short' => 'mT'
    	    ,'desc' => '<b>Adminisztratív eszközök</b> kezelése'
    	    ,'select_type' => 'state'
    	)
        ,'canUsers' => array(
    	    'color' => 'success'
    	    ,'header' => 'Elérhető funkció'
    	    ,'respective' => 'Users'
    	    ,'short' => 'cUs'
    	    ,'desc' => '<b>[Felhasználók]</b> jogosultság'
    	    ,'select_type' => 'state'
    	)
        ,'canCompany' => array(
    	    'color' => 'success'
    	    ,'header' => 'Elérhető funkció'
    	    ,'respective' => 'Company'
    	    ,'short' => 'cC'
    	    ,'desc' => '<b>[Ügyfelek]</b> jogosultság'
    	    ,'select_type' => 'access'
    	)
        ,'canKnowledge' => array(
    	    'color' => 'primary'
    	    ,'header' => 'Fejlesztés alatti funkció'
    	    ,'respective' => 'Knowledge'
    	    ,'short' => 'cK'
    	    ,'desc' => '<b>[Tudáscikk]</b> jogosultság'
    	    ,'select_type' => 'access'
    	)
        ,'canAccess' => array(
    	    'color' => 'success'
    	    ,'header' => 'Elérhető funkció'
    	    ,'respective' => 'Accesses'
    	    ,'short' => 'cP'
    	    ,'desc' => '<b>[Hozzáférés]</b> jogosultság'
    	    ,'select_type' => 'access'
    	)
        ,'canHardware' => array(
    	    'color' => 'success'
    	    ,'header' => 'Elérhető funkció'
    	    ,'respective' => 'Hardware'
    	    ,'short' => 'cH'
    	    ,'desc' => '<b>[Hardver]</b> jogosultság'
    	    ,'select_type' => 'access'
    	)
        ,'canEdit' => array(
    	    'color' => 'success'
    	    ,'header' => 'Elérhető funkció'
    	    ,'respective' => 'Profile'
    	    ,'short' => 'cE'
    	    ,'desc' => '<b>Profil</b> szerkesztés'
    	    ,'select_type' => 'state'
    	)
    	,'canLogin' => array(
    	    'color' => 'success'
    	    ,'header' => 'Elérhető funkció'
    	    ,'respective' => 'Profile'
    	    ,'short' => 'cE'
    	    ,'desc' => '<b>Bejelentkezési</b> engedély'
    	    ,'select_type' => 'state'
    	)
    );
}

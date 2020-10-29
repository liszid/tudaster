<?php

declare(strict_types=1);

use Samples\{
    sCard,
    sBreadcrumbs,
    sTranslate,
    sFrame
};

$returnContent = '';

if (! isset($sessionUsr['userId']) ) {
    $returnContent .= sCard::Fill(array('color' => 'primary', 'header' => 'Köszöntő', 'title' => 'Kedves vendég,', 'text' => 'A Tudástér használatához bejelentkezés szükséges'));
} else {
    $cardArray = array(
	'hello' => array('color' => 'success', 'header' => 'Köszöntő', 'title' => 'Üdv újra, '.$sessionUsr['nameUser'], 'text' => 'A Tudástér a rendelkezésedre áll'),
        'mngUsers' => array('color' => 'info', 'header' => 'Fejlesztés alatt álló funkció', 'title' => 'Felhasználók kezelése', 'text' => sTranslate::Prompt('Administrative/Users', 'help')),
	'mngGroups' => array('color' => 'info', 'header' => 'Fejlesztés alatt álló funkció', 'title' => 'Csoportok kezelése', 'text' => sTranslate::Prompt('Administrative/Groups', 'help')),
	'mngMembers' => array('color' => 'info', 'header' => 'Fejlesztés alatt álló funkció', 'title' => 'Csoport tagságok kezelése', 'text' => sTranslate::Prompt('Administrative/Membership', 'help')),
	'Profile' => array('color' => 'success', 'header' => 'Elérhető funkció', 'title' => 'Profil', 'text' => 'Profilod megtekintéséhez kattints a menüsávban a \'Profil\' gombra'),
	'canEdit' => array('color' => 'success', 'header' => 'Elérhető funkció', 'title' => 'Profil szerkesztése', 'text' => 'Profilod szerkesztéséhez kattints a menüsávban a \'Profil\' gombra és a \'Profil\' oldalon a \'Szerkesztés\' gombra'),
	'canUsers' => array('color' => 'success', 'header' => 'Elérhető funkció', 'title' => 'Regisztráltak megtekintése', 'text' => sTranslate::Prompt('Users', 'help')),
	'canKnowledge' => array('color' => 'secondary', 'header' => 'Jövendőbeli funkció', 'title' => 'Tudáscikkek kezelése', 'text' => sTranslate::Prompt('Knowledge', 'help')),
	'canUsername' => array('color' => 'secondary', 'header' => 'Jövendőbeli funkció', 'title' => 'Hozzáférési adatok (Alap)', 'text' => 'Hozzáférési adatok (Alap) olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a \'Hozzáférés\' gombra kattintva a menüsávban'),
	'canPassword' => array('color' => 'secondary', 'header' => 'Jövendőbeli funkció', 'title' => 'Hozzáférési adatok (Kiegészítés)', 'text' => 'Hozzáférési adatok (Kiegészítés) olvasása/írása/szerkesztése (jogosultság szinttől függően) elérhető a \'Hozzáférés\' gombra kattintva a menüsávban'),
	'canHardware' => array('color' => 'secondary', 'header' => 'Jövendőbeli funkció', 'title' => 'Hardverek kezelése', 'text' => sTranslate::Prompt('Hardware', 'help')),
	'canSoftware' => array('color' => 'secondary', 'header' => 'Jövendőbeli funkció', 'title' => 'Szoftverek kezelése', 'text' => sTranslate::Prompt('Software', 'help')),
	'canCompany' => array('color' => 'secondary', 'header' => 'Jövendőbeli funkció', 'title' => 'Céges adatok', 'text' => sTranslate::Prompt('Company', 'help'))
    );
    
    $returnContent .= '
	<div class="card-group m-3">
	    '.sCard::Fill($cardArray['hello']).'
	</div>
	<div class="card-columns m-3">
	'.(((int)$sessionUsr['mngGroups'] > 0 && (int)$sessionUsr['mngUsers'] > 0)? sCard::Blank($cardArray['mngGroups']).sCard::Blank($cardArray['mngUsers']).sCard::Blank($cardArray['mngMembers']):'').'
	'.sCard::Blank($cardArray['Profile']).'
	'.(((int)$sessionUsr['canEdit'] > 0)? sCard::Blank($cardArray['canEdit']):'').'
	'.(((int)$sessionUsr['canUsers'] > 0)? sCard::Blank($cardArray['canUsers']):'').'
	'.(((int)$sessionUsr['canKnowledge'] > 0)? sCard::Blank($cardArray['canKnowledge']):'').'
	'.(((int)$sessionUsr['canUsername'] > 0)? sCard::Blank($cardArray['canUsername']):'').'
	'.(((int)$sessionUsr['canPassword'] > 0)? sCard::Blank($cardArray['canPassword']):'').'
	'.(((int)$sessionUsr['canHardware'] > 0)? sCard::Blank($cardArray['canHardware']):'').'
	'.(((int)$sessionUsr['canSoftware'] > 0)? sCard::Blank($cardArray['canSoftware']):'').'
	'.(((int)$sessionUsr['canCompany'] > 0)? sCard::Blank($cardArray['canCompany']):'').'
    </div>';
}

echo sFrame::Page(array('path' => 'Home', 'content' => $returnContent));
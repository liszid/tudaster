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
	'Profile' => array('color' => 'success', 'header' => 'Elérhető funkció', 'title' => 'Profil', 'text' => 'Profilod megtekintéséhez kattints a menüsávban a \'Profil\' gombra'),
    );
    
    $returnContent .= '
	<div class="card-group m-3">
	    '.sCard::Fill($cardArray['hello']).'
	</div>
	<div class="card-columns m-3">
	'.(((int)$sessionUsr['mngGroups'] > 0 && (int)$sessionUsr['mngUsers'] > 0)
	    ?(
		sCard::Blank(sTranslate::Card('mngGroups')).
		sCard::Blank(sTranslate::Card('mngUsers')).
		sCard::Blank(sTranslate::Card('mngMembers'))
	    ):(
		''
	    )
	).'
	'.sCard::Blank($cardArray['Profile']).'
	'.(((int)$sessionUsr['canEdit'] > 0)? sCard::Blank(sTranslate::Card('canEdit')):'').'
	'.(((int)$sessionUsr['canUsers'] > 0)? sCard::Blank(sTranslate::Card('canUsers')):'').'
	'.(((int)$sessionUsr['canKnowledge'] > 0)? sCard::Blank(sTranslate::Card('canKnowledge')):'').'
	'.(((int)$sessionUsr['canUsername'] > 0)? sCard::Blank(sTranslate::Card('canUsername')):'').'
	'.(((int)$sessionUsr['canPassword'] > 0)? sCard::Blank(sTranslate::Card('canPassword')):'').'
	'.(((int)$sessionUsr['canHardware'] > 0)? sCard::Blank(sTranslate::Card('canHardware')):'').'
	'.(((int)$sessionUsr['canSoftware'] > 0)? sCard::Blank(sTranslate::Card('canSoftware')):'').'
	'.(((int)$sessionUsr['canCompany'] > 0)? sCard::Blank(sTranslate::Card('canCompany')):'').'
    </div>';
}

echo sFrame::Page(array('path' => 'Home', 'content' => $returnContent));
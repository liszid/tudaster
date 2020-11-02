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
            sTranslate::Linked('mngGroups').
            sTranslate::Linked('mngUsers').
            sTranslate::Linked('mngMembers')
	    ):(
		''
	    )
	).'
	'.sCard::Blank($cardArray['Profile']).'
	'.(((int)$sessionUsr['canEdit'] > 0)
        ? sCard::Blank(sTranslate::Card('canEdit'))
        :''
    ).'
	'.(((int)$sessionUsr['canUsers'] > 0)
        ? sTranslate::Linked('canUsers')
        :''
    ).'
	'.(((int)$sessionUsr['canKnowledge'] > 0)
        ? sTranslate::Linked('canKnowledge')
        :''
    ).'
	'.(((int)$sessionUsr['canUsername'] > 0)
        ? sTranslate::Linked('canUsername')
        :''
    ).'
	'.(((int)$sessionUsr['canPassword'] > 0)
        ? sTranslate::Linked('canPassword')
        :''
    ).'
	'.(((int)$sessionUsr['canHardware'] > 0)
        ? sTranslate::Linked('canHardware')
        :''
    ).'
	'.(((int)$sessionUsr['canSoftware'] > 0)
        ? sTranslate::Linked('canSoftware')
        :''
    ).'
	'.(((int)$sessionUsr['canCompany'] > 0)
        ? sTranslate::Linked('canCompany')
        :''
    ).'
    </div>';
}

echo sFrame::Page(array('path' => 'Home', 'content' => $returnContent));

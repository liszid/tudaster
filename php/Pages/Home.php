<?php

declare(strict_types=1);

use Samples\{
    sCard,
    sBreadcrumbs,
    sFrame
};

$returnContent = '';

if (! isset($sessionUsr['userId']) ) {
    $returnContent .= sCard::Fill(array('color' => 'primary', 'header' => 'Köszöntő', 'title' => 'Kedves vendég,', 'text' => 'A Tudástér használatához bejelentkezés szükséges'));
} else {
    $returnContent .= '
        <div class="card-group m-3">
            '.sCard::Fill(array('color' => 'success', 'header' => 'Köszöntő', 'title' => 'Üdv újra, '.$sessionUsr['nameUser'], 'text' => 'A Tudástér a rendelkezésedre áll')).'
        </div>
        <div class="card-columns m-3">
            '.(((int)$sessionUsr['mngUsers'] > 0) ? sCard::Translated('mngUsers', 'Linked') :'' ).'
            '.(((int)$sessionUsr['mngGroups'] > 0) ? sCard::Translated('mngGroups', 'Linked') :'' ).'
            '.(((int)$sessionUsr['mngMembers'] > 0) ? sCard::Translated('mngMembers', 'Linked') :'' ).'
            '.(((int)$sessionUsr['mngTools'] > 0) ? sCard::Translated('mngTools', 'Linked') :'' ).'
            '.(((int)$sessionUsr['canEdit'] > 0) ? sCard::Translated('canEdit', 'Card') :'' ).'
            '.(((int)$sessionUsr['canUsers'] > 0) ? sCard::Translated('canUsers', 'Linked') :'' ).'
            '.(((int)$sessionUsr['canKnowledge'] > 0) ? sCard::Translated('canKnowledge', 'Linked') :'' ).'
            '.(((int)$sessionUsr['canUsername'] > 0) ? sCard::Translated('canUsername', 'Linked') :'' ).'
            '.(((int)$sessionUsr['canPassword'] > 0) ? sCard::Translated('canPassword', 'Linked') :'' ).'
            '.(((int)$sessionUsr['canHardware'] > 0) ? sCard::Translated('canHardware', 'Linked') :'' ).'
            '.(((int)$sessionUsr['canSoftware'] > 0) ? sCard::Translated('canSoftware', 'Linked') :'' ).'
            '.(((int)$sessionUsr['canCompany'] > 0) ? sCard::Translated('canCompany', 'Linked') :'' ).'
        </div>';
}

echo sFrame::Page(array('path' => 'Home', 'content' => $returnContent));

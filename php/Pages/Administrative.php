<?php

declare(strict_types=1);

use PreLoad\{
    Valid,
    Check,
    Log
};

use Samples\{
    sCard,
    sFrame,
    sRedirect,
    sAdministrative,
    sTranslate
};

if (isset($sessionUsr['userId']) &&( (int)$sessionUsr['mngUsers'] > 0 && (int)$sessionUsr['mngGroups'] > 0)) {
    $returnContent = '';
    
    $urlPaths = array(
	"Root" => "Administrative",
	"Users" => "Administrative/Users",
	"Groups" => "Administrative/Groups",
	"Membership" => "Administrative/Membership"
    );
    
    if (isset($_POST['y']) && isset($_POST['z'])) {
	$returnArray = array();
	if (! strcmp($_POST['y'], 'Users')) {
	    if (! strcmp($_POST['z'], 'Reset')) {
		$returnArray = array('path' => $urlPaths['Users'], 'content' => 'Reset'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: ''));
	    } elseif(! strcmp($_POST['z'], 'Delete')) {
		$returnArray = array('path' => $urlPaths['Users'], 'content' => 'Delete'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: ''));
	    }
	} elseif(! strcmp($_POST['y'], 'Groups')) {
	    if (! strcmp($_POST['z'], 'Edit')) {
		$returnArray = array('path' => $urlPaths['Groups'], 'content' => 'Edit'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: ''));
	    } elseif (! strcmp($_POST['z'], 'Delete')) {
		$returnArray = array('path' => $urlPaths['Groups'], 'content' => 'Delete'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: ''));
	    }
	} elseif(! strcmp($_POST['y'], 'Membership')) {
	    if (! strcmp($_POST['z'], 'Edit')) {
		$returnArray = array('path' => $urlPaths['Membership'], 'content' => 'Edit'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: ''));
            } elseif (! strcmp($_POST['z'], 'Delete')) {
		$returnArray = array('path' => $urlPaths['Membership'], 'content' => 'Delete'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: ''));
            }
	}
	echo ((! empty($returnArray))? sFrame::Modal($returnArray) : sRedirect::Home());
    } elseif (isset($_POST['y']) || isset($_POST['b'])) {
	if (
	    (isset($_POST['y']) && ! strcmp($_POST['y'], 'Users')) 
	    || (isset($_POST['b']) && ! strcmp($_POST['b'], 'Users'))
	){
	    $returnContent .= sAdministrative::Users();
	    echo sFrame::Page(array('path' => $urlPaths['Users'], 'content' => $returnContent));
	} elseif (
	    (isset($_POST['y']) && ! strcmp($_POST['y'], 'Groups')) 
	    || (isset($_POST['b']) && ! strcmp($_POST['b'], 'Groups'))
	){
	    $returnContent .= sAdministrative::Groups();
	    echo sFrame::Page(array('path' => $urlPaths['Groups'], 'content' => $returnContent));
	} elseif (
	    (isset($_POST['y']) && ! strcmp($_POST['y'], 'Membership'))
	    || (isset($_POST['b']) && ! strcmp($_POST['b'], 'Membership'))
	){
	    $returnContent .= sAdministrative::Membership();
	    echo sFrame::Page(array('path' => $urlPaths['Membership'], 'content' => $returnContent));
	} else {
	    echo sRedirect::Home();
	}
    } else {
	$returnContent .= '<div class="card-deck d-flex justify-content-center">';
	
	foreach ($urlPaths as $key => $value) {
	    if (strcmp(array_key_first($urlPaths), $key)) {
		$returnContent .= '<a data-link="'.$value.'">'.sCard::Blank(array('color' => 'success', 'header' => 'Elérhető funkció', 'title' => sTranslate::Title($value, 3), 'text' => sTranslate::Prompt($value, 'card'))).'</a>';
	    }
	}
	
	$returnContent .= '</div>';
	
	echo sFrame::Page(array('path' => $urlPaths['Root'], 'content' => $returnContent));
    }
} else {
    echo sRedirect::Home();
}
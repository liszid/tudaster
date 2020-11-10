<?php

declare(strict_types=1);

session_start();
session_regenerate_id();

require_once 'globals.php';

/**
 * Loading sequences start here. We load the Global script, which initializes
 * the required statements and variables which we work with.
 */

use PreLoad\
{
    Log,
    Check,
    Valid
};

use Samples\{
    sActivity
};

use Data\{
    dCombined
};

use Database\Table;

use Load\_RequireOnce;

_RequireOnce::Directory(array( "dir" => $GLOBALS['rootQueries'], "type" => $GLOBALS['phpType'], "mode" => "e"));

$Table = new Table();

$formPage = Check::isEither(array('post' => array('a', 'x'), 'get' => 'p', 'fallBack' => 'Home'));

if (isset($_SESSION['User'])) {
    $dCombined = new dCombined();
    $userVar = $dCombined->Select($_SESSION['User'],'User_Full');
    sActivity::Set($userVar[0]);
}
$sessionUsr   = (isset($_SESSION['User']))? $_SESSION['User'] : array();
$sessionId    = (! empty($sessionUsr))? $sessionUsr['userId'] : 0;
$sessionAct   = (! empty($sessionUsr))? $sessionUsr['Activity'] : array();

if (!isset($_SESSION['Database'])) {
    if ( $Table::initTable() === true) {
        $_SESSION['Database'] = true;
    }
}

if ( Valid::vString( $formPage ) ) {
    if ( file_exists($GLOBALS['rootPages'].$formPage.'.php') ) {
        if ( ! preg_match( '/[^A-Za-z0-9]/', $formPage ) ) {
            require_once $GLOBALS['rootPages'].$formPage.'.php';
        } else {
            Log::Error("Preg_Match Error");
        }
    } else {
        Log::Error("File doesn't exist at ".$GLOBALS['rootPages'].$formPage.".php");
    }
} else {
    Log::Error("String not Valid - ".$formPage);
}

<?php

declare(strict_types=1);

$GLOBALS['root']	= '';
$GLOBALS['Path']	= 'http://localhost:49156/';
$GLOBALS['rootCss']	= $GLOBALS['root'].'css/';
$GLOBALS['rootJs']	= $GLOBALS['root'].'js/';
$GLOBALS['rootFavicon']	= $GLOBALS['root'];
$GLOBALS['rootSite']	= $_SERVER['DOCUMENT_ROOT'].'/';
$GLOBALS['rootPhp']	= $GLOBALS['rootSite'].'php/';
$GLOBALS['rootNoLoad']	= $GLOBALS['rootSite'].'__noLoad/';
$GLOBALS['rootPreLoad']	= $GLOBALS['rootPhp'].'PreLoad/';
$GLOBALS['rootPages']	= $GLOBALS['rootPhp'].'Pages/';
$GLOBALS['rootData']	= $GLOBALS['rootPhp'].'Data/';
$GLOBALS['rootDatabase']= $GLOBALS['rootPhp'].'Database/';
$GLOBALS['rootSamples']	= $GLOBALS['rootPhp'].'Samples/';
$GLOBALS['rootLog']	= $GLOBALS['rootPhp'].'Log/';
$GLOBALS['rootQueries'] = $GLOBALS['rootPhp'].'Queries/';
$GLOBALS['rootLoad']	= $GLOBALS['rootPhp'].'Load/';
$GLOBALS['cssType']	= ".css";
$GLOBALS['phpType']	= ".php";
$GLOBALS['jsType']	= ".js";
$GLOBALS['defaultGrp'] = 2;


spl_autoload_register('AutoLoader');

function AutoLoader($className)
{
    if (empty($className) || !is_string($className)) {
        return false;
    }

    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

    $directory = scandir($GLOBALS['rootPhp']);
    $files = [];
    foreach ($directory as $fileName) {
        if ($fileName !== "." && $fileName !== ".." && is_dir($GLOBALS['rootPhp'] . $fileName)) {
            $files[] = $fileName;
        }
    }

    if (file_exists($className . '.php')) {
        include_once($className . '.php');
    } elseif(file_exists($GLOBALS['rootPhp'] . $className . '.php')) {
        include_once($GLOBALS['rootPhp'] . $className . '.php');
    } else {
        foreach ($files as $fileName) {
            if (file_exists(DIR_ . $fileName . "/" . $className . '.php')) {
                include_once(DIR_ . $fileName . "/" . $className . '.php');
            }
        }
    }

    return true;
}

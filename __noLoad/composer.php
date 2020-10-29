<?php

declare(strict_types=1);

require_once 'globals.php';

use Samples\sSite;

$sSite = new sSite();

/*
 * This function builds the site, located at Samples/sFrame.php
 */
 
echo $sSite->Build();
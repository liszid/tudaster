<?php

declare(strict_types=1);

use Data\{
    Valid,
    Check,
    Log
};

use Samples\{
    sRedirect,
    sFrame
};

if (isset($sessionUsr['userId']) && (true)) {

    $urlPaths = array(
        "Root" => ""
    );

    echo sFrame::Page(array('path' => $urlPaths['Root'], 'content' => ''));
} else {
    echo sRedirect::Home();
}

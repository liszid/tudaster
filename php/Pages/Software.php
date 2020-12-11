<?php

declare(strict_types=1);

use PreLoad\{
    Valid,
    Check,
    Log
};

use Samples\{
    sRedirect,
    sFrame
};

if (
    isset($sessionUsr['userId'])
    && (int)$sessionUsr['canSoftware'] > 0
    && false
) {
    $urlPaths = array(
        "Root" => "Software"
    );

    echo sFrame::Page(array('path' => $urlPaths['Root'], 'content' => ''));
} else {
    echo sRedirect::Home();
}

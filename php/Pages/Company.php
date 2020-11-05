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
    && (int)$sessionUsr['canCompany'] > 0
) {
    $urlPaths = array(
        "Root" => "Company"
    );

    echo sFrame::Page(array('path' => $urlPaths['Root'], 'content' => ''));

} else {
    echo sRedirect::Home();
}

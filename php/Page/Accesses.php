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
    && (
        (int)$sessionUsr['canUsername'] > 0
        || (
            (int)$sessionUsr['canUsername'] > 0
            && (int)$sessionUsr['canPassword'] > 0
        )
    )
) {

    $urlPaths = array(
                    "Root" => "Accesses"
                );

    echo sFrame::Page(array('path' => $urlPaths['Root'], 'content' => ''));

}
else
{
    echo sRedirect::Home();
}

<?php

declare(strict_types=1);

use Data\{
    dUser
};

use PreLoad\{
    Valid,
    Check,
    Log
};

use Samples\{
    sTables,
    sRedirect,
    sFrame
};

if (
    isset($sessionUsr['userId'])
    && $sessionUsr['canUsers'] > 0
) {
    $urlPaths = array(
        "Root" => "Users"
    );

    $dUser = new dUser();
    $Users = $dUser::Select(array(), 'All');

    echo sFrame::Page(array('path' => $urlPaths['Root'], 'content' => sTables::Prompt($Users, 'Home_Users')));
} else {
    echo sRedirect::Home();
}

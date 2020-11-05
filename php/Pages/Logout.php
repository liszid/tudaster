<?php

declare(strict_types=1);

use Samples\sRedirect;

if( isset($sessionUsr) ){
    unset($_SESSION['User']);
    echo sRedirect::Modal(
        array(
            'icon' => 'fa-user-plus',
            'title' => 'Logout',
            'desc' => 'Successfull',
            'script' => "
                Instance.initElmnt('d=Home');
                location.reload();
                $('[data-dismiss=modal]').trigger({ type: 'click' });"
        )
    );
}

<?php

declare(strict_types=1);

namespace Samples\sTranslate;

interface ROLE_SELECT
{
    const ROLE_SELECT = array(
        'state' => array(
            array('id' => 0, 'name' => 'Tiltva'),
            array('id' => 1, 'name' => 'Engedélyezve')
        ),
        'access' => array(
            array('id' => 0, 'name' => 'Tiltva'),
            array('id' => 1, 'name' => 'Olvasás'),
            array('id' => 3, 'name' => 'Írás/Olvasás'),
            array('id' => 7, 'name' => 'Teljes')
        )
    );
}

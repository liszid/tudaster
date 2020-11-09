<?php

declare(strict_types=1);

namespace Samples\sTranslate;

interface ACTION
{
    const ACTION = array(
        'Success' => array(
            'content' => 'Sikeres müvelet!'
        ),
        'Fail' => array(
            'content' => 'Sikertelen müvelet!'
        )
    );
}

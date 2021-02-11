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
    && (int)$sessionUsr['canKnowledge'] > 0
) {
    $urlPaths = array(
        "Root" => "Knowledge"
    );

    $returnContent = '	<div class="ckeditor">	</div>';

    echo sFrame::Page(array('path' => $urlPaths['Root'], 'content' => $returnContent));
} else {
    echo sRedirect::Home();
}

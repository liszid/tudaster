<?php

declare(strict_types=1);

use PreLoad\{
    Valid
    ,Check
    ,Log
};

use Samples\{
    sCard
    ,sFrame
    ,sRedirect
};

use Page_Handlers\sAccess;

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

    $returnContent = '';

    $urlPaths = array(
                    "Root"          => array("path" => "Accesses",              "role" => "canHardware")
                    ,"Hardware"      => array("path" => "Accesses/Access ",     "role" => "canHardware")
                );
/*
 * Post action handling and form prompt section
 */
    if (isset($_POST['y']) && isset($_POST['z'])) {
        $returnArray = array();

        if(
            Valid::vString(Check::isPost('y'))
            && Valid::vString(Check::isPost('z'))
        ) {
            $returnContent = sAccess::Action($_POST);
        }

        if (Valid::vString($returnContent)) {
            if (! strcmp(Check::isPost('z'), 'Filter')) {
                echo $returnContent;
            } else {
                echo sFrame::Modal(array('path' => $urlPaths[Check::isPost('y')]['path'], 'content' => $returnContent));
            }

        } else {
            echo sRedirect::Home();
        }
/*
 * Page loading section
 */
    } elseif (isset($_POST['y']) || isset($_POST['b'])) {
        $postUrl = Check::isEither(array('post' => array('y', 'b'), 'fallBack' => 'Company'));

        switch ($postUrl) {
            case 'Access':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sAccess::Access(array('path' => $urlPaths[$postUrl]['path'])) : '';
                break;
        }
        echo (
            (
                Valid::vString($returnContent)
            )
            ? sFrame::Page(array('path' => $urlPaths[$postUrl]['path'], 'content' => $returnContent))
            : sRedirect::Home()
        );
/*
 * Collective page with Cards
 */
    } else {
        $returnContent .= '<div class="card-columns m-2">';

        foreach ($urlPaths as $key => $value) {
            if (strcmp(array_key_first($urlPaths), $key)) {
                if (isset($value['role']) && (int)$sessionUsr[$value['role']] > 0) {
                    $returnContent .= sCard::Translated($value['path'], 'Linked');
                }
            }
        }

        $returnContent .= '</div>';

        echo sFrame::Page(array('path' => $urlPaths['Root']['path'], 'content' => $returnContent));
    }

} else {
    echo sRedirect::Home();
}

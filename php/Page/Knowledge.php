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

use Page_Handlers\sKnowledge;

if (
    isset($sessionUsr['userId'])
    && (int)$sessionUsr['canKnowledge'] > 0
) {
    $returnContent = '';
    $urlPaths = array(
                    "Root"          => array("path" => "Knowledge",             "role" => "canKnowledge")
                    ,"Knowledge"    => array("path" => "Knowledge/Knowledge",   "role" => "canKnowledge")
                );
/*
 * Post action handling and form prompt section
 */
    if (isset($_POST['y']) && isset($_POST['z'])) {
        if(
            Valid::vString(Check::isPost('y'))
            && Valid::vString(Check::isPost('z'))
        ) {
            $returnContent .= sKnowledge::Action($_POST);
        }

        $returnArray = array('path' => $urlPaths[Check::isPost('y')]['path'].'/'.Check::isPost('z'), 'content' => $returnContent);

        if (Valid::vString($returnContent) && ! isset($_POST['Save'])) {
            echo sFrame::Page($returnArray);
        } elseif (Valid::vString($returnContent) && isset($_POST['Save'])) {
            echo sFrame::Modal($returnArray);
        } else {
            echo sRedirect::Home();
        }
/*
 * Page loading section
 */
    } elseif (isset($_POST['y']) || isset($_POST['b'])) {
        $postUrl = Check::isEither(array('post' => array('y', 'b'), 'fallBack' => 'Knowledge'));

        switch ($postUrl) {
            case 'Knowledge':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sKnowledge::Knowledge(array('path' => $urlPaths[$postUrl]['path'])) : '';
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

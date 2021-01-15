<?php

declare(strict_types=1);

use PreLoad\ {
    Valid
    ,Check
    ,Log
};

use Samples\ {
    sCard
    ,sFrame
    ,sRedirect
};

use Page_Handlers\sAdministrative;

if (
    isset($sessionUsr['userId'])
    && (int)$sessionUsr['canAdministrative'] > 0
) {
    $returnContent = '';

    $urlPaths = array(
                    "Root"          => array("path" => "Administrative"),
                    "Users"         => array("path" => "Administrative/Users", "role" => "mngUsers"),
                    "Huntgroups"    => array("path" => "Administrative/Huntgroups", "role" => "mngHuntgroups"),
                    "Groups"        => array("path" => "Administrative/Groups", "role" => "mngGroups"),
                    "Membership"    => array("path" => "Administrative/Membership", "role" => "mngMembers"),
                    "Tools"         => array("path" => "Administrative/Tools", "role" => "mngTools")
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
            $returnContent = sAdministrative::Action($_POST);
        }

        echo ((Valid::vString($returnContent))? sFrame::Modal(array('path' => $urlPaths[Check::isPost('y')]['path'], 'content' => $returnContent)) : sRedirect::Home());
/*
 * Page loading section
 */
    } elseif (isset($_POST['y']) || isset($_POST['b'])) {
        $postUrl = Check::isEither(array('post' => array('y', 'b'), 'fallBack' => 'Administrative'));

        switch ($postUrl) {
            case 'Users':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sAdministrative::Users(array('path' => $urlPaths[$postUrl]['path'])) : '';
                break;
            case 'Groups':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sAdministrative::Groups(array('path' => $urlPaths[$postUrl]['path'])) : '';
                break;
            case 'Membership':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sAdministrative::Membership(array('path' => $urlPaths[$postUrl]['path'])) : '';
                break;
            case 'Huntgroups':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sAdministrative::Huntgroups(array('path' => $urlPaths[$postUrl]['path'])) : '';
                break;
            case 'Tools':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sAdministrative::Tools(array('path' => $urlPaths[$postUrl]['path'])) : '';
                break;
        }

        echo ((Valid::vString($returnContent))? sFrame::Page(array('path' => $urlPaths[$postUrl]['path'], 'content' => $returnContent)) : sRedirect::Home());
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

<?php

declare(strict_types=1);

use Data\ {
    dUser,
    dGroup,
    dGroup_Member
};

use PreLoad\ {
    Valid,
    Check,
    Log
};

use Samples\ {
    sCard,
    sFrame,
    sRedirect,
    sAdministrative
};

if (
    isset($sessionUsr['userId'])
    && (
        (int)$sessionUsr['mngUsers'] > 0
        && (int)$sessionUsr['mngGroups'] > 0
    )
) {
    $returnContent = '';

    $urlPaths = array(
                    "Root"      => "Administrative",
                    "Users"     => "Administrative/Users",
                    "Groups"    => "Administrative/Groups",
                    "Membership"=> "Administrative/Membership"
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

        echo ((Valid::vString($returnContent))? sFrame::Modal(array('path' => $urlPaths[Check::isPost('y')], 'content' => $returnContent)) : sRedirect::Home());
/*
 * Page loading section
 */
    } elseif (isset($_POST['y']) || isset($_POST['b'])) {
        $postUrl = Check::isEither(array('post' => array('y', 'b'), 'fallBack' => 'Administrative'));

        switch ($postUrl) {
            case 'Users':
                $returnContent .= sAdministrative::Users(array('path' => $urlPaths[$postUrl]));
                break;
            case 'Groups':
                $returnContent .= sAdministrative::Groups(array('path' => $urlPaths[$postUrl]));
                break;
            case 'Membership':
                $returnContent .= sAdministrative::Membership(array('path' => $urlPaths[$postUrl]));
                break;
        }

        echo ((Valid::vString($returnContent))? sFrame::Page(array('path' => $urlPaths[$postUrl], 'content' => $returnContent)) : sRedirect::Home);
/*
 * Collective page with Cards
 */
    } else {
        $returnContent .= '<div class="card-deck d-flex justify-content-center">';

        foreach ($urlPaths as $key => $value) {
            if (strcmp(array_key_first($urlPaths), $key)) {
                $returnContent .= sCard::Translated($value, 'Linked');
            }
        }

        $returnContent .= '</div>';

        echo sFrame::Page(array('path' => $urlPaths['Root'], 'content' => $returnContent));
    }

} else {
    echo sRedirect::Home();
}

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

if (isset($sessionUsr['userId']) &&( (int)$sessionUsr['mngUsers'] > 0 && (int)$sessionUsr['mngGroups'] > 0)) {
    $returnContent = '';

    $urlPaths = array(
                    "Root" => "Administrative",
                    "Users" => "Administrative/Users",
                    "Groups" => "Administrative/Groups",
                    "Membership" => "Administrative/Membership"
                );

/*
 * Post action handling section
 */
    if (isset($_POST['y']) && isset($_POST['z'])) {
        $returnArray = array();
        if(Valid::vString(Check::isPost('y')) && Valid::vString(Check::isPost('z'))) {
            $returnContent = sAdministrative::Action(array('y' => Check::isPost('y'), 'z' => Check::isPost('z')));
            $returnArray = array('path' => $urlPaths['Users'], 'content' => $returnContent);
        }
        echo ((! empty($returnArray))? sFrame::Modal($returnArray) : sRedirect::Home());
/*
 * Page loading section
 */
    } elseif (isset($_POST['y']) || isset($_POST['b'])) {
        switch (Check::isEither(array('post' => array('y', 'b'), 'fallBack' => 'Administrative'))) {
        case 'Users':
            $returnContent .= sAdministrative::Users(array('path' => $urlPaths['Users']));
            echo sFrame::Page(array('path' => $urlPaths['Users'], 'content' => $returnContent));
            break;
        case 'Groups':
            $returnContent .= sAdministrative::Groups(array('path' => $urlPaths['Groups']));
            echo sFrame::Page(array('path' => $urlPaths['Groups'], 'content' => $returnContent));
            break;
        case 'Membership':
            $returnContent .= sAdministrative::Membership(array('path' => $urlPaths['Membership']));
            echo sFrame::Page(array('path' => $urlPaths['Membership'], 'content' => $returnContent));
            break;
        default:
            echo sRedirect::Home();
            break;
        }
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

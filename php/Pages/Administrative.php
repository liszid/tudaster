<?php

declare(strict_types=1);

use Data\
{
    dUser
};

use PreLoad\
{
    Valid,
    Check,
    Log
};

use Samples\
{
    sCard,
    sFrame,
    sRedirect,
    sAdministrative,
    sTranslate
};

if (isset($sessionUsr['userId']) &&( (int)$sessionUsr['mngUsers'] > 0 && (int)$sessionUsr['mngGroups'] > 0))
{
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
    if (isset($_POST['y']) && isset($_POST['z']))
    {
        $returnArray = array();
        switch (Check::isPost('y'))
        {
        case 'Users':
            switch (Check::isPost('z'))
            {
            case 'Reset':
                $returnArray = array('path' => $urlPaths['Users'], 'content' => 'Reset'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: ''));
                break;
            case 'Delete':
                $returnArray = array('path' => $urlPaths['Users'], 'content' => 'Delete'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: ''));
                break;
            }
            break;
        case 'Groups':
            switch (Check::isPost('z'))
            {
            case 'Edit':
                $returnArray = array('path' => $urlPaths['Groups'], 'content' => 'Edit'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: ''));
                break;
            case 'Delete':
                $returnArray = array('path' => $urlPaths['Groups'], 'content' => 'Delete'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: ''));
                break;
            }
            break;
        case 'Membership':
            switch (Check::isPost('z'))
            {
            case 'Edit':
                $returnArray = array('path' => $urlPaths['Membership'], 'content' => 'Edit'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: ''));
                break;
            case 'Delete':
                $returnArray = array('path' => $urlPaths['Membership'], 'content' => 'Delete'.((isset($_POST['dp']))? ', dp: '.$_POST['dp']: ''));
                break;
            }
            break;
        }
        echo ((! empty($returnArray))? sFrame::Modal($returnArray) : sRedirect::Home());
        /*
         * Page loading section
         */
    }
    elseif (isset($_POST['y']) || isset($_POST['b']))
    {
        switch (Check::isEither(array('post' => array('y', 'b'), 'fallBack' => 'Administrative')))
        {
        case 'Users':
            $returnContent .= sAdministrative::Users();
            echo sFrame::Page(array('path' => $urlPaths['Users'], 'content' => $returnContent));
            break;
        case 'Groups':
            $returnContent .= sAdministrative::Groups();
            echo sFrame::Page(array('path' => $urlPaths['Groups'], 'content' => $returnContent));
            break;
        case 'Membership':
            $returnContent .= sAdministrative::Membership();
            echo sFrame::Page(array('path' => $urlPaths['Membership'], 'content' => $returnContent));
            break;
        default:
            echo sRedirect::Home();
            break;
        }
    }
    else
    {
        $returnContent .= '<div class="card-deck d-flex justify-content-center">';

        foreach ($urlPaths as $key => $value)
        {
            if (strcmp(array_key_first($urlPaths), $key))
            {
                $returnContent .= '<a data-link="'.$value.'">'.sCard::Blank(array('color' => 'success', 'header' => 'Elérhető funkció', 'title' => sTranslate::Title($value, 3), 'text' => sTranslate::Prompt($value, 'card'))).'</a>';
            }
        }

        $returnContent .= '</div>';

        echo sFrame::Page(array('path' => $urlPaths['Root'], 'content' => $returnContent));
    }
}
else
{
    echo sRedirect::Home();
}

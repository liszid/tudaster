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

use Page_Handlers\sCompany;

if (
    isset($sessionUsr['userId'])
    && (int)$sessionUsr['canCompany'] > 0
) {

    $returnContent = '';

    $urlPaths = array(
                    "Root"      => array("path" => "Company", "role" => "canCompany"),
                    "Company"   => array("path" => "Company/Company", "role" => "canCompany"),
                    "Site"      => array("path" => "Company/Site", "role" => "canCompany")
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
            $returnContent = sCompany::Action($_POST);
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
            case 'Company':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sCompany::Company(array('path' => $urlPaths[$postUrl]['path'])) : '';
                break;
            case 'Site':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sCompany::Site(array('path' => $urlPaths[$postUrl]['path'])) : '';
                break;
        }
        echo ((Valid::vString($returnContent))? sFrame::Page(array('path' => $urlPaths[$postUrl]['path'], 'content' => $returnContent)) : sRedirect::Home());
/*
 * Collective page with Cards
 */
    } else {
        $returnContent .= '<div class="card-deck d-flex justify-content-center">';

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

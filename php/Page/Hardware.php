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

use Page_Handlers\sHardware;

if (
    isset($sessionUsr['userId'])
    && (int)$sessionUsr['canHardware'] > 0
) {

    $returnContent = '';

    $urlPaths = array(
                    "Root"          => array("path" => "Hardware",              "role" => "canHardware"),
                    "Hardware"      => array("path" => "Hardware/Hardware",     "role" => "canHardware"),
                    "Laptop"        => array("path" => "Hardware/Laptop",       "role" => "canHardware"),
                    "Computer"      => array("path" => "Hardware/Computer",     "role" => "canHardware"),
                    "Printer"       => array("path" => "Hardware/Printer",      "role" => "canHardware"),
                    "Networking"    => array("path" => "Hardware/Networking",   "role" => "canHardware"),
                    "Security"      => array("path" => "Hardware/Security",     "role" => "canHardware"),
                    "Server"        => array("path" => "Hardware/Server",       "role" => "canHardware")
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
            $returnContent = sHardware::Action($_POST);
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
            case 'Hardware':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sHardware::Hardware(array('path' => $urlPaths[$postUrl]['path'])) : '';
                break;
            case 'Laptop':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sHardware::Laptop(array('path' => $urlPaths[$postUrl]['path'])) : '';
                break;
            case 'Computer':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sHardware::Computer(array('path' => $urlPaths[$postUrl]['path'])) : '';
                break;
            case 'Printer':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sHardware::Printer(array('path' => $urlPaths[$postUrl]['path'])) : '';
                break;
            case 'Networking':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sHardware::Networking(array('path' => $urlPaths[$postUrl]['path'])) : '';
                break;
            case 'Server':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sHardware::Server(array('path' => $urlPaths[$postUrl]['path'])) : '';
                break;
            case 'Security':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sHardware::Security(array('path' => $urlPaths[$postUrl]['path'])) : '';
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
        $returnContent .= '<div class="card-columns  m-2">';

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

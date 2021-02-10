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
                    "Root"          => array("path" => "Hardware",              "role" => "canHardware")
                    ,"Hardware"     => array("path" => "Hardware/Hardware",     "role" => "canHardware")
                    ,"Laptop"       => array("path" => "Hardware/Laptop",       "role" => "canHardware")
                    ,"Computer"     => array("path" => "Hardware/Computer",     "role" => "canHardware")
                    ,"Server"       => array("path" => "Hardware/Server",       "role" => "canHardware")
                    ,"Printer"      => array("path" => "Hardware/Printer",      "role" => "canHardware")
                    ,"Router"       => array("path" => "Hardware/Router",       "role" => "canHardware")
                    ,"Switch"       => array("path" => "Hardware/Switch",       "role" => "canHardware")
                    ,"Access_Point" => array("path" => "Hardware/Access_Point", "role" => "canHardware")
                    ,"Telephony"    => array("path" => "Hardware/Telephony",    "role" => "canHardware")
                    ,"Camera"       => array("path" => "Hardware/Camera",       "role" => "canHardware")
                    ,"DVR_CCTV"     => array("path" => "Hardware/DVR_CCTV",     "role" => "canHardware")
                    ,"Alarm"        => array("path" => "Hardware/Alarm",        "role" => "canHardware")
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
                echo sFrame::Modal(array('path' => $urlPaths[Check::isPost('y')]['path'].'/'.Check::isPost('z'), 'content' => $returnContent));
            }

        } else {
            echo sRedirect::Home();
        }
/*
 * Page loading section
 */
    } elseif (isset($_POST['y']) || isset($_POST['b'])) {
        $postUrl = Check::isEither(array('post' => array('y', 'b'), 'fallBack' => 'Hardware'));

        switch ($postUrl) {
            case 'Hardware':
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sHardware::Hardware(array('path' => $urlPaths[$postUrl]['path'])) : '';
                break;
            default:
                $returnContent .= ((int)$sessionUsr[$urlPaths[$postUrl]['role']] > 0 ) ? sHardware::Page(array('path' => $urlPaths[$postUrl]['path'], 'hardwareType' => $postUrl)) : '';
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

<?php

declare(strict_types=1);

namespace Samples;

use PreLoad\{
    Valid,
    Check,
    Log
};

use Load\Loader as Load;

class sSite
{
    private static $sessionUsr;
    private static $sessionId;
    private static $sessionRoles;
    private static $sessionAct;

    public function __construct()
    {
        self::setSessionVariables();
        echo self::Build();
    }

/*
 * Sets session variables into static variables
 * @return bool
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    private static function setSessionVariables(): bool
    {
        self::$sessionUsr   = (isset($_SESSION['User']))? $_SESSION['User'] : array();
        self::$sessionId    = (! empty(self::$sessionUsr))? self::$sessionUsr['userId'] : 0;
        self::$sessionAct   = (! empty(self::$sessionUsr))? self::$sessionUsr['Activity'] : array();
        return true;
    }

/*
 * Returns the <head> part of the HTML
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    private static function Head(): string
    {
        return '
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta charset="utf-8">
                <meta http-equiv="x-dns-prefetch-control" content="off">
                <title>Tudástér</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="description" content="Tudástér">
                <meta name="theme-color" content="#4285f4">
                <meta name="robots" content="index,follow">
                <meta name="googlebot" content="index,follow">
                <meta name="google" content="nositelinkssearchbox">
                <meta name="google" content="notranslate">
                <meta name="generator" content="Liszi Dániel">
                <meta name="subject" content="General Knowledge">
                <meta name="rating" content="General">
                <meta name="referrer" content="no-referrer">
                <meta name="format-detection" content="telephone=no">
                <meta name="ICBM" content="47.497912, 19.040235">
                <meta name="geo.position" content="47.497912;19.040235">
                <meta name="geo.region" content="HU">
                <meta name="geo.placename" content="Budapest">
                '.Load::CSS($GLOBALS['rootCss']).'
                '.Load::Favicon($GLOBALS['rootFavicon']).'
            </head>';
    }

/*
 * Returns the Navigation bar of the HTML
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    private static function Navbar(): string
    {
        return '
            <nav id="mainNavBar" class="navbar navbar-expand-lg bg-info navbar-dark fixed-top">
                <a class="navbar-brand" data-link="Home">Tudástér</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        '.sNavbar::Prompt(
                            array(
                                'liClass' => ''
                                ,'aClass' => ''
                                ,'faClass' => sTranslate::Prompt('Home', 'fa')
                                ,'dataToggle' => false
                                ,'dataLink' => 'Home'
                                ,'Desc' => sTranslate::Prompt('Home')
                            )
                        ).'
                        '.self::NavbarLeft().'
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="naw-item">&nbsp;</li>
                        '.self::NavbarRight().'
                    </ul>
                </div>
            </nav>';
    }

/*
 * Sets the left part of the Navigation Bar
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    private static function NavbarLeft(): string
    {
        $returnString = '';
        $navArray = array();

        if (! empty(self::$sessionUsr)) {
            if ( (int)self::$sessionUsr['mngGroups'] === 1 && (int)self::$sessionUsr['mngUsers'] === 1) {
                $navName = "Administrative";
                $navArray[] = array(
                    'liClass' => ' dropdown'
                    ,'aClass' => ' dropdown-toggle'
                    ,'faClass' => sTranslate::Prompt($navName, 'fa')
                    ,'dataToggle' => 'dropdown'
                    ,'dataLink' => $navName
                    ,'dataItems' => array(
                        'Users'
                        ,'Groups'
//                      ,'Membership'
                        ,'Huntgroups'
                        ,'Tools'
                    )
                    ,'Desc' => sTranslate::Prompt($navName)
                );
            }
            if ((int)self::$sessionUsr['canUsers'] > 0) {
                $navName = "Users";
                $navArray[] = array(
                    'liClass' => ''
                    ,'aClass' => ''
                    ,'faClass' => sTranslate::Prompt($navName, 'fa')
                    ,'dataToggle' => false
                    ,'dataLink' => $navName
                    ,'Desc' => sTranslate::Prompt($navName)
                );
            }
            if ((int)self::$sessionUsr['canKnowledge'] > 0) {
                $navName = "Knowledge";
                $navArray[] = array(
                    'liClass' => ''
                    ,'aClass' => ''
                    ,'faClass' => sTranslate::Prompt($navName, 'fa')
                    ,'dataToggle' => false
                    ,'dataLink' => $navName
                    ,'Desc' => sTranslate::Prompt($navName)
                );
            }
            if ((int)self::$sessionUsr['canAccess'] > 0) {
                $navName = "Accesses";
                $navArray[] = array(
                    'liClass' => ''
                    ,'aClass' => ''
                    ,'faClass' => sTranslate::Prompt($navName, 'fa')
                    ,'dataToggle' => false
                    ,'dataLink' => $navName.'/Access'
                    ,'Desc' => sTranslate::Prompt($navName)
                );
            }
            if ((int)self::$sessionUsr['canHardware'] > 0) {
                $navName = "Hardware";
                $navArray[] = array(
                    'liClass' => ' dropdown'
                    ,'aClass' => ' dropdown-toggle'
                    ,'faClass' => sTranslate::Prompt($navName, 'fa')
                    ,'dataToggle' => 'dropdown'
                    ,'dataLink' => $navName
                    ,'dataItems' => array(
                        'Hardware'
                        ,'Laptop'
                        ,'Computer'
                        ,'Server'
                        ,'Printer'
                        ,'Networking'
                        ,'Security'
                    )
                    ,'Desc' => sTranslate::Prompt($navName)
                );
            }
            if ((int)self::$sessionUsr['canCompany'] > 0) {
                $navName = "Company";
                $navArray[] = array(
                    'liClass' => ' dropdown'
                    ,'aClass' => ' dropdown-toggle'
                    ,'faClass' => sTranslate::Prompt($navName, 'fa')
                    ,'dataToggle' => 'dropdown'
                    ,'dataLink' => $navName
                    ,'dataItems' => array(
                        'Company'
                        ,'Site'
                    )
                    ,'Desc' => sTranslate::Prompt($navName)
                );
            }

            $navName = "Profile";
            $navArray[] = array(
                'liClass' => ''
                ,'aClass' => ''
                ,'faClass' => sTranslate::Prompt($navName, 'fa')
                ,'dataToggle' => true
                ,'dataLink' => $navName
                ,'Desc' => sTranslate::Prompt($navName)
            );

            foreach ($navArray as $i) {
                $returnString .= sNavbar::Prompt($i);
            }
        }

        return $returnString;
    }

/*
 * Sets the right side of the Navigation Bar
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    private static function NavbarRight(): string
    {
        $returnString = '';
        $navName = '';

        if (! empty(self::$sessionUsr)) {
            $navName = "Logout";
            $returnString .= sNavbar::Prompt(
                array(
                    'liClass' => ''
                    ,'aClass' => ''
                    ,'faClass' => sTranslate::Prompt($navName, 'fa')
                    ,'dataToggle' => true
                    ,'dataLink' => $navName
                    ,'Desc' => sTranslate::Prompt($navName)
                )
            );
        } else {
            $navName = "Login";
            $returnString .= sNavbar::Prompt(
                array(
                    'liClass' => ''
                    ,'aClass' => ''
                    ,'faClass' => sTranslate::Prompt($navName, 'fa')
                    ,'dataToggle' => true
                    ,'dataLink' => $navName
                    ,'Desc' => sTranslate::Prompt($navName)
                )
            );
        }

        return $returnString;
    }

/*
 * Sets the <footer> part of the HTML
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    private static function Footer(): string
    {
        return '
            <div class="footer-copyright w-100 text-center py-3 bg-dark">
                <span>© 2020 Krupp-System Kft. Tudástér, Minden jog fenntartva.</span>
            </div>';
    }

/*
 * Builds the site
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Build(): string
    {
        return '
            <!DOCTYPE html>
            <html lang="en">
                '.self::Head().'
                <body>
                    <div id="navbar">
                        <!-- NAVBAR START -->
                            '.self::Navbar().'
                        <!-- NAVBAR END -->
                    </div>
                    <div id="body" style="min-height:75vh; margin-bottom:5.5rem" class="mt-5"></div>
                    <div id="modalBox" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg" id="modalDialog"></div>
                    </div>
                    <footer class="page-footer font-small bg-info mt-4 text-light fixed-bottom">
                        <!-- FOOTER START -->
                        '.self::Footer().'
                        <!-- FOOTER END -->
                    </footer>
                    <resources>
                        '.Load::JS($GLOBALS['rootJs']).'
                    </resources>
                </body>
            </html>';
    }
}

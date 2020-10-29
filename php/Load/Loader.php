<?php

/**
 * Auto Loading Class by Liszi Dániel
 * 
 * Default useage is to call the Directory or File mode of Loading
 * By default Css/Js/Favicon files are returned as <HTML tags> in string format,
 * while PHPs return Boolean on load.
 * 
 * All rights reserved 2020-
 */

declare(strict_types=1);

namespace Load;

class Loader
{
    /**
    * Generates an array of file names and path
    * @param $haystack string
    * @param $needle string
    * @param $mode string
    * @return array
    *
    * @author Liszi Dániel
    * @since 2020.09.30
    */
    private static function getDirectoryItems(string $haystack, string $needle, string $mode): array
    {
        $list = array();
        $startsWith = function ($haystack, $needle) {
            $length = strlen($needle);
            return substr($haystack, 0, $length) === $needle;
        };
        $endsWith = function ($haystack, $needle) {
            $length = strlen($needle);
            if(! $length) {
                return true;
            }
            return substr($haystack, -$length) === $needle;
        };
        if (file_exists($haystack) && $files = scandir($haystack)) {
            foreach ($files as $item) {
                switch ($mode) {
                    case "e":
                        if ($endsWith($item, $needle)) {
                            $list[] = $item;
                        }
                        break;
                    case "s":
                        if ($startsWith($item, $needle)) {
                            $list[] = $item;
                        }
                        break;
                }
            }
        }
        return $list;
    }
    
    /**
    * Re-Useable code for loading items from directory
    * @param $array array
    * @param $type string
    * @return bool
    *
    * @author Liszi Dániel
    * @since 2020.09.30
    */
    protected static function directoryLoad(array $array, string $type): bool
    {
        $stackItems = self::getDirectoryItems($array["dir"], $array["type"], $array["mode"]);
        foreach ($stackItems as $item) {
            if (file_exists($array["dir"].$item)) {
                if (strcmp($type, 'require') === 0) {
                    require $array["dir"].$item;
                } elseif(strcmp($type, 'require_once') === 0) {
                    require_once $array["dir"].$item;
                } elseif(strcmp($type, 'include') === 0) {
                    include $array["dir"].$item;
                } elseif(strcmp($type, 'include_once') === 0) {
                    include_once $array["dir"].$item;
                }
            }
        }
        return true;
    }
    
    protected static function fileLoad(array $array, string $type): bool
    {
        foreach ($array as $item) {
            if (file_exists($item)) {
                if (strcmp($type, 'require') === 0) {
                    require $item;
                } elseif(strcmp($type, 'require_once') === 0) {
                    require_once $item;
                } elseif(strcmp($type, 'include') === 0) {
                    include $item;
                } elseif(strcmp($type, 'include_once') === 0) {
                    include_once $item;
                }
            }
        }
        return true;
    }
/**--------------------------------------------------------------------------*/
    
    /**
    * Loads CSS files into head from directory
    * @param $string string
    * @return string
    *
    * @author Liszi Dániel
    * @since 2020.09.30
    */
    public static function CSS(string $string): string
    {
        $returnString = '<style>';
        
        foreach (self::getDirectoryItems($string, '.css', 'e') as $i) {
            $returnString .= '@import url("'.$GLOBALS['Path'].$string.$i.'");';
        }
        
        $returnString .= '</style>';
        
        return $returnString;
    }
    
    /**
    * Loads JS files into body from directory
    * @param $string string
    * @return string
    *
    * @author Liszi Dániel
    * @since 2020.09.30
    */
    public static function JS(string $string): string
    {
        $returnString = '';
        
        foreach (self::getDirectoryItems($string, '.js', 'e') as $i) {
            $returnString .= "<script nonce='\${nonce}' type='text/javascript' language='javascript' src='".$GLOBALS['Path'].$string.$i."'></script>";
        }
        
        return $returnString;
    }
    
    /**
    * Loads Favicon files into head from directory
    * @param $string string
    * @return string
    *
    * @author Liszi Dániel
    * @since 2020.09.30
    */
    public static function Favicon(string $string): string
    {
        $returnString = '';
        
        foreach (self::getDirectoryItems($string, 'favicon', 's') as $i) {
            $returnString .= "<link rel='icon' type='image/png' href='".$GLOBALS['Path'].$string.$i."'>";
        }
        
        return $returnString;
    }
}
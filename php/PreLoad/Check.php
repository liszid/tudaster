<?php

declare(strict_types=1);

namespace PreLoad;

class Check
{
/**
 * Checks if a specific Post is set
 * @param $string string
 * @return bool
 *
 * @author Liszi Dániel
 * @since 2020.10.05
 */
    public static function isPost(string $string): string
    {
        return (isset($_POST[$string])) ? $_POST[$string] : '';
    }

/**
 * Checks if a specific Get is set
 * @param $string string
 * @return bool
 *
 * @author Liszi Dániel
 * @since 2020.10.05
 */
    public static function isGet(string $string): string
    {
        return (isset($_GET[$string])) ? $_GET[$string] : '';
    }

/**
 * Checks if a specific Post or Get is set
 * @param $array array
 * @return bool
 *
 * @author Liszi Dániel
 * @since 2020.10.05
 */
    public static function isEither(array $array): string
    {
	if(! is_array($array['post']) && ! is_array($array['get'])) {
	    if (($returnString = self::isPost($array['post'])) !== '') {
		return $returnString;
	    } elseif (($returnString = self::isGet($array['get'])) !== '') {
		return $returnString; 
	    } else {
		return $array['fallBack'];
            }
        } else {
    	    if (is_array($array['post'])) {
    		foreach ($array['post'] as $i) {
    		    if(($returnString = self::isPost($i)) !== '') {
    		        return $returnString;
    		    }
    		}
    	    } else {
    		if (($returnString = self::isPost($array['post'])) !== '') {
    		    return $returnString;
    		}
    	    }
    	    if (is_array($array['get'])) {
    		foreach ($array['get'] as $i) {
    		    if (($returnString = self::isPost($i)) !== '') {
    			return $returnString;
    		    }
    		}
    	    } else {
    		if (($returnString = self::isPost($array['get'])) !== '') {
    		    return $returnString;
    		}
    	    }
    	    
    	    return $array['fallBack'];
        }
    }
}
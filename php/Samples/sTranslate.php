<?php

declare(strict_types=1);

namespace Samples;

use PreLoad\{
    Valid,
    Check,
    Log
};

class sTranslate implements sTranslate\ACTION, sTranslate\ROLE, sTranslate\ROLE_SELECT, sTranslate\TRANSLATE{

/*
 * Prompts respective name from array[type]
 * @param $string string
 * @param $type string
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.26
 */
    public static function Prompt(string $string, string $type = 'navbar'): string
    {
        if (array_key_exists($string, self::TRANSLATE)) {
    	    return  self::TRANSLATE[$string][$type];
    	} else {
    	    return 'Ismeretlen kifejezés';
    	}
    }

/*
 * Returns the info array of the key if exists
 * @param $string string
 * @return array
 * @author Liszi Dániel
 * @since 2020.10.26
 */
    public static function Info(string $string): array
    {
        if (array_key_exists($string, self::TRANSLATE)) {
            if(isset(self::TRANSLATE[$string]['info'])) {
                $array = self::TRANSLATE[$string]['info'];
                $array['path'] = $string;
                return  $array;
    	    } else {
                return array();
    	    }
    	} else {
    	    return array();
    	}
    }

/*
 * Returns a HTML Title on set size
 * @param $array array
 * @param $size int
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Title(string $string, int $size = 1): string
    {
	    if (array_key_exists($string, self::TRANSLATE)) {
	        return '<h'.$size.'><i class="fa fa-'.self::TRANSLATE[$string]['fa'].'" aria-hidden="true"></i> '.self::TRANSLATE[$string]['title'].'</h'.$size.'>';
	    } else {
	        return '<h'.$size.'><i class="fa fa-question" aria-hidden="true"></i> Ismeretlen</h'.$size.'>';
	    }
    }
}

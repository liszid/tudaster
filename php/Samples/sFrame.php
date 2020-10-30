<?php

declare(strict_types=1);

namespace Samples;

use PreLoad\{
    Valid,
    Check,
    Log
};

class sFrame {
/*
 * Default Modal display function
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Modal(array $array = array()): string
    {
	if (! empty($array)) {
	    return '
	    <div class="modal-content">
		<div class="modal-header">
			'.sTranslate::Title($array['path'], 4).'
	            <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        <div class="modal-body">
		    '.$array['content'].'
	        </div>
                <div class="modal-footer">
	            <button type="button" class="btn btn-default" data-dismiss="modal">Bezár</button>
	        </div>
	    </div>';
        } else {
    	    return '';
        }
    }

/*
 * Default Page display function
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Page(array $array = array()): string
    {
	if (! empty($array)) {
	    $explode = explode("/", $array['path']);
	    $Origin = (count($explode) > 1)? $explode[count($explode) - 1] : $array['path'];
		
	    $returnString = '
		<div class="container-fluid bg-info text-white p-3 pl-5">
		    '.sTranslate::Title($array['path']).'
		</div>
		<div class=" row justify-content-center m-0 m-md-3">
		    '.sBreadcrumbs::Prompt($array['path']).'
		    <div class="col-11 mt-2">
			'.$array['content'].'
		    </div>
		</div>';

	    return $returnString;
	} else {
	    return '';
	}
    }
}
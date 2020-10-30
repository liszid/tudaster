<?php

declare(strict_types=1);

namespace Samples;

use PreLoad\{
    Valid,
    Check,
    Log
};

class sCard
{
/*
 * Used to display Blank card
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Blank(array $array): string
    {
	return '
	<div class="card border-'.$array['color'].''.((isset($array['class']))?' '.$array['class']:'').'" '.((isset($array['bool']))?'style="max-width: 18rem;"': '').'>
	    <div class="card-header bg-'.$array['color'].' text-white border-'.$array['color'].'">'.$array['header'].'</div>
	    <div class="card-body text-'.$array['color'].'">
		'.((Valid::vString($array['title']))?'<h5 class="card-title">'.$array['title'].'</h5>':'').'
		<p class="card-text">'.$array['text'].'</p>
	    </div>
	</div>
	';
    }

/*
 * Used to display Colorized card
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Fill(array $array): string
    {
	return '
	<div class="card text-white bg-'.$array['color'].' m-2" '.((isset($array['bool']))?'style="max-width: 18rem;"': '').'>
	    <div class="card-header">'.$array['header'].'</div>
	    <div class="card-body">
		'.((Valid::vString($array['title']))?'<h5 class="card-title">'.$array['title'].'</h5>':'').'
		<p class="card-text">'.$array['text'].'</p>
	    </div>
	</div>
	';
    }

/*
 * Used to display a Collapsible section
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Collapsible(array $array): string
    {
	$accordionId = 'accordion-'.md5('accordion-'.rand());
	$headingId = 'heading-'.md5('heading-'.rand());
	$collapseId = 'collapse-'.md5('collapse-'.rand());
	return '
	    <div id="'.$accordionId.'" class="mb-2">
		<div class="card">
		    <div class="card-header" id="'.$headingId.'">
			<h5 class="mb-0">
			    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#'.$collapseId.'" aria-expanded="false" aria-controls="'.$collapseId.'">
				'.$array['header'].'
			    </button>
			</h5>
		    </div>
		    <div id="'.$collapseId.'" class="collapse" aria-labelledby="'.$headingId.'" data-parent="#'.$accordionId.'">
			<div class="card-body">
			    '.$array['text'].'
			</div>
		    </div>
		</div>
	    </div>';
    }
}
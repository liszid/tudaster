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
}
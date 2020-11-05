<?php

declare(strict_types=1);

namespace Samples\sAdministrative;

class Membership extends \Samples\sAdministrative
{
    public function __construct(){
        parent::__construct();
    }

/*
* Return Membership Editing form
* @param $array array
* @return string
* @author Liszi Dániel
* @since 2020.11.04
*/
    private static function Edit(array $array = array()): string
    {
        return 'Edit, dp: '.$array['dp'];
    }
}

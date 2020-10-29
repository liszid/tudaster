<?php

declare(strict_types=1);

namespace Samples;

use PreLoad\{
    Valid,
    Check,
    Log
};

use Data\{
    dUser,
    dGroup,
    dCombined
};

class sAdministrative {
    public static function Users(array $array = array()): string
    {
	$dUser = new dUser();
	$returnString = '';
	$Users = $dUser::Select(array(), 'All');
	$returnString .=sCard::Fill(
	    array(
		'color' => 'success',
		'header' => 'Információ',
		'title' => '',
		'text' => '
		    <b>Felhasználói jelszó alaphelyzetbe állítása: </b><a class="btn btn-warning btn-sm"><i class="fa fa-undo" aria-hidden="true"></i></a> ||
		    <b>Felhasználói fiók törlése: </b><a class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
		'
	    )
	);
	$returnString .= sTables::Prompt($Users, 'Admin_Users');
	return $returnString;
    }
    
    public static function Groups(array $array = array()): string
    {
	$dGroup = new dGroup();
	$returnString = '';
	$Groups = $dGroup::Select(array(), 'All');
	$returnString .=sCard::Fill(
            array(
                'color' => 'success',
                'header' => 'Információ',
                'title' => '',
                'text' => '
            		<b>mG</b> - Csoportok kezelése 
            		| <b>mU</b> - Felhasználók kezelése 
            		| <b>cUs</b> - Regisztráltak megtekintése 
            		| <b>cC</b> - Cégek jogosultság 
            		| <b>cK</b> - Tudáscikkek jogosultság 
            		| <b>cUn</b> - Hozzáférések alap jogosultság 
            		| <b>cP</b> - Hozzáférések emelt jogosultság 
            		| <b>cH</b> - Hardver jogosultság 
            		| <b>cS</b> - Szoftver jogosultság 
            		| <b>cE</b> - Profil szerkesztés 
            		| <b>cL</b> - Bejelentkezés
            	    <br />
                    <b>Csoport szerkesztése: </b><a class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a> <br />
                    <b>Csoport törlése: </b><a class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                '
            )
        );
	$returnString .= sTables::Prompt($Groups, 'Admin_Groups');
	return $returnString;
    }
    
    public static function Membership(array $array = array()): string
    {
	$dCombined = new dCombined();
	$returnString = '';
	$Members = $dCombined::Select(array(), 'Member_Full');
	$returnString .= sTables::Prompt($Members, 'Admin_Members');
	return $returnString;
    }
}
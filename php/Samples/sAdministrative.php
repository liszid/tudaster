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
/*
 * Used at Administrative Page to display Users section
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Users(array $array = array()): string
    {
	$dUser = new dUser();
	$returnString = '';
	$Users = $dUser::Select(array(), 'All');
	$returnString .=sCard::Collapsible(
	    array(
		'color' => 'success',
		'header' => 'Információ',
		'title' => '',
		'text' => '
		    <b>Felhasználói jelszó alaphelyzetbe állítása: </b><a class="btn btn-warning btn-sm"><i class="fa fa-undo" aria-hidden="true"></i></a><br />
		    <b>Felhasználói fiók törlése: </b><a class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
		'
	    )
	);
	$returnString .= sTables::Prompt($Users, 'Admin_Users');
	return $returnString;
    }

/*
 * Used at Administrative Page to display Groups section
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Groups(array $array = array()): string
    {
	$dGroup = new dGroup();
	$returnString = '';
	$Groups = $dGroup::Select(array(), 'All');
	$returnString .=sCard::Collapsible(
            array(
                'color' => 'success',
                'header' => 'Információ',
                'title' => '',
                'text' => '
            		<b>mG</b> - Csoportok kezelése <br />
            		<b>mU</b> - Felhasználók kezelése <br /> 
            		<b>cUs</b> - Regisztráltak megtekintése  <br />
            		<b>cC</b> - Cégek jogosultság <br />
            		<b>cK</b> - Tudáscikkek jogosultság <br />
            		<b>cUn</b> - Hozzáférések alap jogosultság <br />
            		<b>cP</b> - Hozzáférések emelt jogosultság <br />
            		<b>cH</b> - Hardver jogosultság <br />
            		<b>cS</b> - Szoftver jogosultság <br />
            		<b>cE</b> - Profil szerkesztés <br />
            		<b>cL</b> - Bejelentkezés <br />
            	    <br />
                    <b>Csoport szerkesztése: </b><a class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a> <br />
                    <b>Csoport törlése: </b><a class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                '
            )
        );
	$returnString .= sTables::Prompt($Groups, 'Admin_Groups');
	return $returnString;
    }

/*
 * Used at Administrative Page to display Membership section
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Membership(array $array = array()): string
    {
	$dCombined = new dCombined();
	$returnString = '';
	$Members = $dCombined::Select(array(), 'Member_Full');
	$returnString .= sTables::Prompt($Members, 'Admin_Members');
	return $returnString;
    }
}
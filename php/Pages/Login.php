<?php

declare(strict_types=1);

use PreLoad\{
    Log,
    Check,
    Valid
};

use Samples\{
    sRedirect,
    sFrame
};

use Data\{
    dUser,
    dCombined
};

if ( ! Valid::vArray($sessionUsr) ) {
    $return = '';
    if (isset($_POST['Login'])) {

	$collectiveArray = array(
	    array(
		'type'  =>  'Login',
		'func'  =>  function (array $array, string $type): array
        {
            $dUser = new dUser();
            $dCombined = new dCombined();
            if (strcmp($type, 'Login') === 0) {
                return (($var = ($dCombined->Select(($dUser->Select($array, $type))[0],'User_Full'))[0])['canLogin'] > 0)? $var : array();
            } elseif(strcmp($type, 'byUserName') === 0) {
                return ($dUser->Select($array, $type))[0];
            } else {
                return array();
            }
        },
		'array' =>  $_POST,
		'desc'  =>  'Bejelentkezés'
	    )
	);
	foreach ( $collectiveArray as $e ) {
	    if (isset($_POST[$e['type']])) {
		echo sRedirect::Sample(
		    array(
			'bool'      =>  $e['func']($e['array'], $e['type']),
			'login'     =>  true,
			'id'        =>  $e['func'](array('nameUser' => $e['array']['nameUser']), 'byUserName')['userId'],
			'redirect'  =>  array(
			    'icon'  =>  'fa-sign-in',
			    'title' =>  'Bejelentkezés',
			    'desc'  =>  $e['desc'],
			    'fail'  =>  "Instance.initElmnt('x=Login&nameUser=".$e['array']['nameUser']."', 'modalDialog');"
			)
		    )
		);
	    }
	}
    }
    elseif (isset($_POST['x']) && $_POST['x'] === 'Login') {
	$urlPaths = array(
	    'Root' => 'Login'
	);
	$modalBody = '
	    <form class="needs-validation" novalidate autocomplete="on">
                <div class="form-group col-12 p-1">
                    <div class="input-group pb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" id="usrLogin-nameUser" '.((isset($_POST['nameUser']) && Valid::vString($_POST['nameUser']))?'value="'.$_POST['nameUser'].'"':'placeholder="Felhasználónév"').' autocomplete="username" required>
                    </div>
                    <div class="input-group pb-1">
                        <input type="password" class="form-control" id="usrLogin-pWord" placeholder="Jelszó" autocomplete="current-password" required>
                    </div>
                    <button class="btn btn-primary col-12" id="usrLogin-button">Bejelentkezés</button>
                </div>
            </form>';

        echo sFrame::Modal(array('path' => $urlPaths['Root'], 'content' => $modalBody));
    } else {
	echo sRedirect::Home();
    }
} else {
    echo sRedirect::Home();
}

<?php

declare(strict_types=1);

use PreLoad\{
    Log,
    Check,
    Valid
};

use Samples\{
    sFrame,
    sElement,
    sRedirect,
    sActivity,
    sTranslate
};

use Data\{
    dUser,
    dCombined
};

if ( ! Valid::vArray($sessionUsr) ) {
    $urlPaths = array(
        'Root' => 'Login'
    );


    if (isset($_POST['Login'])) {
        $dUser = new dUser();
        $dCombined = new dCombined();

        $selectLogin = $dUser->Select($_POST, 'Login');
        $returnContent = '
            <div class="text-center justification-centered">
                <h4>'.sTranslate::ACTION['Fail']['content'].'</h4>
                '.sElement::General(array('x' => 'Home', 'reload' => true), 'Spinner').'
            </div>';

        if (isset($selectLogin[0]) && Valid::vArray($selectLogin[0])) {
            $userVar = $dCombined->Select($selectLogin[0],'User_Full');
            if (isset($userVar[0]) && Valid::vArray($userVar[0])) {
                if ($userVar[0]['canLogin'] > 0) {
                    sActivity::Set($userVar[0]);
                    $returnContent = '
                        <div class="text-center justification-centered">
                            <h4>'.sTranslate::ACTION['Success']['content'].'</h4>
                            '.sElement::General(array('x' => 'Home', 'reload' => true), 'Spinner').'
                        </div>';
                }
            }
        }
        echo sFrame::Modal(array('path' => $urlPaths['Root'], 'content' => $returnContent));
    } elseif (isset($_POST['x']) && ! strcmp($_POST['x'], 'Login')) {
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

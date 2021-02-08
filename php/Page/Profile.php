<?php

declare(strict_types=1);

use PreLoad\
{
    Log,
    Check,
    Valid
};

use Data\
{
    dUser,
    dCombined
};

use Samples\
{
    sRoles,
    sFrame,
    sElement,
    sProfile,
    sRedirect,
    sActivity,
    sTranslate
};
if (isset($sessionUsr['userId'])) {
    $dUser = new dUser();
    $dCombined = new dCombined();
    $urlPaths = array(
        'Root' => 'Profile'
    );

    if(isset($_POST["Save"]) && (int)$sessionUsr['canEdit'] > 0) {
        $returnText = sTranslate::ACTION['Fail']['content'];

        if ($dUser::Update($_POST, Check::isPost('y'))) {
            sActivity::Set(($dCombined->Select($sessionUsr,'User_Full'))[0]);
            $returnText = sTranslate::ACTION['Success']['content'];
        }

        $returnContent = '
                <div class="text-center justification-centered">
                    <h4>'.$returnText.'</h4>
                    '.sElement::General(array('x' => 'Profile', 'reload' => true), 'Spinner').'
                </div>';

        echo sFrame::Modal(array('path' => 'Profile', 'content' => $returnContent));

    } elseif (isset($_POST['x']) && ! strcmp($_POST['x'], 'Profile')) {
        $User = ($dCombined->Select($sessionUsr,'User_Full'))[0];
        $modalText = '';

        if (isset($_POST['dp'])) {
            $modalText = sProfile::Prompt($User, $_POST['dp']);
        } else {
            $modalText = sProfile::Prompt($User,'Self');
        }

        $modalBody = '
            <div class="container bootstrap snippet">
                <div class="row">
                    <div class="col-md-8">
                        '.$modalText.'
                    </div>
                    <div class="col-md-4">
                        '.(sActivity::Prompt($sessionAct)).'
                        <br />
                        '.(sRoles::Prompt($sessionUsr)).'
                    </div>
                </div>
            </div>';
        echo sFrame::Modal(array('path' => $urlPaths['Root'], 'content' => $modalBody));
    } else {
        echo sRedirect::Home();
    }
}
else
{
    echo sRedirect::Home();
}

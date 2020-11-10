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

    if(isset($_POST["Save"]) && (int)$sessionUsr['canEdit'] > 0) {
        $returnContent = '
            <div class="text-center justification-centered">
                <h4>'.sTranslate::ACTION['Fail']['content'].'</h4>
                '.sElement::General(array('x' => 'Profile', 'reload' => true), 'Spinner').'
            </div>';

        if ($dUser::Update($_POST, 'Profile')) {
            sActivity::Set(($dCombined->Select($sessionUsr,'User_Full'))[0]);
            $returnContent = '
                <div class="text-center justification-centered">
                    <h4>'.sTranslate::ACTION['Success']['content'].'</h4>
                    '.sElement::General(array('x' => 'Profile', 'reload' => true), 'Spinner').'
                </div>';
        }

        echo sFrame::Modal(array('path' => 'Profile', 'content' => $returnContent));
    } elseif (isset($_POST['x']) && ! strcmp($_POST['x'], 'Profile')) {
        $User = ($dCombined->Select($sessionUsr,'User_Full'))[0];
        $urlPaths = array(
                        'Root' => 'Profile'
                    );
        $modalBody = '
                     <div class="container bootstrap snippet">
                         <div class="row">
                             <div class="col-md-8">
                                '.(
                                    (
                                        isset($_POST['dp'])
                                        && ! strcmp($_POST['dp'], 'editProfile')
                                    )
                                        ? sProfile::Prompt($User,'Edit')
                                        : sProfile::Prompt($User, 'Self')
                                ).'
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

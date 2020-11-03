<?php

declare(strict_types=1);

use PreLoad\
{
    Valid,
    Check,
    Log
};

use Data\
{
    dCombined,
    dUser
};

use Samples\
{
    sActivity,
    sRoles,
    sProfile,
    sRedirect,
    sFrame,
    sTranslate
};
if (isset($sessionUsr['userId']))
{
    if(isset($_POST["Save"]) && $sessionUsr['canEdit'])
    {
        $collectiveArray = array(
                               array(
                                   'type'  =>  'Save',
                                   'func'  =>  function(array $array): bool {$dUser = new dUser(); return $dUser::Update($array, 'Profile');},
                                   'array'  =>  array(
                                       'nameFirst' => $_POST['nameFirst'],
                                       'nameLast' => $_POST['nameLast'],
                                       'contPhone' => $_POST['contPhone'],
                                       'contSite' => $_POST['contSite'],
                                       'thumbnail' => $_POST['thumbnail'],
                                       'userId' => $sessionUsr['userId']
                                   ),
                                   'desc'  =>  'Update'
                               )
                           );
        foreach( $collectiveArray as $e )
        {
            if (isset($_POST[$e['type']]))
            {
                echo sRedirect::Sample(
                    array(
                        'bool'      =>  $e['func']($e['array']),
                        'redirect'  =>  array(
                            'icon'      =>  sTranslate::TRANSLATE['Profile']['fa'],
                            'title'     =>  sTranslate::TRANSLATE['Profile']['title'],
                            'desc'      =>  $e['desc'],
                            'success'   =>  "Instance.initElmnt('d=Profile', 'modalDialog');",
                            'fail'      =>  "Instance.initElmnt('d=Profile&editProfile=', 'modalDialog');"
                        )
                    )
                );
            }
        }
    }
    elseif (isset($_POST['x']) && strcmp($_POST['x'], 'Profile') === 0)
    {
        $dCombined = new dCombined();
        $User = ($dCombined->Select($sessionUsr,'User_Full'))[0];
        $urlPaths = array(
                        'Root' => 'Profile'
                    );
        $modalBody = '
                     <div class="container bootstrap snippet">
                     <div class="row">
                     <div class="col-md-8">
                     '.((! isset($_POST['editProfile']))? sProfile::Prompt($User,'Self') : sProfile::Prompt($User, 'Edit')).'
                     </div>
                     <div class="col-md-4">
                     '.(sActivity::Prompt($sessionAct)).'
                     <br />
                     '.(sRoles::Prompt($sessionUsr)).'
                     </div>
                     </div>
                     </div>';
        echo sFrame::Modal(array('path' => $urlPaths['Root'], 'content' => $modalBody));
    }
    else
    {
        echo sRedirect::Home();
    }
}
else
{
    echo sRedirect::Home();
}

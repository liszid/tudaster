<?php

declare(strict_types=1);

namespace Samples;

class sProfile implements sProfile\ICONS
{
/*
 * Collective function for Profile display
 * @param $array array
 * @param $type string
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Prompt(array $array = array(), string $type = ''): string
    {
        switch ($type) {
            case 'Self':
                return self::Profile($array, true);
                break;
            case 'Other':
                return self::Profile($array, false);
                break;
            case 'Edit':
                return self::Edit($array);
                break;
            case 'Password':
                return self::Password($array);
                break;
        }
    }

/**
* Bool represents if its an inside or outside load of the profile
* @param $array array
* @param $bool bool
* @return string
* @author Liszi Dániel
* @since 2020.10.12
*/
    private static function Profile(array $array = array(), bool $bool = false): string
    {
        return '
            <div class="col-md-12 m-0 p-1">
                <div class="text-center">
            	    <h1>'.$array['userName'].'</h1>
                    <i class="fa fa-'.$array['userThumbnail'].' fa-5x"></i>
                </div>
                <hr>
                <div class="form-group col m-0 p-0">
                    <div class = "col-12 row m-0 p-0">
                        '.self::Property(array('desc' => "Jogosultságkör", 'value' => $array['groupName'])).'
                        '.self::Property(array('desc' => "Leírás", 'value' => $array['groupDesc'])).'
                        '.self::Property(array('desc' => "Vezetéknév", 'value' => $array['userLastName'])).'
                        '.self::Property(array('desc' => "Keresztnév", 'value' => $array['userFirstName'])).'
                        '.self::Property(array('desc' => "Telephely", 'value' => $array['userContSite'])).'
                        '.self::Property(array('desc' => "E-mail", 'value' => $array['userContEmail'])).'
                        '.self::Property(array('desc' => "Telefon", 'value' => $array['userContPhone'])).'
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12 row text-center justify-content-center">'
                    .self::Button(array('canEdit' => $array['canEdit'], 'dataPost' => 'Edit', 'title' => 'Szerkesztés'), $bool)
                    .self::Button(array('canEdit' => $array['canEdit'], 'dataPost' => 'Password', 'title' => 'Jelszó'), $bool)
                .'</div>
                </div>
        	</div>';
    }

/*
 * Adds profile property element
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    private static function Property(array $array): string
    {
        return '
            <div class="container col-12 my-2 p-1 border-bottom border-right">
                <b>'.$array['desc'].'</b><span class="float-right">'.$array['value'].'</span>
            </div>';
    }

/*
 * Adds Editor button on Profile
 * @param $array array
 * @param $bool bool
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    private static function Button(array $array, bool $bool): string
    {
        if ($bool) {
            return '
                    <a href="#" class="mx-1 btn btn-lg btn-info'.(((int)$array['canEdit'] === 0)?' disabled':'').'" role="button" data-link="Profile" href="#" data-target="#modalBox" data-post="'.$array['dataPost'].'">
                        <i class="fa fa-pencil"></i> '.$array['title'].'
                    </a>';
        } else {
            return '';
        }
    }

/*
 * Displays Profile Editor
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    private static function Edit(array $array = array()):string
    {
        return '
        <div class="col-md-12 m-0 p-0">
            <div class="text-center">
        	<h1>'.$array['userName'].'</h1>
                <i class="fa fa-'.$array['userThumbnail'].' fa-5x"></i>
            </div>
            <hr />
            <form method="post" class="form-group col-12 m-0 p-0" autocomplete="on">
                <div class="form-group col m-0 p-0">
                    <div class="col-12 row m-0 p-0">
                        '.sElement::General(array('origo' => 'usrEdit', 'data' => 'userId', 'desc' => 'Id', 'value' => $array['userId'], 'type' => 'hidden'), 'Input').'
                        '.sElement::General(array('origo' => 'usrEdit', 'data' => 'userThumbnail', 'desc' => 'Ikon', 'value' => $array['userThumbnail'], 'select' => self::ICONS, 'fa'=> true, 'type' => 'select'), 'Input').'
                        '.sElement::General(array('origo' => 'usrEdit', 'data' => 'userLastName', 'desc' => 'Vezetéknév', 'value' => $array['userLastName'], 'type' => 'text'), 'Input').'
                        '.sElement::General(array('origo' => 'usrEdit', 'data' => 'userFirstName', 'desc' => 'Keresztnév', 'value' => $array['userFirstName'], 'type' => 'text'), 'Input').'
                        '.sElement::General(array('origo' => 'usrEdit', 'data' => 'userContPhone', 'desc' => 'Telefon', 'value' => $array['userContPhone'], 'type' => 'text'), 'Input').'
                        '.sElement::General(array('origo' => 'usrEdit', 'data' => 'userContSite', 'desc' => 'Telephely', 'value' => $array['userContSite'], 'type' => 'text'), 'Input').'
                    </div>
                </div>
                <hr />
                <div class="form-group">
                    <div class="col-12 row">
                        <button class="btn btn-lg btn-success col-12 col-md-6" type="submit" id="usrEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        <button class="btn btn-lg col-12 col-md-6" type="submit" id="usrEdit-cancel"><i class="fa fa-ban"></i> Vissza</button>
                    </div>
                </div>
            </form>
        </div>';
    }

/*
 * Displays Profile Editor
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    private static function Password(array $array = array()):string
    {
        return '
        <div class="col-md-12 m-0 p-0">
            <div class="text-center">
        	<h1>'.$array['userName'].'</h1>
                <i class="fa fa-'.$array['userThumbnail'].' fa-5x"></i>
            </div>
            <hr />
            <form method="post" class="form-group col-12 m-0 p-0" autocomplete="on">
                <div class="form-group col m-0 p-0">
                    <div class="col-12 row m-0 p-0">'
                        .sElement::General(array('origo' => 'usrPassword', 'data' => 'userId', 'desc' => 'Id', 'value' => $array['userId'], 'type' => 'hidden'), 'Input')
                        .sElement::General(array('origo' => 'usrPassword', 'data' => 'userPassword_Old', 'desc' => 'Régi jelszó', 'value' => '', 'type' => 'password'), 'Input')
                        .sElement::General(array('origo' => 'usrPassword', 'data' => 'userPassword_New', 'desc' => 'Új jelszó', 'value' => '', 'type' => 'password'), 'Input')
                        .sElement::General(array('origo' => 'usrPassword', 'data' => 'userPassword_Repeat', 'desc' => 'Új jelszó', 'value' => '', 'type' => 'password'), 'Input')
                    .'</div>
                </div>
                <hr />
                <div class="form-group">
                    <div class="col-12 row">
                        <button class="btn btn-lg btn-success col-12 col-md-6" type="submit" id="usrPassword-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        <button class="btn btn-lg col-12 col-md-6" type="submit" id="usrPassword-cancel"><i class="fa fa-ban"></i> Vissza</button>
                    </div>
                </div>
            </form>
        </div>';
    }
}

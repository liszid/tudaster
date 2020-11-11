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
            <div class="col-md-12">
                <div class="text-center">
            	    <h1>'.$array['nameUser'].'</h1>
                    <i class="fa fa-'.$array['thumbnail'].' fa-5x"></i>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                    <hr>
                        <div class="form-group col">
                    	    <div class = "col-12 row m-1">
                                '.self::Property(array('desc' => "Szerepkör", 'value' => $array['groupName'])).'
                                '.self::Property(array('desc' => "Leírás", 'value' => $array['groupDesc'])).'
                    	    </div>
                    	    <hr />
                            <div class = "col-12 row m-1">
                                '.self::Property(array('desc' => "Vezetéknév", 'value' => $array['nameLast'])).'
                                '.self::Property(array('desc' => "Keresztnév", 'value' => $array['nameFirst'])).'
                                '.self::Property(array('desc' => "Telephely", 'value' => $array['contSite'])).'
                                '.self::Property(array('desc' => "E-mail", 'value' => $array['contEmail'])).'
                                '.self::Property(array('desc' => "Telefon", 'value' => $array['contPhone'])).'
                            </div>
                        </div>
                        '.self::Button($array, $bool).'
                        <hr />
                    </div>
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
	    <div class="container p-1 my-1 border col-12  m-1">
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
        	<div class="form-group">
                <div class="col-12 row text-center justify-content-center">
                    <a href="#" class="btn btn-lg btn-info'.(((int)$array['canEdit'] === 0)?' disabled':'').'" role="button" data-link="Profile" href="#" data-target="#modalBox" data-post="Edit">
                        <i class="fa fa-pencil"></i> Szerkesztés
                    </a>
                </div>
        	</div>';
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
//'.sElement::General(array('origo' => 'usrEdit', 'data' => 'thumbnail', 'desc' => 'Ikon', 'value' => $array['thumbnail'], 'type' => 'text'), 'Input').'
    private static function Edit(array $array = array()):string
    {
        return '
        <div class="col-md-12">
            <div class="text-center">
        	<h1>'.$array['nameUser'].'</h1>
                <i class="fa fa-'.$array['thumbnail'].' fa-5x"></i>
                <p><a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Ikonok keresése</a></p>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>
                    <form method="post" class="form-group col-12" autocomplete="on">
                        <div class="form-group col p-0">
                            <div class="col-12 row">
                                '.sElement::General(array('origo' => 'usrEdit', 'data' => 'userId', 'desc' => 'Id', 'value' => $array['userId'], 'type' => 'hidden'), 'Input').'
                                '.sElement::General(array('origo' => 'usrEdit', 'data' => 'thumbnail', 'desc' => 'Ikon', 'value' => $array['thumbnail'], 'select' => self::ICONS, 'fa'=> true, 'type' => 'select'), 'Input').'
                                '.sElement::General(array('origo' => 'usrEdit', 'data' => 'nameLast', 'desc' => 'Vezetéknév', 'value' => $array['nameLast'], 'type' => 'text'), 'Input').'
                                '.sElement::General(array('origo' => 'usrEdit', 'data' => 'nameFirst', 'desc' => 'Keresztnév', 'value' => $array['nameFirst'], 'type' => 'text'), 'Input').'
                                '.sElement::General(array('origo' => 'usrEdit', 'data' => 'contPhone', 'desc' => 'Telefon', 'value' => $array['contPhone'], 'type' => 'text'), 'Input').'
                                '.sElement::General(array('origo' => 'usrEdit', 'data' => 'contSite', 'desc' => 'Telephely', 'value' => $array['contSite'], 'type' => 'text'), 'Input').'
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12 row">
                                <button class="btn btn-lg btn-success col-12 col-md-6" type="submit" id="usrEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                                <button class="btn btn-lg col-12 col-md-6" type="submit" id="usrEdit-cancel"><i class="fa fa-ban"></i> Vissza</button>
                            </div>
                        </div>
                    </form>
                    <hr />
                </div>
            </div>
        </div>';
    }
}

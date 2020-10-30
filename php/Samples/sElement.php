<?php

declare(strict_types=1);

namespace Samples;

class sElement
{
/*
 * Collective function for User related elements
 * @param $array array
 * @param $type string
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function User(array $array = array(), string $type = ''): string
    {
        switch ($type) {
            case 'Activity':
                return self::UserActivity($array);
                break;
            case 'Edit':
                return self::UserEdit($array);
                break;
        }
    }
/*
 * Used to display user activity elements
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    private static function UserActivity(array $array): string
    {
        return '
            <li class="list-group-item text-right">
                <span class="pull-left"><strong>'.$array['desc'].'</strong></span> '.$array['data'].'
            </li>
        ';
    }
/*
 * Used to display Profile editor elements (degraded)
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    private static function UserEdit(array $array): string
    {
        return '
            <div class="form-group row col-12 p-0">
                <label for="usrEdit-'.$array['data'].'" class="col-sm-3 col-form-label">'.$array['desc'].'</label>
                <div class="col-sm-9">
                    <input type="'.$array['type'].'" class="form-control" id="usrEdit-'.$array['data'].'" value="'.$array['value'].'">
                </div>
            </div>
        ';
    }
    
/*
 * Collective function for Administrative related elements (degraded)
 * @param $array array
 * @param $type string
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    public static function Admin(array $array = array(), string $type = ''): string
    {
        switch ($type) {
            case 'Navbar': 
                return self::AdminNavbar($array);
                break;
            case 'Content':
                return self::AdminContent($array);
                break;
        }
    }
/*
 * Used to display Administrative menu elements (degraded)
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    private static function AdminNavbar(array $array): string
    {
        return ($array['bool'] > 0)
            ?'<li class="nav-item"> <a class="nav-link'.(($array['active']) ? ' active' : '').'" id="pills-'.$array['id'].'-tab" data-toggle="pill" href="#pills-'.$array['id'].'" role="tab" aria-controls="pills-'.$array['id'].'" aria-selected="'.$array['active'].'">'.$array['desc'].'</a> </li>'
            :'';
    }
/*
 * Used to display Administrative menu content (degraded)
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.10.30
 */
    private static function AdminContent(array $array): string
    {
        return ($array['bool'] > 0)
            ?'<div class="tab-pane fade'.(($array['active']) ? ' show active' : '').'" id="pills-'.$array['id'].'" role="tabpanel" aria-labelledby="pills-'.$array['id'].'-tab">'.$array['content'].'</div>'
            :'';
    }
}
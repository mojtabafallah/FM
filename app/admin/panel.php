<?php


namespace app\admin;


//مدیریت پنل مدیریت

use app\Views\Views;

class panel
{
    public static function load_admin_panel()
    {
         Views::render_admin('main');
    }
    public static function load_menu_panel()
    {
         Views::render_admin('menu');
    }
    public static function load_slider_panel()
    {
        Views::render_admin('slider');
    }


}
<?php

namespace app\controller;
use app\admin\panel;


class MenuController
{
    public static $table_name = 'menu';

    public static function my_menu_pages()
    {
        add_menu_page('تنظیمات قالب', 'تنظیمات قالب', 'manage_options', 'setting_theme', array(panel::class, 'load_admin_panel'));
        add_submenu_page('setting_theme', 'تنظیمات منو اصلی', 'منو', 'manage_options', 'setting_menu', array(panel::class, 'load_menu_panel'));
        add_submenu_page('setting_theme', 'تنظیمات اسلایدر', 'اسلایدر', 'manage_options', 'setting_slider', array(panel::class, 'load_slider_panel'));
    }

//    public static function get_all_menu()
//    {
//
//        return DbController::get_data(self::$table_name);
//    }
//
//    public static function add_new_menu($data)
//    {
//        DbController::add_new_item(self::$table_name,$data);
//    }
//
//    public static function get_all_parent()
//    {
//        return DbController::get_data(self::$table_name,['parent','=',0]);
//    }
//
//    public static function delete_menu($id)
//    {
//        DbController::delete_item(self::$table_name,$id);
//    }
//
//    public static function edit_menu($id, array $data)
//    {
//        DbController::Edit_item(self::$table_name,$id,$data);
//    }
//
//    public static function get_child_menu($id_parent)
//    {
//        return DbController::get_data(self::$table_name,['parent','=',$id_parent]);
//    }


}
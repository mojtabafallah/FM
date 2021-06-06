<?php

namespace app\controller;
class PostController
{


    public static function add($btn_add_name, array $data, $class)
    {
        if (isset($btn_add_name)) {
            $class::add_new_item($class::$table_name, $data);
        }
    }

    public static function delete($btn_delete_name, $class, $id)
    {
        if (isset($btn_delete_name)) {
            $class::delete_item($class::$table_name, $id);
        }
    }

    public static function edit($btn_edit_name, $data, $field_name, $field_key, $class)
    {
        if (isset($btn_edit_name)) {
            $class::update($class::$table_name, $data, $field_name, $field_key);
        }
    }

    public static function add_meta($meta_id, $post_id, $meta_key, $meta_value)
    {



    }
}
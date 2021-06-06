<?php

namespace app\controller;

use app\admin\config;
use Illuminate\Database\Capsule\Manager as Capsule;

class DbController
{




    public static  function get_data($table_name,array $where=null, $col = '*')
    {
        config::conection();
        if (!isset($where))

            $data = Capsule::table($table_name)->get($col);
        else
        {
            $data = Capsule::table($table_name)->get($col)->where($where[0],$where[1],$where[2]);
        }
        return $data;
    }

    public static function add_new_item($table_name, $data)
    {

        config::conection();
        Capsule::table($table_name)->insert($data);
    }

    public static function delete_item($table_name, $id)
    {
        config::conection();
        Capsule::table($table_name)->delete($id);
    }

    public static function Edit_item($table_name,$id, array $data)
    {
        config::conection();
        Capsule::table($table_name)->where('id','=',$id)
            ->update($data);
    }
    public static function get_all_data($table_name)
    {
        config::conection();

        return Capsule::table($table_name)->get();
    }

    public static function get_all_data_where($table_name, $field, $value)
    {
        config::conection();
        return Capsule::table($table_name)
            ->where($field, '=', $value)
            ->get();

    }

    public static function get_all_data_join($table_name_first, $table_name_second, $key_first, $key_second, array $titles1, array $titles2, $sort = 'id')
    {
        $title_value1 = '';
        foreach ($titles1 as $title1) {
            $title_value1 .= $table_name_first . '.' . $title1 . ',';
        }
        $title_value1 = substr_replace($title_value1, "", -1);

        $title_value2 = '';
        foreach ($titles2 as $title2) {
            $title_value2 .= $table_name_second . '.' . $title2 . ',';
        }
        $title_value2 = substr_replace($title_value2, "", -1);

        config::conection();

        return Capsule::table($table_name_first)
            ->join($table_name_second, $key_first, '=', $key_second)
            ->select($title_value1, $title_value2)
            ->orderByDesc($sort)
            ->get();

    }

    public static function get_all_data_join2($table_name_first, $table_name_second, $table_name_three, $key_first1, $key_first2, $key_second, $key_three, array $titles1, array $titles2, array $titles3, $sort = 'id')
    {
        $title_value1 = '';
        foreach ($titles1 as $title1) {
            $title_value1 .= $table_name_first . '.' . $title1 . ',';
        }
        $title_value1 = substr_replace($title_value1, "", -1);


        $title_value2 = '';
        foreach ($titles2 as $title2) {
            $title_value2 .= $table_name_second . '.' . $title2 . ',';
        }
        $title_value2 = substr_replace($title_value2, "", -1);


        $title_value3 = '';
        foreach ($titles3 as $title3) {
            $title_value3 .= $table_name_three . '.' . $title3 . ',';
        }
        $title_value3 = substr_replace($title_value3, "", -1);


        config::conection();


        return Capsule::table($table_name_first)
            ->join($table_name_second, $key_first1, '=', $key_second)
            ->join($table_name_three, $key_first2, '=', $key_three)
            ->select($title_value1, $title_value2, $title_value3)
            ->orderByDesc($sort)
            ->get();

    }

    public static function add_item($table_name, array $data)
    {
        config::conection();
        Capsule::table($table_name)->insert($data);
    }



    public static function get_all_data_join_with_where($table_name_first, $table_name_second, $key_first, $key_second, array $titles1, array $titles2, $field_filter, $value_filter, $sort = 'id')
    {
        $title_value1 = '';
        foreach ($titles1 as $title1) {
            $title_value1 .= $table_name_first . '.' . $title1 . ',';
        }
        $title_value1 = substr_replace($title_value1, "", -1);

        $title_value2 = '';
        foreach ($titles2 as $title2) {
            $title_value2 .= $table_name_second . '.' . $title2 . ',';
        }
        $title_value2 = substr_replace($title_value2, "", -1);

        config::conection();
        if ($value_filter != '*') {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first, '=', $key_second)
                ->select($title_value1, $title_value2)
                ->where($field_filter, '=', $value_filter)
                ->orderByDesc($sort)
                ->get();
        } else {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first, '=', $key_second)
                ->select($title_value1, $title_value2)
                ->orderByDesc($sort)
                ->get();
        }

    }
    public static function get_all_data_join_with_where22($table_name_first, $table_name_second, $key_first, $key_second, array $titles1, array $titles2, $field_filter, $value_filter,$field_filter2, $value_filter2, $sort = 'id')
    {
        $title_value1 = '';
        foreach ($titles1 as $title1) {
            $title_value1 .= $table_name_first . '.' . $title1 . ',';
        }
        $title_value1 = substr_replace($title_value1, "", -1);

        $title_value2 = '';
        foreach ($titles2 as $title2) {
            $title_value2 .= $table_name_second . '.' . $title2 . ',';
        }
        $title_value2 = substr_replace($title_value2, "", -1);

        config::conection();
        if ($value_filter != '*') {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first, '=', $key_second)
                ->select($title_value1, $title_value2)
                ->where($field_filter, '=', $value_filter)
                ->where($field_filter2,'=',$value_filter2)
                ->orderByDesc($sort)
                ->get();
        } else {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first, '=', $key_second)
                ->select($title_value1, $title_value2)
                ->orderByDesc($sort)
                ->get();
        }

    }

    public static function get_all_data_join_with_where2($table_name_first, $table_name_second, $table_name_three, $key_first1, $key_first2, $key_second, $key_three, array $titles1, array $titles2, array $titles3, $field_filter1, $value_filter1, $field_filter, $value_filter, $sort = 'id')
    {
        $title_value1 = '';
        foreach ($titles1 as $title1) {
            $title_value1 .= $table_name_first . '.' . $title1 . ',';
        }
        $title_value1 = substr_replace($title_value1, "", -1);

        $title_value2 = '';
        foreach ($titles2 as $title2) {
            $title_value2 .= $table_name_second . '.' . $title2 . ',';
        }
        $title_value2 = substr_replace($title_value2, "", -1);

        $title_value3 = '';
        foreach ($titles3 as $title3) {
            $title_value3 .= $table_name_three . '.' . $title3 . ',';
        }
        $title_value3 = substr_replace($title_value3, "", -1);


        config::conection();
        if ($value_filter != '*') {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first1, '=', $key_second)
                ->join($table_name_three, $key_first2, '=', $key_three)
                ->select($title_value1, $title_value2, $title_value3)
                ->where($field_filter, '=', $value_filter)
                ->orderByDesc($sort)
                ->get();
        } else {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first1, '=', $key_second)
                ->join($table_name_three, $key_first2, '=', $key_three)
                ->select($title_value1, $title_value2)
                ->orderByDesc($sort)
                ->get();
        }

    }

    public static function get_all_data_join_with_where3($table_name_first, $table_name_second, $table_name_three, $key_first1, $key_first2, $key_second, $key_three, array $titles1, array $titles2, array $titles3, $field_filter1, $value_filter1, $field_filter2, $value_filter2, $sort = 'id')
    {
        $title_value1 = '';
        foreach ($titles1 as $title1) {
            $title_value1 .= $table_name_first . '.' . $title1 . ',';
        }
        $title_value1 = substr_replace($title_value1, "", -1);

        $title_value2 = '';
        foreach ($titles2 as $title2) {
            $title_value2 .= $table_name_second . '.' . $title2 . ',';
        }
        $title_value2 = substr_replace($title_value2, "", -1);

        $title_value3 = '';
        foreach ($titles3 as $title3) {
            $title_value3 .= $table_name_three . '.' . $title3 . ',';
        }
        $title_value3 = substr_replace($title_value3, "", -1);

//return $field_filter2 . '------' . $value_filter2;


        config::conection();
        if ($value_filter1 != '*') {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first1, '=', $key_second)
                ->join($table_name_three, $key_first2, '=', $key_three)
                ->select($title_value1, $title_value2, $title_value3)
                ->where($field_filter1, '=', $value_filter1)
                ->where($field_filter2, '=', $value_filter2)
                ->orderByDesc($sort)
                ->get();
        } else {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first1, '=', $key_second)
                ->join($table_name_three, $key_first2, '=', $key_three)
                ->select($title_value1, $title_value2)
                ->orderByDesc($sort)
                ->get();
        }

    }

    public static function add_to_array(array $arr, $value)
    {
        array_push($arr, $value);
    }

    public static function update($table_name, array $data, $fieldname, $key)
    {
        config::conection();
        Capsule::table($table_name)
            ->where($fieldname, '=', $key)
            ->update($data);
    }

    public static function get_all_data_join_with_where4(
        $table_name_first,
        $table_name_second,
        $key_first1,
        $key_second,
        array $titles1,
        array $titles2,
        $field_filter1,
        $value_filter1,
        $field_filter2,
        $value_filter2,
        $sort = 'id')
    {

        $title_value1 = '';
        foreach ($titles1 as $title1) {
            $title_value1 .= $table_name_first . '.' . $title1 . ',';
        }
        $title_value1 = substr_replace($title_value1, "", -1);

        $title_value2 = '';
        foreach ($titles2 as $title2) {
            $title_value2 .= $table_name_second . '.' . $title2 . ',';
        }
        $title_value2 = substr_replace($title_value2, "", -1);


        config::conection();
        if ($value_filter1 != '*') {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first1, '=', $key_second)
                ->select($title_value1, $title_value2)
                ->where($field_filter1, '=', $value_filter1)
                ->where($field_filter2, '=', $value_filter2)
                ->orderByDesc($sort)
                ->get();
        } else {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first1, '=', $key_second)
                ->select($title_value1, $title_value2)
                ->orderByDesc($sort)
                ->get();
        }

    }

    public static function get_data_col($table_name, $field_name)
    {
        config::conection();
        return Capsule::table($table_name)
            ->first($field_name);
    }

    public static function get_one_data($table_name, $value ,$field='id')
    {
        config::conection();
        return Capsule::table($table_name)
            ->where($field ,'=' ,$value)
            ->first();
    }

    public static function get_all_data_join_with_where5($table_name_first, $table_name_second, $table_name_three, $key_first1, $key_first2, $key_second, $key_three, array $titles1, array $titles2, array $titles3, $field_filter1, $value_filter1, $field_filter2, $value_filter2,$field_filter3, $value_filter3, $sort = 'id')
    {
        $title_value1 = '';
        foreach ($titles1 as $title1) {
            $title_value1 .= $table_name_first . '.' . $title1 . ',';
        }
        $title_value1 = substr_replace($title_value1, "", -1);

        $title_value2 = '';
        foreach ($titles2 as $title2) {
            $title_value2 .= $table_name_second . '.' . $title2 . ',';
        }
        $title_value2 = substr_replace($title_value2, "", -1);

        $title_value3 = '';
        foreach ($titles3 as $title3) {
            $title_value3 .= $table_name_three . '.' . $title3 . ',';
        }
        $title_value3 = substr_replace($title_value3, "", -1);

//return $field_filter2 . '------' . $value_filter2;


        config::conection();
        if ($value_filter1 != '*') {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first1, '=', $key_second)
                ->join($table_name_three, $key_first2, '=', $key_three)
                ->select($title_value1, $title_value2, $title_value3)
                ->where($field_filter1, '=', $value_filter1)
                ->where($field_filter2, '=', $value_filter2)
                ->where($field_filter3, '=', $value_filter3)
                ->orderByDesc($sort)
                ->get();
        } else {
            return Capsule::table($table_name_first)
                ->join($table_name_second, $key_first1, '=', $key_second)
                ->join($table_name_three, $key_first2, '=', $key_three)
                ->select($title_value1, $title_value2)
                ->orderByDesc($sort)
                ->get();
        }

    }

}
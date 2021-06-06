<?php
namespace app\controller;
use Illuminate\Support\Facades\DB;
use WP_Query;

class SearchController{
    public static function fetch_data($get_key)
    {
        $query = new WP_Query( array( 's' => $get_key ) );

        return $query;

    }


}
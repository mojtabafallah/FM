<?php


namespace app\admin;

use Illuminate\Database\Capsule\Manager as Capsule;

class config
{
    public static function conection()
    {

        $capsule = new Capsule;
        global $wpdb;
        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'fardamarket',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => $wpdb->prefix,
        ]);
        $capsule->setEventDispatcher(new \Illuminate\Events\Dispatcher(new \Illuminate\Container\Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        return $capsule;

    }

    public static $data;


    public static function create_table($table_name)
    {
        if (!Capsule::schema()->hasTable($table_name)) {
            Capsule::schema()->create($table_name, function ($table) {
                foreach (self::$data as $item) {
                    $fun=$item[0];
                    $table->$fun($item[1]);
                }
                $table->timestamps();
            });
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28.06.2018
 * Time: 10:16
 */

namespace App\models;

use Illuminate\Database\Capsule\Manager as Capsule;

class DataBase
{
    function __construct(){
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => DBDRIVER,
            'host'      => DBHOST,
            'database'  => DBNAME,
            'username'  => DBUSER,
            'password'  => DBPASS,
            'charset'   => CHARSET,
            'collation' => COLLATION,
            'prefix'    => PREFIX,
        ]);
        // Make this Capsule instance available globally via static methods...
        $capsule->setAsGlobal();
        // Setup the Eloquent ORM...
        $capsule->bootEloquent();

    }


}
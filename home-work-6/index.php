<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07.07.2018
 * Time: 15:14
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;
require_once "config.php";

Capsule::schema()->dropIfExists('goods');
Capsule::schema()->create('goods', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name'); //varchar 255
    $table->integer('category_id')->nullable();
    $table->timestamps(); //created_at&updated_at тип datetime
});
//=========================
Capsule::schema()->dropIfExists('categories');
Capsule::schema()->create('categories', function (Blueprint $table) {
    $table->increments('id');
    $table->string('categoty_name');
});

<?php
namespace App\models;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 27.06.2018
 * Time: 16:13
 */

class User extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = ['user_name', 'age', 'description', 'url','email'];
    protected $guarded = ['id'];
//created_at - дата создания
//update_at - дата последнего редактирования
    public $timestamps = false;
    public $table = "users";
    protected $primaryKey = 'id';

}
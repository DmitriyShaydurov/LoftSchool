<?php
namespace App\models;
/**
 * Created by PhpStorm.
 * User: User
 * Date: 27.06.2018
 * Time: 16:13
 */

class User extends \Illuminate\Database\Eloquent\Model // Вроде понятно но что если у нас две и более таблицы
{
    protected $fillable = ['user_name', 'age', 'description', 'url'];//разрешено редактировать только это, остальное запрещено
    protected $guarded = ['id']; //запрещено редактировать только это, все остальное разрешено
//created_at - дата создания
//update_at - дата последнего редактирования
    public $timestamps = false;
    public $table = "users";
    protected $primaryKey = 'id';

}
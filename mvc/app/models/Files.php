<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28.06.2018
 * Time: 13:44
 */

namespace App\models;

class Files
{
    protected $fillable = ['file_name', 'user_id'];
    protected $guarded = ['id'];
    public $timestamps = false;
    public $table = "files";
    protected $primaryKey = 'id';
}
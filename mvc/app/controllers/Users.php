<?php
namespace App\controllers;

class Users extends \App\libraries\Controller
{
public function printAll()
{
    $users = \App\models\User::All();// пишет что есть двойное обьявление метода не пойму почему
    // любые мои попытки сделать запрос вида
    //    ->where('name', 'like', 'Дмитрий')
    //    ->orWhere('name', 'like', 'A%')
    //    ->leftjoin('posts', 'users.id', '=', 'posts.user_id')// здесь left join для таблицы для нее нужно отдельный класс?
    //    ->first()
    //    ->toArray();
    //  не проходят почему?

    echo "<pre>"; // Понятно что это все во View надо выводить пока отладка
    //print_r($users->where('user_name', 'like', 'Дмитрий')->toArray());
    print_r($users->toArray());
}


}
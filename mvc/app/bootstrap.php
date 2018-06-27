<?php
require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule; // каким образом он вообще загружается???

$capsule = new Capsule; // где держать этот код?

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'mvc',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix' => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

//$users = $capsule->table('users'); /// Что это вообще (не работает если раскомментировать)
//    ->where('id', '>', 1)
//    ->select(['id', 'name'])
//    ->get();

//echo "<pre>";
//print_r($users);

//class User extends Illuminate\Database\Eloquent\Model // Вроде понятно но что если у нас две и более таблицы
//{
//    protected $fillable = ['user_name', 'age', 'description', 'url'];//разрешено редактировать только это, остальное запрещено
//    protected $guarded = ['id']; //запрещено редактировать только это, все остальное разрешено
//    //created_at - дата создания
//    //update_at - дата последнего редактирования
//    public $timestamps = false;
//    public $table = "users";
//    protected $primaryKey = 'id';
//
//    public function posts()
//    {
//        return $this->hasMany('Post', 'user_id', 'id');
//    }
//
//
//}

//class Post extends Illuminate\Database\Eloquent\Model
//{
////    public function userdata()
////    {
////        return $this->belongsTo('User', 'user_id', 'id');
////    }
//}
//
//$users = User::All();

//$users = User::where('id', '=', 2)->get();// не работает

//$users = User::where('users.id', '>', 2);
//    ->where('name', 'like', 'Дмитрий')
//    ->orWhere('name', 'like', 'A%')
//    ->leftjoin('posts', 'users.id', '=', 'posts.user_id')
//    ->first()
//    ->toArray();

//echo "<pre>";
//print_r($users->where('user_name', 'like', 'Дмитрий')->toArray());
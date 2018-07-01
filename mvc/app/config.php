<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28.06.2018
 * Time: 10:24
 */
defined("DBDRIVER")or define('DBDRIVER','mysql');
defined("DBHOST")or define('DBHOST','localhost');
defined("DBNAME")or define('DBNAME','mvc');
defined("DBUSER")or define('DBUSER','root');
defined("DBPASS")or define('DBPASS','');

defined("CHARSET")or define('CHARSET','utf8');
defined("COLLATION")or define('COLLATION','utf8_general_ci');
defined("PREFIX")or define('PREFIX','');

// App Root
  define('APPROOT', dirname(dirname(__FILE__)));
  define('SITENAME', 'mvc.loc');
  define('URLROOT', 'http://mvc.loc/');
  define('DEFAULT_REG_MESSAGE', 'Нет аккаунта? <a href="/users/register"> Зарегистрируйтесь</a>');
  define('DEFAULT_LOG_MESSAGE', 'Зарегистрированы? <a href="/users/login"> Авторизируйтесь</a>');



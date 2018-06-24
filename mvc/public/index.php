<?php
echo '<pre>';
var_dump($_GET);
echo $_SERVER['REQUEST_URI'];
echo '<br>'. getcwd();
$routes = explode('/', $_SERVER['REQUEST_URI']);

// post для формы

$controller_name = "Main";
$action_name = 'defaultPage';
// получаем контроллер
if (!empty($routes[1])) {
$controller_name = $routes[1]; //posts
}
echo '<br>'. $routes[1];
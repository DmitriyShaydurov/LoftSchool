<?php
require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('templates/');
$twig = new Twig_Environment($loader);
echo $twig->render('index.twig',[]);

//  не стал делать header footer так как
// 1) нет повторяющихся страниц
// 2) Использую twig на полную в MVC проекте
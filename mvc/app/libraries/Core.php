<?php

namespace App\libraries;
//use App\controllers;
/*
* App Core Class
* Creates URL & loads core controller
* URL FORMAT - /controller/method/params
*/


class Core
{
    protected $currentController;
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {

        $this->readUrl();

        if (class_exists($this->currentController) && method_exists($this->currentController, $this->currentMethod)) {
            $this->currentController = new $this->currentController();
        } else {
            $this->currentController = "App\\controllers\\" . 'Pages';
            $this->currentMethod = 'oopsPage';
        }

        $this->currentController = new $this->currentController();

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function readUrl()
    {
        $classMethod = explode('/', $_GET['route']);
        if (!empty($classMethod[0])) {
            $this->currentController = "App\\controllers\\" . $classMethod[0];
        } else {
            $this->currentController = "App\\controllers\\" . 'Pages';
        }

        if (!empty($classMethod[1])) {
            $this->currentMethod = $classMethod[1];
        }

        array_shift($_GET);
        if ($_GET) {
            $this->params = $_GET;
        }
    }
}
<?php

namespace App\controllers;
/*
 * Cotroller for pages which do not require db access
 * Loads views
 */
class Pages extends \App\libraries\Controller
{
//    public function __construct()
//    {
//        echo 'hello';
//    }

    public function index()
    {
//        $data = [
//            'title' => 'Simple MVC Pattern',
//            'description' => 'Model View Controller',
//            'siteName' =>SITENAME
//        ];
        $this->view('index', $this->data);

    }

    public function oopsPage()
    {
        $this->view('oopsPage');
    }
}
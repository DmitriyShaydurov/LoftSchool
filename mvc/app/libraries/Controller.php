<?php

namespace App\libraries;
/*
* Base Controller
* Loads the models and views
*/

class Controller
{
    protected $loader;
    protected $twig;

// Load model
    public function model($model)
    {
// Instantiate model
        return new $model();
    }

// Load view
    public function view($view, $data = [])
    {
        $viewFile = $view . '.twig';
// Check for view file
        if (file_exists('../app/views/' . $viewFile)) {
            $this->loader = new \Twig_Loader_Filesystem('../app/views');
            $this->twig = new \Twig_Environment($this->loader);
            //print_r($data);
            echo $this->twig->render($viewFile, $data);
        } else {
// View does not exist
            die('View does not exist');
        }
    }
}
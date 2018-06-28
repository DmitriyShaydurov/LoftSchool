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

// Check for view file

        if (file_exists('../app/views/' . $view . '.php')) {
//            $this->loader = new Twig_Loader_Filesystem('../app/templates');
//            $this->twig = new Twig_Environment($this->loader);
            //echo $twig->render('1.html', array('name' => 'Fabien'));

            require_once '../app/views/' . $view . '.php';
        } else {
// View does not exist
            die('View does not exist');
        }
    }
}
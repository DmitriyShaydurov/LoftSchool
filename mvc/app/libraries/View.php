<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 28.06.2018
 * Time: 16:22
 */

namespace App\libraries;


class View
{
    protected $loader;
    protected $twig;

    public function __construct($data = [])
    {
//        $this->loader = new \Twig_Loader_Filesystem(APPLICATION_PATH.'views');
//        $this->twig = new Twig_Environment($this->loader);

        $this->loader = new Twig_Loader_Filesystem('../app/templates');
        $this->twig = new Twig_Environment($this->loader);
    }
        public function twigLoad(String $filename, array $data)
    {
        echo $this->twig->render($filename.".twig", $data);
    }



}
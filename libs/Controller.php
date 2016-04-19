<?php

class Controller
{
    public $view;
    public $model;

    function __construct()
    {
        // Twig init
        require 'vendor/autoload.php'; 
        $loader = new Twig_Loader_Filesystem('views');
        $twig = new Twig_Environment($loader,  array('debug' => true));
        $twig->addExtension(new Twig_Extension_Debug());
        $this->view = $twig;
    }

    public function loadModel($name)
    {

        $path = 'models/m_' . $name . '.php';

        if (file_exists($path)) {
            require $path;

            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }

}
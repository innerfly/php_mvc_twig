<?php

class Error extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->display('errors/index.html.twig', array(
          'title' => 'Error 404',
          'message' => 'Page not found',
        ));
    }

}
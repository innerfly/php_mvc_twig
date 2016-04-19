<?php

class Model extends PDO
{

    public function __construct()
    {
        $cfg = include('config.php');

        parent::__construct($cfg['db']['type'] . ":host=" . $cfg['db']['host'] . ";dbname=" . $cfg['db']['name'],
          $cfg['db']['user'], $cfg['db']['pass']);
        
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

}
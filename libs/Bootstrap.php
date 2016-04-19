<?php

class Bootstrap
{
    private $_url = null;
    private $_controller = null;

    /**
     * Starts the Bootstrap
     * @return boolean
     *
     *  http://localhost/controller/method/(param)/(param)/(param)
     *  url[0] = Controller
     *  url[1] = Method
     *  url[2] = Param
     */
    public function init()
    {
        $this->_getUrl(); // Sets the protected $_url
        $this->loadController();
        $this->_callControllerMethod();
    }

    /**
     * Fetches the $_GET from 'url'
     */
    private function _getUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }

    public function loadController()
    {
        $controllerName = !empty($this->_url[0]) ? $this->_url[0] : 'index'; // set default controller to index
        $file = 'controllers/c_' . $controllerName . '.php';

        if (file_exists($file)) {
            require $file;
            $this->_controller = new $controllerName();

            if ($controllerName != 'index') {
                $this->_controller->loadModel($controllerName);
            } else {
                return false;
            }
        } else {
            $this->_error();
            return false;
        }
    }

    /**
     * If a method is passed in the GET url paremter
     */
    private function _callControllerMethod()
    {
        $method = (isset($this->_url[1])) ? $this->_url[1] : 'index'; // set default method

        if (!method_exists($this->_controller, $method)) {
            $this->_error();
        }

        if (count($this->_url) >= 2) {
            $params = $this->_url;

            unset($params[0]); // removing controller
            unset($params[1]); // removing method

            call_user_func_array(array($this->_controller, $this->_url[1]), $params); // call controller/method($params)
        } else {
            $this->_controller->$method();
        }
    }


    /**
     * Display an error page if nothing exists
     *
     * @return boolean
     */
    private function _error()
    {
        require 'controllers/c_error.php';
        $this->_controller = new Error();
        $this->_controller->index();
        exit;
    }

}
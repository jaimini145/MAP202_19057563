<?php

class App {

    protected $controller = 'home';
    //protected $method = 'login';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        if (isset($_SESSION['auth']) == 1) {
            $this->method = 'index';
        } 
 
        $url = $this->parseUrl();
		

        if (file_exists('app/controllers/' . $url[1] . '.php')) {
            $this->controller = $url[1];

            $_SESSION['controller'] = $this->controller;

            if (in_array($this->controller, $this->special_url)) {
                $this->method = 'index';
            }
            unset($url[1]);
        } else {
            header('Location: /home');
            die;
        }

        require_once 'app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        
        if (isset($url[2])) {
            if (method_exists($this->controller, $url[2])) {
                $this->method = $url[2];
                $_SESSION['method'] = $this->method;
                unset($url[2]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);		
    }

    public function parseUrl() {
        $u = "{$_SERVER['REQUEST_URI']}";
       
        $url = explode('/', filter_var(rtrim($u, '/'), FILTER_SANITIZE_URL));
		unset($url[0]);		
		return $url;
    }

}
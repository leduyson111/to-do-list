<?php

namespace App\Libraries;

use App\Controllers\WorkController;
use Phroute\Phroute\RouteCollector;

class Core
{
    protected $current_controller = 'Work';
    protected $current_method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();
        if (isset($url[0])) {
            if (file_exists('../app/Controllers/' . ucwords($url[0]) . 'Controller' . '.php')) {
                $this->current_controller = ucwords($url[0]);
                unset($url[0]);
            }
        }
        // Require the controller
        // Instantiate controller class
        
        // Require the controller
        $controller = "App\Controllers" . "\\". $this->current_controller. 'Controller';

        // Instantiate controller class
        $this->current_controller = new $controller();
        
        if (isset($url[1])) {
            if (method_exists($this->current_controller, $url[1])) {
                $this->current_method = $url[1];
                unset($url[1]);
            }
        }
        // Get params
        $this->params = $url ? array_values($url) : [];

        //Call a callback with array of params
        call_user_func_array([$this->current_controller, $this->current_method], $this->params);
    }

    

    public function  getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}

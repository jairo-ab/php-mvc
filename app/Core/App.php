<?php

namespace Crud\Core;

class App {
    private $controller = null;
    private $action = null;
    private $params = array();

    public function __construct()
    {
        $this->splitUrl();

        if (!$this->controller) {
            $page = new \Crud\Controller\PaginasController();
            $page->index();
        } elseif (file_exists(APP . 'Controller/' . ucfirst($this->controller) . 'Controller.php')) {
            $controller = "\\Crud\\Controller\\" . ucfirst($this->controller) . 'Controller';
            $this->controller = new $controller();

            if (method_exists($this->controller, $this->action) &&
                is_callable(array($this->controller, $this->action))) {
                
                if (!empty($this->params)) {
                    call_user_func_array(array($this->controller, $this->action), $this->params);
                } else {
                    $this->controller->{$this->action}();
                }

            } else {
                if (strlen($this->action) == 0) {
                    $this->controller->index();
                } else {
                    $page = new \Crud\Controller\PaginasController();
                    $page->erro();
                }
            }
        } else {
            $page = new \Crud\Controller\PaginasController();
            $page->erro();
        }
    }

    private function splitUrl()
    {
        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            $this->controller = isset($url[0]) ? $url[0] : null;
            $this->action = isset($url[1]) ? $url[1] : null;

            unset($url[0], $url[1]);

            $this->params = array_values($url);
        }
    }
}

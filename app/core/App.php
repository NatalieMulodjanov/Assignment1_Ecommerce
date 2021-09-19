<?php 

    namespace app\core;

    class App {

        private $controller = 'app\\controllers\\Main'; // Set default controller value
        private $method = 'index';
        private $params = [];


        public function __construct() {
            // Get url + parse to array
            $url = $this->parseUrl();
            // Check if controller exists
            if (isset($url[0])) {
                if (file_exists('app/controllers/' . ($url[0]) . '.php')) {
                    $this->controller = 'app\\controllers\\' . $url[0];
                }
                // Unset 0 index (delete controller name from memory)
                unset ($url[0]);
            }
            $this->controller = new $this->controller;

            // Check if method exists
            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                }
                unset ($url[1]);
            }

            // Check if params exists
            $this->params = $url ? array_values($url) : [];

            // Call a callback with array of params
            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        // Parse url to array
        public function parseUrl() {
            if (isset($_GET['url'])) {
                // Remove '/' from url
                return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            }
        }
    }
?>
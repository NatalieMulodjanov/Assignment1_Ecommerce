<?php
/*routing of the requests happens here 
maping urls to classes and methods */

namespace app\core;

class App
{
    private $controller = 'app\\controllers\\Main'; // set a default value for the controller
    private $method = 'index';
    private $params = [];

    public function __construct()
    {
        /*
        TODO: implement the routing to map the URL to the actual controller and the methods 
        map urls such as localhost/controllername/methodname to the execution of method methoname from class controllername
        eg. hhtp://localhost/Main/index maps to the index mthos of the Main controller class
        eg. http://localhost/Animal/breed/param/param2 maps maps the breed method from the Animal controller class with parameters
        */

        //parse incoming urls to an array containing the url components 
        $url = $this->parseURL();

        //var_dump($url)
        //check and implement the controllers
        if (isset($url[0])) { //are there contents in the url[0] element
            if (file_exists('app/controllers/' . $url[0] . '.php')) {
                $this->controller = 'app\\controllers\\' . $url[0];
            } 
            unset($url[0]);
        }
        $this->controller = new $this->controller();

        //check and chose the method 
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
            } 
            unset($url[1]);
        }

        //take care of any parameters
        $this->params = $url ? array_values($url) : [];

        $obj = new \app\controllers\Main();
        call_user_func_array(array($this->controller, $this->method), $this->params);
    }


    //'Default/index'
    //['Default', 'index']
    public function parseURL()
    {
        //checks that the url is passed as a GET parameter
        if (isset($_GET['url'])) { //assuming that we have passed the url (http://localhost/index.php?url=/the/url/goes/here => ['the', 'url', 'goes,'here])
            //removes the trailing and filters out non-urls comliant characters
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}

<?php 
namespace app\core;
    /**
     *  Controller class, which manages the views for the web application 
     *  Authors: Natalie Mulodjanov (1956449), Ron Friedman (1926133), Vanier College 2021
     *  
     *  This code is/will be published on GitHub. The license is GPLv3. Please do not remove this comment
     */ 
class Controller {
    public function view($name, $data = null) {
        include 'app/views/' . $name . '.php';
    }
}
?>
<?php
namespace app\core;

class Controller{
    public function view($name, $data=null){
        include 'app/Views/' . $name . '.php';
    }
}
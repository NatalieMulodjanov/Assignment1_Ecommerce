<?php

namespace app\core;

class Model {

    protected static $_connection; 

    public function __construct(){
        $username = 'root';
        $password = '';
        $host = 'localhost'; //where we find the my sql db server
        $DBname = 'people_db';
        //connect the objects to the storage medium
        //self->class, this_>object
        if (self::$_connection == null){
            self::$_connection = new \PDO("mysql:host=$host;dbname=$DBname", $username, $password);
        }
    }
}
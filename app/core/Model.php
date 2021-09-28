<?php 

namespace app\core;

class Model {
    protected static $_connection = null;

    public function __construct() {
        // Creates new db connection
        $username = 'root';
        $password = '';
        $host = 'localhost';
        $dbname = 'people_db';

        if (self::$_connection == null) {
            self::$_connection = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        }
    }
}
?>
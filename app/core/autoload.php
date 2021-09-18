<?php 
    spl_autoload_register(function($class_name){
        // Import all classes with file extensiion .php
        include $class_name . '.php'; 
    }
);
?>
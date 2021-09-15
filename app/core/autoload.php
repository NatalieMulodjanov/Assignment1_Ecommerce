<?php
//where we implement the autoload

//loads each file neede at a time, not all models together 
spl_autoload_register(function ($class_name) { 
        include $class_name . '.php';  //the dot is a concatination operator in java it would be: import $class name + '.php';
    }
); 
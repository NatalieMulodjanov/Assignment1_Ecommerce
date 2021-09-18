<?php 

namespace app\core; 

// Base class for controllers
class Controller {
    public function view($name, $data = null) {
        include 'app/views/' . $name . '.php';
    }
}
?>
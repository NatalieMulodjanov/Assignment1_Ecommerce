<?php 

namespace app\models;

class Person extends \app\core\Model {
    public $f_name;
    public $l_name;
    public $notes;


    public function __construct() {
        parent::__construct();
    }
    
    public function get_f_name() {
        return $this->f_name;
    }
    
    public function set_f_name($f_name) {
        $this->f_name = $f_name;
    }
    
    public function get_l_name() {
        return $this->l_name;
    }
    
    public function set_l_name($l_name) {
        $this->l_name = $l_name;
    }
    
    public function get_notes() {
        return $this->notes;
    }
    
    public function set_notes($notes) {
        $this->notes = $notes;
    }
    
    public function getAll() {
        $SQL = "SELECT * FROM person_information";
        $STMT = self::$_connection->query($SQL);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Person');
        return $STMT->fetchAll(); 
    }
    
    // 
    public function get($person_id) {
        $SQL = "SELECT * FROM person_information WHERE person_id = :person_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':person_id' => $person_id));
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Person');
        return $STMT->fetch();
    }
    
    public function insert(){
        $SQL = "INSERT INTO person_information (f_name, l_name, notes) VALUES (:f_name, :l_name, :notes)";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':f_name' => $this->f_name, ':l_name' => $this->l_name, ':notes' => $this->notes));
    }
    
    public function update() {
        $SQL = "UPDATE person_information SET f_name = :f_name, l_name = :l_name, notes = :notes WHERE person_id = :person_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':f_name' => $this->f_name, ':l_name' => $this->l_name, ':notes' => $this->notes, ':person_id' => $person_id));
    } // $person_id is the primary key
    
    public function delete($person_id) {
        $SQL = "DELETE FROM person_information WHERE person_id = :person_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':person_id' => $person_id));
    }// $person_id is the primary key
}
?>
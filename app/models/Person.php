<?php 
namespace app\models;
    /**
     *  Person model class, which contains actions for the address page,
     *  such as getters & setters as well as DB queries to create, delete and modify information
     *  Authors: Natalie Mulodjanov (1956449), Ron Friedman (1926133), Vanier College 2021
     *  
     *  This code is/will be published on GitHub. The license is GPLv3. Please do not remove this comment
     */ 
class Person extends \app\core\Model {
    public $person_id;
    public $f_name;
    public $l_name;
    public $notes;

    public function __construct() {
        parent::__construct();
    }

    public function get_person_id(){
        return $this->person_id;
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
    
    // get all data from table
    public function getAll() {
        $SQL = "SELECT * FROM person_information";
        $STMT = self::$_connection->query($SQL);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Person');
        return $STMT->fetchAll(); 
    }
    
    // get person information from person_id 
    public function get($person_id) {
        $SQL = "SELECT * FROM person_information WHERE person_id = :person_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':person_id' => $person_id));
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Person');
        return $STMT->fetch();
    }
    
    public function insert(){
        $SQL = 'INSERT INTO person_information(f_name, l_name, notes) VALUES (:f_name, :l_name, :notes)';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['f_name' => $this->f_name, 'l_name' => $this->l_name, 'notes' => $this->notes]);
    }
    
    public function update() {
        $SQL = "UPDATE person_information SET f_name = :f_name, l_name = :l_name, notes = :notes WHERE person_id = :person_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':f_name' => $this->f_name, ':l_name' => $this->l_name, ':notes' => $this->notes, ':person_id' => $this->person_id));
    } // $person_id is the primary key
    
    public function delete($person_id) {
        $SQL = "DELETE FROM person_information WHERE person_id = :person_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':person_id' => $person_id));
    }// $person_id is the primary key

    public function search($search_term) {
        $SQL = "SELECT * FROM person_information WHERE f_name LIKE :search_term OR l_name LIKE :search_term OR notes LIKE :search_term";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':search_term' => '%' . $search_term . '%'));
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Person');
        return $STMT->fetchAll();
    }
}
?>
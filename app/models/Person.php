<?php

namespace app\models;

class Person extends \app\core\Model{
    public $person_id;
    public $f_name;
    public $l_name;
    public $notes;

    public function __construct($f_name='', $l_name=''){
        parent::__construct();
    }

    public function setFname($f_name){
        $this->f_name = $f_name;
    }

    public function setLname($l_name){
        $this->l_name = $l_name;
    }

    public function getFname(){
        return $this->f_name;
    }

    public function getLname(){
        return $this->l_name;
    }

    public function update(){
        $SQL = "UPDATE person_information SET f_name = '$this->f_name', l_name = '$this->l_name', notes = '$this->notes' WHERE person_id = $this->person_id";
        $STMT = self::$__connection->prepare($SQL);
        $STMT->execute([':person_id' => $this->person_id, ':f_name' => $this->f_name, ':l_name' => $this->l_name, ':notes' => $this->notes]);
    }

    public function delete($person_id){
        $SQL = "DELETE FROM person_information WHERE person_id=:person_id";
        $STMT = self::$__connection->prepare($SQL);
        $STMT->execute([':person_id' => $person_id]);
    }

    public function insert(){
        $SQL = "INSERT INTO person_information (f_name, l_name, notes) VALUES (:f_name, :l_name, :notes)";
        $STMT = self::$__connection->prepare($SQL);
        $STMT->execute([':f_name' => $this->f_name, ':l_name' => $this->l_name, ':notes' => $this->notes]);
    }

    public function get($person_id){
        $SQL = "SELECT * FROM person_information WHERE person_id=:person_id";
        $STMT = self::$__connection->prepare($SQL);
        $STMT->execute([':person_id' => $person_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Person');
        $person = $STMT->fetch();
    }

    //in case needed 
    public function getAddress($person_id){
        $person = get($person_id);
        $address = new app\models\Address();
        $address->get($person->address_id);
        return $address;
    }

    public function getAll(){
        $SQL="SELECT * FROM person_information";
        $STMT = self::$__connection->query($SQL);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Person');
        return $STMT->fetchAll();
    }

}
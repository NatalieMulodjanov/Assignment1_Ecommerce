<?php

namespace app\models;

class Address extends \app\core\Model
{
    public $address_id;
    public $person;
    public $description;
    public $street;
    public $city;
    public $provice_state;
    public $country_code;

    public function __construct($Person=new Person(), $description='', $street='', $city='', $province_state='', $country_code='' ){
        parent::__construct();
    }

    public function setAddressId($address_id){
        $this->address_id = $address_id;
    }

    public function setPerson($person){
        $this->person = $person;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setStreet($street){
        $this->street = $street;
    }

    public function setCity($city){
        $this->city = $city;
    }

    public function setProvinceState($province_state){
        $this->province_state = $province_state;
    }
    
    public function getAddressId(){
        return $this->address_id;
    }

    public function getPerson(){
        return $this->person;
    }
    
    public function getDescription(){
        return $this->description;
    }

    public function getStreet(){
        return $this->street;
    }

    public function getCity(){
        return $this->city;
    }

    public function getProvinceState(){
        return $this->province_state;
    }

    
    public function getAll($person_id){
        $SQL = "SELECT * FROM address WHERE person_id=:person_id'";
        $STMT = self::$_connection->query($SQL);
        $STMT->execute(array(':person_id'=>$person_id));
        $STMT->setFetchMode(\PDO::FETCH_ASSOC, 'app\\models\\Person');
        return $STMT->fetchAll();
    }
    
    public function get($address_id) {
        $SQL = "SELECT * FROM address WHERE person_id = :person_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute([':person_id' => $person_id)];
        $STMT->setFetchMode(\PDO::FETCH_ASSOC, 'app\\models\\Person');
        return $STMT->fetch();
    }
    
    // TODO: Find if person_id is required
    public function insert() {
        $SQL = 'INSERT INTO address (description, street, city, province_state, country_code) VALUES (:description, :street, :city, :province_state, :country_code)';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute([':description' => $this->description, ':street' => $this->street, ':city' => $this->city, ':province_state' => $this->province_state, ':country_code' => $this->country_code]);
    }


    public function update(){
        $SQL = 'UPDATE `Address` SET description=:description, street=:street, city=:city, province_state=:province_state, country_code=:country_code WHERE person_id=:person_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute([':description' => $this->description, ':street' => $this->street, ':city' => $this->city, ':province_state' => $this->province_state, ':country_code' => $this->country_code, ':person_id' => $this->person_id]);
    }

    
    public function delete($person_id){ 
        $SQL = 'DELETE FROM `Address` WHERE person_id=:person_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute([':person_id' => $this->person_id]);
    }
}
<?php 

namespace app\models;

    /**
     *  Address model class, which contains actions for the address page,
     *  such as getters & setters as well as DB queries to create, delete and modify information
     *  Authors: Natalie Mulodjanov (1956449), Ron Friedman (1926133), Vanier College 2021
     *  Date: 
     *  This code is/will be published on GitHub. The license is GPLv3. Please do not remove this comment
     */ 

class Address extends \app\core\Model {
    public $description;
    public $street;
    public $city;
    public $province_state;
    public $postal_zip;
    public $country_code;

    public function __construct() {
        parent::__construct();
    }

    public function getDescription() {
        return $this->description;
    }
    
    public function setDescription($description) {
        $this->description = $description;
    }

    public function getStreet() {
        return $this->street;
    }

    public function setStreet($street) {
        $this->street = $street;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getProvinceState() {
        return $this->province_state;
    }

    public function setProvinceState($province_state) {
        $this->province_state = $province_state;
    }

    public function getPostalZip() {
        return $this->postal_zip;
    }

    public function setPostalZip($postal_zip) {
        $this->postal_zip = $postal_zip;
    }

    public function getCountryCode() {
        return $this->country_code;
    }

    public function setCountryCode($country_code) {
        $this->country_code = $country_code;
    }

    public function getAll($person_id) { // get all addresses for a person
        $SQL = 'SELECT * FROM address_information WHERE person_id = :person_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':person_id' => $person_id));
        $STMT->setFetchMode(\PDO::FETCH_CLASS, '\\app\\models\\Address');
        return $STMT->fetchAll();
    }

    public function get($address_id) { // get a single address
        $SQL = 'SELECT * FROM address_information WHERE address_id = :address_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':address_id' => $address_id));
        $STMT->setFetchMode(\PDO::FETCH_CLASS, '\\app\\models\\Address');
        return $STMT->fetch();
    }  

    public function insert() { // insert a new address
        $SQL = 'INSERT INTO address_information (person_id, description, street, city, province_state, postal_zip, country_code) VALUES (:person_id, :description, :street, :city, :province_state, :postal_zip, :country_code)';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':person_id' => $this->person_id, ':description' => $this->description, ':street' => $this->street, ':city' => $this->city, ':province_state' => $this->province_state, ':postal_zip' => $this->postal_zip, ':country_code' => $this->country_code));
    } 

    public function update() { // update an existing address
        $SQL = 'UPDATE `address_information` SET `person_id` = :person_id, `description` = :description, `street` = :street, `city` = :city, `province_state` = :province_state, `postal_zip_code` = :postal_zip_code, `country_code` = :country_code WHERE address_id = :address_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':person_id' => $this->person_id, ':description' => $this->description, ':street' => $this->street, ':city' => $this->city, ':province_state' => $this->province_state, 'postal_zip_code' => $this->postal_zip, ':country_code' => $this->country_code, ':address_id' => $this->address_id));    
    } 

    public function delete($address_id) { // delete an existing address
        $SQL = 'DELETE FROM address_information WHERE address_id = :address_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':address_id' => $address_id));
    }  
}
?>
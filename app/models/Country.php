<?php
namespace app\models;
    /**
     *  Country model class, which contains actions for the address page,
     *  such as getters & setters as well as DB queries to create, delete and modify information
     *  Authors: Natalie Mulodjanov (1956449), Ron Friedman (1926133), Vanier College 2021
     *  Date: 
     *  This code is/will be published on GitHub. The license is GPLv3. Please do not remove this comment
     */ 
class Country extends \app\core\Model{
    public $country_code;
    public $country_name;

    public function __construct($country_code='', $ocuntry_name=''){
        parent::__construct();
    }

    public function getAll(){
        $SQL = "SELECT * FROM country";
        $STMT = self::$_connection->query($SQL);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Country');
        return $STMT->fetchAll();
    }

    public function get($country_code){
        $SQL = "SELECT * FROM country WHERE country_code = :country_code";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':country_code' => $country_code));
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Country');
        return $STMT->fetch();
    }

    //TODO: ask teacer if arguments needed
    public function insert(){
        $SQL = "INSERT INTO country (country_code, country_name) VALUES (:country_code, :country_name)";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':country_code' => $this->country_code, ':country_name' => $this->country_name));
    }

    public function update($country_code){
        $SQL = "UPDATE country SET country_code = :country_code, country_name = :country_name WHERE country_code = :country_code";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':country_code' => $this->country_code, ':country_name' => $this->country_name));
    }

    public function delete($country_code){
        $SQL = "DELETE FROM country WHERE country_code = :country_code";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(array(':country_code' => $country_code));
    }
}
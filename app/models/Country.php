<?php

namespace app\models;

class Country extends \app\core\Model{

    public $country_code;
    public $country_name;

    public function __construct($country_code='', $ocuntry_name=''){
        parent::__construct();
    }

    // public function getCountryCode(){
    //     return $this->country_code;
    // }

    // public function getCountryName(){
    //     return $this->country_name;
    // }

    // public function setCountryCode($country_code){
    //     $this->country_code = $country_code;
    // }

    // public function setCountryName($country_name){
    //     $this->country_name = $country_name;
    // }
}
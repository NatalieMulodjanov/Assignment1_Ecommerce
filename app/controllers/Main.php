<?php
namespace app\controllers;

/**
 *  Main class, which contains actions for the Person page
 *  Authors: Natalie Mulodjanov (1956449), Ron Friedman (1926133), Vanier College 2021
 *  Date: 
 *  This code is/will be published on GitHub. The license is GPLv3. Please do not remove this comment
 */ 
class Main extends \app\core\controller {
    public function index() {
        $myPerson = new \app\models\Person();
        $results = $myPerson->getAll();

        $this->view('Person/index', $results);
    }

    public function insert(){
        if (isset($_POST['submit'])) {
            $myPerson = new \app\models\Person();
            $myPerson->set_f_name( $_POST['f_name']);
            $myPerson->set_l_name( $_POST['l_name']);
            $myPerson->set_notes( $_POST['notes']);
            $myPerson->insert();
            header('Location: /person/index');

        }else {
            $this->view('Person/addPerson');
        }
    }

    public function update($person_id){
        $myPerson = new \app\models\Person();
        $myPerson = $myPerson->get($person_id);
        if (isset ($_POST['submit'])) {
        $myPerson->set_f_name($_POST['f_name']); 
        $myPerson->set_l_name( $_POST['l_name']);
        $myPerson->set_notes($_POST['set_notes']);
        $myPerson->update();
        header('Location: /person/index');
        }else {
            $this->view('Person/edit', $myPerson);
        }
    }

    public function delete($person_id){
        $myPerson = new \app\models\Person();
        $myPerson->delete($person_id);
        header('Location: /person/index');
    }

    public function details($person_id){
        $myPerson = new \app\models\Person();
        $address = new \app\models\Address();
        $myPerson = $myPerson->get($person_id);
        $addressesOfPerson = $address->getAll($person_id);
        $this->view('Person/details', [$myPerson,$addressesOfPerson]);
    }

    public function search(){
        $myPerson = new \app\models\Person();
        $results = $myPerson->search($_POST['search']);
        $this->view('Person/search', $results);
    }
}

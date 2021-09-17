<?php
namespace app\controllers;

class personController extends \app\core\controller {
    public function index($person_id) {
        $myPerson = new \app\models\Person();
        $results = $myPerson->getAll();

        $this->view('Person/index', $results);
    }

    public function insert(){
        if (isset($_POST['submit'])) {
            $myPerson = new \app\models\Person();
            $myPerson->set_f_name = $_POST['f_name'];
            $myPerson->set_l_name = $_POST['l_name'];
            $myPerson->set_notes = $_POST['set_notes'];
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
        $myPerson->set_f_name = $_POST['f_name'];
        $myPerson->set_l_name = $_POST['l_name'];
        $myPerson->set_notes = $_POST['set_notes'];
        $myPerson->update();
        header('Location: /person/index');
        }else {
            $this->view('Person/updatePerson', $myPerson);
        }
    }

    public function delete($person_id){
        $myPerson = new \app\models\Person();
        $myPerson->delete($person_id);
        header('Location: /person/index');
    }

    public function details($person_id){
        $myPerson = new \app\models\Person();
        $myPerson = $myPerson->get($person_id);
        $this->view('Person/details', $myPerson);
    }
}

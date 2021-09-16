<?php

namespace App\controllers;

class addressController extends \app\core\Controller
{

    public function index()//the param is primary key in parent (person)
    { 
        $myAddress = new \app\models\Address();
        $results = $myAddress->getAll($person_id);

        $myPerson = new \app\models\Person();
        $myPerson = $myPerson->get($person_id);
        //paths here are not subject to namespacing because these re not classes, but just files.
        //TODO: make a view for this.
        $this->view('Person/index', $results);
    }

    //TODO: 

    public function insert($animal_id)
    { 
        $animal = new \app\models\Animal();
        $animal = $animal->get($animal_id);
        if (isset($_POST['action'])) { //verify that the user clicked the submit button
            $vaccine = new \app\models\Animal();
            $vaccine->animal_id = $animal_id;
            $vaccine->type($_POST['type']);
            $vaccine->date($_POST['date']);
            $vaccine->insert();
            //reidirect the user back to the index
            //  header('location:index');
            header('location:/Vaccine/index/'.$animal_id);
        } else //present a form to the user 
            $this->view('VaccineController/create', $animal);
    }

    public function delete($animal_id)
    { //delete a record, animal id should be known ahead of time 
        $animal = new \app\models\Animal();
        $animal->delete($animal_id);
        header('location:/Main/index');
    }

    public function edit($animal_id) { //edit a record for the record with known nanimal_id
        $animal = new \app\models\Animal;
        $animal = $animal->get($animal_id);

        if (isset($_POST['action'])) {//am i submitting the form 
            //handle the input by overriding the existing properties 
            $animal->setSpecies($_POST['species']);
            $animal->setColor($_POST['color']);
            $animal->update();
            header('location:/Main/index');
        } else {
            $this->view('Main/edit',  $animal);
        }
      
    }

    public function details($animal_id){
        $animal = new \app\models\Animal;
        $animal = $animal->get($animal_id);
        $this->view('Main/details', $animal);
    }
}
?>
<?php

namespace App\controllers;

class Main extends \app\core\Controller
{

    public function index()
    { ///listing the records 
        //instead of:
        $myAnimal = new \app\models\Animal();

        $results = $myAnimal->getAll();


        //paths here are not subject to namespacing because these re not classes, but just files.
        $this->view('Main/index', $results);
    }

    public function insert()
    { //insert a new record (no known key yet)
        //get the info from the user and input it in the db
        if (isset($_POST['action'])) { //verify that the user clicked the submit button
            $animal = new \app\models\Animal();
            $animal->setSpecies($_POST['species']);
            $animal->setColor($_POST['color']);
            $animal->insert();
            //reidirect the user back to the index
            //  header('location:index');
            header('location:/Main/index');
        } else //present a form to the user 
            $this->view('Main/addAnimal');
    }

    public function delete($animal_id)
    { //delete a record, animal id should be known ahead of time 
        $animal = new \app\models\Animal();
        $animal->delete($animal_id);
        header('location:/Main/index');
    }

    public function edit($animal_id)
    { //edit a record for the record with known nanimal_id
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

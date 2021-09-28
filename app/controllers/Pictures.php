<?php 
namespace app\controllers;

/**
 *  AddressController class, which contains actions for the address page
 *  Authors: Natalie Mulodjanov (1956449), Ron Friedman (1926133), Vanier College 2021
 *  
 *  This code is/will be published on GitHub. The license is GPLv3. Please do not remove this comment
 */ 
class Pictures extends \app\core\controller {
    public function index($person_id) {
        $myPerson = new \app\models\Person();
        $myPerson = $myPerson->get($person_id);
        
        $picture = new \app\models\Pictures();
        $pictures = $picture->getAll($person_id);

        $this->view('Pictures/index', ['pictures'=>$pictures]);
    }

    /**
     * Add a new address to the database from form POST action
     * @param int $person_id: the id of the person to which the address belongs
     */
    public function insert($person_id) {
        if (isset ($_POST['submit'])) {
            $picture = new \app\models\Pictures();
            $picture->person_id = $person_id;
            $picture->description = $_POST['description'];
            $picture->insert();

            // Redirect to the person's address page
            header("Location: /Pictures/index/$person_id");
        } else {
            $picture = new \app\models\Pictures();
            $picture = $picture->get($person_id);
            $this->view('Pictures/insert',[$picture, $person_id]);
        }
    }

    /**
     * Edit an address from form POST action by modifying the database record
     * @param int $person_id: the id of the person to which the address belongs
     */
    public function edit($picture_id) {
        $picture = new \app\models\Pictures();
        $picture = $picture->get($picture_id);

        $person = new \app\models\Person();
        $person = $person->get($picture->person_id);

        // If the form has been submitted, update the database record
        if (isset ($_POST['submit'])) {
            $picture->setDescription($_POST['description']);
            $picture->update();

            // Redirect to the person's address page
            header("Location: /Pictures/index/$person->person_id");
        } else {
            // Display the edit form
            $this->view('Pictures/edit', ['picture'=>$picture, 'person'=>$person]);
        }
    }

    /**
     * Show details of an address from form POST action by displaying the database record
     * @param int $person_id: the id of the person to which the address(es) belongs
     */
    public function details($person_id) {
        
        $picture = new \app\models\Pictures();
        $picture = $picture->get($person_id);

        $this->view('Pictures/index/', ['picture'=>$picture]); // Display the details page
    }
    
    /**
     * Delete an address from form POST action by deleting the database record
     * @param int $person_id: the id of the person to which the address(es) belongs
     */
    public function delete($picture_id) {
        $picture = new \app\models\Pictures();
        $picture = $picture->get($picture_id);
        $picture->delete($picture_id); // Delete the address(es) for the person
        header("Location: /Pictures/index/$picture->person_id"); // Redirect to the address page
    }
}
?>

<?php 
namespace app\controllers;

/**
 *  AddressController class, which contains actions for the address page
 *  Authors: Natalie Mulodjanov (1956449), Ron Friedman (1926133), Vanier College 2021
 *  Date: 
 *  This code is/will be published on GitHub. The license is GPLv3. Please do not remove this comment
 */ 
class AddressController extends \app\core\controller {
    public function index($person_id) {
        $myPerson = new \app\models\Person();
        $myPerson = $myPerson->get($person_id);
        
        $address = new \app\models\Address();
        $addresses = $address->getAll($person_id);

        $this->view('Address/index', $addresses);
    }

    /**
     * Add a new address to the database from form POST action
     * @param int $person_id: the id of the person to which the address belongs
     */
    public function insert($person_id) {
        if (isset ($_POST['submit'])) {
            $address = new \app\models\Address();
            $address->person_id = $person_id;
            $address->description = $_POST['description'];
            $address->street = $_POST['street'];
            $address->city = $_POST['city'];
            $address->province_state = $_POST['province_state'];
            $address->postal_zip_code = $_POST['postal_zip_code'];
            $address->country_code = $_POST['country_code'];
            $address->insert();

            // Redirect to the person's address page
            header("Location: /Person/details/$person_id");
        } else {
            $address = new \app\models\Address();
            $address = $address->get($person_id);
            $this->view('Address/insert',[$address, $person_id]);
        }
    }

    /**
     * Edit an address from form POST action by modifying the database record
     * @param int $person_id: the id of the person to which the address belongs
     */
    public function edit($address_id) {
        $address = new \app\models\Address();
        $address = $address->get($address_id);

        $person = new \app\models\Person();
        $person = $person->get($address->person_id);

        // If the form has been submitted, update the database record
        if (isset ($_POST['submit'])) {
            $address->setDescription($_POST['description']);
            $address->setStreet($_POST['street']);
            $address->setCity($_POST['city']);
            $address->setProvinceState($_POST['province_state']); 
            $address->setPostalZip($_POST['postal_zip_code']);
            $address->setCountryCode($_POST['country_code']);
            $address->update();

            // Redirect to the person's address page
            header("Location: /Address/index/$person->id");
        } else {
            // Display the edit form
            $this->view('Address/edit', ['address'=>$address, 'person'=>$person]);
        }
    }

    /**
     * Show details of an address from form POST action by displaying the database record
     * @param int $person_id: the id of the person to which the address(es) belongs
     */
    public function details($address_id) {
       
        $address = new \app\models\Address();
        $address = $address->get($address_id);
        $this->view('Address/details', $address); // Display the details page
    }
    


    /**
     * Delete an address from form POST action by deleting the database record
     * @param int $person_id: the id of the person to which the address(es) belongs
     */
    public function delete($person_id) {
        $person = new \app\models\Person();
        $person->delete($person_id); // Delete the address(es) for the person
        header("Location: /Address/index"); // Redirect to the address page
    }
}
?>

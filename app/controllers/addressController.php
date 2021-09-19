<?php 
namespace app\controllers;

class AddressController extends \app\core\controller {
    public function index($person_id) {
    

        $address = new \app\models\Address();
        $addresses = $address->getAll($person_id);

        $this->view('Address/index', $addresses);
    }

    public function insert($person_id) {
        if (isset ($_POST['submit'])) {
            $address = new \app\models\Address();
            $address->description = $_POST['description'];
            $address->street = $_POST['street'];
            $address->city = $_POST['city'];
            $address->province_state = $_POST['province-state'];
            $address->postal_zip = $_POST['postal-zip'];
            $address->country = $_POST['country'];
            $address->insert();

            header("Location: /Address/index/$person_id");
        } else {
            $address = new \app\models\Address();
            $address = $address->get($person_id);
            $this->view('Address/insert',$address);
        }
    }

    public function edit($address_id) {
        $address = new \app\models\Address();
        $address = $address->get($address_id);

        $person = new \app\models\Person();
        $person = $person->get($address->person_id);

        if (isset ($_POST['submit'])) {
            $address->setDescription($_POST['description']);
            $address->setStreet($_POST['street']);
            $address->setCity($_POST['city']);
            $address->setProvinceState($_POST['province_state']); 
            $address->setPostalZip($_POST['postal_zip']);
            $address->setCountryCode($_POST['country_code']);
            $address->update();

            header("Location: /Address/index/$person->id");
        } else {
            $this->view('Address/edit', ['address'=>$address, 'person'=>$person]);
        }
    }

    public function details($person_id) {
        $address = new \app\models\Address();
        $addressArray = $address->getAll($person_id);
        $this->view('Address/details', $addressArray);
    }

    public function delete($person_id) {
        $person = new \app\models\Person();
        $person->delete($person_id);
        header("Location: /Address/index");
    }
}
?>

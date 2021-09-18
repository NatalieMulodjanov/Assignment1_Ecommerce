<?php 

class AddressController extends app\core\Controller {
    public function index($person_id) {
        $myPerson = new \app\models\Person();
        $myPerson = $myPerson->get($person_id);

        $address = new \app\models\Address();
        $addresses = $address->getAll($person_id);

        $this->view('Address/index', ['person'=>$myPerson, 'addresses'=>$addresses]);
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
            $address->description = $_POST['description'];
            $address->street = $_POST['street'];
            $address->city = $_POST['city'];
            $address->province_state = $_POST['province-state'];
            $address->postal_zip = $_POST['postal-zip'];
            $address->country = $_POST['country'];
            $address->update();

            header("Location: /Address/index/$person->id");
        } else {
            $this->view('Address/edit', ['address'=>$address, 'person'=>$person]);
        }
    }

    public function details($address_id) {
        $person = new \app\models\Person();
        $person = $person->get($person_id);
        $this->view('Address/details', $person);
    }

    public function delete($person_id) {
        $person = new \app\models\Person();
        $person->delete($person_id);
        header("Location: /Address/index");
    }
}
?>

<html>
    <head>
        <title>Edit Address</title>
    </head>
    <body>
        <h4>Edit Address</h4>
        <form action="" method="post">
            Person ID: <input type='text' name='person_id' disabled value='<?php echo $data['address']->person_id; ?>'><br>
            Description: <input type='text' name='description' value='<?php echo $data['address']->description; ?>'><br>
            Street: <input type='text' name='street' value='<?php echo $data['address']->street; ?>'><br> 
            City: <input type='text' name='city' value='<?php echo $data['address']->city; ?>'><br>
            Province/State: <input type='text' name='province_state' value='<?php echo $data['address']->province_state; ?>'><br>
            postal/Zip code: <input type='text' name='postal_zip_code' value='<?php echo $data['address']->postal_zip_code; ?>'><br>
            Country code: 
            <select name='country_code'>
            <?php 
            $currentCountry = new \app\models\Country();
            $currentCountry = $currentCountry->get($data['address']->country_code);
            echo '<option value='.$currentCountry->country_code.'>'.$currentCountry->country_name.' - '.$currentCountry->country_code.'</option>';
            $country = new \app\models\Country();
            $countries = $country->getAll();
            foreach($countries as $country){
                echo '<option value='.$country->country_code.'>'.$country->country_name.' - '.$country->country_code.'</option>';
            }
            ?>
            </select><br>
            <input type='submit' name="submit" value='Edit Address'>
        </form>
    </body>
</html>
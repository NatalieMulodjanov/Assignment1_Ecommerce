<html>
    <head>
        <title>Add Address</title>
    </head>
    <body>
        <form action='' method='post'>
            Person ID: <input type='text' name='person_id' disabled value="<?php echo $data[1] ?>"><br> <!-- Person ID get from link? FIXME: Does not work because apparently $data is a bool-->
            Description: <input type='text' name='description'><br>
            Street: <input type='text' name='street'><br> 
            City: <input type='text' name='city'><br> 
            Province/State: <input type='text' name='province_state'><br> 
            Postal Code/Zip Code: <input type='text' name='postal_zip_code'><br> 
            Country Code:
            <select name='country_code'>
            <?php 
            $country = new \app\models\Country();
            $countries = $country->getAll();
            foreach($countries as $country){
                echo '<option value='.$country->country_code.'>'.$country->country_name.' - '.$country->country_code.'</option>';
            }
            ?>
            </select><br>
            <input type='submit' name="submit" value='Add Address'>
        </form>
    </body>
</html>
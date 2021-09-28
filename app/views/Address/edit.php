<html>
    <head>
        <title>Edit Address</title>
    </head>

    <body>
        <h4>Edit Address</h4>
        <form action="" method="post">
            Person ID: <input type='text' name='person_id' value='<?php echo $data['address']->person_id; ?>'><br>
            Description: <input type='text' name='description' value='<?php echo $data['address']->description; ?>'><br>
            Street: <input type='text' name='street' value='<?php echo $data['address']->street; ?>'><br> 
            City: <input type='text' name='city' value='<?php echo $data['address']->city; ?>'><br>
            Province/State: <input type='text' name='province_state' value='<?php echo $data['address']->province_state; ?>'><br>
            postal/Zip code: <input type='text' name='postal_zip_code' value='<?php echo $data['address']->postal_zip_code; ?>'><br>
            Country code: <input type='text' name='country_code' value='<?php echo $data['address']->country_code; ?>'><br>
            
            <input type='submit' name="submit" value='Edit Address'>

        </form>
    </body>
</html>
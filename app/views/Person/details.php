<html>

<head>
    <title>Person Details</title>
</head>

<body>
    <h4>Person ID: </h4><input disabled type="text" value="<?php echo $data[0]->person_id; ?>"><br/>
    <h4>First Name: </h4><input disabled type="text" value="<?php echo $data[0]->f_name; ?>"><br/>
    <h4>Last Name: </h4><input disabled type="text" value="<?php echo $data[0]->l_name; ?>"><br/>
    <h4>Notes: </h4><input disabled type="text" value="<?php echo $data[0]->notes; ?>"><br/>
    
    <h1>Addresses:</h1>
    <?php 
        ob_start();
        echo $data[0]->person_id;
        $myPerson = ob_get_clean();
    if (empty($data[1])) {
        echo "<h2>No addresses found</h2>
                <a href='/AddressController/insert/$myPerson'>Add new Address</a>
                <a href='/Person/index'>Back to Person list</a><br>";
        return;
    }
    ?>
    <table>
        <th>Street</th>
        <th>City</th>
        <th>Province/State</th>
        <th>postal/zip code</th>
        <th>Country_code</th>
        <th>Actions</th>

        <?php
        foreach ($data[1] as $addressRecord)
            echo "<tr> 
                            <td>$addressRecord->street |</td>
                            <td>$addressRecord->city |</td>
                            <td>$addressRecord->province_state |</td>
                            <td>$addressRecord->postal_zip_code |</td>
                            <td>$addressRecord->country_code |</td>
                            <td><a href='/AddressController/details/$addressRecord->person_id'>Details</a></td>
                            <td><a href='/AddressController/delete/$addressRecord->person_id'>Delete</a></td>
                            <td><a href='/AddressController/edit/$addressRecord->address_id'>Edit</a></td>
                        </tr>"
        ?>
    </table>


    <a href='/Person/index'>Back to Person list</a><br/>
    <a href='/AddressController/insert/<?php echo $data[0]->person_id; ?>'>Add Address</a><br/>
</body>

</html>

`
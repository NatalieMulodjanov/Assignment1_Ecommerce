<html>
    <head>
        <title>Address details</title>
    </head>
    <body>
       <h1>Address details:</h1>
            <table>
                <th>Address id</th>
                <th>Person id</th>
                <th>Description</th>
                <th>Street</th>
                <th>City</th>
                <th>Province/State</th>
                <th>postal/zip code</th>
                <th>Country_code</th>
                <?php 
                    foreach ($data as $addressRecord) 
                    {
                        
                        echo "<tr> 
                            <td>$addressRecord->address_id |</td>
                            <td>$addressRecord->person_id |</td>
                            <td>$addressRecord->description |</td>
                            <td>$addressRecord->street |</td>
                            <td>$addressRecord->city |</td>
                            <td>$addressRecord->province_state |</td>
                            <td>$addressRecord->postal_zip_code |</td>
                            <td>$addressRecord->country_code |</td>
                            <td><a href='/AddressController/delete/$addressRecord->person_id'>Delete</a></td>
                            <td><a href='/AddressController/edit/$addressRecord->address_id'>Edit</a></td>
                        </tr>";
                    }
                    
                ?>
            </table>
            <a href='/Person/details/<?php echo $data[0]->person_id; ?>'>Back to list of addresses</a>
    </body>
</html>
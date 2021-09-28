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
                    //foreach ($data as $addressRecord) 
                        echo "<tr> 
                            <td>$data->address_id |</td>
                            <td>$data->person_id |</td>
                            <td>$data->description |</td>
                            <td>$data->street |</td>
                            <td>$data->city |</td>
                            <td>$data->province_state |</td>
                            <td>$data->postal_zip_code |</td>
                            <td>$data->country_code |</td>
                            <td><a href='/AddressController/delete/$data->person_id'>Delete</a></td>
                            <td><a href='/AddressController/edit/$data->address_id'>Edit</a></td>
                        </tr>";
                ?>
            </table>
            <a href='/Person/details/<?php echo $data->person_id; ?>'>Back to list of addresses</a>
            <a href='/Pictures/insert/<?php echo $data->person_id; ?>'>Add Picture</a>
            <a href='/Pictures/details/<?php echo $data->person_id; ?>'>Display Pictures</a>
    </body>
</html>
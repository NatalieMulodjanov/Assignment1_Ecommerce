<html>
    <head>
        <title>Address Index</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Person_id</th>
                <th>Description</th>
                <th>Street</th>
                <th>City</th>
                <th>Province_State</th>
                <th>Postal/Zip code</th>
                <th>Country_code</th>
            </tr>
            <?php
            foreach($data['addresses'] as $address){
                echo "<tr>
                        <td>$address->person_id</td>
                        <td>$address->description</td>
                        <td>$address->street</td>
                        <td>$address->city</td>
                        <td>$address->province_state</td>
                        <td>$address->postal_zip_code</td>
                        <td>$address->country_code</td>
                        <td>
                            <a href='ass1/Address/details/$address->address_id'>details</a> |
                            <a href='ass1/Address/update/$address->address_id'>edit</a> |
                            <a href='ass1/Address/delete/$address->address_id'>delete</a> |
                        </td>
                    </tr>";
                }
             ?>
        </table>
    </body>
</html>
<html>
    <head>
        <title>Picture Index</title>
    </head>
    <body>
        <table>
            <tr>
                <th>Person_id</th>
                <th>Picture_id</th>
                <th>Description</th>
            </tr>
            <?php
            foreach($data['pictures'] as $picture){
                echo "<tr>
                        <td>$picture->person_id</td>
                        <td>$picture->picture_id</td>
                        <td>$picture->description</td>
                        <td>
                            <a href='/Pictures/details/$picture->person_id'>details</a> |
                            <a href='/Pictures/update/$picture->person_id'>edit</a> |
                            <a href='/Pictures/delete/$picture->person_id'>delete</a> |
                        </td>
                    </tr>";
                }
             ?>
        </table>
    </body>
</html>
<html>
    <head>
        <title>Picture details</title>
    </head>
    <body>
       <h1>Picture details:</h1>
            <table>
                <th>Picture_id</th>
                <th>Person_id</th>
                <th>Description</th>
                <?php 
                 var_dump($data->person_id);
                        echo "<tr> 
                            <td>$data->picture_id |</td>
                            <td>$data->person_id |</td>
                            <td>$data->description |</td>
                            <td><a href='/Pictures/delete/$data->person_id'>Delete</a></td>
                            <td><a href='/Pictures/edit/$data->picture_id'>Edit</a></td>
                        </tr>";
                ?>
            </table>
            <a href='/Person/details/<?php echo $data->person_id; ?>'>Back to list of addresses</a>
            <a href='/Pictures/insert/<?php echo $data->person_id; ?>'>Add Picture</a>
            <a href='/Pictures/details/<?php echo $data->person_id; ?>'>Display Pictures</a>
    </body>
</html>
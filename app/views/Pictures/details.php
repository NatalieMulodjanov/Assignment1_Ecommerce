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
                    <tr> 
                       <td><?php echo $data['picture']->picture_id;?> |</td>
                       <td><?php echo $data['picture']->person_id; ?> |</td>
                       <td><?php echo $data['picture']->description; ?>|</td>
                       <td><a href='/Pictures/delete/<?php echo $data['picture']->picture_id; ?>'>Delete</a></td>
                       <td><a href='/Pictures/edit/<?php echo $data['picture']->picture_id; ?>'>Edit</a></td>
                    </tr>
            </table>
            <a href='/Person/details/<?php echo $data['picture']->person_id; ?>'>Back to list of addresses</a>
            <a href='/Pictures/insert/<?php echo $data['picture']->person_id; ?>'>Add Picture</a>
    </body>
</html>
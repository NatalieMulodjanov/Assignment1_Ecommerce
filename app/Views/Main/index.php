<html>

<head>
    <title>Animal index</title>
</head>

<body>
    <a href="/Main/insert">Create new</a>
    <table>
        <tr>
            <th>Species</th>
            <th>Colour</th>
            <th>actions</th>
        </tr>

        <?php
        foreach ($data as $animal)
        
            echo     "<tr>
                        <td>$animal->species</td> 
                        <td>$animal->color</td> 
                        <td>
                            <a href='/Main/details/$animal->animal_id'>Details </a> | 
                            <a href='/Main/delete/$animal->animal_id'>Delete </a> | 
                            <a href='/Main/edit/$animal->animal_id'>Edit </a>
                        </td>   
                    </tr>";
        ?>
    </table>
</body>

<html>
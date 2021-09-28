<html>
    <head>
        <title>Person Index</title>
    </head>
    <body>
        <form action="/Person/search" method="POST">
            <a href='/Person/insert'>Add Person</a>
            <input type="text" name="search">
            <button type="submit">Search</button>
        </form>
        <table>
            <tr><th>First Name</th><th>Last Name</th><th>Notes</th><th>Actions</th></tr>
            <?php
            foreach($data as $person){
                echo "<tr>
                        <td>$person->f_name</td>
                        <td>$person->l_name</td>
                        <td>$person->notes</td>
                        <td>
                            <a href='/Person/details/$person->person_id'>details</a> |
                            <a href='/Person/update/$person->person_id'>edit</a> |
                            <a href='/Person/delete/$person->person_id'>delete</a> |
                        </td>
                    </tr>";
                }
             ?>
        </table>

    </body>
</html>
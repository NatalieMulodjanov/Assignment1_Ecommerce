<html>
    <head>
        <title>Teacher index</title>
    </head>

    <body>
        <h1>Teacher index</h1>
        <table>
            <th>teacher_id</th><th>teacher_name</th>
            <?php
                foreach($teachers as $teacher){
                    echo "<tr>
                            td>$teacher->teacher_id</td>
                            td>$teacher->teacher_name</td>
                            </tr>
                        ";
                }

            ?>

        </table>

       

    </body>
</html>
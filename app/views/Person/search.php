<html>
    <head>
        <title>Search results</title>
    </head>
    <body>
        <h1>Search results</h1>
        <p>Search again below:</p>
        <form action="/Person/search" method="POST">
                <input type="text" name="search">
                <button type="submit">Search</button>
        </form>
        <?php
            foreach ($data as $person) {
                echo "<a href='/Person/details/$person->person_id'>$person->f_name $person->l_name<br>";
            }   
        ?>
    </body>
</html>
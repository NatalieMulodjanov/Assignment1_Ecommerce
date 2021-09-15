<html>
    <head>
        <title>Add an animal</title>
    </head>
    <body>
        <form action="" method="post">
            <label>Animal Species</label>
            <input type="text" name="species" value='<?php echo $data->species; ?>' />
            <br>
            <label>Animal Colour</label>
            <input type="text" name="color" value='<?php echo $data->color; ?>'/>
            <br>
            <input type="submit" name="action" value="Save Changes">

        </form>
    </body>
</html>
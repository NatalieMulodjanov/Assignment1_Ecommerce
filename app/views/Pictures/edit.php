<html>
    <head>
        <title>Edit Picture</title>
    </head>
    <body>
        <h4>Edit Picture</h4>
        <form action="" method="post">
            Person ID: <input type='text' name='person_id' disabled value='<?php echo $data['picture']->person_id; ?>'><br>
            Picture ID: <input type='text' name='picture_id' value='<?php echo $data['picture']->picture_id; ?>'><br> 
            Description: <input type='text' name='description' value='<?php echo $data['picture']->description; ?>'><br>
            <input type='submit' name="submit" value='Edit Picture'>
        </form>
    </body>
</html>
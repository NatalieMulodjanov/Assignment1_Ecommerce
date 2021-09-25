<html>
    <head>
        <title>Edit person</title>
    </head>
    <body>
        <h4>Edit person</h4>
        <form action="" method="post">
            Person First Name: <input type='text' name='f_name' value='<?php echo $data->f_name; ?>'><br>
            Person Last Name: <input type='text' name='l_name' value='<?php echo $data->l_name; ?>'><br>
            Person Notes: <input type='text' name='notes' value='<?php echo $data->notes; ?>'><br> 
            <input type='submit' name="submit" value='Edit Person'>
        </form>
    </body>
</html>
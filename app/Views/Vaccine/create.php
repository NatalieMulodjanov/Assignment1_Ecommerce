<html>
<head><title>Add Vaccine</title></head>
<body>

<?php echo $data->color," ", $data->species ?>
<form action='' method='post'>
    Vaccine type: <input type='text' name='type' /> <br>
    Vaccine date: <input type='date' name='date'/> <br>

    <input type='submit' name='action' value='create'/> <br>

</form>

</body>

</html>


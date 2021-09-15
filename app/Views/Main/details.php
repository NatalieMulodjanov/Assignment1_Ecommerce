<html>
    <head>
        <title>Animal details</title>
    </head>
    <body>
       <h1>Animal details:</h1>
            <label>Animal Species</label>
            <input disabled type="text" name="species" value='<?php echo $data->species; ?>' />
            <br>
            <label>Animal Colour</label>
            <input disabled type="text" name="color" value='<?php echo $data->color; ?>'/>
            <br>
           
            <a href='/Main/index'>Back to list</a>


    </body>
</html>
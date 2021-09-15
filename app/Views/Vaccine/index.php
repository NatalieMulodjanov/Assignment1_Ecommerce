<html>

<head>
    <title>Vaccine index - for an animal</title>
</head>

<body>
    <a href="/VaccineController/insert/<?php echo $data['animal']->$animal_id; ?>">Create new vaccine</a>
    <?php $this->view('Main/details', $data['animal']); ?>
    <table>
        <tr>
            <th>Type</th>
            <th>Date</th>
            <th>actions</th>
        </tr>

        <?php
        foreach ($data['vaccine'] as $vaccine)
        
            echo     "<tr>
                        <td>$vaccine->type</td> 
                        <td>$vaccine->date</td> 
                        <td>
                            <a href='/VaccineController/details/$vaccine->vaccine_id'>Details </a> | 
                            <a href='/VaccineController/delete/$vaccine->vaccine_id'>Delete </a> | 
                            <a href='/VaccineController/edit/$vaccine->vaccine_id'>Edit </a>
                        </td>   
                    </tr>";
        ?>
    </table>
</body>

<html>
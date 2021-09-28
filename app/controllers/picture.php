<?php

namespace app\controllers;

class Picture extends \app\core\Controller
{

    private $folder = 'uploads/';

    public function index()
    {
        //implement file uploads
        if (isset($_POST['action'])) {
            //get the form data and process
            if (isset($_FILES['newPicture'])) { //the name newPicture is from the form in views
                $check = getimagesize($_FILES["newPicture"]["tmp_name"]);
                var_dump($check);

                $mime_type_to_extension = [
                    'image/jpeg' => '.jpg',
                    'image/png' => '.png',
                    'image/gif' => '.gif',
                    'image/bmp' => '.bmp'
                ];

                //   $check['mime'] = convert=>extention
                if ($check !== false && isset($mime_type_to_extension[$check['mime']])) {
                    $extention = $mime_type_to_extension[$check['mime']];
                } else {
                    $this->view('picture/index',  ['error'=>"File type not supported",'pictures'=>[]]);
                    return;
                }

                $filename = uniqid().$extention;
                $filepath = $this->folder . $filename;

                if ($_FILES['newPicture']['size'] > 4000000) {
                    $this->view('picture/index',  ['error'=>"File size too large",'pictures'=>[]]);
                    return;
                }

                if(move_uploaded_file($_FILES['newPicture']['tmp_name'], $filepath)){
                    $picture = new \app\models\Picture();
                    $picture->file_name = $filename;
                    $picture->insert();

                    echo "$filename is saved";
                    header('Location: ass1/picture/index');
                } else {
                    echo "Error saving file";
                }
            
            }
        } else {
            //present the form
            $picture = new \app\models\Picture();
            $pictures = $picture->getAll();
            $this->view('Picture/index', ['error'=>null, 'pictures'=>$pictures]); //must implement the view
        }
    }
}

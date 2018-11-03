<?php
include_once '../../Logic/business-logic-pilot.php';

$bl = new BusinessLogicPilot;


    $path= "../../pilotPictures/";
    $filename = basename($_FILES['filePicture']['name']);
    // var_dump($_FILES['filePicture']['tmp_name']);
    move_uploaded_file($_FILES['filePicture']['tmp_name'], $path.$filename);


if(!empty($_POST['pilotName'])&&!empty($_POST['level'])){

    if(!empty($_POST['filePicture'])){

        $fileTmpName = $_FILES['filePicture']['tmp_name'];
        $fileSise = $_FILES['filePicture']['size'];
        $fileEror = $_FILES['filePicture']['error'];
        $fileType = $_FILES['filePicture']['type'];


        $allowed = array('jpg','jpeg','png');
        
        $filename = basename($_FILES['filePicture']['name']);
        // var_dump($_FILES['filePicture']['tmp_name']);
        echo $filename;
        exit();
        if(in_array($allowed)){
            if($fileEror===0){
                if($fileSise<2000000){
                    $path= "pilotPictures/";
                    move_uploaded_file($_FILES['filePicture']['tmp_name'], $path.$filename);
                }else{
                    echo 'your file is big';
                }
            }else{
                echo 'you have error in your file';
            }
        }else{
            echo 'this file is not good ';
        }
    }else{
        echo 'add picture file';
    }

    $pilot = new pilotModel([
        'name' => $_POST['pilotName'],
        'level' => $_POST['level'],
        'picture_src' => $_FILES['filePicture']['name']

    ]);

    $bl->set($pilot);
    echo "<script type='text/javascript'>if (window.confirm('Revenue successful')){
        window.location.href = '../views/add-pilot-view.php';
    };</script>";
    die();
}
elseif(!empty($_POST['valid'])&&empty($_POST['pilotName'])&&empty($_POST['level'])&&empty($_POST['filePicture'])){
    echo "<script type='text/javascript'>if (window.confirm('These fields can not be empty')){
        window.location.href = '../views/add-pilot-view.php';
    };</script>";
}

?> 
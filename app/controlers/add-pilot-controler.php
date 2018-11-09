<?php
include_once '../../Logic/business-logic-pilot.php';

$bl = new BusinessLogicPilot;
$blp = new BusinessLogicPilot;
$arrayOfPilots = $blp->get();
if($arrayOfPilots){$arrayOfPilots = $bl->get();}
$arreyOfErrors = [];
$arreyOfSuccess = [];
$hasErrors = false;
$successful =false;

if(isset($_POST['AddPilot'])){
    
    $path= "../../pilotPictures/";
    $filename = basename($_FILES['filePicture']['name']);
    // var_dump($_FILES['filePicture']['tmp_name']);
    move_uploaded_file($_FILES['filePicture']['tmp_name'], $path.$filename);

}
if(!empty($_POST['pilotName'])&&!empty($_POST['level'])){
    if(!empty($_FILES['filePicture'])){
    //     $fileTmpName = $_FILES['filePicture']['tmp_name'];
    //     $fileSise = $_FILES['filePicture']['size'];
    //     $fileEror = $_FILES['filePicture']['error'];
    //     $fileType = $_FILES['filePicture']['type'];


    //     $allowed = array('jpg','jpeg','png');
        
    //     $filename = basename($_FILES['filePicture']['name']);
    //     // var_dump($_FILES['filePicture']['tmp_name']);
    //     // echo $filename;
    //     // exit();
    //     if(in_array($fileType,$allowed)){
    //         if($fileEror===0){
    //             if($fileSise<2000000){
    //                 $path= "pilotPictures/";
    //                 move_uploaded_file($_FILES['filePicture']['tmp_name'], $path.$filename);
    //             }else{
    //                 $hasErrors = true;
    //                 array_push($arreyOfErrors, "your file is big");
    //                 include_once '../views/add-pilot-view.php';
                   
    //         }
    //     }else{
    //             $hasErrors = true;
    //             array_push($arreyOfErrors, "you have error in your file");
    //             include_once '../views/add-pilot-view.php'; 
               
    //     }
    // }else{
    //         $hasErrors = true;
    //         array_push($arreyOfErrors, "this file is not good ");
    //         include_once '../views/add-pilot-view.php';   
           
    // }
}else{
        $hasErrors = true;
        array_push($arreyOfErrors, "add picture file");
        include_once '../views/add-pilot-view.php'; 
        
        
    }
    if(!$hasErrors){
        foreach ($arrayOfPilots as $namePilot) {
            if($namePilot->getNmaepilot()==$_POST['pilotName']){
                $hasErrors = true;
            }
        }
        if(!$hasErrors){
            $path= "pilotPictures/";
            move_uploaded_file($_FILES['filePicture']['tmp_name'], $path.$filename);
            $pilot = new pilotModel([
                'name' => $_POST['pilotName'],
                'level' => $_POST['level'],
                'picture_src' => $_FILES['filePicture']['name']
            ]);

            $bl->set($pilot);
            array_push($arreyOfSuccess, "Revenue successful");
            $successful =true;
            include_once '../views/add-pilot-view.php'; 
            }else{
                $hasErrors = true;
                array_push($arreyOfErrors, "This name exists in the system. Change name!");
                include_once '../views/add-pilot-view.php';
            }
    }
    // echo "<script type='text/javascript'>if (window.confirm('Revenue successful')){
    //     window.location.href = '../views/add-pilot-view.php';
    // };</script>";
    // die();
    }elseif(!empty($_POST['valid'])&&empty($_POST['pilotName'])||!empty($_POST['valid'])&&empty($_POST['level'])||!empty($_POST['valid'])&&empty($_POST['pilotName'])&&empty($_POST['level'])){

                $hasErrors = true;
                array_push($arreyOfErrors, "These fields can not be empty");
                include_once '../views/add-pilot-view.php'; 
                

        // echo "<script type='text/javascript'>if (window.confirm('These fields can not be empty')){
        //     window.location.href = '../views/add-pilot-view.php';
        // };</script>";
    }
    if(isset($_POST['updatePIlot'])){
        include_once '../views/show-pilot-view.php';
    }

    if(isset($_POST['SaveUpdatePilot'])){
        if(!empty($_POST['idOfPilotUpdate'])&&!empty($_POST['levelUpdate'])&&!empty($_POST['nameUpdate'])){
            array_push($arreyOfSuccess, "Update successful");
            $successful =true;
            $pilot = new pilotModel([
                'id' => $_POST['idOfPilotUpdate'],
                'name' => $_POST['nameUpdate'],
                'level' => $_POST['levelUpdate']
            ]);
            $bl->update($pilot);
            include_once '../views/show-pilot-view.php';
        }else{
            $hasErrors = true;
            array_push($arreyOfErrors, "All Fields must be filled");
            include_once '../views/show-pilot-view.php';
        }
    }
if(isset($_POST['deletePilot'])&&!empty($_POST['idOfPilotDelete'])){
    //do if check if this pilot foreign key for flights
    array_push($arreyOfSuccess, "Update successful");
            $successful =true;
            $pilotId = $_POST['idOfPilotDelete'];
            $bl->delete($pilotId);
            include_once '../views/show-pilot-view.php';
}


//for filter
if(isset($_POST['filterPilots'])){
    
    if(!empty($_POST['filterName'])||!empty($_POST['filterLevel'])){
        $name = $_POST['filterName'];
        $level = $_POST['filterLevel'];
        //valid if this level number
        $filter = new pilotModel([
            'name' => $_POST['filterName'],
            'level' => $_POST['filterLevel']
        ]);
        $arrayOfPilots = $bl->getFilter($filter,$name,$level );
        if(empty($arrayOfPilots)){
            $hasErrors = true;
            array_push($arreyOfErrors, "Nothing found");
        }
        include_once '../views/show-pilot-view.php';
    }else{
        $hasErrors = true;
        array_push($arreyOfErrors, "Filter is empty");
        include_once '../views/show-pilot-view.php';
    }

}

if(isset($_POST['searchInPilots'])){
   
    if(!empty($_POST['contentSearchPilots'])){
        
        $search = $_POST['contentSearchPilots'];
        $arrayOfPilots = $bl->getSearch($search);
        if(empty($arrayOfPilots)){
            $hasErrors = true;
            array_push($arreyOfErrors, "Nothing found");
        }
        include_once '../views/show-pilot-view.php';
    }else{
        $hasErrors = true;
        array_push($arreyOfErrors, "Search is empty");
        include_once '../views/show-pilot-view.php';

    }
}

?> 

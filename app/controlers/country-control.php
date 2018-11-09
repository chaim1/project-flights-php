<?php
include_once '../../Logic/business-logic-country.php';
$bl = new BusinessLogicCountry;
$arrayOfCountry = $bl->get();
if(isset($_GET['addCountry'])){
$arreyOfErrors = [];
$arreyOfSuccess = [];
$hasErrors = false;
$successful =false;
$valid =false;
}

if(!empty($_GET['countryName'])){
    
     foreach($arrayOfCountry as $Country) { 
         if($Country->getNmaeCountry()==$_GET['countryName']){
            $hasErrors = true;
            $valid = true;} 
     } 
     array_push($arreyOfErrors, "A country exists in the system");
     include_once '../views/add-country-view.php';
if(isset($_GET['addCountry'])&&!$valid){
    $country = new countrytModel([
        'name' => $_GET['countryName']
    ]);

    $bl->set($country );
        array_push($arreyOfSuccess, "Country successfully inserted");
        $successful =true;
        $valid =true;
        include_once '../views/add-country-view.php';

        // echo "<script type='text/javascript'>if (window.confirm('Revenue successful')){
        // window.location.href = '../views/add-country-view.php';
        // };</script>";
                    // die();
        }
    }
elseif(!empty($_GET['valid'])&&empty($_GET['countryName'])){
        $hasErrors = true;
        array_push($arreyOfErrors, "These fields can not be empty");
        include_once '../views/add-country-view.php';

        // echo "<script type='text/javascript'>if (window.confirm('These fields can not be empty')){
        //     window.location.href = '../views/add-country-view.php';
        // };</script>";
}

?>
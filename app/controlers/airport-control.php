<?php
include_once '../../Logic/business-logic-airport.php';
include_once '../../Logic/business-logic-country.php';

$bl = new BusinessLogicAirport;
$blc = new BusinessLogicCountry;
$arrayOfAirport = $bl->get();
$arrayOfCountry = $blc->get();

if(isset($_POST['AddAirportButton'])){
    $arreyOfErrors = [];
    $arreyOfSuccess = [];
    $hasErrors = false;
    $successful =false;
    $valid =false;
    $a=true;
    }
    


if(isset($_POST['AddAirportButton'])&&$a){

if(!empty($_POST['nameAirport'])&&!empty($_POST['countryId'])){
if($valid){
    foreach($arrayOfAirport as $Airport) { 
        if($Airport->getNmae()==$_POST['nameAirport']){
           $hasErrors = true;
           $valid = true;
           $nameCountry = $Airport->getCountryModel()->getNmaeCountry();
        } 
    }
}   
    if(isset($_POST['AddAirportButton'])&&!$valid){
        $airport = new airportModel([
            'name' => $_POST['nameAirport'],
            'contry_id' => $_POST['countryId']
        ]);

        $bl->set($airport);
        array_push($arreyOfSuccess, "Country successfully inserted");
        $successful =true;
        include_once '../views/add-airport-view.php';
    // echo "<script type='text/javascript'>if (window.confirm('Revenue successful')){
    //     window.location.href = '../views/add-airport-view.php';
    // };</script>";
    // die();
    }else if($valid) {
        array_push($arreyOfErrors, "This airport exists in the country ".$nameCountry);
            include_once '../views/add-airport-view.php';
}
}elseif(empty($_POST['nameAirport'])&&!empty($_POST['countryId'])){
        $hasErrors = true;
        array_push($arreyOfErrors, "These fields can not be empty");
        include_once '../views/add-airport-view.php';
    // echo "<script type='text/javascript'>if (window.confirm('These fields can not be empty')){
    //     window.location.href = '../views/add-airport-view.php';
    // };</script>";
}
}
?>   

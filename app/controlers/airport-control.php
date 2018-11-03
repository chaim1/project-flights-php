<?php
include_once '../../Logic/business-logic-airport.php';
include_once '../../Logic/business-logic-country.php';

$bl = new BusinessLogicAirport;
$blc = new BusinessLogicCountry;

$arrayOfAirport = $bl->get();
$arrayOfCountry = $blc->get();



if(!empty($_POST['nameAirport'])&&!empty($_POST['countryId'])){

    $airport = new airportModel([
        'name' => $_POST['nameAirport'],
        'contry_id' => $_POST['countryId']
    ]);

    $bl->set($airport);
    echo "<script type='text/javascript'>if (window.confirm('Revenue successful')){
        window.location.href = '../views/add-airport-view.php';
    };</script>";
    die();
}
elseif(empty($_POST['nameAirport'])&&!empty($_POST['countryId'])){
    echo "<script type='text/javascript'>if (window.confirm('These fields can not be empty')){
        window.location.href = '../views/add-airport-view.php';
    };</script>";
}

?>   

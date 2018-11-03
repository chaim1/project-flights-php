<?php
include_once '../../Logic/business-logic-country.php';
$bl = new BusinessLogicCountry;

if(!empty($_GET['countryName'])){
    $country = new countrytModel([
        'name' => $_GET['countryName']
    ]);

    $bl->set($country );
        echo "<script type='text/javascript'>if (window.confirm('Revenue successful')){
        window.location.href = '../views/add-country-view.php';
        };</script>";
    die();
}
elseif(!empty($_GET['valid'])&&empty($_GET['countryName'])){
        echo "<script type='text/javascript'>if (window.confirm('These fields can not be empty')){
            window.location.href = '../views/add-country-view.php';
        };</script>";
}

?>
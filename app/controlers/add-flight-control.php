<?php
include_once '../../Logic/business-logic-flight.php';
$blf = new BusinessLogicFlight;
$bla = new BusinessLogicAirport;
$blp = new BusinessLogicPilot;
$blc = new BusinessLogicCountry;
$arrayOfFlights = $blf->get();
$arrayOfAirport = $bla->get();
$arrayOfPilot = $blp->get();
$arrayOfCountry = $blc->get();

if(!empty($_GET['datetime'])&&!empty($_GET['no'])){
    if($_GET['airport']!== $_GET['country']){
        $flights = new flightModel([
            'flight_from' => $_GET['airport'],
            'flight_to' => $_GET['country'],
            'flight_datetime' => $_GET['datetime'],
            'no' => $_GET['no'],
            'pilot_id' => $_GET['pilot']
        ]);

        $blf->set($flights);

        echo "<script type='text/javascript'>if (window.confirm('Revenue successful')){
            window.location.href = '../views/add-flights-view.php';
        };</script>";
        die();
    } elseif($_GET['airport']== $_GET['country']){
        echo "<script type='text/javascript'>if (window.confirm('The flight destination should be different from the airport')){
            window.location.href = '../views/add-flights-view.php';
        };</script>";
    }  
}
elseif(!empty($_GET['airport'])&&empty($_GET['datetime'])&&empty($_GET['no'])){
        echo "<script type='text/javascript'>if (window.confirm('These fields can not be empty')){
            window.location.href = '../views/add-flights-view.php';
        };</script>";
}

?>
  
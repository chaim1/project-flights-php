<?php
include_once '../../Logic/business-logic-flight.php';
$blf = new BusinessLogicFlight;
$bla = new BusinessLogicAirport;
$blp = new BusinessLogicPilot;
$blc = new BusinessLogicCountry;
$bl = new BusinessLogicFlight;
if(empty($arrayOfFlight)){$arrayOfFlight = $bl->get();}
$arrayOfFlights = $blf->get();
$arrayOfAirport = $bla->get();
$arrayOfPilot = $blp->get();
$arrayOfCountry = $blc->get();
$arreyOfErrors = [];
$arreyOfSuccess = [];
$hasErrors = false;
$successful =false;







if(isset($_GET['AddFlight'])){
    if(empty($_GET['airport'])||empty($_GET['country'])||empty($_GET['pilot'])||empty($_GET['datetime'])||empty($_GET['no'])){
        $hasErrors = true;
        array_push($arreyOfErrors, "These lines can not be empty");
        include_once '../views/add-flights-view.php';
    }
}
if(!empty($_GET['datetime'])&&!empty($_GET['no'])){
    if($_GET['airport']!== $_GET['country']){
        if(strlen($_GET['no'])>12){
            $hasErrors = true;
            array_push($arreyOfErrors, "A row 'no' can allow up to 12 characters");
            include_once '../views/add-flights-view.php';
        }else{
        $flights = new flightModel([
            'flight_from' => $_GET['airport'],
            'flight_to' => $_GET['country'],
            'flight_datetime' => $_GET['datetime'],
            'no' => $_GET['no'],
            'pilot_id' => $_GET['pilot']
        ]);

        $blf->set($flights);
        array_push($arreyOfSuccess, "Revenue successful");
        $successful =true;
        include_once '../views/add-flights-view.php';
        }
        // echo "<script type='text/javascript'>if (window.confirm('Revenue successful')){
        //     window.location.href = '../views/add-flights-view.php';
        // };</script>";
        // die();
    } elseif($_GET['airport']== $_GET['country']){
        $hasErrors = true;
        array_push($arreyOfErrors, "The flight destination should be different from the airport");
        include_once '../views/add-flights-view.php';
        // echo "<script type='text/javascript'>if (window.confirm('The flight destination should be different from the airport')){
        //     window.location.href = '../views/add-flights-view.php';
        // };</script>";
    }  
}
elseif(!empty($_GET['airport'])&&empty($_GET['datetime'])&&empty($_GET['no'])){
        // echo "<script type='text/javascript'>if (window.confirm('These fields can not be empty')){
        //     window.location.href = '../views/add-flights-view.php';
        // };</script>";
}elseif(isset($_POST['save'])){
    if(!empty($_POST['idOfFlightUpdate'])&&empty($_POST['noUpdate'])||!empty($_POST['idOfFlightUpdate'])&&empty($_POST['airportUpdate'])||!empty($_POST['idOfFlightUpdate'])&&empty($_POST['countryUpdate'])||!empty($_POST['idOfFlightUpdate'])&&empty($_POST['pilotUpdate'])||!empty($_POST['idOfFlightUpdate'])&&empty($_POST['dateTimeUpdate'])){
        $hasErrors = true;
        array_push($arreyOfErrors, "All rows should be full");
        include_once '../views/show-flights-view.php';
    }else if($_POST['countryUpdate']==$_POST['airportUpdate']){
        $hasErrors = true;
        array_push($arreyOfErrors, "The flight location should be different from the target location");
        include_once '../views/show-flights-view.php';
    }else if(!empty($_POST['idOfFlightUpdate'])&&!empty($_POST['noUpdate'])&&!empty($_POST['airportUpdate'])&&!empty($_POST['countryUpdate'])&&!empty($_POST['pilotUpdate'])&&!empty($_POST['dateTimeUpdate'])){
        // echo $_POST['countryUpdate'],$_POST['airportUpdate'];
        // die();
        array_push($arreyOfSuccess, "Update Success");
        $successful =true;
        $flights = new flightModel([
            'id' => $_POST['idOfFlightUpdate'],
            'flight_from' => $_POST['airportUpdate'],
            'flight_to' => $_POST['countryUpdate'],
            'flight_datetime' => $_POST['dateTimeUpdate'],
            'no' => $_POST['noUpdate'],
            'pilot_id' => $_POST['pilotUpdate']
        ]);
        $blf->update($flights);
    }
        include_once '../views/show-flights-view.php';

}elseif(isset($_POST['updateFlight'])){

    if(!empty($_POST['idOfFlight'])&&!empty($_POST['idOfAirport'])&&!empty($_POST['idOfcountry'])&&!empty($_POST['idOfPilot'])){
        include_once '../views/show-flights-view.php';
    }

}elseif(isset($_POST['deleteFlight'])){

    if(!empty($_POST['idOfFlightDelete'])){

        array_push($arreyOfSuccess, "Deleted Success");
        $successful =true;

        $deleteFlight = $_POST['idOfFlightDelete'];
        $blf->delete($deleteFlight);
    }

    include_once '../views/show-flights-view.php';
}

if(isset($_POST['search'])){
   
    if(!empty($_POST['contentSearch'])){
        
        $search = $_POST['contentSearch'];
        $arrayOfFlight = $bl->getSearch($search);
        if(empty($arrayOfFlight)){
            $hasErrors = true;
            array_push($arreyOfErrors, "Nothing found");
        }
        include_once '../views/show-flights-view.php';
    }else{
        $hasErrors = true;
        array_push($arreyOfErrors, "Search is empty");
        include_once '../views/show-flights-view.php';

    }
}
if(isset($_POST['filter'])){
    
    if(!empty($_POST['contentNo'])||!empty($_POST['airportFilter'])||!empty($_POST['countryFilter'])||!empty($_POST['contentDateTimeFilter'])||!empty($_POST['pilotFilter'])){
    //     var_dump($_POST);
    //    die();
        $no = $_POST['contentNo'];
        $datetime = $_POST['contentDateTimeFilter'];
        $pilot = $_POST['pilotFilter'];
        $from = $_POST['airportFilter'];
        $to = $_POST['countryFilter'];
        $filter = new flightModel([
            'flight_from' => $_POST['airportFilter'],
            'flight_to' => $_POST['countryFilter'],
            'flight_datetime' => $_POST['contentDateTimeFilter'],
            'no' => $_POST['contentNo'],
            'pilot_id' => $_POST['pilotFilter']
        ]);
        $arrayOfFlight = $bl->getFilter($filter,$no,$datetime,$pilot,$from,$to );
        if(empty($arrayOfFlight)){
            $hasErrors = true;
            array_push($arreyOfErrors, "Nothing found");
        }
        include_once '../views/show-flights-view.php';
    //    $arrayParams = [];
    //    die();
    //     foreach ($_POST as $key => $value) {
    //             array_push($arrayParams,$key);
    //             // $arrayname[indexname] = $value;
    //     }
    //     var_dump($arrayParams);
    //    die();
    }else{
        $hasErrors = true;
        array_push($arreyOfErrors, "Filter is empty");
        include_once '../views/show-flights-view.php';
    }

}
?>
  
<?php  
include_once 'model.php';
include_once '../../Logic/business-logic-pilot.php';
include_once '../../Logic/business-logic-airport.php';
include_once '../../Logic/business-logic-country.php';


    class flightModel  extends model
    {
        private $id;        
        private $no;     
        private $flight_datetime;  
        private $flight_from;        
        private $flight_to;        
        private $pilot_id;  
        private $pilotModel; 
        // private $ApilotModel;  
        private $airportModel;  
        private $countryModel;
        
        function __construct($arr) {

                if(!empty($arr['id'])){
                    $this->id = $arr['id'];
                } 

                $this->no = $arr['no'];

                $this->flight_datetime = $arr['flight_datetime'];

                $this->flight_from = $arr['flight_from']; 

                $this->flight_to = $arr['flight_to']; 

                $this->pilot_id = $arr['pilot_id']; 

            
        }

        function getId() {
            return $this->id;
        }

        function getNo() {
            return $this->no;
        }

        function getFlightDatetime() {
            return $this->flight_datetime;
        }

        function getFlightFrom() {
            return $this->flight_from;
        }

        function getFlightTo() {
            return $this->flight_to;
        }

        function getPilotId() {
            return $this->pilot_id;
        }
        
        function getPilotModel() {
            if (empty($this->pilotModel)) {
                $pbl = new BusinessLogicPilot();
                $this->pilotModel = $pbl->getOne($this->pilot_id);    
                
            }
            return $this->pilotModel;
        }

        // function getAPilotModel() {
        //     if (empty($this->ApilotModel)) {
        //         $pbl = new BusinessLogicPilot();
        //         $this->ApilotModel = $pbl->get();    
                
        //     }
        //     return $this->ApilotModel;
        // }

        function getAirportModel() {
            if (empty($this->airportModel)) {
                $pbl = new BusinessLogicAirport();
                $this->airportModel = $pbl->getOne($this->flight_from);    
                
            }
            return $this->airportModel;
        }

        function getCountryModel() {
            if (empty($this->countryModel)) {
                $pbl = new BusinessLogicCountry ();
                $this->countryModel = $pbl->getOne($this->flight_to);    
                
            }
            return $this->countryModel;
        }
    }
?>
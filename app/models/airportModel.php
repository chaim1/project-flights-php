<?php  

include_once 'model.php';
include_once '../../Logic/business-logic-country.php';

    class airportModel  extends model
    {
        private $id;        
        private $name;     
        private $contry_id;    
        private $countryModel;

        function __construct($arr) {

                if(!empty($arr['id'])){
                    $this->id = $arr['id'];
                }

                $this->name = $arr['name'];

                $this->contry_id = $arr['contry_id'];
            
        }

        function getId() {
            return $this->id;
        }

        function getNmae() {
            return $this->name;
        }

        function getContryId() {
            return $this->contry_id;
        }
        function getCountryModel() {
            if (empty($this->countryModel)) {
                $pbl = new BusinessLogicCountry ();
                $this->countryModel = $pbl->getOne($this->contry_id);    
                
            }
            return $this->countryModel;
        }
        
    }

?>
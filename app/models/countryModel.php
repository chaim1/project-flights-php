<?php  

include_once 'model.php';

    class countrytModel  extends model
    {
        private $id;        
        private $name;              
        function __construct($arr) {

                if(!empty($arr['id'])){
                    $this->id = $arr['id'];
                }

                $this->name = $arr['name'];
            
        }

        function getId() {
            return $this->id;
        }

        function getNmaeCountry() {
            return $this->name;
        }
        
    }

?>
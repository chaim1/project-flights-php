<?php  

include_once 'model.php';

    class pilotModel  extends model
    {
        
        private $id;        
        private $name;     
        private $level;
        private $picture_src;            
        function __construct($arr) {
            
                if(!empty($arr['id'])){
                    $this->id = $arr['id'];
                } 

                $this->name = $arr['name'];

                $this->level = $arr['level'];

                $this->picture_src = $arr['picture_src'];
            
        }

        function getId() {
            return $this->id;
        }

        function getNmaepilot() {
            return $this->name;
        }
        
        function getLevel() {
            return $this->level;
        }
        
        function getPicture_src() {
            return $this->picture_src;
        }

    }
    
?>
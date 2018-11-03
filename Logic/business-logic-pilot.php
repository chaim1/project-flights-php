<?php
include_once 'bl.php' ; 
include_once '../../app/models/pilotModel.php' ; 

 class BusinessLogicPilot extends BusinessLogic {

    public function get()
    {
        $q = 'SELECT * FROM `pilot`';
        
        $results = $this->getDal()->select($q);
        $resultsArray = [];

        while ($row = $results->fetch()) {
            array_push($resultsArray, new pilotModel($row));
        }

        return $resultsArray;
        
    }
    public function getOne($id)
    {
        $q = 'SELECT * FROM `pilot` WHERE `id`= :pid';
        
        $results = $this->getDal()->selectOne($q, [
            'pid' => $id
        ]);
        $row = $results->fetch();

        return new pilotModel($row);
    }

    public function set($param)
    {
        $query = "INSERT INTO pilot (`name`, `level`, `picture_src`) VALUES (:np, :lp, :psp)";
            $params = array(
                "np" => $param->getNmaepilot(),
                "lp" => $param->getLevel(),
                "psp" => $param->getPicture_src()
            );
            $this->getDal()->insert($query, $params);
            
    }

    public function delete($id)
    {
        $query = "DELETE FROM `pilot` WHERE `id`=$id";
        $this->getDal()->delete($query);
    }

    public function update($id)
    {
        
        $params = array(

            "id" => $id->getId(),
            "np" => $id->getNmaepilot(),
            "lp" => $id->getLevel(),
            "psp" => $id->getLevel()

        );
        $this->getDal()->update($query,$params);
    }
}

 
?>

<?php
include_once 'bl.php' ; 
include_once '../../app/models/airportModel.php' ;  

 class BusinessLogicAirport extends BusinessLogic {

    public function get()
    {
        $q = 'SELECT * FROM `airport`';
        
        $results = $this->getDal()->select($q);
        $resultsArray = [];

        while ($row = $results->fetch()) {
            array_push($resultsArray, new airportModel($row));
        
        }

        return $resultsArray;
        
    }

    public function getOne($id)
    {
        $q = 'SELECT * FROM `airport` WHERE `id`= :pid';
        
        $results = $this->getDal()->selectOne($q, [
            'pid' => $id
        ]);
        $row = $results->fetch();

        return new airportModel($row);
    }

    public function set($param)
    {
        $query = "INSERT INTO airport (`name`, `contry_id`) VALUES (:na, :ci)";
            $params = array(
                "na" => $param->getNmae(),
                "ci" => $param->getContryId()
            );
            $this->getDal()->insert($query, $params);
            
    }

    public function delete($id)
    {
        $query = "DELETE FROM `airport` WHERE `id`=$id";
        $this->getDal()->delete($query);
    }

    public function update($id)
    {
        $query = "UPDATE `airport` SET `name`=:cn, `contry_id`=:cid WHERE `id`=:id";
        $params = array(
            "id" => $id->getId(),
            "cn" => $id->getNmae(),
            "cid" => $id->getContryId()
        );
        $this->getDal()->update($query,$params);
    }
}

 
?>

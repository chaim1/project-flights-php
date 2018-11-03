<?php
include_once 'bl.php' ; 
include_once '../../app/models/flightModel.php' ; 

 class BusinessLogicFlight extends BusinessLogic {

    public function get()
    {
        $q = 'SELECT * FROM `flight`';
        
        $results = $this->getDal()->select($q);
        $resultsArray = [];

        while ($row = $results->fetch()) {
            array_push($resultsArray, new flightModel($row));
        }

        return $resultsArray;
        
    }

    

    public function set($param)
    {
        $query = "INSERT INTO `flight` (`no`, `flight_datetime`, `flight_from`, `flight_to`, `pilot_id`) VALUES (:no, :fd, :ff, :ft, :pi)";
            $params = array(
                "no" => $param->getNo(),
                "fd" => $param->getFlightDatetime(),
                "ff" => $param->getFlightFrom(),
                "ft" => $param->getFlightTo(),
                "pi" => $param->getPilotId()
            );
            
            $this->getDal()->insert($query,$params);
            
    }

    public function delete($id)
    {
        $query = "DELETE FROM `flight` WHERE `id`=$id";
        $this->getDal()->delete($query);
    }

    public function update($id)
    {
        $query = "UPDATE `flight` SET `no`=:fn, `flight_datetime`=:fd, `flight_from`=:ff, `flight_to`=:ft, `pilot_id`=:pi   WHERE `id`=:id";
        $params = array(
            "id" => $id->getId(),
            "fn" => $id->getNo(),
            "fd" => $id->getFlightDatetime(),
            "ff" => $id->getFlightFrom(),
            "ft" => $id->getFlightTo(),
            "pi" => $id->getPilotId()
        );
        $this->getDal()->update($query,$params);
    }
}

 
?>

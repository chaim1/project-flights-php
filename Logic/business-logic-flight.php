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
    public function getSearch($search){
 
        $query = "SELECT * FROM `flight` WHERE ((`no` LIKE '%$search%') OR (`flight_datetime` LIKE '%$search%'))";
        // $params = array(
        //     "con" => $search
        // );
        $results = $this->getDal()->selectWhere($query);

        $resultsArray = [];

        while ($row = $results->fetch()) {
            array_push($resultsArray, new flightModel($row));
        }
        
        return $resultsArray;


    }
    public function getFilter($Filter,$no,$datetime,$pilot,$from,$to){

        $query = "SELECT * FROM `flight` WHERE `pilot_id` ='$pilot' AND `flight_from` ='$from' AND`flight_to` ='$to' AND `no` LIKE '%$no%' AND `flight_datetime`
        LIKE '%$datetime%'";
        // $params = array(
        //     "pi" => $Filter->getPilotId(),
        //     "ff" => $Filter->getFlightFrom(),
        //     "ft" => $Filter->getFlightTo()
        // );
        $results = $this->getDal()->selectWhere($query);

        $resultsArray = [];

        while ($row = $results->fetch()) {
            array_push($resultsArray, new flightModel($row));
        }
        
        return $resultsArray;


    }
}

 
?>

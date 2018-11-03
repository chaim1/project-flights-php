<?php
define('ROOT',dirname(__FILE__));
include_once ('bl.php') ; 
include_once ('../../app/models/countryModel.php') ;  

 class BusinessLogicCountry extends BusinessLogic {

    public function get()
    {
        $q = 'SELECT * FROM `country`';
        
        $results = $this->getDal()->select($q);
        $resultsArray = [];

        while ($row = $results->fetch()) {
            array_push($resultsArray, new countrytModel($row));
        }

        return $resultsArray;
        
    }

    public function getOne($id)
    {
        $q = 'SELECT * FROM `country` WHERE `id`= :pid';
        
        $results = $this->getDal()->selectOne($q, [
            'pid' => $id
        ]);
        $row = $results->fetch();

        return new countrytModel($row);
    }

    public function set($param)
    {
        $query = "INSERT INTO country (`name`) VALUES (:nc)";
            $params = array(
                "nc" => $param->getNmaeCountry()
            );
            $this->getDal()->insert($query, $params);
            
    }

    public function delete($id)
    {
        $query = "DELETE FROM `country` WHERE `id`=$id";
        $this->getDal()->delete($query);
    }

    public function update($id)
    {
        $query = "UPDATE `country` SET `name`=:cn WHERE `id`=:id";
        $params = array(
            "id" => $id->getId(),
            "cn" => $id->getNmaeCountry()
        );
        $this->getDal()->update($query,$params);
    }
}

 
?>

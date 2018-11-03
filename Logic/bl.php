<?php
include_once '../../dal.php';

abstract class BusinessLogic
{
    private $dal;

    public function __construct()
    {
        $this->dal = DataAccessLayer::Instance();
    }
    public function getDal(){
        return $this->dal;
    }
    abstract function get();
    abstract function set($param);
    abstract function delete($id);
    abstract function update($id);
}




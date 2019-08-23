<?php

include_once 'config.php';

class Service {
    private $idService;
    private $name;
    private $description;
    private $db;
   
    public function __construct() {
        try {
            $this->db = new PDO(DSN, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    
    public function getIdService() {
        return $this->idService;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getDescription() {
        return $this->description;
    }
    
    public function setIdService($idService) {
        $this->id = (int) $idService;
    }
    
    public function getAllServices() {
        $sql = 'SELECT `idService`, `name`, `description` FROM `service`;';
        $servicesRequest = $this->db->query($sql);
        $serviceList = $servicesRequest->fetchAll(PDO::FETCH_OBJ);
        return $serviceList;
    }
    
}

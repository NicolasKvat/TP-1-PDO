<?php

include_once 'config.php';

class User {

    private $id;
    private $lastName;
    private $firstName;
    private $birthDate;
    private $address;
    private $zipCode;
    private $phoneNumber;
    private $idService;
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO(DSN, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    // fonctions permettant d'afficher les infos de l'utilisateur
    public function getId() {
        return $this->id;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getBirthDate() {
        return $this->birthDate;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getZipCode() {
        return $this->zipCode;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function getIdService() {
        return $this->idService;
    }

    public function setId($id) {
        $this->id = (int) $id;
    }

    public function getAllUsers() {
        $sql = 'SELECT `id`, `lastName`, `firstName`, DATE_FORMAT(`birthDate`, "%d/%m/%Y") birthdate, `address`, `zipCode`, `phoneNumber`, `service`.`name` AS service FROM `users` INNER JOIN `service` USING (idService) ORDER BY `id`;';
        $usersRequest = $this->db->query($sql);
        $userList = $usersRequest->fetchAll(PDO::FETCH_OBJ);
        return $userList;
    }

    public function createUser($lastName, $firstName, $address, $zipCode, $birthDate, $phoneNumber, $idService) {
        $query = $this->db->prepare('INSERT INTO `users` (lastName, firstName, address, zipCode, birthDate, phoneNumber, idService) VALUE (:lastName, :firstName, :address, :zipCode, :birthDate, :phoneNumber, :service)');
            // Lier les variables à l'instruction 'prepare' en tant que valeurs
            $query->bindValue(':lastName', $lastName, PDO::PARAM_STR);
            $query->bindValue(':firstName', $firstName, PDO::PARAM_STR);
            $query->bindValue(':address', $address, PDO::PARAM_STR);
            $query->bindValue(':zipCode', $zipCode, PDO::PARAM_STR);
            $query->bindValue(':birthDate', $birthDate, PDO::PARAM_STR);
            $query->bindValue(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
            $query->bindValue(':service', $idService, PDO::PARAM_STR);
            //execution de la requete
        $query->execute();
    }

    //fonction supprimer l'utilisateur
    public function deleteUser($id) {
        // Stockage de la requête SQL
        $request = $this->db->prepare('DELETE FROM `users` WHERE `id` = :id');
        // Association d'une valeur au paramètre
        $request->bindValue(':id', $id, PDO::PARAM_INT);
        // Exécution de la requête SQL
        $request->execute();
    }

    public function verifyUser() {
        $request = $this->db->prepare('SELECT * FROM `users` WHERE `id` = :id');
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($request->execute()) {
            if ($request->columnCount() > 0) {
                return true;
            }
        }
        return false;
    }

    public function getUserById() {
        $request = $this->db->prepare('SELECT * FROM `users` WHERE `id` = :id');
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($request->execute()) {
            $user = $request->fetch(PDO::FETCH_OBJ);
            $this->lastName = $user->lastName;
            $this->firstName = $user->firstName;
            $this->birthDate = $user->birthDate;
            $this->address = $user->address;
            $this->zipCode = $user->zipCode;
            $this->phoneNumber = $user->phoneNumber;
            $this->idService = $user->idService;
            return TRUE;
        }
        return FALSE;
    }

}

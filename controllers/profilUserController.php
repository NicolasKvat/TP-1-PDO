<?php
include_once 'models/User.php';
$User = new User();
$userId = $User->getId();
$userLastName = $User->getLastName();
$userFirstName = $User->getFirstName();
$userBirthDate = $User->getBirthDate();
$userAddress = $User->getAddress();
$userZipCode = $User->getZipCode();
$userService = $User->getIdService();
$pageTitle = $userFirstName . ' ' . $userLastName;
var_dump($User->getLastName());
require_once 'views/profilUser.php';
?>
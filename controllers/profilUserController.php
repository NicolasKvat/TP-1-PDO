<?php
require_once 'models/Service.php';
require_once 'models/User.php';
$service = new Service();
$user = new User();
$user->setId($_GET['id']);
$user->getUserById();
$pageTitle = $user->getFirstName() . ' ' . $user->getLastName();
require_once 'views/profilUser.php';
?>
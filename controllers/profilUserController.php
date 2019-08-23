<?php
session_start();

require_once 'models/User.php';
$user = new User();
$user->setId($_GET['id']);
$user->getUserById();
$pageTitle = $user->getFirstName() . ' ' . $user->getLastName();
require_once 'views/profilUser.php';
?>
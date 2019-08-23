<?php
include_once 'models/User.php';
$User = new User();
$UserList = $User->getAllUsers();
$pageTitle = 'Liste des utilisateurs';
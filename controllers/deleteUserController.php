<?php
session_start();
require_once 'models/User.php';
if(isset($_GET['id'])) {
    $user = new user();
    $user->getUserById($_GET['id']);
    if($user->verifyUser()) {
        $_SESSION['id'] = $user->getId();
        header('Location: ?page=deleteUserConfirm');
        exit();
    }
    header('Location: views/userList.php');
    exit();
} else {
    header('Location: views/userList.php');
    exit();
}
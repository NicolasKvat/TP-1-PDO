<?php
session_start();

require_once 'models/User.php';
$user = new User();
$user->setId($_GET['id']);
$user->getUserById();


if(!empty($_GET['delete'])){

    $id = $_GET['delete'];
    $user->deleteUser($id);
    header('Location: ?page=userList');
    exit();
}

if(isset($_SESSION['id'])){

    $user->setId($_SESSION['id']);
    $user->getUserById();
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


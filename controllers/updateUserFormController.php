<?php

session_start();
require_once 'models/Service.php';
require_once 'models/User.php';
$Service = new Service();
$ServiceList = $Service->getAllServices();
$user = new User();
$user->setId($_GET['id']);
$user->getUserById();
$pageTitle = 'formulaire de modif';
// pattern pour la vérification du formulaire
//$emailPattern = '^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/';
$stringPattern = '/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-]{3,60}$/';
$telPattern = '/^[0][0-9]{9}$/';
$zipCodePattern = '/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/';
$datePattern = '/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/';
$addressPattern = '/(\d+)?\,?\s?(bis|ter|quater)?\,?\s?(rue|avenue|boulevard|r|av|ave|bd|bvd|square|sente|impasse|cours|esplanade|allée|résidence|parc|rond-point|chemin|côte|place|cité|quai|passage|lôtissement|hameau)?\s([a-zA-Zà-ÿ0-9\s]{2,})+$/';
//   On test chaque input en fonction de son pattern et si ils ne correspondent pas on insert un message d'erreur
//   et on réinitialise le POST afin de ne pas la garder dans le champ
$formError = [];
if ($_POST['updateForm']) {
    // Si le champs pseudo est vide
    if (empty($_POST['lastName'])) {
        $formError['lastName'] = 'Veuillez entrer un nom.';
        // Si le pseudo est incorrect
    } elseif (!preg_match($stringPattern, $_POST['lastName'])) {
        $formError['lastName'] = 'Veuillez entrer un nom valide.';
        // Si le pseudo est correct
    } else {
        $lastName = trim($_POST['lastName']);
    }
    // Si le champs pseudo est vide
    if (empty($_POST['firstName'])) {
        $formError['firstName'] = 'Veuillez entrer un prénom.';
        // Si le pseudo est incorrect
    } elseif (!preg_match($stringPattern, $_POST['firstName'])) {
        $formError['firstName'] = 'Veuillez entrer un prénom valide.';
        // Si le pseudo est correct
    } else {
        $firstName = trim($_POST['firstName']);
    }
    // Si le champs pseudo est vide
    if (empty($_POST['address'])) {
        $formError['address'] = 'Veuillez entrer un adresse.';
        // Si le pseudo est incorrect
    } elseif (!preg_match($addressPattern, $_POST['address'])) {
        $formError['address'] = 'Veuillez entrer un adresse valide.';
        // Si le pseudo est correct
    } else {
        $address = trim($_POST['address']);
    }
    // Si le champs pseudo est vide
    if (empty($_POST['zipCode'])) {
        $formError['zipCode'] = 'Veuillez entrer un code postal.';
        // Si le pseudo est incorrect
    } elseif (!preg_match($zipCodePattern, $_POST['zipCode'])) {
        $formError['zipCode'] = 'Veuillez entrer un code postal valide.';
        // Si le pseudo est correct
    } else {
        $zipCode = trim($_POST['zipCode']);
    }
    // Si le champs pseudo est vide
    if (empty($_POST['birthDate'])) {
        $formError['birthDate'] = 'Veuillez entrer une date de naissance.';
        // Si le pseudo est incorrect
    } elseif (!preg_match($datePattern, $_POST['birthDate'])) {
        $formError['birthDate'] = 'Veuillez entrer une date de naissance valide.';
        // Si le pseudo est correct
    } else {
        $birthDate = trim($_POST['birthDate']);
    }
    // Si le champs telephone est vide
    if (empty($_POST['phoneNumber'])) {
        $formError['phoneNumber'] = 'Veuillez entrer un numéro de tel.';
        // Si le pseudo est incorrect
    } elseif (!preg_match($telPattern, $_POST['phoneNumber'])) {
        $formError['phoneNumber'] = 'Veuillez entrer un numéro de tel valide.';
        // Si le pseudo est correct
    } else {
        $phoneNumber = trim($_POST['phoneNumber']);
    }
    // Si le champs pseudo est vide
    if (!is_numeric($_POST['service']) || $_POST['service'] < 1 || $_POST['service'] > 4) {
        $formError['service'] = 'Veuillez entrer un service valide.';
        // Si le pseudo est correct
    } else {
        $service = $_POST['service'];
    }

    if (empty($formError)) {
        $id = (int) $_POST['id'];
        if ($user->updateUser($id)) {
            header('Location: ?page=accueil');
            exit();
        } else {
            echo 'Enregistrement à échoué';
        }
    }
}
require_once 'views/updateUserForm.php';
?>
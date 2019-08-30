<?php
require_once 'controllers/profilUserController.php';
require_once 'header.php';
?>
<div class='d-flex flex-column align-items-center'>
    <h4 class='font-weight-bold mt-4 mb-2'>ID de l'utilisateur</h4>
    <p><?= $user->getId() ?></p>
    <h4 class='font-weight-bold my-2'>Nom</h4>
    <p><?= $user->getLastName() ?></p>
    <h4 class='font-weight-bold my-2'>Prénom</h4>
    <p><?= $user->getFirstName() ?></p>
    <h4 class='font-weight-bold my-2'>Date de naissance</h4>
    <p><?= $user->getBirthDate() ?></p>
    <h4 class='font-weight-bold my-2'>Adresse</h4>
    <p><?= $user->getAddress() ?></p>
    <h4 class='font-weight-bold my-2'>Code Postal</h4>
    <p><?= $user->getZipCode() ?></p>
    <h4 class='font-weight-bold my-2'>Numéro de tel</h4>
    <p><?= $user->getphoneNumber() ?></p>
    <h4 class='font-weight-bold my-2'>Service</h4>
    <p><?= $user->getidService() ?></p>  
</div>
<div class='m-4 text-center'>
    <a href="?page=accueil" class="btn btn-outline-danger">Retour</a>
</div>
<?php require_once 'footer.php';
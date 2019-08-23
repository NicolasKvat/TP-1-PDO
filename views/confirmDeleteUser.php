<?php

require_once 'controllers/deleteUserConfirmController.php';
require_once 'header.php';
?>
<body class="text-center">
    <div class="container-fluid row justify-content-center">
        <div class="form p-5 shadow mb-5">
            <h1 class="text-white">ATTENTION !</h1>
            <h2 class="mt-5">Êtes-vous sur de vouloir supprimer l'utilisateur <span class='font-weight-bold'><?= $user->getFirstName() . ' ' . $user->getLastName() ?></span> né le <span class='font-weight-bold'><?= $user->getBirthDate() ?></span> ?</h2>
            <h3 class="mb-5">Cette action sera irréversible</h3>
            <div class="row justify-content-center pt-3">
                <div class="col-4">
                    <!--Sinon on retourne sur la page d'accueil-->
                    <a href="?page=accueil" class="btn btn-outline-secondary btn-block">NON</a>
                </div>
                <div class="col-4">
                    <!--Sinon on retourne sur la page d'accueil-->
                    <a href="?page=deleteUserConfirm&delete=<?= $user->getId() ?>" class="btn btn-outline-secondary btn-block">OUI</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
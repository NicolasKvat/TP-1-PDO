<?php

require_once 'controllers/deleteFileConfirmController.php';
require_once 'header.php';
?>
<body class="text-center">
    <div class="container-fluid row justify-content-center">
        <div class="form p-5 shadow mb-5">
            <h1 class="text-white">ATTENTION !</h1>
            <h2 class="mt-5">Êtes-vous sur de vouloir supprimer l'image ?</h2>
            <h3 class="mb-5">Cette action sera irréversible</h3>
            <div class="row justify-content-center pt-3">
                <div class="col-4">
                    <!--Sinon on retourne sur la page d'accueil-->
                    <a href="?page=fileGalleryList" class="btn btn-outline-secondary btn-block">NON</a>
                </div>
                <div class="col-4">
                    <!--Sinon on retourne sur la page d'accueil-->
                    <a href="?page=deleteFileConfirm&delete=<?= $file->getId() ?>" class="btn btn-outline-secondary btn-block">OUI</a>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'footer.php';
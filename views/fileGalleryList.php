<?php
require_once 'views/header.php';
?>
<div class="d-flex flex-md-row justify-content-center">
    <div class="col-md-9 d-flex mr-md-3 m-0 ml-0 p-0 flex-column justify-content-center" id="newsContainer">
        <div class="m-5 d-flex justify-content-center">
            <a href="?page=addUserForm" class="btn btn-outline-primary m-2">Ajouter un utilisateur</a>
            <a href="?page=addArticleForm" class="btn btn-outline-secondary m-2">Ajouter des articles</a>
            <a href="?page=addFileForm" class="btn btn-outline-secondary m-2">Uploader des images</a>
            <a href="?page=accueil" class="btn btn-outline-danger m-2">retour</a>
        </div>
        <?php
        // on affiche un message si il 'y a aucun article.
        if (empty($fileList)) {
            ?>
            <p class="text-center"><?= 'Aucune image' ?></p>
            <?php
        }
        // on affiche les données de la table `article`
        foreach ($fileList as $file) {
            ?>

            <div class="row d-flex">
                <div class="col-lg-4 my-5 py-2 d-flex flex-column align-items-center galerieContainer">
                    <a href="#" class="imgLink mx-4">
                            <img class="galleryImg" src="assets/uploadFile/file<?= $file->id ?>.<?= $file->picture ?>" alt="">
                    </a>
                    <a href="#" class="titleImg font-weight-bold"><?= $file->title ?></a>
<!--                    <small class="font-weight-bold">Juillet 2019</small>-->
                    <a href="?page=updateFileForm&id=<?= $file->id ?>" class="btn btn-outline-primary btn-block">Modifier</a>
                    <a href="?page=deleteFileConfirm&id=<?= $file->id ?>" class="btn btn-outline-danger btn-block">Supprimer</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>


    <?php
    include_once 'footer.php';
    ?>
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
        if (empty($articlesList)) {
            ?>
            <p class="text-center"><?= 'Aucun article' ?></p>
            <?php
        }
        // on affiche les données de la table `article`
        foreach ($articlesList as $article) {
            // on affiche les 50 premiers mots du texte de l'article
            $tab = explode(' ', $article->text, $wordNumber + 1);
            unset($tab[$wordNumber]);
            ?>

            <div class="d-flex flex-md-row flex-column justify-content-center p-0 my-4">
                <div class="d-flex justify-content-center justify-content-md-start">

                    <img class="galleryImg" src="assets/uploadArticle/Article<?= $article->id ?>.<?= $article->picture ?>" alt="">
                </div>
                <div class="news col p-0">
                    <h2 class="newsTitle font-weight-bold pl-4"><?= $article->title ?></h2>
                    <p class="newsText pl-4"><?= implode(' ', $tab) . '...' ?></p>
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <a href="?page=detailArticle&id=<?= $article->id ?>" class="btn btn-outline-primary m-2">Voir</a>
                    <a href="?page=updateArticleForm&id=<?= $article->id ?>" class="btn btn-outline-secondary m-2">Modifier</a>
                    <a href="?page=deleteArticleConfirm&id=<?= $article->id ?>" class="btn btn-outline-danger m-2">Supprimer</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<?php
include_once 'footer.php';
?>


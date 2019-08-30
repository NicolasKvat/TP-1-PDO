<?php
require_once 'views/header.php';
?>
<div class="row flex-column align-items-center">
    <form name="form" action="?page=updateArticleForm&id=<?= $Article->getId() ?>" method="POST" enctype="multipart/form-data" class="col-11 col-md-6 form-group p-4 mb-4">
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--titre-->
            <label for="title" class='font-weight-bold'>titre de l'article :</label>
            <input type="text" class="form-control" id='title' name="title" value="<?= $Article->getTitle() ?>" required>
            <span class="help-block"><?= $formError['title'] ?></span>
        </div>
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--texte-->
            <label for="text" class='font-weight-bold'>texte :</label>
            <textarea class="form-control" id="text" name="text" required><?= $Article->getText() ?></textarea>
            <span class="help-block"><?= $formError['text'] ?></span>
        </div>
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--image-->
            <label for="fileUpload" class='font-weight-bold'>Image :</label>
            <input type="file" name="photo" id="fileUpload">
            <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
        </div>
        <div class="m-3 p-0 d-flex justify-content-around">
            <a href="?page=accueil" class="btn btn-outline-danger">Retour</a>
            <input type="submit" id='submitRegister' name='updateArticle' class="btn btn-outline-primary font-weight-bold mr-0" value="Envoyer">              
        </div> 
    </form>
</div>
<?php
require_once 'views/footer.php';
?>
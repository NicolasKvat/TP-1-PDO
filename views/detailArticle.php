<?php
require_once 'controllers/detailArticleController.php';
require_once 'header.php';
?>
<div class='d-flex flex-column align-items-center'>
    <img class="m-4" src="assets/uploadArticle/Article<?= $Article->getId() ?>.<?= $Article->getPicture() ?>">
    <p><?= $Article->getText() ?></p> 
</div>
<div class='m-4 text-center'>
    <a href="?page=articles" class="btn btn-outline-danger">Retour</a>
</div>
<?php require_once 'footer.php';
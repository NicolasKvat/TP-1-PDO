<?php
require_once 'views/header.php';
?>
<form action="?page=updateFileForm&id=<?= $Gallery->getId() ?>" method="post" enctype="multipart/form-data">
    <label for="title">Titre :</label>
    <input type="text" name="title" id="title" value="<?= $Gallery->getTitle() ?>">
    <label for="fileUpload">Fichier:</label>
    <input type="file" name="photo" id="fileUpload">
    <input type="submit" name="updateFile" value="Modifier">
    <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 2 Mo.</p>
</form>
<h2 class="display-1 text-dark font-weight-bold text-center"><?= $error ?></h2>
<?php
require_once 'views/footer.php';
?>
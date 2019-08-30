<?php
require_once 'views/header.php';
?>
<form action="" method="post" enctype="multipart/form-data">
    <label for="title">Titre :</label>
    <input type="text" name="title" id="title">
    <label for="fileUpload">Fichier:</label>
    <input type="file" name="photo" id="fileUpload">
    <input type="submit" name="uploadFile" value="Upload">
    <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 2 Mo.</p>
</form>

<?php
require_once 'views/footer.php';
?>
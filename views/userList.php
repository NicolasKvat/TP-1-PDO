<?php
require_once 'controllers/userListControllers.php';
require_once 'header.php';
?>
<div class="m-5 d-flex justify-content-center">
    <a href="?page=addUserForm" class="btn btn-outline-primary m-2">Ajouter un utilisateur</a>
    <a href="?page=articles" class="btn btn-outline-secondary m-2">Liste des articles</a>
    <a href="?page=fileGalleryList" class="btn btn-outline-secondary m-2">Liste des images</a>
    <a href="?page=addFileForm" class="btn btn-outline-warning m-2">Ajouter une image</a>

</div>
<table class="table table-bordered text-center">
    <thead>
    <th>ID</th>    
    <th>Nom</th>
    <th>Prénom</th>
    <th>Date de naissance</th>
    <th>adresse</th>
    <th>Code Postal</th>
    <th>Numéro de tel</th>
    <th>Service</th>
</thead>
<tbody>
    <?php foreach ($UserList as $user) {
        ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->lastName ?></td>
            <td><?= $user->firstName ?></td>
            <td><?= $user->birthdate ?></td>
            <td><?= $user->address ?></td>
            <td><?= $user->zipCode ?></td>
            <td><?= $user->phoneNumber ?></td>
            <td><?= $user->service ?></td>
            <td><a href="?page=deleteUserConfirm&id=<?= $user->id ?>" class="btn btn-outline-danger btn-block">Supprimer</a></td>
            <td><a href="?page=updateUser&id=<?= $user->id ?>" class="btn btn-outline-secondary btn-block">Modifier</a></td>
            <td><a href="?page=profilUser&id=<?= $user->id ?>" class="btn btn-outline-primary btn-block">Voir</a></td>
        </tr>
        <?php
    }
    ?>
</tbody>
</table>
<?php
include_once 'footer.php';

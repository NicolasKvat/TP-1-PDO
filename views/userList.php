<?php
require_once 'controllers/userListControllers.php';
require_once 'header.php';
?>
<div class="m-5 d-flex justify-content-center">
    <a href="?page=addUserForm" class="btn btn-outline-primary">Ajouter un utilisateur</a>
</div>
<table class="table table-bordered text-center">
    <thead>
    <th>ID</th>    
    <th>Nom</th>
    <th>Prénom</th>
    <th>Date de naissance</th>
    <th>addresse</th>
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
            <td><a href="?page=profilUser&id=<?= $user->id ?>" class="btn btn-outline-danger btn-block">Voir</a></td>
        </tr>
        <?php
    }
    ?>
</tbody>
</table>
<?php include_once 'footer.php';

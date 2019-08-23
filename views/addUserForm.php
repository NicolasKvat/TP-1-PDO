<?php
require_once 'header.php';
?>

<div class="row flex-column align-items-center">
    <form name="form" action="" method="POST" class="col-11 col-md-6 form-group p-4 mb-4">
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--nom-->
            <label for="lastName" class='font-weight-bold'>Nom :</label>
            <input type="text" class="form-control" name="lastName" value="<?= $lastName; ?>" required>
            <span class="help-block"><?= $formError['lastName'] ?></span>
        </div>
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--prénom-->
            <label for="firstName" class='font-weight-bold'>Prénom :</label>
            <input type="text" class="form-control" name="firstName" value="<?= $firstName; ?>" required>
            <span class="help-block"><?= $formError['firstName'] ?></span>
        </div>
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--date de naissance-->
            <label for="birthDate" class='font-weight-bold'>Date de naissance :</label>
            <input type="date" class="form-control" name="birthDate" value="<?= $birthDate; ?>" required>
            <span class="help-block"><?= $formError['birthDate'] ?></span>
        </div>
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--adresse-->
            <label for="address" class='font-weight-bold'>Adresse :</label>
            <input type="text" class="form-control" name="address" value="<?= $address; ?>" required>
            <span class="help-block"><?= $formError['address'] ?></span>
        </div>
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--code postal-->
            <label for="zipCode" class='font-weight-bold'>Code Postal :</label>
            <input type="text" class="form-control" name="zipCode" value="<?= $zipCode; ?>" required>
            <span class="help-block"><?= $formError['zipCode'] ?></span>
        </div>
        <div class="form-group mb-4 <?= (!empty($pseudo_err)) ? 'has-error' : ''; ?>">
            <!--numéro de tel-->
            <label for="phoneNumber" class='font-weight-bold'>Numéro de tel :</label>
            <input type="text" class="form-control" name="phoneNumber" value="<?= $phoneNumber; ?>" required>
            <span class="help-block"><?= $formError['phoneNumber'] ?></span>
        </div>
        <div class="form-group">
            <label for="service" class='font-weight-bold'>Service</label>
            <select name="service" id="service" class="form-control">
                <option selected disabled value="0">Choisir un service</option>
                <?php foreach ($ServiceList as $service) { ?>
                    <option value="<?= $service->idService ?>" <?= $_POST['service'] == $service->idService ? 'selected' : '' ?>>
                        <?= $service->name ?>
                    </option>
                <?php } ?>
            </select>
            <span class="help-block"><?= $formError['service'] ?></span>
            
        </div>
        <div class="m-3 p-0 d-flex justify-content-around">
            <a href="?page=accueil" class="btn btn-outline-danger">Retour</a>
            <input type="submit" id='submitRegister' name='registerForm' class="btn btn-outline-primary font-weight-bold mr-0" value="Envoyer">              
        </div> 
    </form>
</div>
<?php

//nettoie les données
function secureData($data) {
    return trim(strip_tags($data));
}

//fonction qui permet d'afficher un message d'erreur de formulaire
function formError($error) {
    if (isset($error) && !empty($error)) {
        echo '<span class="alert alert-danger p-0">' . $error . '</span>';
    }
}
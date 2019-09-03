<?php

require_once 'models/Article.php';
$Article = new Article();
$Article->setId($_GET['id']);
$Article->getArticleById();
// pattern pour la vérification du formulaire
//$emailPattern = '^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/';
$stringPattern = '/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-]{3,60}$/';
$stringPatternText = '/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-]{3,500}$/';
//   On test chaque input en fonction de son pattern et si ils ne correspondent pas on insert un message d'erreur
//   et on réinitialise le POST afin de ne pas la garder dans le champ
$formError = [];
if ($_POST['updateArticle']) {
    // Si le champs titre est vide
    if (empty($_POST['title'])) {
        $formError['title'] = 'Veuillez entrer un titre.';
        // Si le titre est incorrect
    } elseif (!preg_match($stringPattern, $_POST['title'])) {
        $formError['title'] = 'Veuillez entrer un titre valide.';
        // Si le titre est correct
    } else {
        $title = trim(strip_tags($_POST['title']));
    }
    // Si le champs texte est vide
    if (empty($_POST['text'])) {
        $formError['text'] = 'Veuillez entrer un texte.';
        // Si le texte est incorrect
    } elseif(!preg_match($stringPatternText, $_POST['text'])) {
        $formError['text'] = 'Veuillez entrer un texte valide.';
    } else {
        $text = trim(strip_tags(($_POST['text'])));              
    }
    if (empty($formError)) {

        // Vérifie si le fichier a été uploadé sans erreur.
        if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["photo"]["name"];
            $filetype = $_FILES["photo"]["type"];
            $filesize = $_FILES["photo"]["size"];
            // Vérifie l'extension du fichier
            $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            if (!array_key_exists($imageFileType, $allowed)) {
                die("Erreur : Veuillez sélectionner un format de fichier valide.");
            }
            // Vérifie la taille du fichier - 5Mo maximum
            $maxsize = 2 * 1024 * 1024;
            if ($filesize > $maxsize) {
                die("Error: La taille du fichier est supérieure à la limite autorisée.");
            }
            // Vérifie le type MIME du fichier
            if (in_array($filetype, $allowed)) {
                try {
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], 'assets/uploadArticle/Article' . $Article->getId() . '.' . $imageFileType)) {
                        $picture = $imageFileType;
                        //on appelle la methode qui insere l'article dans la BDD puis on detruit l'objet Article                      
                        if ($Article->updateArticle($title, $text, $picture)) {
                            unset($Article);
                            header('Location: ?page=articles');
                            exit();
                        } else {
                            $error = 'Ça marche paaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaas :\'(';
                        }
                    }
                } catch (Exception $ex) {
                    die($ex->getMessage());
                }
            } else {
                echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
            }
        } else {

            echo 'Error: La taille du fichier est supérieure à la limite autorisée.';
        }
    }
}
$pageTitle = 'Formulaire de modification d\'articles';
require_once 'views/updateArticleForm.php';

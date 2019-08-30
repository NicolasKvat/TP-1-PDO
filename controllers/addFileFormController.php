<?php

require_once 'models/Gallery.php';
$pageTitle = 'Uploader une image';
$stringPattern = '/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._\s-]{3,60}$/';
//   On test chaque input en fonction de son pattern et si ils ne correspondent pas on insert un message d'erreur
//   et on réinitialise le POST afin de ne pas la garder dans le champ
$formError = [];
if ($_POST['uploadFile']) {
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
                            // $targetFile = basename($_FILES["image"]["name"]);
                            // $imageFileType = extention du fichier envoyé (jpg, png, ...) 
                            if (move_uploaded_file($_FILES["photo"]["tmp_name"], 'assets/uploadFile/' . $filename)) {
                                $Gallery = new Gallery();
                                $picture = $imageFileType;
                                //on appelle la methode qui insere l'article dans la BDD puis on detruit l'objet Article                      
                                if ($Gallery->createFile($title, $picture)) {                                    
                                    rename('assets/uploadFile/' . $filename, 'assets/uploadFile/file' . $Gallery->getId() . '.' . $imageFileType);
                                }
                            }
                            // Corresponds au chemin de l'image (ex : assets/uploadFile/file1.png)
                            unset($Gallery);
                            header('Location: ?page=fileGalleryList');
                            exit();
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
require_once 'views/addFileForm.php';


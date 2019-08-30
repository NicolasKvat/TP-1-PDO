<?php
session_start();
require_once 'models/Gallery.php';
if(isset($_GET['id'])) {
    $file = new Gallery();
    $file->getFileById($_GET['id']);
    if($file->verifyFile()) {
        $_SESSION['id'] = $file->getId();
        header('Location: ?page=deleteFileConfirm');
        exit();
    }
    header('Location: ?page=fileGalleryList');
    exit();
} else {
    header('Location: ?page=fileGalleryList');
    exit();
}
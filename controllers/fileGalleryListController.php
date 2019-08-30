<?php
include_once 'models/Gallery.php';
$Gallery = new Gallery();
$fileList = $Gallery->getAllFiles();
$pageTitle = 'Galerie';
require_once 'views/fileGalleryList.php';

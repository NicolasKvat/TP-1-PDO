<?php
// seul ces pages sont valides
$routes = [
    //utilisateurs
    'accueil' => 'views/userList.php',
    'deleteUserConfirm' => 'views/confirmDeleteUser.php',
    'addUserForm' => 'controllers/addUserFormController.php',
    'profilUser' => 'controllers/profilUserController.php',
    'updateUser' => 'controllers/updateUserFormController.php',
    //articles
    'articles' => 'controllers/articlesListController.php',
    'addArticleForm' => 'controllers/addArticleFormController.php',
    'detailArticle' => 'controllers/detailArticleController.php',
    'deleteArticleConfirm' => 'views/confirmDeleteArticle.php',
    'updateArticleForm' => 'controllers/updateArticleController.php',
    //galerie d'images
    'addFileForm' => 'controllers/addFileFormController.php',
    'fileGalleryList' => 'controllers/fileGalleryListController.php',
    'deleteFileConfirm' => 'views/confirmDeleteFile.php',
    'updateFileForm' => 'controllers/updateFileController.php',
];

//si un parametre page est passé dans le GET
if(isset($_GET['page'])){
    //on verifie que la clé existe dans notre tableau de routes
    if (key_exists($_GET['page'], $routes)){
        $page=$_GET['page'];
    }else{
        //si elle n'existe pas, on redirige vers la page d'accueil
        $page = 'accueil';
    }
    //si aucun parametre page n'a été passé, c'est que l'on vient d'arriver pour la premiere fois sur le site
//on redirige vers la page d'accueil
}else{
    $page='accueil';
}

//on appelle la page correspondante
include_once $routes[$page];

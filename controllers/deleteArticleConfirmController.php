<?php

require_once 'models/Article.php';
$Article = new Article();
$Article->setId($_GET['id']);
$Article->getArticleById();


if(!empty($_GET['delete'])){

    $id = $_GET['delete'];
    $Article->deleteArticle($id);
    header('Location: ?page=articles');
    exit();
}
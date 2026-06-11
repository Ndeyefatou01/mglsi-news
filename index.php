<?php

require_once 'config/database.php';
require_once 'models/Article.php';
require_once 'models/Categorie.php';
require_once 'controllers/ArticleController.php';
require_once 'controllers/CategorieController.php';

$controller = $_GET['controller'] ?? 'article';
$action     = $_GET['action']     ?? 'index';
$id         = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($controller === 'article') {
    $ctrl = new ArticleController();
    if ($action === 'index')                    $ctrl->index();
    if ($action === 'show' && $id)              $ctrl->show($id);
    if ($action === 'byCategorie' && $id)       $ctrl->byCategorie($id);
}
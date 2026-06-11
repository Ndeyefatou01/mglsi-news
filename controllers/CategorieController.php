<?php

class CategorieController {
    private Categorie $model;

    public function __construct() {
        $this->model = new Categorie();
    }

    public function index(): void {
        $categories = $this->model->findAll();
        require 'views/layout/header.php';
        require 'views/articles/index.php';
        require 'views/layout/footer.php';
    }
}
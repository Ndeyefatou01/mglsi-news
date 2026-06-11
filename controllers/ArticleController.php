<?php

class ArticleController {
    private Article $articleModel;
    private Categorie $categorieModel;

    public function __construct() {
        $this->articleModel   = new Article();
        $this->categorieModel = new Categorie();
    }

    // Liste de tous les articles
    public function index(): void {
        $articles   = $this->articleModel->findAll();
        $categories = $this->categorieModel->findAll();
        $titre_page = "Tous les articles";
        require 'views/layout/header.php';
        require 'views/articles/index.php';
        require 'views/layout/footer.php';
    }

    // Détail d'un article
    public function show(int $id): void {
        $article    = $this->articleModel->findById($id);
        $categories = $this->categorieModel->findAll();
        if (!$article) {
            echo "Article introuvable.";
            return;
        }
        require 'views/layout/header.php';
        require 'views/articles/show.php';
        require 'views/layout/footer.php';
    }

    // Articles par catégorie
    public function byCategorie(int $id): void {
        $categorie  = $this->categorieModel->findById($id);
        $articles   = $this->articleModel->findByCategorie($id);
        $categories = $this->categorieModel->findAll();
        $titre_page = "Catégorie : " . $categorie['libelle'];
        require 'views/layout/header.php';
        require 'views/articles/index.php';
        require 'views/layout/footer.php';
    }
}
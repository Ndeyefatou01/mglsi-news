<?php

class Article {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // Tous les articles avec le libellé de leur catégorie
    public function findAll(): array {
        $sql = "SELECT a.*, c.libelle AS categorie_libelle 
                FROM Article a 
                JOIN Categorie c ON a.categorie = c.id
                ORDER BY a.dateCreation DESC";
        return $this->db->query($sql)->fetchAll();
    }

    // Un article par id
    public function findById(int $id): array|false {
        $sql = "SELECT a.*, c.libelle AS categorie_libelle 
                FROM Article a 
                JOIN Categorie c ON a.categorie = c.id
                WHERE a.id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // Articles filtrés par catégorie
    public function findByCategorie(int $categorieId): array {
        $sql = "SELECT a.*, c.libelle AS categorie_libelle 
                FROM Article a 
                JOIN Categorie c ON a.categorie = c.id
                WHERE a.categorie = :id
                ORDER BY a.dateCreation DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $categorieId]);
        return $stmt->fetchAll();
    }
}
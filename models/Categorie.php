<?php

class Categorie {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    // Récupérer toutes les catégories
    public function findAll(): array {
        $stmt = $this->db->query("SELECT * FROM Categorie");
        return $stmt->fetchAll();
    }

    // Récupérer une catégorie par son id
    public function findById(int $id): array|false {
        $stmt = $this->db->prepare("SELECT * FROM Categorie WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
}
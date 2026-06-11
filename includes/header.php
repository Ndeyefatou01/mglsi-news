<?php require_once __DIR__ . '/../config/db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGLSI News</title>
    <link rel="stylesheet" href="/A.logiciel/css/style.css">
</head>
<body>

<header>
    <div class="logo">
        <h1>MGLSI News</h1>
    </div>
    <nav>
        <ul>
            <li><a href="/A.logiciel/index.php">Accueil</a></li>
            <?php
                $stmt = $pdo->query("SELECT * FROM Categorie");
                $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($categories as $cat) {
                    echo '<li><a href="/A.logiciel/categorie.php?id=' . $cat['id'] . '">' . $cat['libelle'] . '</a></li>';
                }
            ?>
        </ul>
    </nav>
</header>

<main>
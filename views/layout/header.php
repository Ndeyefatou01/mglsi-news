<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>MGLSI News</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<nav class="navbar">
    <a href="index.php" class="brand">MGLSI News</a>
    <ul class="nav-links">
        <li><a href="index.php">Accueil</a></li>
        <?php foreach ($categories as $cat): ?>
            <li>
                <a href="index.php?controller=article&action=byCategorie&id=<?= $cat['id'] ?>">
                    <?= htmlspecialchars($cat['libelle']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
<main class="container">
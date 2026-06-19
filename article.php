<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'includes/header.php'; ?>

<main class="article-page">
    <?php
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        $stmt = $pdo->prepare("SELECT a.*, c.libelle FROM Article a JOIN Categorie c ON a.categorie = c.id WHERE a.id = ?");
        $stmt->execute([$id]);
        $article = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($article) {
            echo '
            <article class="card-detail">
                <span class="badge">' . $article['libelle'] . '</span>
                <h2>' . $article['titre'] . '</h2>
                <small>' . date('d/m/Y', strtotime($article['dateCreation'])) . '</small>
                <p>' . nl2br($article['contenu']) . '</p>
                <div class="back-wrapper"><a href="index.php" class="btn-back">← Retour</a></div>
            </article>';
        } else {
            echo '<p>Article introuvable.</p><div class="back-wrapper"><a href="index.php" class="btn-back">← Retour</a></div>';
        }
    ?>
</main>

<?php require_once 'includes/footer.php'; ?>
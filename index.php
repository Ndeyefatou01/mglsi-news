<?php require_once 'includes/header.php'; ?>

<section class="articles">
    <h2>Tous les articles</h2>
    <?php
        $stmt = $pdo->query("SELECT a.*, c.libelle FROM Article a JOIN Categorie c ON a.categorie = c.id ORDER BY a.dateCreation DESC");
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($articles as $article) {
            echo '
            <article class="card">
                <a href="categorie.php?id=' . $article['categorie'] . '" class="badge">' . $article['libelle'] . '</a>
                <h3><a href="article.php?id=' . $article['id'] . '">' . $article['titre'] . '</a></h3>
                <p>' . substr($article['contenu'], 0, 150) . '...</p>
                <small>' . date('d/m/Y', strtotime($article['dateCreation'])) . '</small>
            </article>';
        }
    ?>
</section>

<?php require_once 'includes/footer.php'; ?>
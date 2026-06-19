<?php require_once 'includes/header.php'; ?>

<section class="articles">
    <?php
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        // Récupérer le nom de la catégorie
        $stmt = $pdo->prepare("SELECT * FROM Categorie WHERE id = ?");
        $stmt->execute([$id]);
        $categorie = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($categorie) {
            echo '<h2>Catégorie : ' . $categorie['libelle'] . '</h2>';

            // Récupérer les articles de cette catégorie
            $stmt2 = $pdo->prepare("SELECT a.*, c.libelle FROM Article a JOIN Categorie c ON a.categorie = c.id WHERE a.categorie = ? ORDER BY a.dateCreation DESC");
            $stmt2->execute([$id]);
            $articles = $stmt2->fetchAll(PDO::FETCH_ASSOC);

            if (count($articles) > 0) {
                foreach ($articles as $article) {
                    echo '
                    <article class="card">
                        <span class="badge">' . $article['libelle'] . '</span>
                        <h3><a href="article.php?id=' . $article['id'] . '">' . $article['titre'] . '</a></h3>
                        <p>' . substr($article['contenu'], 0, 150) . '...</p>
                        <small>' . date('d/m/Y', strtotime($article['dateCreation'])) . '</small>
                    </article>';
                }
            } else {
                echo '<p>Aucun article dans cette catégorie.</p>';
            }

            echo '<a href="index.php" class="btn-back">← Retour</a>';
        } else {
            echo '<p>Catégorie introuvable.</p><a href="index.php" class="btn-back">← Retour</a>';
        }
    ?>
</section>

<?php require_once 'includes/footer.php'; ?>
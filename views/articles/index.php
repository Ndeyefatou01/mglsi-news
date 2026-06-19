<h2 class="page-title"><span></span> <?= htmlspecialchars($titre_page) ?></h2>

<div class="articles-grid">
    <?php foreach ($articles as $article): ?>
        <div class="card">
            <a href="index.php?controller=article&action=byCategorie&id=<?= $article['categorie'] ?>" class="badge">
                <?= htmlspecialchars($article['categorie_libelle']) ?>
            </a>
            <h3>
                <a href="index.php?controller=article&action=show&id=<?= $article['id'] ?>">
                    <?= htmlspecialchars($article['titre']) ?>
                </a>
            </h3>
            <p><?= htmlspecialchars(substr($article['contenu'], 0, 120)) ?>...</p>
            <small><?= date('d/m/Y', strtotime($article['dateCreation'])) ?></small>
        </div>
    <?php endforeach; ?>
</div>
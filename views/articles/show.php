<div class="article-detail">
    <span class="badge"><?= htmlspecialchars($article['categorie_libelle']) ?></span>
    <h1><?= htmlspecialchars($article['titre']) ?></h1>
    <small><?= date('d/m/Y', strtotime($article['dateCreation'])) ?></small>
    <p><?= nl2br(htmlspecialchars($article['contenu'])) ?></p>
    <a href="index.php" class="btn-back">← Retour</a>
</div>
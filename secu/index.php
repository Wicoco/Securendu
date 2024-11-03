<?php
session_start();
require_once 'bdd.php';

if (!isset($_SESSION['user'])) {
    echo "<p>Veuillez <a href='login.php'>vous connecter</a> pour accéder au site.</p>";
    exit;
}

$stmt = $connexion->query("SELECT * FROM Article");
$articles = $stmt->fetchAll();
?>

<h1>Liste des articles</h1>
<?php foreach ($articles as $article): ?>
    <h2><?= htmlspecialchars($article['title']) ?></h2>
    <p><?= htmlspecialchars($article['content']) ?></p>
    <a href="article.php?s=<?= urlencode($article['slug']) ?>">Lire plus</a>

    <?php if ($_SESSION['user']['role'] === 'admin'): ?>
        | <a href="edit.php?id=<?= $article['id'] ?>">Modifier</a>
        | <a href="delete.php?id=<?= $article['id'] ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>
    <?php endif; ?>
<?php endforeach; ?>

<?php if ($_SESSION['user']['role'] === 'admin'): ?>
    <a href="register.php">Ajouter un nouvel utilisateur</a>
    <a href="create_article.php">Ajouter un nouvel article</a>
<?php endif; ?>

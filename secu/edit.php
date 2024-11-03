<?php
session_start();
require_once 'bdd.php';

// Vérification du rôle administrateur
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    die("Accès refusé : seuls les administrateurs peuvent modifier des articles.");
}

if (!isset($_GET['id'])) {
    die("Article non spécifié.");
}

$id = intval($_GET['id']);
$stmt = $connexion->prepare("SELECT * FROM Article WHERE id = :id");
$stmt->execute(['id' => $id]);
$article = $stmt->fetch();

if (!$article) {
    die("Article non trouvé.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $slug = htmlspecialchars($_POST['slug']);

    $updateStmt = $connexion->prepare(
        "UPDATE Article SET title = :title, content = :content, slug = :slug WHERE id = :id"
    );
    $updateStmt->execute([
        'title' => $title,
        'content' => $content,
        'slug' => $slug,
        'id' => $id
    ]);

    echo "<p>Article modifié avec succès</p>";
}

?>

<form method="post">
    <label>Titre</label>
    <input type="text" name="title" value="<?= htmlspecialchars($article['title']) ?>" required>
    <label>Contenu</label>
    <textarea name="content" required><?= htmlspecialchars($article['content']) ?></textarea>
    <label>Slug</label>
    <input type="text" name="slug" value="<?= htmlspecialchars($article['slug']) ?>" required>
    <button type="submit">Modifier l'article</button>
</form>

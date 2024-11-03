<?php
session_start();
require_once 'bdd.php';

// Vérification du rôle administrateur
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    die("Accès refusé : seuls les administrateurs peuvent ajouter des articles.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $slug = htmlspecialchars($_POST['slug']);

    $stmt = $connexion->prepare(
        "INSERT INTO Article (title, content, slug) VALUES (:title, :content, :slug)"
    );
    $stmt->execute([
        'title' => $title,
        'content' => $content,
        'slug' => $slug
    ]);

    echo "<p>Article ajouté avec succès</p>";
}
?>

<form method="post">
    <label>Titre</label>
    <input type="text" name="title" required>
    <label>Contenu</label>
    <textarea name="content" required></textarea>
    <label>Slug</label>
    <input type="text" name="slug" required>
    <button type="submit">Ajouter l'article</button>
</form>

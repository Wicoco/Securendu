<?php
session_start();
require_once 'bdd.php';

// Vérification du rôle administrateur
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    die("Accès refusé : seuls les administrateurs peuvent ajouter des articles.");
}

// Gestion du CSRF
if (!isset($_SESSION['csrf_article_add'])) {
    $_SESSION['csrf_article_add'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérification du token CSRF
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['csrf_article_add']) {
        die('<p>CSRF invalide</p>');
    }
    
    unset($_SESSION['csrf_article_add']);

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

<form action="traitement.php" method="POST">
    <label for="title">Titre : </label>
    <input type="text" name="title" id="title" placeholder="Article 1" required>
    <br>
    <label for="content">Contenu : </label>
    <textarea name="content" id="content" rows="10" cols="30" required></textarea>
    <br>
    <label for="slug">Slug : </label>
    <input type="text" name="slug" id="slug" placeholder="article-1" required>
    <br>
    <input type="hidden" name="token" value="<?= $_SESSION['csrf_article_add']; ?>">
    <input type="submit" name="ajouter" value="Ajouter">
</form>

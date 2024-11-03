<?php
session_start();
require_once 'bdd.php';

// Vérification du rôle administrateur
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    die("Accès refusé : seuls les administrateurs peuvent supprimer des articles.");
}

if (!isset($_GET['id'])) {
    die("Article non spécifié.");
}

$id = intval($_GET['id']);
$deleteStmt = $connexion->prepare("DELETE FROM Article WHERE id = :id");
$deleteStmt->execute(['id' => $id]);

echo "<p>Article supprimé avec succès</p>";
header("Location: index.php");
exit;
?>

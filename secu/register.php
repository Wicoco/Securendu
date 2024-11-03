<?php
session_start();
require_once 'bdd.php';
require_once 'password.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    die("Accès refusé : seuls les administrateurs peuvent ajouter de nouveaux utilisateurs.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $hashedPassword = hashPassword($password);

    $stmt = $connexion->prepare(
        "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)"
    );
    $stmt->execute([
        'username' => $username,
        'password' => $hashedPassword,
        'role' => $role
    ]);

    echo "<p>Utilisateur créé avec succès</p>";
}
?>

<form method="post">
    <label>Nom d'utilisateur</label>
    <input type="text" name="username" required>
    <label>Mot de passe</label>
    <input type="password" name="password" required>
    <label>Rôle</label>
    <select name="role">
        <option value="user">Utilisateur</option>
        <option value="admin">Administrateur</option>
    </select>
    <button type="submit">Créer l'utilisateur</button>
</form>

<?php
session_start();
require_once 'bdd.php';
require_once 'password.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $connexion->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && verifyPassword($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'role' => $user['role']
        ];
        header("Location: index.php");
        exit;
    } else {
        echo "<p>Nom d'utilisateur ou mot de passe incorrect</p>";
    }
}
?>

<form method="post">
    <label>Nom d'utilisateur</label>
    <input type="text" name="username" required>
    <label>Mot de passe</label>
    <input type="password" name="password" required>
    <button type="submit">Se connecter</button>
</form>

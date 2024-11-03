<?php

// Fonction de hachage d'un mot de passe
function hashPassword($plainPassword) {
    return password_hash($plainPassword, PASSWORD_BCRYPT, ['cost' => 12]);
}

// Fonction de vérification d'un mot de passe
function verifyPassword($plainPassword, $hashedPassword) {
    return password_verify($plainPassword, $hashedPassword);
}
?>

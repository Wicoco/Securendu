<?php
try {
    $connexion = new PDO(
        'mysql:host=localhost;dbname=IIM_A2CDI_secu;charset=utf8', 
        'root', 
        'root'
    );
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}
?>

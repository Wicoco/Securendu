-- Création de la base de données
CREATE DATABASE IF NOT EXISTS IIM_A2CDI_secu;
USE IIM_A2CDI_secu;

-- Création de la table `users` pour les utilisateurs
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user'
);

-- Création de la table `Article` pour les articles
CREATE TABLE IF NOT EXISTS Article (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Exemple d'insertion de données dans la table `users`
INSERT INTO users (username, password, role) VALUES
('admin', '$2y$12$e.g1KhX/o95u8Tv3C/x5uOeDg6E4bTkIUHFyFq3nG3Rb.bykCfZmW', 'admin'); -- Mot de passe haché pour "adminpassword"

-- Le mot de passe inséré pour l'utilisateur admin est un exemple haché de "adminpassword" à des fins de test. 
-- Assurez-vous de générer un mot de passe haché personnalisé pour un déploiement réel.


--Dans ce projet, l'administrateur (admin) dispose des droits suivants :

--Gestion des utilisateurs :

--Créer des utilisateurs : L'admin peut ajouter de nouveaux utilisateurs au système en accédant à la page register.php.
--Définir le rôle des utilisateurs : Lors de l'inscription de nouveaux utilisateurs, l'admin peut spécifier leur rôle (utilisateur normal ou administrateur).

--Gestion des articles :
--Créer des articles : L'admin peut ajouter de nouveaux articles en utilisant la page create_article.php.
--Modifier des articles : L'admin peut mettre à jour les articles existants via la page edit.php.
--Supprimer des articles : L'admin a la capacité de supprimer des articles via la page delete.php.

--Accès et navigation :
--L'admin peut se connecter au site via login.php et accéder à la liste des articles sur index.php, où il peut voir tous les articles disponibles et effectuer des actions d'édition ou de suppression sur ceux-ci.

--Consulter les articles :
--Comme tout utilisateur, l'admin peut consulter le contenu des articles disponibles sur le site en naviguant sur index.php et en cliquant sur le lien "Lire plus" pour afficher les détails d'un article spécifique.
# Projet "Secu" - Gestion sécurisée d'articles avec rôle administrateur

Ce projet est une application web de gestion d'articles, où les utilisateurs peuvent lire les articles publiés et les administrateurs peuvent gérer le contenu et les utilisateurs. Le projet utilise PHP et MySQL pour la gestion du contenu et de l'authentification avec des mesures de sécurité comme le hachage de mots de passe et un token CSRF.

## Structure des fichiers

- `index.php` - Page principale affichant la liste des articles. Accès limité aux utilisateurs connectés.
- `article.php` - Affiche le contenu complet d'un article spécifique.
- `create_article.php` - Formulaire pour créer un nouvel article (administrateurs uniquement).
- `edit.php` - Page de modification d’un article existant (administrateurs uniquement).
- `delete.php` - Supprime un article spécifié (administrateurs uniquement).
- `login.php` - Formulaire de connexion utilisateur.
- `register.php` - Page pour enregistrer de nouveaux utilisateurs (administrateurs uniquement).
- `bdd.php` - Connexion à la base de données.
- `password.php` - Fonctions pour hacher et vérifier les mots de passe.
- `traitement.php` - Traite l'ajout d'articles avec gestion de CSRF pour les administrateurs.
- `setup.sql` - Script SQL pour créer les tables de la base de données (`Article` et `users`).

## Prérequis

- **PHP 7.4+**
- **MySQL**
- **[Laragon](https://laragon.org/)** pour configurer l'environnement de développement.
- **[Postman](https://www.postman.com/)** pour tester les requêtes HTTP.

## Installation et Configuration

### Étape 1 : Cloner le projet

1. Clonez le dépôt Git dans votre environnement local :

   ```bash
   git clone https://github.com/votre-utilisateur/secu.git
   cd secu

Étape 2 : Configurer la base de données

Démarrez Laragon : Installez Laragon si ce n'est pas encore fait et lancez-le.

Créer une base de données :

Accédez à phpMyAdmin via Laragon.
Créez une base de données nommée IIM_A2CDI_secu.

Importer le fichier SQL :

Dans phpMyAdmin, sélectionnez la base de données IIM_A2CDI_secu.
Importez le fichier setup.sql fourni dans le projet pour créer les tables nécessaires (Article et users).

Étape 3 : Configurer l'application
Placez le dossier secu dans le répertoire www de Laragon.
Vérifiez les informations de connexion dans le fichier bdd.php et ajustez-les si nécessaire pour votre configuration locale.

Étape 4 : Lancer l'application
Ouvrez Laragon et, dans le tableau de bord, cliquez sur "www" pour accéder à la liste des projets.
Sélectionnez secu pour accéder à l'application depuis http://localhost/secu/index.php.

Utilisation

Connexion
Accédez à login.php pour vous connecter.
Utilisez un compte administrateur pour accéder aux fonctionnalités de gestion d'articles et d'utilisateurs.

Gestion des articles
Administrateur : Peut ajouter, modifier, et supprimer des articles via les pages correspondantes.
Utilisateur : Peut lire les articles sans options de modification.
Gestion des utilisateurs
Seuls les administrateurs peuvent ajouter de nouveaux utilisateurs et définir leur rôle via register.php.

Guide d'utilisation de Laragon et Postman

Laragon
Serveur local : Placez le projet dans le dossier www de Laragon, puis lancez-le.
Accès à phpMyAdmin : Utilisez Laragon pour ouvrir phpMyAdmin et gérer la base de données.

Postman
Utilisez Postman pour tester les requêtes HTTP :

Connexion :
Méthode : POST
URL : http://localhost/secu/login.php
Body : Form-data avec username et password.
Ajout d'article (administrateur + token CSRF) :
Méthode : POST
URL : http://localhost/secu/traitement.php
Body : Form-data avec title, content, slug, et csrf_article_add.
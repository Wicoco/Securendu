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


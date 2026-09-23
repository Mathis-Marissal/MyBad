# MyBad

Générateur d'excuses de développeur — projet réalisé dans le cadre de l'examen d'entrée du Bachelor Concepteur Développeur d'Applications de ForEach Academy.

Le site présente une excuse aléatoire (basée sur les codes HTTP), permet de consulter toutes les excuses, de voir le détail de l'une d'elles, et d'en ajouter de nouvelles.

## Stack technique

- PHP (MVC "maison", sans framework)
- MySQL / MariaDB (via PDO)
- HTML / CSS / JavaScript vanilla (fetch pour les appels à l'API)

## Prérequis

- PHP 8+
- MySQL ou MariaDB
- Un serveur local type Laragon, XAMPP ou WAMP (le document root doit pointer vers le dossier `public/`)

## Installation

1. Cloner le dépôt :
   ```
   git clone https://github.com/Mathis-Marissal/MyBad.git
   ```

2. Créer la base de données en important le script SQL fourni :
   ```
   mysql -u root < scripts/mybad.sql
   ```
   (ou via phpMyAdmin / HeidiSQL : importer directement `scripts/mybad.sql`)

   Ce script crée la base `mybad`, la table `excuses`, et insère toutes les excuses de départ.

3. Configurer le vhost / serveur local pour que le document root pointe vers le dossier `public/` du projet (ex : `mybad.test` sur Laragon).

4. Si les identifiants de connexion à la BDD sont différents de `root` sans mot de passe sur `localhost`, adapter les valeurs par défaut dans `app/Core/Database.php` (ou définir les variables d'environnement listées dans `.env.exemple`).

5. Ouvrir le site dans le navigateur (ex : `http://mybad.test`).

## Routes du site

| Route                  | Description                                   |
|-------------------------|-----------------------------------------------|
| `/`                     | Accueil, excuse aléatoire                     |
| `/excuses/all`          | Liste de toutes les excuses                   |
| `/excuses/{http_code}`  | Détail d'une excuse par son code HTTP         |
| `/add`                  | Formulaire d'ajout d'une excuse               |

## Routes de l'API

| Méthode | Route                       | Description                          |
|---------|------------------------------|---------------------------------------|
| GET     | `/api/excuses`               | Liste toutes les excuses (JSON)       |
| GET     | `/api/excuses/{http_code}`   | Détail d'une excuse (JSON)            |
| GET     | `/api/excuses/random`        | Une excuse aléatoire (JSON)           |
| POST    | `/api/excuses`                | Ajoute une excuse (`http_code`, `tag`, `message`) |

## Auteur

Mathis Marissal

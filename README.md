# SimplonSign


## Description

Cette application PHP est conçue pour faciliter la gestion des absences des étudiants lors des cours. Elle utilise une architecture MVC (Modèle-Vue-Contrôleur). Elle est écrite en PHP 8.3.0 et utilise du JS vanillia pour les interactions client-serveur.

## Configuration

### Fichier de Configuration (config.php)

Le fichier de configuration `config.php` est utilisé pour spécifier les paramètres du projet. Voici un exemple de contenu :

```
define('DB_HOST', 'localhost');
define('DB_NAME', '...');
define('DB_USER', '...');
define('DB_PWD', 'yourPSW');

define('HOME_URL', 'your home url');

define('DB_INITIALIZED', TRUE);
```

- `DB_HOST`: L'adresse de l'hôte de la base de données.
- `DB_NAME`: Le nom de la base de données.
- `DB_USER`: Le nom d'utilisateur pour se connecter à la base de données.
- `DB_PWD`: Le mot de passe pour se connecter à la base de données.
- `HOME_URL`: L'url de la page d'accueil.


### Installation

1. Cloner ce dépôt : `git clone https://github.com/Oliviermaignan/simplonsign`
2. Créer une base de données MySQL avec le fichier simplonsign.sql dans le dossier migration
3. Remplir les informations de configuration dans le fichier `config.php`.
4. Lancer le serveur PHP (local via wamp)

## Fonctionnalités

- **2 profils teacher et student**
- **Gestion de plusieurs classes**
- **Generation du code selon le cours par le.la formateur.ice**
- **Le status de l'apprenant dépend de l'heure de sa signature plus de 20 min de retard signifie que son statut est update avec un retard**(de manière automatique le status est absent pour tout les élèves de la classe à la génération du code)

## Fonctionnalités A VENIR

- **Creation des promos**
- **Modification des status par les formateur.ices**
- **panneau de gestion**
- **role super admin**


## Technologies Utilisées

- php
- MySQL
- HTML/CSS
- JavaScript
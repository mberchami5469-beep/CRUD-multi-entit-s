
# TP7 CRUD – Gestion d'un centre de formation

## Description

Petite application Web de gestion d'un centre de formation, développée avec PHP (PDO), MySQL, HTML5 et CSS3.

Cette application permet de gérer trois entités principales :
- Les formations
- Les étudiants
- Les modules

Elle permet d'effectuer les opérations CRUD (Create, Read, Update, Delete) sur chaque entité.

## Contexte et règles métier

- Un centre propose plusieurs formations.
- Chaque étudiant appartient à une seule formation.
- Une formation peut accueillir plusieurs étudiants.
- Chaque formation contient plusieurs modules.
- Chaque module appartient à une seule formation.
- L'email de chaque étudiant doit être unique.
- Une formation contenant des étudiants ou des modules ne peut pas être supprimée.

## Technologies utilisées

- PHP 8
- PDO
- MySQL / MariaDB
- HTML5
- CSS3
- XAMPP
- phpMyAdmin

## Modèle de données

Le projet contient trois tables principales :

### 1. Formation
- `id_formation` : Clé primaire
- `intitule` : Intitulé de la formation
- `duree_heures` : Durée en heures
- `niveau` : Niveau de la formation

### 2. Étudiant
- `id_etudiant` : Clé primaire
- `nom` : Nom de l'étudiant
- `prenom` : Prénom de l'étudiant
- `email` : Email unique
- `date_naissance` : Date de naissance
- `id_formation` : Clé étrangère

### 3. Module
- `id_module` : Clé primaire
- `titre` : Titre du module
- `nb_heures` : Nombre d'heures
- `id_formation` : Clé étrangère

### Relations entre les tables

| Relation | Cardinalité | Clé étrangère |
|---|---|---|
| Formation - Étudiant | 1 - N | `etudiant.id_formation` |
| Formation - Module | 1 - N | `module.id_formation` |

Les clés étrangères utilisent `ON DELETE RESTRICT` afin d'empêcher la suppression d'une formation encore utilisée.

## Structure du projet

```text
tp7-crud/
│
├── index.php

│
├── css/
│   ├── style.css
│   ├── pages.css
│   └── home.css
│
├── database/
│   ├── connexion.php
│   └── tp7_crud.sql
│
├── formation/
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
├── etudiant/
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
├── module/
│   ├── index.php
│   ├── create.php
│   ├── edit.php
│   └── delete.php
│
└── screenshots/
```

## Fonctionnalités

### Tableau de bord
- Affichage du nombre total de formations.
- Affichage du nombre total d'étudiants.
- Affichage du nombre total de modules.
- Navigation vers les différentes sections.

### Gestion des formations
- Ajouter une formation.
- Afficher la liste des formations.
- Modifier une formation.
- Supprimer une formation.

### Gestion des étudiants
- Ajouter un étudiant.
- Afficher la liste des étudiants.
- Modifier les informations d'un étudiant.
- Supprimer un étudiant.
- Choisir une formation depuis une liste déroulante.
- Vérifier l'unicité de l'adresse email.

### Gestion des modules
- Ajouter un module.
- Afficher la liste des modules.
- Modifier un module.
- Supprimer un module.
- Associer chaque module à une formation.

## Installation et configuration

### Prérequis

- Installer XAMPP.
- Démarrer Apache et MySQL.
- Utiliser phpMyAdmin pour gérer la base de données.

### Étape 1 : Copier le projet

Copier le dossier `tp7-crud` dans :

```text
C:\xampp\htdocs\
```

### Étape 2 : Créer la base de données

1. Ouvrir phpMyAdmin : http://localhost/phpmyadmin
2. Cliquer sur l'onglet Importer.
3. Sélectionner le fichier `database/db.sql`.
4. Lancer l'importation.

Le script SQL crée automatiquement la base de données `tp7_crud`, les tables et les données de test.

### Étape 3 : Configurer la connexion PDO

Vérifier le fichier `database/connexion.php` :

```php
<?php

$connexion = new PDO(
    "mysql:host=localhost;dbname=tp7_crud;charset=utf8mb4",
    "root",
    "",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);

```

### Étape 4 : Lancer l'application

Ouvrir le navigateur et accéder à :

http://localhost/tp7-crud/

## Sécurité et bonnes pratiques

- Utilisation de PDO pour la connexion à la base de données.
- Utilisation des requêtes préparées pour éviter les injections SQL.
- Utilisation de `htmlspecialchars()` pour limiter les attaques XSS.
- Utilisation des clés étrangères pour garantir l'intégrité référentielle.
- Utilisation de la contrainte UNIQUE pour les emails.
- Gestion des erreurs lors des suppressions impossibles.



## Tests effectués

| Test | Résultat attendu |
|---|---|
| Ajouter une formation | Formation ajoutée avec succès |
| Ajouter un étudiant | Étudiant ajouté avec succès |
| Ajouter un module | Module ajouté avec succès |
| Modifier un enregistrement | Informations mises à jour |
| Supprimer un étudiant | Étudiant supprimé |
| Supprimer un module | Module supprimé |
| Supprimer une formation vide | Formation supprimée |
| Supprimer une formation liée à des étudiants ou modules | Suppression refusée |
| Ajouter un email déjà existant | Message d'erreur affiché |

## Auteur

**Mouad Berchami**

Projet réalisé dans le cadre des travaux pratiques en développement Web.

**Formation :** Génie Informatique  
**Établissement :** FST Marrakech

---

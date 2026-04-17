# 🎲 Aji L3bo - Système de Gestion de Café de Jeux

> Plateforme digitale complète pour la gestion des réservations, catalogues de jeux et sessions de jeu d'**Aji L3bo Café**.

[![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0%2B-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Composer](https://img.shields.io/badge/Composer-2.0%2B-885630?logo=composer&logoColor=white)](https://getcomposer.org/)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

---

## 📋 Table des Matières

- [À Propos](#-à-propos)
- [Fonctionnalités](#-fonctionnalités)
- [Architecture Technique](#-architecture-technique)
- [Prérequis](#-prérequis)
- [Installation](#-installation)
- [Configuration](#-configuration)
- [Structure du Projet](#-structure-du-projet)
- [Utilisation](#-utilisation)
- [API Routes](#-api-routes)
- [Base de Données](#-base-de-données)
- [Sécurité](#-sécurité)
- [Contributeurs](#-contributeurs)
- [License](#-license)

---

## 🎯 À Propos

**Aji L3bo** est une plateforme web moderne développée pour digitaliser la gestion complète d'un café de jeux de société. Le système remplace les processus papier traditionnels par une solution web robuste permettant de :

- Gérer un catalogue de jeux avec catégorisation
- Réserver des tables en ligne
- Suivre les sessions de jeu en temps réel
- Analyser les statistiques d'utilisation

### Contexte du Projet

Suite à une soirée jeux de société au café, les gérants ont proposé une mission freelance pour moderniser leur système de gestion. Ce projet répond à leurs besoins en créant une architecture MVC professionnelle avec routing personnalisé et namespaces PSR-4.

---

## ✨ Fonctionnalités

### 🎲 Module Catalogue de Jeux

- **US1 - Liste des Jeux** : Affichage de tous les jeux avec nom, catégorie, nombre de joueurs et durée
- **US2 - Détails d'un Jeu** : Informations complètes (description, difficulté, statut disponible/en cours)
- **US3 - Gestion Admin** : CRUD complet des jeux (ajout, modification, suppression)
- **US4 - Filtrage par Catégorie** : Tri par Stratégie, Ambiance, Famille, Experts

### 📅 Module Réservations

- **US5 - Vérification Disponibilité** : Consultation des tables libres par date et créneau
- **US6 - Création Réservation** : Formulaire avec nom, téléphone, nombre de personnes, date et heure
- **US7 - Historique Client** : Visualisation des réservations (à venir, complétées, annulées)
- **US8 - Gestion Admin** : Dashboard admin avec statuts modifiables (confirmer/annuler)

### 🕹️ Module Gestion des Sessions

- **US9 - Démarrer Session** : Association réservation + jeu + table
- **US10 - Dashboard Temps Réel** : Vue live des tables occupées avec chronomètres
- **US11 - Terminer Session** : Clôture et libération automatique des tables
- **US12 - Historique Sessions** : Consultation complète (jeux joués, durées, clients)

### 🎁 Bonus Implémentés

- ✅ **Statistiques Admin** : Jeux les plus joués, heures de pointe, taux d'occupation
- ✅ **Système de Profil** : Gestion utilisateurs avec upload photo de profil
- ✅ **Authentification** : Login/Register avec sessions sécurisées
- ✅ **Protection CSRF** : Tokens CSRF sur tous les formulaires

---

## 🏗️ Architecture Technique

### Stack Technologique

```
Frontend  : HTML5, TailwindCSS, JavaScript Vanilla
Backend   : PHP 8.0+ (POO strict)
Database  : MySQL 8.0+
Routing   : Custom Router (PSR-4 compliant)
Autoload  : Composer PSR-4
```

### Patterns & Principes

- **MVC Strict** : Séparation Models (données) / Controllers (logique) / Views (affichage)
- **PSR-4 Autoloading** : Namespaces standardisés (`App\Controllers`, `App\Models`)
- **Front Controller** : Single point d'entrée via `public/index.php`
- **Clean URLs** : Routing personnalisé (`/games/5`, `/reservations/create`)
- **Repository Pattern** : Abstraction base de données via PDO
- **Dependency Injection** : Services injectés dans les contrôleurs
- **CSRF Protection** : Tokens sur tous les formulaires sensibles
- **Middleware** : Authentification et autorisation via middleware

### Architecture Layers

```
┌─────────────────────────────────────────────┐
│           public/index.php                  │  ← Point d'entrée unique
│         (Front Controller)                  │
└────────────────┬────────────────────────────┘
                 │
┌────────────────▼────────────────────────────┐
│          route/Router.php                   │  ← Custom Router
│      (URL Parsing & Dispatching)            │
└────────────────┬────────────────────────────┘
                 │
┌────────────────▼────────────────────────────┐
│      app/Middleware/Middleware.php          │  ← Auth & CSRF Check
└────────────────┬────────────────────────────┘
                 │
┌────────────────▼────────────────────────────┐
│        app/Controllers/*                    │  ← Business Logic
│   (GameController, ReservationController)   │
└────────────────┬────────────────────────────┘
                 │
┌────────────────▼────────────────────────────┐
│          app/Models/*                       │  ← Data Access Layer
│     (GameModel, ReservationModel)           │
│            (PDO / MySQL)                    │
└────────────────┬────────────────────────────┘
                 │
┌────────────────▼────────────────────────────┐
│          app/Views/*                        │  ← Presentation Layer
│       (Pure PHP Templates)                  │
└─────────────────────────────────────────────┘
```

---

## 📦 Prérequis

- **PHP** >= 8.0
- **MySQL** >= 8.0 (ou MariaDB >= 10.5)
- **Composer** >= 2.0
- **Apache/Nginx** avec mod_rewrite activé
- **Extensions PHP** :
  - `pdo_mysql`
  - `gd` (pour upload d'images)
  - `session`
  - `json`

---

## 🚀 Installation

### 1. Cloner le Projet

```bash
git clone https://github.com/votre-repo/aji-l3bo.git
cd aji-l3bo
```

### 2. Installer les Dépendances

```bash
composer install
```

### 3. Configurer la Base de Données

```bash
# Créer la base de données
mysql -u root -p < config/database.sql

# Appliquer les migrations
mysql -u root -p games_db < config/migrations/add_game_columns.sql

# Insérer les données de test
mysql -u root -p games_db < config/seed.sql
```

### 4. Configuration de l'Environnement

Éditer `config/database.php` :

```php
return [
    'host' => 'localhost',
    'dbname' => 'games_db',
    'username' => 'root',
    'password' => 'votre_password',
    'charset' => 'utf8mb4'
];
```

Éditer `config/app.php` pour définir `base_url` :

```php
return [
    'base_url' => '/aji_l3bou/',  // Adapter selon votre environnement
    'timezone' => 'Africa/Casablanca'
];
```

### 5. Configurer Apache

Vérifier que `.htaccess` pointe vers le bon `RewriteBase` :

```apache
RewriteEngine On
RewriteBase /aji_l3bou/  # Adapter selon votre virtualhost
```

### 6. Permissions

```bash
chmod -R 755 public/uploads
chown -R www-data:www-data public/uploads
```

### 7. Créer un Compte Admin

```bash
php cli/set-admin.php
```

---

## ⚙️ Configuration

### Fichiers de Configuration

| Fichier | Description |
|---------|-------------|
| `config/app.php` | Configuration générale (URL, timezone) |
| `config/database.php` | Paramètres de connexion MySQL |
| `composer.json` | Autoloading PSR-4 et dépendances |
| `.htaccess` | Réécriture d'URL et sécurité |

### Variables d'Environnement

Pour la production, créer un fichier `.env` :

```env
DB_HOST=localhost
DB_NAME=games_db
DB_USER=root
DB_PASS=password
APP_ENV=production
DEBUG_MODE=false
```

---

## 📁 Structure du Projet

```
aji_l3bou/
├── app/
│   ├── Controllers/          # Contrôleurs MVC
│   │   ├── AdminController.php
│   │   ├── AuthController.php
│   │   ├── GameController.php
│   │   ├── ReservationController.php
│   │   └── SessionController.php
│   ├── Models/               # Modèles de données (PDO)
│   │   ├── GameModel.php
│   │   ├── ReservationModel.php
│   │   ├── SessionModel.php
│   │   └── UserModel.php
│   ├── Views/                # Templates PHP
│   │   ├── admin/            # Vues administration
│   │   ├── auth/             # Login/Register
│   │   ├── user/             # Dashboard utilisateur
│   │   └── errors/           # Pages d'erreur (404, 403)
│   ├── Middleware/           # Authentification & CSRF
│   │   └── Middleware.php
│   ├── Services/             # Services métier
│   │   └── AuthService.php
│   └── Helper/               # Utilitaires
│       ├── Csrf.php
│       └── Utility.php
├── config/
│   ├── app.php               # Config application
│   ├── database.php          # Config base de données
│   ├── database.sql          # Schéma initial
│   ├── migrations/           # Scripts de migration
│   └── seed.sql              # Données de test
├── public/
│   ├── index.php             # Front controller (point d'entrée)
│   └── uploads/              # Fichiers uploadés
├── route/
│   ├── Router.php            # Custom Router
│   └── web.php               # Définition des routes
├── src/
│   └── Database.php          # Singleton PDO
├── cli/
│   └── set-admin.php         # Script CLI pour créer admin
├── vendor/                   # Dépendances Composer
├── .gitignore
├── .htaccess                 # Réécriture Apache
├── composer.json             # Autoloading PSR-4
└── README.md
```

---

## 🎮 Utilisation

### Accès à l'Application

```
URL Publique   : http://localhost/aji_l3bou/
Dashboard Admin: http://localhost/aji_l3bou/admin/dashboard
Login          : http://localhost/aji_l3bou/login
```

### Comptes de Test (après seed)

```
Admin:
  Email: admin@ajil3bo.ma
  Password: admin123

Client:
  Email: client@example.com
  Password: client123
```

### Workflow Complet

1. **Client** : S'inscrit → Parcourt le catalogue → Réserve une table
2. **Admin** : Confirme la réservation → Démarre une session → Suit en temps réel
3. **Système** : Libère la table automatiquement après la session

---

## 🛣️ API Routes

### Routes Publiques

| Méthode | Route | Contrôleur | Description |
|---------|-------|------------|-------------|
| `GET` | `/` | `HomeController@index` | Page d'accueil |
| `GET` | `/login` | `AuthController@loginForm` | Formulaire login |
| `POST` | `/login` | `AuthController@login` | Authentification |
| `GET` | `/register` | `AuthController@registerForm` | Formulaire inscription |
| `POST` | `/register` | `AuthController@register` | Enregistrement |
| `GET` | `/logout` | `AuthController@logout` | Déconnexion |

### Routes Utilisateur (Auth Required)

| Méthode | Route | Contrôleur | Description |
|---------|-------|------------|-------------|
| `GET` | `/games` | `GameController@index` | Catalogue jeux |
| `GET` | `/games/:id` | `GameController@show` | Détails d'un jeu |
| `GET` | `/reservation` | `ReservationController@create` | Formulaire réservation |
| `POST` | `/reservation` | `ReservationController@store` | Créer réservation |
| `GET` | `/reservations` | `ReservationController@index` | Mes réservations |

### Routes Admin (Role: admin)

| Méthode | Route | Contrôleur | Description |
|---------|-------|------------|-------------|
| `GET` | `/admin/dashboard` | `AdminController@dashboard` | Tableau de bord |
| `GET` | `/admin/games` | `AdminController@games` | Gestion jeux |
| `POST` | `/admin/games` | `AdminController@storeGame` | Ajouter jeu |
| `GET` | `/admin/reservations` | `AdminController@reservations` | Gestion réservations |
| `GET` | `/admin/sessions` | `AdminController@sessions` | Sessions actives |
| `POST` | `/admin/sessions/start` | `SessionController@start` | Démarrer session |
| `POST` | `/admin/sessions/end` | `SessionController@end` | Terminer session |

---

## 🗄️ Base de Données

### Schéma Principal

```sql
users
  - id (PK)
  - name VARCHAR(100)
  - email VARCHAR(100) UNIQUE
  - password VARCHAR(255)
  - phone VARCHAR(20)
  - role ENUM('user', 'admin')
  - profile_picture VARCHAR(255)

categories
  - id (PK)
  - name VARCHAR(50)
  - description TEXT

games
  - id (PK)
  - name VARCHAR(100)
  - description TEXT
  - category_id (FK → categories)
  - min_players INT
  - max_players INT
  - duration INT (minutes)
  - difficulty ENUM('easy', 'medium', 'hard')
  - status ENUM('available', 'in_use', 'maintenance')
  - price DECIMAL(6,2)
  - image_url VARCHAR(255)

game_tables
  - id (PK)
  - reference VARCHAR(20) UNIQUE
  - capacity INT

reservations
  - id (PK)
  - user_id (FK → users)
  - game_id (FK → games) NULL
  - table_id (FK → game_tables)
  - date DATE
  - start_time TIME
  - duration INT (minutes)
  - party_size INT
  - status ENUM('pending', 'confirmed', 'cancelled', 'completed')

sessions
  - id (PK)
  - reservation_id (FK → reservations)
  - game_id (FK → games)
  - started_at DATETIME
  - ended_at DATETIME NULL
  - status ENUM('active', 'completed')
```

### Relations

```
users 1--* reservations (user_id)
categories 1--* games (category_id)
games 1--* reservations (game_id)
game_tables 1--* reservations (table_id)
reservations 1--1 sessions (reservation_id)
games 1--* sessions (game_id)
```

---

## 🔒 Sécurité

### Mesures Implémentées

- ✅ **Protection CSRF** : Tokens sur tous les formulaires (`Csrf::generateToken()`)
- ✅ **SQL Injection** : Requêtes préparées PDO (placeholders `?` ou `:param`)
- ✅ **XSS** : Échappement avec `htmlspecialchars()` dans les vues
- ✅ **Authentification** : Sessions PHP sécurisées (`session_regenerate_id()`)
- ✅ **Autorisation** : Middleware vérifiant les rôles (`admin` vs `user`)
- ✅ **Blocage Direct** : `.htaccess` interdit l'accès direct aux fichiers `/app/`
- ✅ **Validation** : Filtrage des inputs avec regex et `filter_var()`
- ✅ **Passwords** : Hashage via `password_hash()` / `password_verify()`

### Exemple Protection CSRF

```php
// Dans le contrôleur
use App\Helper\Csrf;

public function store() {
    if (!Csrf::validateToken($_POST['csrf_token'] ?? '')) {
        http_response_code(403);
        die('Invalid CSRF token');
    }
    // Traitement...
}

// Dans la vue
<input type="hidden" name="csrf_token" value="<?= Csrf::generateToken() ?>">
```

---

## 👥 Contributeurs

Ce projet a été développé en équipe de **3 développeurs** avec méthodologie Agile :

- 🎯 **Product Owner** : Définition des US et priorités
- 💻 **Développeur Backend** : Architecture MVC, Models, Controllers
- 🎨 **Développeur Frontend** : Intégration TailwindCSS, Views, UX
- 🔄 **Daily Standups** : Coordination quotidienne
- 📋 **Jira** : Suivi des tickets (MFLP-21 à MFLP-28)
- 🔍 **Code Reviews** : Validation avant merge sur `main`


---

<div align="center">

**Made with ❤️ by the Aji L3bo Team**

[⬆ Retour en haut](#-aji-l3bo---système-de-gestion-de-café-de-jeux)

</div>

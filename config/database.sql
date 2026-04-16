CREATE DATABASE IF NOT EXISTS games_db;

USE games_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    image VARCHAR(255),
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    difficulty ENUM('easy', 'medium', 'hard') NOT NULL,
    min_players INT DEFAULT 2,
    max_players INT DEFAULT 4,
    spots INT NOT NULL,
    duration INT NOT NULL,
    status ENUM('available', 'unavailable') DEFAULT 'available',
    category_id INT,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255),
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS game_tables (
    id INT AUTO_INCREMENT PRIMARY KEY,
    capacity INT NOT NULL,
    reference VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    table_id INT NOT NULL,
    game_id INT,
    date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    spots INT NOT NULL,
    status ENUM('pending', 'confirmed', 'cancelled', 'completed', 'in_progress') DEFAULT 'pending',
    price DECIMAL(10, 2) DEFAULT 0.00,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (table_id) REFERENCES game_tables(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT NOT NULL,
    game_id INT,
    duration INT NOT NULL,
    status ENUM('inactive', 'active', 'ended') DEFAULT 'inactive',
    started_at TIMESTAMP NULL,
    ended_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (reservation_id) REFERENCES reservations(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS session_games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id INT NOT NULL,
    game_id INT NOT NULL,
    price_at_time DECIMAL(10, 2) NOT NULL,
    is_active BOOLEAN DEFAULT FALSE,
    returned_at TIMESTAMP NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (session_id) REFERENCES sessions(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE
);

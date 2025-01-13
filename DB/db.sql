CREATE DATABASE IF NOT EXISTS zoo_arcadia;
USE zoo_arcadia;

-- Table Utilisateurs
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'vet', 'employee') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table Réservations
CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    activite VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    heure TIME NOT NULL,
    participants INT NOT NULL
);

-- Table Habitats
CREATE TABLE habitats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table Animaux
CREATE TABLE animals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    etat VARCHAR(255) NOT NULL,
    nourriture VARCHAR(255) NOT NULL,
    derniere_visite DATE NOT NULL,
    image VARCHAR(255) NOT NULL,
    habitat_id INT,
    FOREIGN KEY (habitat_id) REFERENCES habitats(id) ON DELETE CASCADE
);

-- Table Avis Visiteurs
CREATE TABLE visitor_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(100),
    comment TEXT NOT NULL,
    is_validated BOOLEAN DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table Suivi des Animaux
CREATE TABLE animal_tracking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    animal_id INT,
    vet_id INT,
    status TEXT,
    food VARCHAR(255),
    quantity FLOAT,
    comments TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (animal_id) REFERENCES animals(id) ON DELETE CASCADE,
    FOREIGN KEY (vet_id) REFERENCES users(id) ON DELETE CASCADE
);

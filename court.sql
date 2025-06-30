CREATE DATABASE court;
USE court;

-- Admin Table
CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(150),
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(20),
    password VARCHAR(255)
);

-- Case Types Table
CREATE TABLE case_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL
);

-- Fines Table
CREATE TABLE fines (
    id INT AUTO_INCREMENT PRIMARY KEY,
    amount DECIMAL(10,2),
    description TEXT
);

-- User Cases Table
CREATE TABLE user_cases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    case_type_id INT,
    fine_id INT,
    case_status ENUM('New', 'Pending', 'Filed') DEFAULT 'New',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (case_type_id) REFERENCES case_types(id),
    FOREIGN KEY (fine_id) REFERENCES fines(id)
);

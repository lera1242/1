
CREATE DATABASE IF NOT EXISTS beauty_salon;
USE beauty_salon;

-- Создание таблицы users
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    login VARCHAR(255) unique NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) unique NOT NULL
);

-- Создание таблицы roles
CREATE TABLE IF NOT EXISTS roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
);
INSERT INTO roles (name) VALUES ('user'), ('admin');

-- Создание таблицы users_has_role
CREATE TABLE IF NOT EXISTS users_has_role (
    user_id INT,
    role_id INT,
    PRIMARY KEY (user_id, role_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

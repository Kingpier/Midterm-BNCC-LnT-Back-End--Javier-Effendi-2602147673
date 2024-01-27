CREATE DATABASE IF NOT EXISTS attendance_system;

USE attendance_system;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(32) NOT NULL,
    bio TEXT,
    photo VARCHAR(255)
);

INSERT INTO users (id, firstName, lastName, email, password, bio, photo)
VALUES (1, 'Javier', 'Effendi', 'kpier255@gmail.com', '0192023a7bbd73250516f069df18b500', 'This is admin', NULL);

CREATE TABLE IF NOT EXISTS attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userId INT,
    checkIn DATETIME,
    checkOut DATETIME,
    FOREIGN KEY (userId) REFERENCES users(id)
);

CREATE DATABASE bozhyaniva;
USE bozhyaniva;
CREATE TABLE users(
	id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL, 
    email VARCHAR(50) NOT NULL,
    user_password VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE admins(
	id INT AUTO_INCREMENT PRIMARY KEY,
    admin_name VARCHAR(100) NOT NULL, 
    admin_password VARCHAR(100) NOT NULL
);

CREATE TABLE conferences(
	id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    created_date DATE NOT NULL,
    admin_id INT,
    FOREIGN KEY (admin_id) REFERENCES admin(id)
);

CREATE TABLE videos(
	id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    url TEXT NOT NULL,
    admin_id INT,
    FOREIGN KEY (admin_id) REFERENCES admin(id)
);
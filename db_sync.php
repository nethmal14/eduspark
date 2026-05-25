<?php
function sync_database($pdo) {
    $queries = [
        "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            role ENUM('admin', 'student') DEFAULT 'student',
            profile_pic VARCHAR(255) DEFAULT NULL,
            school VARCHAR(100),
            age INT,
            grade VARCHAR(20),
            subject_stream VARCHAR(50),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )",
        "CREATE TABLE IF NOT EXISTS categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            parent_id INT DEFAULT NULL,
            type ENUM('post', 'news', 'paper') DEFAULT 'post'
        )",
        "CREATE TABLE IF NOT EXISTS posts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            content TEXT,
            category_id INT,
            file_path VARCHAR(255),
            type ENUM('A/L', 'O/L', 'paper', 'other') DEFAULT 'other',
            author_id INT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )",
        "CREATE TABLE IF NOT EXISTS news (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            content TEXT,
            category_id INT,
            author_id INT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )",
        "CREATE TABLE IF NOT EXISTS tools (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            description TEXT,
            link VARCHAR(255)
        )",
        "CREATE TABLE IF NOT EXISTS settings (
            setting_key VARCHAR(50) PRIMARY KEY,
            setting_value TEXT
        )"
    ];
    
    foreach($queries as $query) {
        $pdo->exec($query);
    }
}

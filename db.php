<?php
session_start();
if (!file_exists(__DIR__ . '/config.php')) {
    $current_file = basename($_SERVER['SCRIPT_NAME']);
    if ($current_file !== 'setup.php') {
        header("Location: setup.php");
        exit;
    }
} else {
    require_once __DIR__ . '/config.php';
    try {
        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

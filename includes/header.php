<?php 
require_once 'config.php'; 
// If db access is needed globally, require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_NAME ?> | <?= SITE_DESC ?></title>
    <!-- Modern pure CSS style -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar">
    <a href="index.php" class="nav-brand"><?= SITE_NAME ?></a>
    
    <div class="nav-links">
        <a href="index.php" class="nav-link">Home</a>
        <a href="tools.php" class="nav-link">Tools</a>
        <a href="papers.php" class="nav-link">Past Papers</a>
        <a href="forum.php" class="nav-link">Forum</a>
        <a href="news.php" class="nav-link">News</a>
    </div>

    <div class="flex items-center gap-4">
        <button id="theme-toggle" class="btn btn-secondary" aria-label="Toggle Dark Mode" style="padding: 8px; border-radius: 50%;">
            <span id="theme-icon">
                <!-- SVG injected via JS -->
            </span>
        </button>
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="profile.php" class="btn btn-primary">Profile</a>
        <?php else: ?>
            <a href="login.php" class="btn btn-primary">Sign In</a>
        <?php endif; ?>
    </div>
</nav>

<!-- Mobile Floating Navigation -->
<div class="mobile-nav">
    <a href="index.php" class="nav-link">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
    </a>
    <a href="tools.php" class="nav-link">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
    </a>
    <a href="papers.php" class="nav-link">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
    </a>
    <a href="forum.php" class="nav-link">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
    </a>
    <?php if(isset($_SESSION['user_id'])): ?>
        <a href="profile.php" class="nav-link">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        </a>
    <?php else: ?>
        <a href="login.php" class="nav-link">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
        </a>
    <?php endif; ?>
</div>

<main class="main-content">

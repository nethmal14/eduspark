<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduSpark</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>/assets/css/style.css">
</head>
<body>
<header class="app-bar">
    <div class="app-bar-left">
        <a href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>/" class="brand">
            <span class="material-symbols-outlined" style="vertical-align: middle;">auto_awesome</span> EduSpark
        </a>
    </div>
    <nav class="app-bar-nav">
        <a href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>/notes.php">Notes</a>
        <a href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>/papers.php">Papers</a>
        <a href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>/tools.php">Tools</a>
        <?php if(isLoggedIn()): ?>
            <a href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>/user/profile.php">Profile</a>
            <?php if(isAdmin()): ?>
                <a href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>/admin/index.php">Admin</a>
            <?php endif; ?>
            <a href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>/logout.php" class="btn btn-secondary" style="margin-left: 16px;">Logout</a>
        <?php else: ?>
            <a href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>/login.php" class="btn btn-secondary">Login</a>
            <a href="<?php echo defined('BASE_URL') ? BASE_URL : ''; ?>/register.php" class="btn btn-primary">Register</a>
        <?php endif; ?>
    </nav>
</header>

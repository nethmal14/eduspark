<?php
require_once '../db.php';
if (!isAdmin()) { header("Location: ../index.php"); exit; }
include '../includes/header.php';
?>
<main class="container">
    <h2>Admin Dashboard</h2>
    <div class="grid">
        <div class="card">
            <h3>Manage Users</h3>
            <p>View and manage registered students.</p>
            <a href="users.php" class="btn btn-secondary">Manage Users</a>
        </div>
        <div class="card">
            <h3>Posts & Notes</h3>
            <p>Add and manage A/L and O/L study materials.</p>
            <a href="posts.php" class="btn btn-secondary">Manage Posts</a>
        </div>
        <div class="card">
            <h3>News & Updates</h3>
            <p>Post announcements and manage categories.</p>
            <a href="news.php" class="btn btn-secondary">Manage News</a>
        </div>
        <div class="card">
            <h3>System Settings</h3>
            <p>Update system via Github, Sync DB schema, and Backup.</p>
            <a href="settings.php" class="btn btn-secondary">Site Settings</a>
        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>

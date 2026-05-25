<?php
require_once '../db.php';
if (!isAdmin()) { header("Location: ../index.php"); exit; }
$message = '';
$error = '';

// Handle DB Sync
if (isset($_POST['sync_db'])) {
    require_once '../db_sync.php';
    sync_database($pdo);
    $message = "Database schema synchronized successfully.";
}

// Handle Git URL Save
if (isset($_POST['save_git'])) {
    $url = trim($_POST['git_url']);
    $stmt = $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES ('git_repo', ?) ON DUPLICATE KEY UPDATE setting_value = ?");
    $stmt->execute([$url, $url]);
    $message = "Git repository link saved.";
}

// Handle Git Pull Update
if (isset($_POST['update_sys_git'])) {
    $stmt = $pdo->query("SELECT setting_value FROM settings WHERE setting_key = 'git_repo'");
    $repo = $stmt->fetchColumn();
    
    if ($repo) {
        $output = shell_exec('git pull ' . escapeshellarg($repo) . ' main 2>&1');
        $message = "Git pull output:<br><pre>" . htmlspecialchars($output) . "</pre>";
    } else {
        $error = "Please save a Git repository link first before pulling.";
    }
}

// Handle ZIP Update
if (isset($_POST['update_sys_zip'])) {
    if (isset($_FILES['update_zip']) && $_FILES['update_zip']['error'] === 0) {
        $zip = new ZipArchive;
        if ($zip->open($_FILES['update_zip']['tmp_name']) === TRUE) {
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $filename = $zip->getNameIndex($i);
                // Prevent overwriting config or uploads
                if ($filename !== 'config.php' && strpos($filename, 'uploads/') !== 0) {
                    $zip->extractTo('../', $filename);
                }
            }
            $zip->close();
            $message = "System updated from ZIP successfully.";
        } else {
            $error = "Failed to open ZIP file.";
        }
    } else {
        $error = "Please select a valid ZIP file.";
    }
}

// Fetch current Git URL
$stmt = $pdo->query("SELECT setting_value FROM settings WHERE setting_key = 'git_repo'");
$current_git_url = $stmt->fetchColumn();

include '../includes/header.php';
?>
<main class="container">
    <h2>Site Settings & System Updates</h2>
    <?php if($message) echo "<div class='alert success'>$message</div>"; ?>
    <?php if($error) echo "<div class='alert error'>$error</div>"; ?>
    
    <div class="grid">
        <div class="card">
            <h3>Database Synchronization</h3>
            <p>Run this after pulling new updates to ensure your database schema matches the latest system requirements. This handles missing tables safely.</p>
            <form method="POST">
                <button type="submit" name="sync_db" class="btn btn-primary">Sync Database Now</button>
            </form>
        </div>
        
        <div class="card">
            <h3>Git Repository Integration</h3>
            <p>Set your remote repository URL to pull updates directly.</p>
            <form method="POST">
                <input type="url" name="git_url" class="input-field" placeholder="https://github.com/user/repo.git" value="<?php echo htmlspecialchars($current_git_url ?? ''); ?>" required>
                <div style="display: flex; gap: 8px;">
                    <button type="submit" name="save_git" class="btn btn-primary" style="flex: 1;">Save Git Link</button>
                    <button type="submit" name="update_sys_git" class="btn btn-secondary" style="flex: 1;">Pull Updates</button>
                </div>
            </form>
        </div>
        
        <div class="card" style="grid-column: 1 / -1;">
            <h3>Manual ZIP Update</h3>
            <p>Upload a system update `.zip` file. (This will safely ignore `config.php` and your `uploads/` directory to prevent data loss).</p>
            <form method="POST" enctype="multipart/form-data" class="flex-row">
                <input type="file" name="update_zip" class="input-field" accept=".zip" style="margin-bottom:0; flex: 1;" required>
                <button type="submit" name="update_sys_zip" class="btn btn-secondary">Update System</button>
            </form>
        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>

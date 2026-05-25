<?php
if (file_exists(__DIR__ . '/config.php')) {
    die("Setup already completed. Please remove config.php to run setup again.");
}
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db_host = $_POST['db_host'];
    $db_name = $_POST['db_name'];
    $db_user = $_POST['db_user'];
    $db_pass = $_POST['db_pass'];
    
    $admin_user = $_POST['admin_user'];
    $admin_email = $_POST['admin_email'];
    $admin_pass = password_hash($_POST['admin_pass'], PASSWORD_DEFAULT);

    try {
        $pdo = new PDO("mysql:host=$db_host", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db_name`");
        $pdo->exec("USE `$db_name`");
        
        require_once 'db_sync.php';
        sync_database($pdo);
        
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'admin')");
        $stmt->execute([$admin_user, $admin_email, $admin_pass]);
        
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443 ? "https://" : "http://";
        $base_url = rtrim($protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']), '/');
        
        $config_content = "<?php\n"
            . "define('DB_HOST', '$db_host');\n"
            . "define('DB_NAME', '$db_name');\n"
            . "define('DB_USER', '$db_user');\n"
            . "define('DB_PASS', '$db_pass');\n"
            . "define('BASE_URL', '$base_url');\n";
            
        file_put_contents('config.php', $config_content);
        
        $success = "Setup complete! <a href='login.php'>Login here</a>";
    } catch (Exception $e) {
        $error = "Setup failed: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EduSpark Setup Wizard</title>
    <style>
        body { font-family: 'Inter', sans-serif; background: #fcfcff; margin: 0; padding: 24px; color: #1a1c1e; }
        .card { background: #fff; max-width: 500px; margin: 40px auto; padding: 32px; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        h2 { color: #006494; text-align: center; }
        .input-field { width: 100%; padding: 12px; margin-bottom: 16px; border: 1px solid #73777f; border-radius: 8px; box-sizing: border-box; }
        .btn { background: #006494; color: #fff; padding: 12px; width: 100%; border: none; border-radius: 100px; cursor: pointer; font-size: 16px; font-weight: 500; }
        .alert { padding: 12px; border-radius: 8px; margin-bottom: 16px; }
        .error { background: #ffdad6; color: #ba1a1a; }
        .success { background: #c4eed0; color: #0f5223; }
    </style>
</head>
<body>
    <div class="card">
        <h2>EduSpark Setup Wizard</h2>
        <?php if($error) echo "<div class='alert error'>$error</div>"; ?>
        <?php if($success) { echo "<div class='alert success'>$success</div>"; } else { ?>
        <form method="POST">
            <h3>Database Details</h3>
            <input type="text" name="db_host" class="input-field" placeholder="DB Host (e.g. localhost)" required>
            <input type="text" name="db_name" class="input-field" placeholder="DB Name" required>
            <input type="text" name="db_user" class="input-field" placeholder="DB User" required>
            <input type="password" name="db_pass" class="input-field" placeholder="DB Password">
            
            <h3>Admin Account</h3>
            <input type="text" name="admin_user" class="input-field" placeholder="Admin Username" required>
            <input type="email" name="admin_email" class="input-field" placeholder="Admin Email" required>
            <input type="password" name="admin_pass" class="input-field" placeholder="Admin Password" required>
            
            <button type="submit" class="btn">Run Setup</button>
        </form>
        <?php } ?>
    </div>
</body>
</html>

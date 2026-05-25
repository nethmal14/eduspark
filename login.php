<?php
require_once 'db.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$login, $login]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid username/email or password!";
    }
}
include 'includes/header.php';
?>
<main class="container" style="max-width: 450px; margin-top: 50px;">
    <div class="card">
        <h2 style="text-align: center; color: var(--primary);">Login to EduSpark</h2>
        <?php if($error) echo "<div class='alert error'>$error</div>"; ?>
        <form method="POST">
            <input type="text" name="login" class="input-field" placeholder="Username or Email" required>
            <input type="password" name="password" class="input-field" placeholder="Password" required>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
        </form>
        <p style="text-align: center; margin-top: 16px;">Don't have an account? <a href="<?php echo BASE_URL; ?>/register.php">Register</a></p>
    </div>
</main>
<?php include 'includes/footer.php'; ?>

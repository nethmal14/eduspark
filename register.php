<?php
require_once 'db.php';
$error = ''; $success = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['username']);
    $email = trim($_POST['email']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Auto generate profile pic using Ui-Avatars
    $pp = "https://ui-avatars.com/api/?name=" . urlencode($user) . "&background=random";
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, profile_pic) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user, $email, $pass, $pp]);
        $success = "Registration successful! <a href='".BASE_URL."/login.php'>Login here</a>";
    } catch (Exception $e) {
        $error = "Registration failed. Username or email might already exist.";
    }
}
include 'includes/header.php';
?>
<main class="container" style="max-width: 500px; margin-top: 50px;">
    <div class="card">
        <h2 style="text-align: center; color: var(--primary);">Register</h2>
        <?php if($error) echo "<div class='alert error'>$error</div>"; ?>
        <?php if($success) echo "<div class='alert success'>$success</div>"; else { ?>
        <form method="POST">
            <input type="text" name="username" class="input-field" placeholder="Username" required>
            <input type="email" name="email" class="input-field" placeholder="Email" required>
            <input type="password" name="password" class="input-field" placeholder="Password" required>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Register</button>
        </form>
        <p style="text-align: center; margin-top: 16px;">Optional info like school and grade can be added in your Profile later.</p>
        <?php } ?>
    </div>
</main>
<?php include 'includes/footer.php'; ?>

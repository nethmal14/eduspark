<?php
require_once '../db.php';
if (!isLoggedIn()) { header("Location: ../login.php"); exit; }
$error = ''; $success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $school = $_POST['school'];
    $age = !empty($_POST['age']) ? (int)$_POST['age'] : null;
    $grade = $_POST['grade'];
    $stream = $_POST['subject_stream'];
    
    $pp = $_POST['current_pp'];
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === 0) {
        $upload_dir = '../uploads/profiles/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
        $file_name = time() . '_' . basename($_FILES['profile_pic']['name']);
        if(move_uploaded_file($_FILES['profile_pic']['tmp_name'], $upload_dir . $file_name)) {
            $pp = BASE_URL . '/uploads/profiles/' . $file_name;
        }
    }
    
    $stmt = $pdo->prepare("UPDATE users SET school=?, age=?, grade=?, subject_stream=?, profile_pic=? WHERE id=?");
    $stmt->execute([$school, $age, $grade, $stream, $pp, $_SESSION['user_id']]);
    
    if (!empty($_POST['password'])) {
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password=? WHERE id=?");
        $stmt->execute([$pass, $_SESSION['user_id']]);
    }
    $success = "Profile updated successfully!";
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
include '../includes/header.php';
?>
<main class="container" style="max-width: 600px;">
    <div class="card">
        <h2>My Profile</h2>
        <?php if($error) echo "<div class='alert error'>$error</div>"; ?>
        <?php if($success) echo "<div class='alert success'>$success</div>"; ?>
        <div style="text-align: center; margin-bottom: 24px;">
            <img src="<?php echo htmlspecialchars($user['profile_pic']); ?>" alt="Profile" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid var(--primary-container);">
            <h3 style="margin-top:16px;"><?php echo htmlspecialchars($user['username']); ?></h3>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="current_pp" value="<?php echo htmlspecialchars($user['profile_pic']); ?>">
            <div class="form-group">
                <label>Update Profile Picture</label>
                <input type="file" name="profile_pic" class="input-field" accept="image/*">
            </div>
            <div class="grid">
                <div class="form-group">
                    <label>School</label>
                    <input type="text" name="school" class="input-field" value="<?php echo htmlspecialchars($user['school'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" name="age" class="input-field" value="<?php echo htmlspecialchars($user['age'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label>Grade</label>
                    <input type="text" name="grade" class="input-field" value="<?php echo htmlspecialchars($user['grade'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label>Subject Stream</label>
                    <input type="text" name="subject_stream" class="input-field" value="<?php echo htmlspecialchars($user['subject_stream'] ?? ''); ?>">
                </div>
            </div>
            <div class="form-group">
                <label>Change Password (leave blank to keep current)</label>
                <input type="password" name="password" class="input-field">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 16px;">Update Profile</button>
        </form>
    </div>
</main>
<?php include '../includes/footer.php'; ?>

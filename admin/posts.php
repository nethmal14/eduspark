<?php
require_once '../db.php';
if (!isAdmin()) { header("Location: ../index.php"); exit; }
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $type = $_POST['type'];
    $file_path = '';
    
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $upload_dir = '../uploads/docs/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
        $file_name = time() . '_' . basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir . $file_name)) {
            $file_path = '/uploads/docs/' . $file_name;
        }
    }
    
    $stmt = $pdo->prepare("INSERT INTO posts (title, content, type, file_path, author_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $content, $type, $file_path, $_SESSION['user_id']]);
    $message = "Material added successfully!";
}

include '../includes/header.php';
?>
<main class="container">
    <h2>Manage Content & Materials</h2>
    <?php if($message) echo "<div class='alert success'>$message</div>"; ?>
    
    <div class="card">
        <h3>Add New Note / Paper</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="input-field" placeholder="E.g. 2023 Biology Past Paper" required>
            </div>
            
            <div class="form-group">
                <label>Content Type</label>
                <select name="type" class="input-field" required>
                    <option value="A/L">A/L Note</option>
                    <option value="O/L">O/L Note</option>
                    <option value="paper">Past Paper</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Description / Content</label>
                <textarea name="content" class="input-field" placeholder="Add some context..." rows="5"></textarea>
            </div>
            
            <div class="form-group">
                <label>Attach PDF/Document</label>
                <input type="file" name="file" class="input-field" accept=".pdf,.doc,.docx,.jpg,.png">
            </div>
            
            <button type="submit" class="btn btn-primary" style="margin-top: 16px;">Publish Content</button>
        </form>
    </div>
</main>
<?php include '../includes/footer.php'; ?>

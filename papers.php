<?php
require_once 'db.php';
include 'includes/header.php';
$search = $_GET['search'] ?? '';

$query = "SELECT p.*, u.username FROM posts p LEFT JOIN users u ON p.author_id = u.id WHERE p.type = 'paper' ";
$params = [];
if ($search) {
    $query .= " AND (p.title LIKE ? OR p.content LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
}
$query .= " ORDER BY p.created_at DESC";

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$papers = $stmt->fetchAll();
?>
<main class="container">
    <h2>Past Papers</h2>
    <div class="card">
        <form method="GET" class="flex-row">
            <input type="text" name="search" class="input-field" placeholder="Search papers by subject or year..." value="<?php echo htmlspecialchars($search); ?>" style="margin-bottom:0; flex: 1;">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    
    <div class="grid">
        <?php foreach($papers as $paper): ?>
        <div class="card">
            <h3><?php echo htmlspecialchars($paper['title']); ?></h3>
            <p style="color: var(--primary); font-weight: 500; font-size: 0.9rem;">
                Paper &bull; Uploaded by <?php echo htmlspecialchars($paper['username']); ?>
            </p>
            <p><?php echo htmlspecialchars(substr(strip_tags($paper['content']), 0, 150)); ?>...</p>
            <?php if($paper['file_path']): ?>
                <a href="<?php echo BASE_URL . $paper['file_path']; ?>" target="_blank" class="btn btn-secondary">Download Paper</a>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
        <?php if(!$papers) echo "<div class='card' style='grid-column: 1 / -1; text-align: center;'>No papers found matching your criteria.</div>"; ?>
    </div>
</main>
<?php include 'includes/footer.php'; ?>

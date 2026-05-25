<?php
require_once 'db.php';
include 'includes/header.php';
$search = $_GET['search'] ?? '';
$type = $_GET['type'] ?? '';

$query = "SELECT p.*, u.username FROM posts p LEFT JOIN users u ON p.author_id = u.id WHERE p.type IN ('A/L', 'O/L') ";
$params = [];
if ($search) {
    $query .= " AND (p.title LIKE ? OR p.content LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
}
if ($type) {
    $query .= " AND p.type = ?";
    $params[] = $type;
}
$query .= " ORDER BY p.created_at DESC";

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$notes = $stmt->fetchAll();
?>
<main class="container">
    <h2>Browse Notes</h2>
    <div class="card">
        <form method="GET" class="flex-row">
            <input type="text" name="search" class="input-field" placeholder="Search notes..." value="<?php echo htmlspecialchars($search); ?>" style="margin-bottom:0; flex: 1;">
            <select name="type" class="input-field" style="margin-bottom:0; width:auto;">
                <option value="">All Types</option>
                <option value="A/L" <?php if($type=='A/L') echo 'selected'; ?>>A/L</option>
                <option value="O/L" <?php if($type=='O/L') echo 'selected'; ?>>O/L</option>
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
    
    <div class="grid">
        <?php foreach($notes as $note): ?>
        <div class="card">
            <h3><?php echo htmlspecialchars($note['title']); ?></h3>
            <p style="color: var(--primary); font-weight: 500; font-size: 0.9rem;">
                <?php echo htmlspecialchars($note['type']); ?> &bull; By <?php echo htmlspecialchars($note['username']); ?>
            </p>
            <p><?php echo htmlspecialchars(substr(strip_tags($note['content']), 0, 150)); ?>...</p>
            <?php if($note['file_path']): ?>
                <a href="<?php echo BASE_URL . $note['file_path']; ?>" target="_blank" class="btn btn-secondary">Open File</a>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
        <?php if(!$notes) echo "<div class='card' style='grid-column: 1 / -1; text-align: center;'>No notes found matching your criteria.</div>"; ?>
    </div>
</main>
<?php include 'includes/footer.php'; ?>

<?php
require_once 'db.php';
include 'includes/header.php';
$search = $_GET['search'] ?? '';

$query = "SELECT * FROM tools";
$params = [];
if ($search) {
    $query .= " WHERE name LIKE ? OR description LIKE ?";
    $params[] = "%$search%";
    $params[] = "%$search%";
}

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$tools = $stmt->fetchAll();
?>
<main class="container">
    <h2>Student Tools</h2>
    <div class="card">
        <form method="GET" class="flex-row">
            <input type="text" name="search" class="input-field" placeholder="Search educational tools..." value="<?php echo htmlspecialchars($search); ?>" style="margin-bottom:0; flex: 1;">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    
    <div class="grid">
        <?php foreach($tools as $tool): ?>
        <div class="card">
            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                <span class="material-symbols-outlined" style="color: var(--primary); font-size: 32px;">build</span>
                <h3 style="margin: 0;"><?php echo htmlspecialchars($tool['name']); ?></h3>
            </div>
            <p><?php echo htmlspecialchars($tool['description']); ?></p>
            <a href="<?php echo htmlspecialchars($tool['link']); ?>" target="_blank" class="btn btn-secondary" style="margin-top: 16px;">Launch Tool</a>
        </div>
        <?php endforeach; ?>
        <?php if(!$tools) echo "<div class='card' style='grid-column: 1 / -1; text-align: center;'>No tools found matching your criteria. Admin can add tools soon!</div>"; ?>
    </div>
</main>
<?php include 'includes/footer.php'; ?>

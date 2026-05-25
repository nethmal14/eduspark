<?php
require_once '../db.php';
if (!isAdmin()) { header("Location: ../index.php"); exit; }
include '../includes/header.php';

$stmt = $pdo->query("SELECT id, username, email, role, created_at FROM users ORDER BY created_at DESC");
$users = $stmt->fetchAll();
?>
<main class="container">
    <h2>Manage Users</h2>
    <div class="card">
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="border-bottom: 2px solid var(--outline);">
                        <th style="padding: 12px;">ID</th>
                        <th style="padding: 12px;">Username</th>
                        <th style="padding: 12px;">Email</th>
                        <th style="padding: 12px;">Role</th>
                        <th style="padding: 12px;">Joined</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $u): ?>
                    <tr style="border-bottom: 1px solid var(--surface-container);">
                        <td style="padding: 12px;"><?php echo $u['id']; ?></td>
                        <td style="padding: 12px;"><?php echo htmlspecialchars($u['username']); ?></td>
                        <td style="padding: 12px;"><?php echo htmlspecialchars($u['email']); ?></td>
                        <td style="padding: 12px;">
                            <span style="background: var(--primary-container); color: var(--on-primary-container); padding: 4px 8px; border-radius: 4px; font-size: 0.85rem;">
                                <?php echo htmlspecialchars($u['role']); ?>
                            </span>
                        </td>
                        <td style="padding: 12px;"><?php echo date('Y-m-d', strtotime($u['created_at'])); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>

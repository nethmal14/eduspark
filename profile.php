<?php 
require_once 'includes/header.php'; 

// Simulate login for frontend demo
// In production, this redirects to login.php if not logged in
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1;
    $_SESSION['username'] = 'Kamal Perera';
    $_SESSION['grade'] = 'A/L (2025)';
    $_SESSION['stream'] = 'Physical Science';
}
?>

<div class="container">
    <div class="grid" style="grid-template-columns: 1fr 3fr; gap: 32px; margin-top: 40px; margin-bottom: 40px;">
        
        <!-- Sidebar / Profile Info -->
        <aside>
            <div class="glass-panel" style="padding: 32px 24px; text-align: center; margin-bottom: 24px;">
                <div style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, var(--accent-color), #8b5cf6); margin: 0 auto 16px auto; display: flex; align-items: center; justify-content: center; color: white; font-size: 2.5rem; font-weight: 800;">
                    KP
                </div>
                <h2 style="font-size: 1.5rem; margin-bottom: 4px;"><?= $_SESSION['username'] ?></h2>
                <p style="color: var(--text-secondary); margin-bottom: 16px;"><?= $_SESSION['grade'] ?> • <?= $_SESSION['stream'] ?></p>
                
                <!-- Study Streak -->
                <div style="background: var(--bg-secondary); border-radius: var(--radius-lg); padding: 12px; display: inline-flex; align-items: center; gap: 8px; margin-bottom: 24px; border: 1px solid var(--border-color);">
                    <span style="font-size: 1.2rem;">🔥</span>
                    <span style="font-weight: 700;">14 Day Streak</span>
                </div>

                <a href="logout.php" class="btn btn-secondary" style="width: 100%;">Sign Out</a>
            </div>

            <!-- Badges -->
            <div class="glass-panel" style="padding: 24px;">
                <h3 style="margin-bottom: 16px; font-size: 1.1rem;">Badges</h3>
                <div class="flex gap-4" style="flex-wrap: wrap;">
                    <div title="Top Contributor" style="width: 40px; height: 40px; background: rgba(59, 130, 246, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">🌟</div>
                    <div title="Math Wizard" style="width: 40px; height: 40px; background: rgba(16, 185, 129, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">🧮</div>
                    <div title="10 Day Streak" style="width: 40px; height: 40px; background: rgba(239, 68, 68, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">🔥</div>
                </div>
            </div>
        </aside>

        <!-- Main Content (Tabs) -->
        <div class="glass-panel" style="padding: 0; overflow: hidden;">
            <!-- Tabs -->
            <div class="flex" style="border-bottom: 1px solid var(--border-color); background: rgba(0,0,0,0.02);">
                <button class="btn" style="border-radius: 0; background: none; box-shadow: none; border-bottom: 2px solid var(--accent-color); color: var(--text-primary);">Saved Papers</button>
                <button class="btn" style="border-radius: 0; background: none; box-shadow: none; color: var(--text-secondary); border-bottom: 2px solid transparent;">Saved Posts</button>
                <button class="btn" style="border-radius: 0; background: none; box-shadow: none; color: var(--text-secondary); border-bottom: 2px solid transparent;">Recent Activity</button>
            </div>

            <!-- Tab Content -->
            <div style="padding: 24px;">
                <ul style="list-style: none; display: flex; flex-direction: column; gap: 16px;">
                    <li style="display: flex; justify-content: space-between; align-items: center; padding: 16px; border: 1px solid var(--border-color); border-radius: var(--radius-md);">
                        <div>
                            <h4 style="font-size: 1.1rem; margin-bottom: 4px;">A/L Combined Maths 2022 Paper I</h4>
                            <p style="font-size: 0.85rem; color: var(--text-secondary);">Saved on May 20, 2026</p>
                        </div>
                        <a href="papers.php" class="btn btn-secondary">Open PDF</a>
                    </li>
                    <li style="display: flex; justify-content: space-between; align-items: center; padding: 16px; border: 1px solid var(--border-color); border-radius: var(--radius-md);">
                        <div>
                            <h4 style="font-size: 1.1rem; margin-bottom: 4px;">A/L Physics 2021 Marking Scheme</h4>
                            <p style="font-size: 0.85rem; color: var(--text-secondary);">Saved on May 18, 2026</p>
                        </div>
                        <a href="papers.php" class="btn btn-secondary">Open PDF</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

<?php 
require_once 'includes/header.php'; 

// Basic Admin Protection
// if (!isset($_SESSION['is_admin'])) { header("Location: index.php"); exit; }
?>

<div class="container">
    <div class="flex items-center justify-between" style="margin-bottom: 40px; margin-top: 20px;">
        <div>
            <h1 style="font-size: 2.5rem; margin-bottom: 8px;">Admin <span style="color: var(--accent-color);">Dashboard</span></h1>
            <p style="color: var(--text-secondary);">Manage users, papers, news, and platform settings.</p>
        </div>
        <div class="flex gap-4">
            <a href="#" class="btn btn-secondary">Platform Settings</a>
            <a href="index.php" class="btn btn-primary">View Site</a>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-4 gap-4 mb-8">
        <div class="glass-panel" style="padding: 24px;">
            <p style="color: var(--text-secondary); font-size: 0.9rem; font-weight: 600; text-transform: uppercase;">Total Users</p>
            <h3 style="font-size: 2rem; margin-top: 8px;">12,450</h3>
            <span style="color: #10b981; font-size: 0.85rem;">+124 this week</span>
        </div>
        <div class="glass-panel" style="padding: 24px;">
            <p style="color: var(--text-secondary); font-size: 0.9rem; font-weight: 600; text-transform: uppercase;">Past Papers</p>
            <h3 style="font-size: 2rem; margin-top: 8px;">842</h3>
            <span style="color: var(--text-secondary); font-size: 0.85rem;">All uploaded PDFs</span>
        </div>
        <div class="glass-panel" style="padding: 24px;">
            <p style="color: var(--text-secondary); font-size: 0.9rem; font-weight: 600; text-transform: uppercase;">Active Threads</p>
            <h3 style="font-size: 2rem; margin-top: 8px;">1,204</h3>
            <span style="color: #10b981; font-size: 0.85rem;">+42 today</span>
        </div>
        <div class="glass-panel" style="padding: 24px;">
            <p style="color: var(--text-secondary); font-size: 0.9rem; font-weight: 600; text-transform: uppercase;">Server Load</p>
            <h3 style="font-size: 2rem; margin-top: 8px;">24%</h3>
            <span style="color: #10b981; font-size: 0.85rem;">Normal</span>
        </div>
    </div>

    <div class="grid" style="grid-template-columns: 1fr 3fr; gap: 32px; margin-bottom: 40px;">
        <!-- Admin Navigation -->
        <aside>
            <div class="glass-panel" style="padding: 24px;">
                <ul style="list-style: none; display: flex; flex-direction: column; gap: 8px;">
                    <li><a href="?view=dashboard" class="nav-link active" style="display: block; padding: 12px; border-radius: var(--radius-md); background: rgba(59, 130, 246, 0.1); color: var(--accent-color); font-weight: 600;">Dashboard Home</a></li>
                    <li><a href="?view=users" class="nav-link" style="display: block; padding: 12px; border-radius: var(--radius-md);">Manage Users</a></li>
                    <li><a href="?view=papers" class="nav-link" style="display: block; padding: 12px; border-radius: var(--radius-md);">Manage Papers</a></li>
                    <li><a href="?view=forum" class="nav-link" style="display: block; padding: 12px; border-radius: var(--radius-md);">Forum Moderation</a></li>
                    <li><a href="?view=news" class="nav-link" style="display: block; padding: 12px; border-radius: var(--radius-md);">News Editor</a></li>
                </ul>
            </div>
        </aside>

        <!-- Main Panel Content -->
        <div class="glass-panel" style="padding: 24px;">
            <div class="flex items-center justify-between" style="margin-bottom: 24px;">
                <h3 style="font-size: 1.25rem;">Recent User Registrations</h3>
                <a href="?view=users" class="btn btn-secondary" style="padding: 6px 16px; font-size: 0.85rem;">View All</a>
            </div>
            
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <th style="padding: 12px; font-weight: 600;">ID</th>
                        <th style="padding: 12px; font-weight: 600;">Name</th>
                        <th style="padding: 12px; font-weight: 600;">Grade</th>
                        <th style="padding: 12px; font-weight: 600;">Registered</th>
                        <th style="padding: 12px; font-weight: 600; text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px;">#1042</td>
                        <td style="padding: 12px; font-weight: 500;">Pasindu Silva</td>
                        <td style="padding: 12px;"><span style="background: var(--bg-secondary); padding: 4px 10px; border-radius: var(--radius-full); font-size: 0.8rem; border: 1px solid var(--border-color);">A/L 2025</span></td>
                        <td style="padding: 12px; color: var(--text-secondary);">10 mins ago</td>
                        <td style="padding: 12px; text-align: right;"><button class="btn btn-secondary" style="padding: 4px 12px; font-size: 0.8rem;">Edit</button></td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 12px;">#1041</td>
                        <td style="padding: 12px; font-weight: 500;">Nethmi Fernando</td>
                        <td style="padding: 12px;"><span style="background: var(--bg-secondary); padding: 4px 10px; border-radius: var(--radius-full); font-size: 0.8rem; border: 1px solid var(--border-color);">O/L 2024</span></td>
                        <td style="padding: 12px; color: var(--text-secondary);">1 hour ago</td>
                        <td style="padding: 12px; text-align: right;"><button class="btn btn-secondary" style="padding: 4px 12px; font-size: 0.8rem;">Edit</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

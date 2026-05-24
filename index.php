<?php 
require_once 'includes/header.php';

// Simulate user session for demo purposes
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1;
    $_SESSION['username'] = 'Kamal';
}

// Sample news data (in production, pull from DB)
$news_items = [
    [
        'type' => 'official',
        'title' => 'O/L 2025 Examination Timetable Released',
        'summary' => 'The Department of Examinations has officially released the timetable for the 2025 O/L examinations. Students are advised to check the schedule carefully.',
        'time' => '2 hours ago',
        'tag' => 'Official',
        'tag_color' => '#3b82f6',
    ],
    [
        'type' => 'community',
        'title' => 'A/L Science Stream Study Group — Join Now!',
        'summary' => 'A new community study group for A/L Physical Science students has been created in the forum. Join to collaborate and share resources.',
        'time' => '5 hours ago',
        'tag' => 'Community',
        'tag_color' => '#8b5cf6',
    ],
    [
        'type' => 'official',
        'title' => 'New Past Papers Added: Chemistry 2023',
        'summary' => 'We have just uploaded 12 new A/L Chemistry past papers and marking schemes for 2023, covering all three mediums.',
        'time' => 'Yesterday',
        'tag' => 'Update',
        'tag_color' => '#10b981',
    ],
    [
        'type' => 'community',
        'title' => 'Top Forum Thread: Best Resources for Maths',
        'summary' => 'Community members are sharing their best Combined Maths resources. Check out the top-voted answers from A/L students who scored A passes.',
        'time' => '2 days ago',
        'tag' => 'Community',
        'tag_color' => '#8b5cf6',
    ],
    [
        'type' => 'official',
        'title' => 'A/L Practical Examination Guidelines Updated',
        'summary' => 'The Ministry of Education has released updated guidelines for A/L science practical examinations for 2025. Review the new requirements.',
        'time' => '3 days ago',
        'tag' => 'Official',
        'tag_color' => '#3b82f6',
    ],
];
?>

<!-- Aesthetic Background Blobs -->
<div class="hero-bg" aria-hidden="true">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>
    <div class="blob blob-4"></div>
</div>

<!-- Homepage Hero Wrapper -->
<div class="homepage-wrapper">

    <!-- Top Right Welcome Pill -->
    <div class="welcome-pill-wrapper">
        <div class="welcome-pill glass-frosted">
            <div class="welcome-avatar">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            <span class="welcome-text">Welcome, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
            <a href="profile.php" class="welcome-arrow">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
            </a>
        </div>
    </div>

    <!-- Main Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <div class="hero-eyebrow">
                <span class="live-dot"></span>
                <span>Sri Lanka's Student Community Platform</span>
            </div>
            <h1 class="hero-headline">
                <span class="headline-line">STAY AHEAD,</span>
                <span class="headline-line headline-accent">COLABRATE,</span>
                <span class="headline-line">WIN!!</span>
            </h1>
            <p class="hero-sub">Everything an O/L and A/L student needs — past papers, academic tools, and an active community.</p>
        </div>

        <!-- Feature Cards Grid -->
        <div class="feature-cards">
            
            <a href="tools.php" class="feature-card glass-frosted" id="card-tools">
                <div class="feature-card-icon" style="background: linear-gradient(135deg, #3b82f6, #6366f1);">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                </div>
                <div class="feature-card-body">
                    <h3>Tools</h3>
                    <p>Z-Score, pH Calc, Matrix Solver &amp; more</p>
                </div>
                <div class="feature-card-arrow">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                </div>
            </a>

            <a href="papers.php" class="feature-card glass-frosted" id="card-papers">
                <div class="feature-card-icon" style="background: linear-gradient(135deg, #8b5cf6, #ec4899);">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                </div>
                <div class="feature-card-body">
                    <h3>Notes &amp; Papers</h3>
                    <p>O/L &amp; A/L past papers, marking schemes</p>
                </div>
                <div class="feature-card-arrow">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                </div>
            </a>

            <a href="forum.php" class="feature-card glass-frosted" id="card-community">
                <div class="feature-card-icon" style="background: linear-gradient(135deg, #10b981, #3b82f6);">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <div class="feature-card-body">
                    <h3>Community</h3>
                    <p>Forum discussions, study groups &amp; more</p>
                </div>
                <div class="feature-card-arrow">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                </div>
            </a>

        </div>
    </section>

    <!-- News Drawer Trigger (bottom floating bar) -->
    <div class="news-drawer-bar glass-frosted" id="news-drawer-bar" onclick="openNewsOverlay()" role="button" tabindex="0" aria-label="Open news feed">
        <div class="news-drawer-left">
            <div class="news-live-indicator">
                <span class="live-dot"></span>
                <span class="news-live-label">News &amp; Updates</span>
            </div>
            <span class="news-drawer-preview"><?= htmlspecialchars($news_items[0]['title']) ?></span>
        </div>
        <div class="news-drawer-right">
            <span class="news-drawer-count"><?= count($news_items) ?> updates</span>
            <div class="news-expand-btn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
                <span>Expand</span>
            </div>
        </div>
    </div>

</div>

<!-- Full-Screen News Overlay -->
<div class="news-overlay" id="news-overlay" role="dialog" aria-modal="true" aria-label="News and Updates">
    <div class="news-overlay-backdrop" onclick="closeNewsOverlay()"></div>
    <div class="news-overlay-panel glass-frosted-dark">
        
        <!-- Overlay Header -->
        <div class="news-overlay-header">
            <div class="news-overlay-title-group">
                <div class="news-live-indicator">
                    <span class="live-dot live-dot-green"></span>
                    <span>Live Feed</span>
                </div>
                <h2 class="news-overlay-title">News &amp; Community Updates</h2>
                <p class="news-overlay-sub">General announcements, exam updates &amp; community highlights</p>
            </div>
            <button class="news-overlay-close" onclick="closeNewsOverlay()" aria-label="Close news overlay">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>

        <!-- News Items List -->
        <div class="news-overlay-list">
            <?php foreach ($news_items as $i => $item): ?>
            <article class="news-overlay-item" style="animation-delay: <?= $i * 0.07 ?>s;">
                <div class="news-item-header">
                    <span class="news-tag" style="background: <?= $item['tag_color'] ?>22; color: <?= $item['tag_color'] ?>; border: 1px solid <?= $item['tag_color'] ?>44;"><?= $item['tag'] ?></span>
                    <span class="news-time"><?= $item['time'] ?></span>
                </div>
                <h3 class="news-item-title"><?= htmlspecialchars($item['title']) ?></h3>
                <p class="news-item-summary"><?= htmlspecialchars($item['summary']) ?></p>
                <a href="news.php" class="news-item-read">Read more
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                </a>
            </article>
            <?php endforeach; ?>
        </div>

        <!-- Overlay Footer -->
        <div class="news-overlay-footer">
            <a href="news.php" class="btn btn-primary news-overlay-cta">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h8"/></svg>
                View Full News Archive
            </a>
            <button class="btn btn-secondary" onclick="closeNewsOverlay()">Close</button>
        </div>

    </div>
</div>

<script>
    // News overlay toggle
    function openNewsOverlay() {
        const overlay = document.getElementById('news-overlay');
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    function closeNewsOverlay() {
        const overlay = document.getElementById('news-overlay');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    }
    // Allow keyboard trigger on news bar
    document.getElementById('news-drawer-bar').addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openNewsOverlay(); }
    });
    // Escape key closes overlay
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeNewsOverlay();
    });
</script>

<?php require_once 'includes/footer.php'; ?>

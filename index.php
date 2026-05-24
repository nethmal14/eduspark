<?php require_once 'includes/header.php'; ?>

<div class="container">
    <!-- Hero Section -->
    <section class="glass-panel" style="padding: 60px 24px; text-align: center; margin-bottom: 40px; margin-top: 20px;">
        <h1 style="font-size: 3rem; margin-bottom: 20px; font-weight: 800;">Your Ultimate <br/><span style="color: var(--accent-color);">Study Companion</span></h1>
        <p style="font-size: 1.125rem; color: var(--text-secondary); max-width: 600px; margin: 0 auto 32px auto;">Everything a Sri Lankan O/L and A/L student needs. Past papers, academic tools, and an active community all in one place.</p>
        
        <div style="max-width: 500px; margin: 0 auto 32px auto; position: relative;">
            <input type="text" class="form-control" placeholder="Search for papers, topics, or tools..." style="padding: 16px 24px; border-radius: var(--radius-full); box-shadow: var(--shadow-md);">
            <button class="btn btn-primary" style="position: absolute; right: 6px; top: 6px; bottom: 6px; padding: 0 24px;">Search</button>
        </div>

        <div class="flex items-center justify-center gap-4" style="flex-wrap: wrap;">
            <a href="papers.php" class="btn btn-primary">Browse Papers</a>
            <a href="tools.php" class="btn btn-secondary">Open Tools</a>
        </div>
    </section>

    <!-- Quick Widgets -->
    <div class="grid grid-cols-3">
        
        <!-- Countdown Widget -->
        <div class="glass-panel" style="padding: 24px; text-align: center;">
            <h3 style="margin-bottom: 16px; color: var(--text-secondary); font-size: 0.95rem; text-transform: uppercase; letter-spacing: 1px;">A/L Exam Countdown</h3>
            <div style="font-size: 2.5rem; font-weight: 800; color: var(--accent-color); margin-bottom: 8px;">124<span style="font-size: 1rem; color: var(--text-secondary);"> Days</span></div>
            <p style="font-size: 0.85rem; color: var(--text-secondary);">Stay focused! Keep grinding.</p>
        </div>

        <!-- Trending Tools -->
        <div class="glass-panel" style="padding: 24px;">
            <h3 style="margin-bottom: 16px; font-size: 1.125rem;">Trending Tools</h3>
            <ul style="list-style: none;">
                <li style="margin-bottom: 12px;"><a href="tools.php?tool=gpa" class="flex items-center gap-4" style="color: var(--text-primary);"><div style="width: 8px; height: 8px; border-radius: 50%; background: #10b981;"></div> Z-Score Estimator</a></li>
                <li style="margin-bottom: 12px;"><a href="tools.php?tool=ph" class="flex items-center gap-4" style="color: var(--text-primary);"><div style="width: 8px; height: 8px; border-radius: 50%; background: #3b82f6;"></div> pH Calculator</a></li>
                <li><a href="tools.php?tool=matrix" class="flex items-center gap-4" style="color: var(--text-primary);"><div style="width: 8px; height: 8px; border-radius: 50%; background: #8b5cf6;"></div> Matrix Solver</a></li>
            </ul>
        </div>

        <!-- Latest News -->
        <div class="glass-panel" style="padding: 24px;">
            <h3 style="margin-bottom: 16px; font-size: 1.125rem;">Latest News</h3>
            <div style="margin-bottom: 16px; border-bottom: 1px solid var(--border-color); padding-bottom: 16px;">
                <h4 style="font-size: 0.95rem; margin-bottom: 4px;"><a href="#">O/L 2025 Timetable Released</a></h4>
                <p style="font-size: 0.8rem; color: var(--text-secondary);">Department of Examinations has released the official schedule...</p>
            </div>
            <div>
                <h4 style="font-size: 0.95rem; margin-bottom: 4px;"><a href="#">A/L Practicals Update</a></h4>
                <p style="font-size: 0.8rem; color: var(--text-secondary);">New guidelines for science practicals announced.</p>
            </div>
        </div>

    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

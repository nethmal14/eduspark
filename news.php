<?php require_once 'includes/header.php'; ?>

<div class="container">
    <div style="text-align: center; margin-bottom: 40px; margin-top: 20px;">
        <h1 style="font-size: 2.5rem; margin-bottom: 16px;">Latest <span style="color: var(--accent-color);">News</span></h1>
        <p style="color: var(--text-secondary); max-width: 600px; margin: 0 auto;">Stay updated with the latest educational news, exam schedules, and curriculum changes.</p>
    </div>

    <div class="grid grid-cols-3 gap-4" style="margin-bottom: 40px;">
        <!-- Pinned/Featured News -->
        <article class="glass-panel" style="grid-column: span 3; display: flex; padding: 0; overflow: hidden;">
            <div style="flex: 1; background: url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') center/cover; min-height: 300px;"></div>
            <div style="flex: 1; padding: 40px; display: flex; flex-direction: column; justify-content: center;">
                <span style="background: rgba(239, 68, 68, 0.1); color: #ef4444; padding: 4px 12px; border-radius: var(--radius-full); font-size: 0.85rem; font-weight: 600; width: fit-content; margin-bottom: 16px;">Pinned</span>
                <h2 style="font-size: 2rem; margin-bottom: 16px;"><a href="news_detail.php?id=1" style="color: var(--text-primary);">O/L 2025 Examination Schedule Officially Released</a></h2>
                <p style="color: var(--text-secondary); margin-bottom: 24px; line-height: 1.8;">The Department of Examinations has officially released the timetable for the upcoming G.C.E. Ordinary Level examinations. Students are advised to download the PDF.</p>
                <div class="flex items-center gap-4 text-secondary" style="font-size: 0.9rem;">
                    <span>By <strong>Admin</strong></span>
                    <span>•</span>
                    <span>May 20, 2026</span>
                </div>
            </div>
        </article>

        <!-- Standard News Items -->
        <article class="glass-panel" style="padding: 24px;">
            <span style="color: var(--accent-color); font-size: 0.85rem; font-weight: 600; margin-bottom: 12px; display: block;">Curriculum Update</span>
            <h3 style="font-size: 1.25rem; margin-bottom: 12px;"><a href="news_detail.php?id=2" style="color: var(--text-primary);">New Practical Guidelines for A/L Science Streams</a></h3>
            <p style="color: var(--text-secondary); margin-bottom: 16px; font-size: 0.95rem;">Important updates regarding the mandatory practical sessions for Biology, Chemistry, and Physics students have been announced.</p>
            <div style="font-size: 0.85rem; color: var(--text-secondary);">May 18, 2026</div>
        </article>

        <article class="glass-panel" style="padding: 24px;">
            <span style="color: #10b981; font-size: 0.85rem; font-weight: 600; margin-bottom: 12px; display: block;">University Admissions</span>
            <h3 style="font-size: 1.25rem; margin-bottom: 12px;"><a href="news_detail.php?id=3" style="color: var(--text-primary);">University Cut-off Marks 2025/2026</a></h3>
            <p style="color: var(--text-secondary); margin-bottom: 16px; font-size: 0.95rem;">The UGC has published the Z-score cut-off marks for university admissions for the academic year 2025/2026.</p>
            <div style="font-size: 0.85rem; color: var(--text-secondary);">May 15, 2026</div>
        </article>

        <article class="glass-panel" style="padding: 24px;">
            <span style="color: #8b5cf6; font-size: 0.85rem; font-weight: 600; margin-bottom: 12px; display: block;">Platform Update</span>
            <h3 style="font-size: 1.25rem; margin-bottom: 12px;"><a href="news_detail.php?id=4" style="color: var(--text-primary);">New Chemistry Tools Added to EduSpark</a></h3>
            <p style="color: var(--text-secondary); margin-bottom: 16px; font-size: 0.95rem;">We have just launched a new set of tools including a Molar Mass calculator and an interactive Periodic Table.</p>
            <div style="font-size: 0.85rem; color: var(--text-secondary);">May 10, 2026</div>
        </article>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

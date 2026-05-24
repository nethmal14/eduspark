<?php require_once 'includes/header.php'; ?>

<div class="container">
    <div style="text-align: center; margin-bottom: 40px; margin-top: 20px;">
        <h1 style="font-size: 2.5rem; margin-bottom: 16px;">Academic <span style="color: var(--accent-color);">Tools</span></h1>
        <p style="color: var(--text-secondary); max-width: 600px; margin: 0 auto;">Calculators, timers, and tools designed specifically for local syllabus needs.</p>
    </div>

    <!-- Math Tools -->
    <h2 style="margin-bottom: 24px; font-size: 1.5rem; border-bottom: 1px solid var(--border-color); padding-bottom: 12px;">Mathematics</h2>
    <div class="grid grid-cols-4 mb-8">
        <a href="tools/calculator.php" class="glass-panel" style="padding: 24px; text-align: center; display: block;">
            <div style="font-size: 2rem; margin-bottom: 12px;">🧮</div>
            <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Scientific Calculator</h3>
            <p style="font-size: 0.85rem; color: var(--text-secondary);">Advanced functions for A/L combined maths.</p>
        </a>
        <a href="tools/log.php" class="glass-panel" style="padding: 24px; text-align: center; display: block;">
            <div style="font-size: 2rem; margin-bottom: 12px;">📖</div>
            <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Log Table viewer</h3>
            <p style="font-size: 0.85rem; color: var(--text-secondary);">Quick digital logarithmic tables.</p>
        </a>
        <a href="tools/matrix.php" class="glass-panel" style="padding: 24px; text-align: center; display: block;">
            <div style="font-size: 2rem; margin-bottom: 12px;">▦</div>
            <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Matrix Solver</h3>
            <p style="font-size: 0.85rem; color: var(--text-secondary);">Add, multiply, and inverse matrices.</p>
        </a>
        <a href="tools/equation.php" class="glass-panel" style="padding: 24px; text-align: center; display: block;">
            <div style="font-size: 2rem; margin-bottom: 12px;">∑</div>
            <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Equation Solver</h3>
            <p style="font-size: 0.85rem; color: var(--text-secondary);">Quadratic and simultaneous equations.</p>
        </a>
    </div>

    <!-- Physics Tools -->
    <h2 style="margin-bottom: 24px; font-size: 1.5rem; border-bottom: 1px solid var(--border-color); padding-bottom: 12px;">Physics</h2>
    <div class="grid grid-cols-4 mb-8">
        <a href="tools/units.php" class="glass-panel" style="padding: 24px; text-align: center; display: block;">
            <div style="font-size: 2rem; margin-bottom: 12px;">📏</div>
            <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Unit Converter</h3>
            <p style="font-size: 0.85rem; color: var(--text-secondary);">SI and non-SI conversions.</p>
        </a>
        <a href="tools/vector.php" class="glass-panel" style="padding: 24px; text-align: center; display: block;">
            <div style="font-size: 2rem; margin-bottom: 12px;">↗️</div>
            <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Vector Calculator</h3>
            <p style="font-size: 0.85rem; color: var(--text-secondary);">Dot, cross products and magnitude.</p>
        </a>
    </div>

    <!-- Chemistry Tools -->
    <h2 style="margin-bottom: 24px; font-size: 1.5rem; border-bottom: 1px solid var(--border-color); padding-bottom: 12px;">Chemistry</h2>
    <div class="grid grid-cols-4 mb-8">
        <a href="tools/molar.php" class="glass-panel" style="padding: 24px; text-align: center; display: block;">
            <div style="font-size: 2rem; margin-bottom: 12px;">⚖️</div>
            <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Molar Mass</h3>
            <p style="font-size: 0.85rem; color: var(--text-secondary);">Calculate molar mass from formulas.</p>
        </a>
        <a href="tools/ph.php" class="glass-panel" style="padding: 24px; text-align: center; display: block;">
            <div style="font-size: 2rem; margin-bottom: 12px;">🧪</div>
            <h3 style="font-size: 1.1rem; margin-bottom: 8px;">pH Calculator</h3>
            <p style="font-size: 0.85rem; color: var(--text-secondary);">Acid-base equilibrium calculations.</p>
        </a>
        <a href="tools/periodic.php" class="glass-panel" style="padding: 24px; text-align: center; display: block;">
            <div style="font-size: 2rem; margin-bottom: 12px;">📋</div>
            <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Periodic Table</h3>
            <p style="font-size: 0.85rem; color: var(--text-secondary);">Interactive properties table.</p>
        </a>
    </div>

    <!-- General Tools -->
    <h2 style="margin-bottom: 24px; font-size: 1.5rem; border-bottom: 1px solid var(--border-color); padding-bottom: 12px;">General</h2>
    <div class="grid grid-cols-4 mb-8">
        <a href="tools/pomodoro.php" class="glass-panel" style="padding: 24px; text-align: center; display: block;">
            <div style="font-size: 2rem; margin-bottom: 12px;">🍅</div>
            <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Pomodoro Timer</h3>
            <p style="font-size: 0.85rem; color: var(--text-secondary);">Study technique timer.</p>
        </a>
        <a href="tools/notes.php" class="glass-panel" style="padding: 24px; text-align: center; display: block;">
            <div style="font-size: 2rem; margin-bottom: 12px;">📝</div>
            <h3 style="font-size: 1.1rem; margin-bottom: 8px;">Scratchpad</h3>
            <p style="font-size: 0.85rem; color: var(--text-secondary);">Quick offline notes.</p>
        </a>
    </div>

</div>

<?php require_once 'includes/footer.php'; ?>

<?php require_once 'includes/header.php'; ?>

<div class="container">
    <div style="text-align: center; margin-bottom: 40px; margin-top: 20px;">
        <h1 style="font-size: 2.5rem; margin-bottom: 16px;">Past <span style="color: var(--accent-color);">Papers</span> Database</h1>
        <p style="color: var(--text-secondary); max-width: 600px; margin: 0 auto;">Comprehensive collection of O/L and A/L past papers, marking schemes, and model papers.</p>
    </div>

    <!-- Filters Section -->
    <div class="glass-panel" style="padding: 24px; margin-bottom: 40px;">
        <form action="" method="GET" class="grid grid-cols-4 gap-4">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: 500; font-size: 0.9rem;">Level</label>
                <select name="level" class="form-control">
                    <option value="">All Levels</option>
                    <option value="ol">O/L (Ordinary Level)</option>
                    <option value="al">A/L (Advanced Level)</option>
                </select>
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: 500; font-size: 0.9rem;">Medium</label>
                <select name="medium" class="form-control">
                    <option value="">All Mediums</option>
                    <option value="sinhala">Sinhala</option>
                    <option value="tamil">Tamil</option>
                    <option value="english">English</option>
                </select>
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: 500; font-size: 0.9rem;">Subject</label>
                <select name="subject" class="form-control">
                    <option value="">Select Subject</option>
                    <option value="maths">Combined Maths</option>
                    <option value="physics">Physics</option>
                    <option value="chemistry">Chemistry</option>
                    <option value="biology">Biology</option>
                    <option value="science">Science (O/L)</option>
                </select>
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: 500; font-size: 0.9rem;">Year</label>
                <select name="year" class="form-control">
                    <option value="">All Years</option>
                    <?php for($y = date('Y'); $y >= 2010; $y--): ?>
                        <option value="<?= $y ?>"><?= $y ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div style="grid-column: span 4; display: flex; gap: 12px; margin-top: 12px;">
                <input type="text" name="q" class="form-control" placeholder="Search by paper name or keyword..." style="flex: 1;">
                <button type="submit" class="btn btn-primary" style="white-space: nowrap;">Search Papers</button>
            </div>
        </form>
    </div>

    <!-- Results Table -->
    <div class="glass-panel" style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="border-bottom: 1px solid var(--border-color); background: rgba(0,0,0,0.02);">
                    <th style="padding: 16px 24px; font-weight: 600;">Paper Name</th>
                    <th style="padding: 16px 24px; font-weight: 600;">Subject</th>
                    <th style="padding: 16px 24px; font-weight: 600;">Year</th>
                    <th style="padding: 16px 24px; font-weight: 600;">Medium</th>
                    <th style="padding: 16px 24px; font-weight: 600; text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Placeholder row -->
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 16px 24px;">A/L Combined Maths Paper I & II</td>
                    <td style="padding: 16px 24px;"><span style="background: rgba(59, 130, 246, 0.1); color: var(--accent-color); padding: 4px 12px; border-radius: var(--radius-full); font-size: 0.85rem; font-weight: 600;">Combined Maths</span></td>
                    <td style="padding: 16px 24px;">2023</td>
                    <td style="padding: 16px 24px;">Sinhala</td>
                    <td style="padding: 16px 24px; text-align: right;">
                        <a href="#" class="btn btn-secondary" style="padding: 6px 12px; font-size: 0.85rem; margin-right: 8px;">Preview</a>
                        <a href="#" class="btn btn-primary" style="padding: 6px 12px; font-size: 0.85rem;">Download</a>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <td style="padding: 16px 24px;">A/L Physics Marking Scheme</td>
                    <td style="padding: 16px 24px;"><span style="background: rgba(139, 92, 246, 0.1); color: #8b5cf6; padding: 4px 12px; border-radius: var(--radius-full); font-size: 0.85rem; font-weight: 600;">Physics</span></td>
                    <td style="padding: 16px 24px;">2023</td>
                    <td style="padding: 16px 24px;">English</td>
                    <td style="padding: 16px 24px; text-align: right;">
                        <a href="#" class="btn btn-secondary" style="padding: 6px 12px; font-size: 0.85rem; margin-right: 8px;">Preview</a>
                        <a href="#" class="btn btn-primary" style="padding: 6px 12px; font-size: 0.85rem;">Download</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="padding: 32px; text-align: center; color: var(--text-secondary);">
                        <p>More papers loaded dynamically from the database.</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

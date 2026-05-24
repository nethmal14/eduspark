<?php 
require_once 'includes/header.php'; 

// Basic Admin Protection
// if (!isset($_SESSION['is_admin'])) { header("Location: index.php"); exit; }

$view = $_GET['view'] ?? 'dashboard';
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
                    <li><a href="?view=dashboard" class="nav-link <?= $view === 'dashboard' ? 'active' : '' ?>" style="display: block; padding: 12px; border-radius: var(--radius-md); <?= $view === 'dashboard' ? 'background: rgba(59, 130, 246, 0.1); color: var(--accent-color); font-weight: 600;' : '' ?>">Dashboard Home</a></li>
                    <li><a href="?view=users" class="nav-link <?= $view === 'users' ? 'active' : '' ?>" style="display: block; padding: 12px; border-radius: var(--radius-md); <?= $view === 'users' ? 'background: rgba(59, 130, 246, 0.1); color: var(--accent-color); font-weight: 600;' : '' ?>">Manage Users</a></li>
                    <li><a href="?view=papers" class="nav-link <?= $view === 'papers' ? 'active' : '' ?>" style="display: block; padding: 12px; border-radius: var(--radius-md); <?= $view === 'papers' ? 'background: rgba(59, 130, 246, 0.1); color: var(--accent-color); font-weight: 600;' : '' ?>">Manage Papers</a></li>
                    <li><a href="?view=forum" class="nav-link <?= $view === 'forum' ? 'active' : '' ?>" style="display: block; padding: 12px; border-radius: var(--radius-md); <?= $view === 'forum' ? 'background: rgba(59, 130, 246, 0.1); color: var(--accent-color); font-weight: 600;' : '' ?>">Forum Moderation</a></li>
                    <li><a href="?view=news" class="nav-link <?= $view === 'news' ? 'active' : '' ?>" style="display: block; padding: 12px; border-radius: var(--radius-md); <?= $view === 'news' ? 'background: rgba(59, 130, 246, 0.1); color: var(--accent-color); font-weight: 600;' : '' ?>">News Editor</a></li>
                    <li><a href="?view=update" class="nav-link <?= $view === 'update' ? 'active' : '' ?>" style="display: block; padding: 12px; border-radius: var(--radius-md); <?= $view === 'update' ? 'background: rgba(59, 130, 246, 0.1); color: var(--accent-color); font-weight: 600;' : '' ?>">System Update (GitHub)</a></li>
                </ul>
            </div>
        </aside>

        <!-- Main Panel Content -->
        <div class="glass-panel" style="padding: 24px;">
            <?php if ($view === 'update'): ?>
                <!-- GITHUB LIVE UPDATER SECTION -->
                <div class="flex items-center justify-between" style="margin-bottom: 24px; border-bottom: 1px solid var(--border-color); padding-bottom: 16px;">
                    <div>
                        <h3 style="font-size: 1.5rem; margin-bottom: 4px;">GitHub Live Updater</h3>
                        <p style="color: var(--text-secondary); font-size: 0.9rem;">Synchronize this local site directly with your remote GitHub repository.</p>
                    </div>
                    <span class="status-badge status-idle" id="updater-badge">Connected</span>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="update-info-card">
                        <span class="info-label">GitHub Repository:</span>
                        <a href="<?= GITHUB_REPO_URL ?>" target="_blank" class="info-value repo-link"><?= GITHUB_REPO_URL ?> ↗</a>
                    </div>
                    <div class="update-info-card">
                        <span class="info-label">Updater Status:</span>
                        <span class="info-value" id="updater-status-text">Ready to Sync</span>
                    </div>
                </div>

                <div class="update-settings glass-panel" style="padding: 20px; margin-bottom: 24px; background: rgba(59, 130, 246, 0.02);">
                    <h4 style="margin-bottom: 12px; font-size: 1.1rem; color: var(--text-primary);">Update Protocol Settings</h4>
                    <div class="flex gap-4" style="flex-wrap: wrap;">
                        <label class="radio-label">
                            <input type="radio" name="update_method" value="auto" checked>
                            <span class="radio-custom"></span>
                            <div class="radio-text">
                                <strong>Auto Detect (Recommended)</strong>
                                <small>Uses Git if available, automatically falls back to Zip extraction.</small>
                            </div>
                        </label>
                        
                        <label class="radio-label">
                            <input type="radio" name="update_method" value="git">
                            <span class="radio-custom"></span>
                            <div class="radio-text">
                                <strong>Git Direct</strong>
                                <small>Executes git pull / git reset --hard to perfectly sync repositories.</small>
                            </div>
                        </label>

                        <label class="radio-label">
                            <input type="radio" name="update_method" value="zip">
                            <span class="radio-custom"></span>
                            <div class="radio-text">
                                <strong>Zipball Overwrite</strong>
                                <small>Downloads latest zip from GitHub, extracts and overwrites files.</small>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Update Trigger and Process Tracking -->
                <div class="flex items-center gap-4 mb-6">
                    <button id="start-update-btn" class="btn btn-primary" style="padding: 14px 32px; font-size: 1rem;">
                        <svg class="sync-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
                        Sync Code from GitHub
                    </button>
                    <button id="refresh-site-btn" class="btn btn-secondary" style="display: none; padding: 14px 24px;" onclick="window.location.reload();">
                        Refresh Dashboard
                    </button>
                </div>

                <!-- Step progress indicators -->
                <div id="progress-steps-container" style="display: none; margin-bottom: 24px;">
                    <div class="progress-bar-container">
                        <div class="progress-bar-fill" id="update-progress-bar"></div>
                    </div>
                    
                    <ul class="progress-step-list">
                        <li class="step-item" id="step-diagnose">
                            <span class="step-icon"></span>
                            Diagnosing environment & write permissions...
                        </li>
                        <li class="step-item" id="step-download">
                            <span class="step-icon"></span>
                            Fetching repository updates from GitHub...
                        </li>
                        <li class="step-item" id="step-apply">
                            <span class="step-icon"></span>
                            Applying updates & overwriting file assets...
                        </li>
                        <li class="step-item" id="step-cleanup">
                            <span class="step-icon"></span>
                            Finalizing sync & reloading system configuration...
                        </li>
                    </ul>
                </div>

                <!-- Live Command Line Terminal -->
                <div class="terminal-container" id="terminal-log-box" style="display: none;">
                    <div class="terminal-header">
                        <div class="terminal-dots">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <span class="terminal-title">live_updater_console.log</span>
                        <button class="terminal-copy-btn" onclick="copyConsoleLogs()">Copy Log</button>
                    </div>
                    <pre class="terminal-body" id="terminal-body-output">Console initialized. Awaiting user interaction...</pre>
                </div>

                <script>
                    function copyConsoleLogs() {
                        const consoleText = document.getElementById('terminal-body-output').innerText;
                        navigator.clipboard.writeText(consoleText);
                        alert('Logs copied to clipboard!');
                    }

                    document.getElementById('start-update-btn').addEventListener('click', async () => {
                        const btn = document.getElementById('start-update-btn');
                        const refreshBtn = document.getElementById('refresh-site-btn');
                        const badge = document.getElementById('updater-badge');
                        const statusText = document.getElementById('updater-status-text');
                        const stepsContainer = document.getElementById('progress-steps-container');
                        const termContainer = document.getElementById('terminal-log-box');
                        const term = document.getElementById('terminal-body-output');
                        const progressBar = document.getElementById('update-progress-bar');
                        
                        const method = document.querySelector('input[name="update_method"]:checked').value;
                        
                        // UI Setup for running state
                        btn.disabled = true;
                        btn.innerHTML = '<svg class="sync-icon spin" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg> Synchronizing...';
                        
                        badge.className = 'status-badge status-syncing';
                        badge.innerText = 'Syncing';
                        statusText.innerText = 'Running codebase update...';
                        
                        stepsContainer.style.display = 'block';
                        termContainer.style.display = 'block';
                        term.innerText = '';
                        
                        progressBar.style.width = '5%';
                        resetSteps();
                        
                        const logToTerm = (msg) => {
                            const date = new Date().toLocaleTimeString();
                            term.innerText += `[${date}] ${msg}\n`;
                            term.scrollTop = term.scrollHeight;
                        };
                        
                        try {
                            // Step 1: Diagnose
                            setStepState('step-diagnose', 'running');
                            logToTerm('Checking local environment and system privileges...');
                            
                            const checkResponse = await fetch('update_handler.php?action=check');
                            const checkResult = await checkResponse.json();
                            
                            checkResult.log.forEach(l => logToTerm(l));
                            progressBar.style.width = '25%';
                            
                            if (!checkResult.success) {
                                throw new Error('Environment pre-check failed.');
                            }
                            
                            setStepState('step-diagnose', 'success');
                            
                            // Step 2: Download & Fetch Decisions
                            setStepState('step-download', 'running');
                            let runZip = false;
                            
                            if (method === 'zip') {
                                runZip = true;
                            } else if (method === 'git') {
                                if (!checkResult.git_available) {
                                    throw new Error('Git command-line client is not installed or available on this host server.');
                                }
                            } else { // auto
                                if (!checkResult.git_available) {
                                    logToTerm('[INFO] Git not found. Selecting robust Zipball extraction method...');
                                    runZip = true;
                                }
                            }
                            
                            progressBar.style.width = '50%';
                            
                            if (runZip) {
                                logToTerm('Downloading project zipball directly from GitHub archive...');
                                const zipResponse = await fetch('update_handler.php?action=update_zip');
                                const zipResult = await zipResponse.json();
                                
                                setStepState('step-download', 'success');
                                setStepState('step-apply', 'running');
                                
                                zipResult.log.forEach(l => logToTerm(l));
                                progressBar.style.width = '85%';
                                
                                if (!zipResult.success) {
                                    throw new Error('Zipball update failed.');
                                }
                            } else {
                                logToTerm('Initializing Git and fetching remote updates from repository...');
                                const gitResponse = await fetch('update_handler.php?action=update_git');
                                const gitResult = await gitResponse.json();
                                
                                setStepState('step-download', 'success');
                                setStepState('step-apply', 'running');
                                
                                gitResult.log.forEach(l => logToTerm(l));
                                progressBar.style.width = '85%';
                                
                                if (!gitResult.success) {
                                    logToTerm('[WARNING] Git update failed. Falling back to Zipball extraction method...');
                                    logToTerm('Downloading project zipball directly from GitHub archive...');
                                    
                                    const zipResponse = await fetch('update_handler.php?action=update_zip');
                                    const zipResult = await zipResponse.json();
                                    
                                    zipResult.log.forEach(l => logToTerm(l));
                                    if (!zipResult.success) {
                                        throw new Error('Git update failed AND Fallback Zipball extraction failed.');
                                    }
                                }
                            }
                            
                            setStepState('step-apply', 'success');
                            
                            // Step 4: Cleanup & Finalize
                            setStepState('step-cleanup', 'running');
                            logToTerm('Checking site configuration and clearing temporary caches...');
                            progressBar.style.width = '100%';
                            setStepState('step-cleanup', 'success');
                            
                            // Done
                            logToTerm('[SUCCESS] ALL OPERATIONS COMPLETED! THE SITE IS NOW UP TO DATE.');
                            badge.className = 'status-badge status-idle';
                            badge.innerText = 'Up to Date';
                            statusText.innerHTML = '<span style="color: #10b981; font-weight:600;">Success! Platform updated.</span>';
                            
                            refreshBtn.style.display = 'inline-flex';
                            
                        } catch (error) {
                            logToTerm(`[FATAL ERROR] Update process aborted: ${error.message}`);
                            badge.className = 'status-badge status-error';
                            badge.innerText = 'Failed';
                            statusText.innerHTML = '<span style="color: #ef4444; font-weight:600;">Update failed. Check terminal logs.</span>';
                            
                            // Mark currently active or remaining steps as failed
                            markRemainingFailed();
                        } finally {
                            btn.disabled = false;
                            btn.innerHTML = '<svg class="sync-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg> Sync Code from GitHub';
                        }
                    });
                    
                    function resetSteps() {
                        const steps = ['step-diagnose', 'step-download', 'step-apply', 'step-cleanup'];
                        steps.forEach(id => {
                            const el = document.getElementById(id);
                            el.className = 'step-item';
                        });
                    }
                    
                    function setStepState(id, state) {
                        const el = document.getElementById(id);
                        el.className = `step-item step-${state}`;
                    }
                    
                    function markRemainingFailed() {
                        const steps = ['step-diagnose', 'step-download', 'step-apply', 'step-cleanup'];
                        steps.forEach(id => {
                            const el = document.getElementById(id);
                            if (el.classList.contains('step-running') || (!el.classList.contains('step-success') && !el.classList.contains('step-failed'))) {
                                el.className = 'step-item step-failed';
                            }
                        });
                    }
                </script>
            <?php else: ?>
                <!-- DEFAULT DASHBOARD VIEW -->
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
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>


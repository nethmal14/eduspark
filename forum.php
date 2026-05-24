<?php require_once 'includes/header.php'; ?>

<div class="container">
    <div class="flex items-center justify-between" style="margin-bottom: 40px; margin-top: 20px;">
        <div>
            <h1 style="font-size: 2.5rem; margin-bottom: 8px;">Student <span style="color: var(--accent-color);">Forum</span></h1>
            <p style="color: var(--text-secondary);">Discuss past papers, ask questions, and share knowledge.</p>
        </div>
        <a href="create_thread.php" class="btn btn-primary">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            New Discussion
        </a>
    </div>

    <div class="grid" style="grid-template-columns: 1fr 3fr; gap: 32px;">
        <!-- Sidebar Categories -->
        <aside>
            <div class="glass-panel" style="padding: 24px;">
                <h3 style="margin-bottom: 16px; font-size: 1.1rem; border-bottom: 1px solid var(--border-color); padding-bottom: 12px;">Categories</h3>
                <ul style="list-style: none; display: flex; flex-direction: column; gap: 12px;">
                    <li><a href="?cat=all" class="nav-link active" style="display: flex; justify-content: space-between;">All Discussions <span style="background: var(--bg-secondary); padding: 2px 8px; border-radius: var(--radius-full); font-size: 0.8rem;">1.2k</span></a></li>
                    <li><a href="?cat=maths" class="nav-link" style="display: flex; justify-content: space-between;">Combined Maths <span style="background: var(--bg-secondary); padding: 2px 8px; border-radius: var(--radius-full); font-size: 0.8rem;">342</span></a></li>
                    <li><a href="?cat=physics" class="nav-link" style="display: flex; justify-content: space-between;">Physics <span style="background: var(--bg-secondary); padding: 2px 8px; border-radius: var(--radius-full); font-size: 0.8rem;">289</span></a></li>
                    <li><a href="?cat=chemistry" class="nav-link" style="display: flex; justify-content: space-between;">Chemistry <span style="background: var(--bg-secondary); padding: 2px 8px; border-radius: var(--radius-full); font-size: 0.8rem;">410</span></a></li>
                    <li><a href="?cat=biology" class="nav-link" style="display: flex; justify-content: space-between;">Biology <span style="background: var(--bg-secondary); padding: 2px 8px; border-radius: var(--radius-full); font-size: 0.8rem;">156</span></a></li>
                    <li><a href="?cat=general" class="nav-link" style="display: flex; justify-content: space-between;">General/Study Tips <span style="background: var(--bg-secondary); padding: 2px 8px; border-radius: var(--radius-full); font-size: 0.8rem;">89</span></a></li>
                </ul>
            </div>
        </aside>

        <!-- Threads Feed -->
        <div>
            <!-- Search & Filter -->
            <div class="glass-panel flex justify-between items-center" style="padding: 16px 24px; margin-bottom: 24px;">
                <input type="text" class="form-control" placeholder="Search discussions..." style="max-width: 400px; margin-bottom: 0;">
                <select class="form-control" style="max-width: 200px; margin-bottom: 0;">
                    <option>Latest</option>
                    <option>Top Voted</option>
                    <option>Unanswered</option>
                </select>
            </div>

            <!-- Thread Item -->
            <div class="glass-panel" style="padding: 24px; margin-bottom: 16px; transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'">
                <div class="flex gap-4">
                    <!-- Upvotes -->
                    <div style="display: flex; flex-direction: column; align-items: center; gap: 8px;">
                        <button style="background: none; border: none; color: var(--text-secondary); cursor: pointer;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="18 15 12 9 6 15"></polyline></svg></button>
                        <span style="font-weight: 700; color: var(--accent-color);">42</span>
                        <button style="background: none; border: none; color: var(--text-secondary); cursor: pointer;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                    </div>
                    <!-- Content -->
                    <div style="flex: 1;">
                        <div class="flex items-center gap-2 mb-4" style="font-size: 0.85rem; color: var(--text-secondary);">
                            <span style="background: rgba(59, 130, 246, 0.1); color: var(--accent-color); padding: 2px 10px; border-radius: var(--radius-full); font-weight: 600;">Combined Maths</span>
                            <span>•</span>
                            <span>Posted by <a href="#" style="font-weight: 600; color: var(--text-primary);">KamalP</a></span>
                            <span>•</span>
                            <span>2 hours ago</span>
                        </div>
                        <h2 style="font-size: 1.25rem; margin-bottom: 8px;"><a href="thread.php?id=1" style="color: var(--text-primary);">Need help with Integration 2021 Paper II Q14</a></h2>
                        <p style="color: var(--text-secondary); margin-bottom: 16px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">I've been trying to solve the partial fractions part but I keep getting the wrong coefficients. Can someone explain the method used in the marking scheme?</p>
                        
                        <div class="flex gap-4 text-secondary" style="font-size: 0.9rem; color: var(--text-secondary);">
                            <span class="flex items-center gap-2"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg> 12 Replies</span>
                            <span class="flex items-center gap-2"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> 156 Views</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Thread Item 2 -->
            <div class="glass-panel" style="padding: 24px; margin-bottom: 16px; transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'">
                <div class="flex gap-4">
                    <div style="display: flex; flex-direction: column; align-items: center; gap: 8px;">
                        <button style="background: none; border: none; color: var(--text-secondary); cursor: pointer;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="18 15 12 9 6 15"></polyline></svg></button>
                        <span style="font-weight: 700; color: var(--text-secondary);">18</span>
                        <button style="background: none; border: none; color: var(--text-secondary); cursor: pointer;"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                    </div>
                    <div style="flex: 1;">
                        <div class="flex items-center gap-2 mb-4" style="font-size: 0.85rem; color: var(--text-secondary);">
                            <span style="background: rgba(16, 185, 129, 0.1); color: #10b981; padding: 2px 10px; border-radius: var(--radius-full); font-weight: 600;">Study Tips</span>
                            <span>•</span>
                            <span>Posted by <a href="#" style="font-weight: 600; color: var(--text-primary);">Anonymous</a></span>
                            <span>•</span>
                            <span>5 hours ago</span>
                        </div>
                        <h2 style="font-size: 1.25rem; margin-bottom: 8px;"><a href="thread.php?id=2" style="color: var(--text-primary);">How to manage time during the O/L Science paper?</a></h2>
                        <p style="color: var(--text-secondary); margin-bottom: 16px;">I always run out of time when writing the essay type questions. Any tips on time allocation?</p>
                        
                        <div class="flex gap-4 text-secondary" style="font-size: 0.9rem; color: var(--text-secondary);">
                            <span class="flex items-center gap-2"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg> 8 Replies</span>
                            <span class="flex items-center gap-2"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> 92 Views</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center gap-2 mt-4" style="margin-top: 32px;">
                <a href="#" class="btn btn-secondary" style="padding: 8px 16px;">Previous</a>
                <a href="#" class="btn btn-primary" style="padding: 8px 16px;">1</a>
                <a href="#" class="btn btn-secondary" style="padding: 8px 16px;">2</a>
                <a href="#" class="btn btn-secondary" style="padding: 8px 16px;">3</a>
                <a href="#" class="btn btn-secondary" style="padding: 8px 16px;">Next</a>
            </div>

        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

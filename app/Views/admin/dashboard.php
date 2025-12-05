<div class="pt-16 min-h-screen bg-light-gray">
    <div class="container mx-auto px-4 sm:px-6 py-8">
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-navy mb-2">Admin Dashboard</h1>
                <p class="text-muted-foreground">Manage contact form submissions</p>
            </div>
            <form action="<?= $view->url('/admin/logout') ?>" method="POST" class="inline">
                <input type="hidden" name="csrf_token" value="<?= $view->escape($csrfToken ?? '') ?>">
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition-colors">
                    Logout
                </button>
            </form>
        </div>

        <?php if (isset($unreadCount) && $unreadCount > 0): ?>
            <div class="mb-6 p-4 bg-blue-100 border border-blue-400 text-blue-700 rounded-md">
                You have <?= $unreadCount ?> unread submission<?= $unreadCount !== 1 ? 's' : '' ?>.
            </div>
        <?php endif; ?>

        <div class="bg-card rounded-2xl shadow-lg border border-border/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-light-gray">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-navy">Date</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-navy">Name</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-navy">Email</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-navy">Phone</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-navy">Status</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-navy w-48">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        <?php if (empty($submissions)): ?>
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-muted-foreground">
                                    No submissions yet.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($submissions as $submission): ?>
                                <tr class="hover:bg-light-gray/50 <?= !$submission['is_read'] ? 'bg-blue-50' : '' ?>" data-submission-id="<?= $submission['id'] ?>">
                                    <td class="px-6 py-4 text-sm">
                                        <?= date('M j, Y g:i A', strtotime($submission['created_at'])) ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-navy">
                                        <?= $view->escape($submission['name']) ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <a href="mailto:<?= $view->escape($submission['email']) ?>" class="text-royal-blue hover:text-accent transition-colors">
                                            <?= $view->escape($submission['email']) ?>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <?= $submission['phone'] ? $view->escape($submission['phone']) : '—' ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <?php if ($submission['is_read']): ?>
                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-xs">Read</span>
                                        <?php else: ?>
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded text-xs">Unread</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm">
                                        <div class="flex flex-col gap-2.5 min-w-[140px]">
                                            <button
                                                type="button"
                                                class="w-full text-left px-3 py-1.5 text-xs font-medium text-royal-blue hover:bg-royal-blue/10 hover:text-accent rounded-md transition-colors admin-action-btn border border-royal-blue/20"
                                                data-action="toggle-read"
                                                data-id="<?= $submission['id'] ?>"
                                                data-is-read="<?= $submission['is_read'] ? '1' : '0' ?>"
                                            >
                                                <?= $submission['is_read'] ? 'Mark Unread' : 'Mark Read' ?>
                                            </button>
                                            <button
                                                type="button"
                                                class="w-full text-left px-3 py-1.5 text-xs font-medium text-royal-blue hover:bg-royal-blue/10 hover:text-accent rounded-md transition-colors admin-action-btn border border-royal-blue/20"
                                                data-action="view"
                                                data-id="<?= $submission['id'] ?>"
                                            >
                                                View Message
                                            </button>
                                            <?php
                                            $replySubject = 'Re: Contact Form Inquiry from ' . $submission['name'];
                                            $replyBody = "Dear " . $submission['name'] . ",\n\nThank you for contacting HPG Kapital.\n\nRegarding your inquiry:\n\n" . $submission['message'] . "\n\nBest regards,\nHPG Kapital Team";
                                            ?>
                                            <a
                                                href="mailto:<?= $view->escape($submission['email']) ?>?subject=<?= rawurlencode($replySubject) ?>&body=<?= rawurlencode($replyBody) ?>"
                                                class="w-full text-left px-3 py-1.5 text-xs font-medium text-luxury-red hover:bg-luxury-red/10 hover:text-luxury-red rounded-md transition-colors admin-action-btn border border-luxury-red/20 inline-block"
                                                target="_blank"
                                            >
                                                Reply via Email
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr id="message-<?= $submission['id'] ?>" class="hidden">
                                    <td colspan="6" class="px-6 py-4 bg-light-gray">
                                        <div class="mb-4">
                                            <strong class="text-navy">Full Message:</strong>
                                        </div>
                                        <div class="text-sm text-muted-foreground whitespace-pre-wrap mb-4 p-4 bg-white rounded border border-border/50">
                                            <?= $view->escape($submission['message']) ?>
                                        </div>
                                        <div class="flex gap-3">
                                            <?php
                                            $replySubject = 'Re: Contact Form Inquiry from ' . $submission['name'];
                                            $replyBody = "Dear " . $submission['name'] . ",\n\nThank you for contacting HPG Kapital.\n\nRegarding your inquiry:\n\n" . $submission['message'] . "\n\nBest regards,\nHPG Kapital Team";
                                            ?>
                                            <a
                                                href="mailto:<?= $view->escape($submission['email']) ?>?subject=<?= rawurlencode($replySubject) ?>&body=<?= rawurlencode($replyBody) ?>"
                                                class="inline-block bg-luxury-red hover:bg-luxury-red/90 text-white px-6 py-2.5 rounded-md text-sm font-semibold transition-colors shadow-sm hover:shadow-md"
                                                target="_blank"
                                            >
                                                Reply via Email
                                            </a>
                                            <button
                                                type="button"
                                                class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2.5 rounded-md text-sm font-semibold transition-colors shadow-sm hover:shadow-md admin-action-btn"
                                                data-action="view"
                                                data-id="<?= $submission['id'] ?>"
                                            >
                                                Close
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php if (isset($pagination) && $pagination['total_pages'] > 1): ?>
            <div class="mt-6 flex items-center justify-between">
                <div class="text-sm text-muted-foreground">
                    Showing <?= (($pagination['current_page'] - 1) * $pagination['per_page']) + 1 ?> to 
                    <?= min($pagination['current_page'] * $pagination['per_page'], $pagination['total_items']) ?> 
                    of <?= $pagination['total_items'] ?> submissions
                </div>
                <div class="flex gap-2">
                    <?php if ($pagination['has_prev']): ?>
                        <a 
                            href="?page=<?= $pagination['current_page'] - 1 ?>" 
                            class="px-4 py-2 bg-royal-blue text-white rounded-md hover:bg-royal-blue/90 transition-colors"
                        >
                            Previous
                        </a>
                    <?php else: ?>
                        <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded-md cursor-not-allowed">Previous</span>
                    <?php endif; ?>
                    
                    <span class="px-4 py-2 bg-light-gray text-navy rounded-md">
                        Page <?= $pagination['current_page'] ?> of <?= $pagination['total_pages'] ?>
                    </span>
                    
                    <?php if ($pagination['has_next']): ?>
                        <a 
                            href="?page=<?= $pagination['current_page'] + 1 ?>" 
                            class="px-4 py-2 bg-royal-blue text-white rounded-md hover:bg-royal-blue/90 transition-colors"
                        >
                            Next
                        </a>
                    <?php else: ?>
                        <span class="px-4 py-2 bg-gray-300 text-gray-500 rounded-md cursor-not-allowed">Next</span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
(function() {
    const csrfToken = <?= json_encode($csrfToken ?? '') ?>;
    
    // Handle all admin actions
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.admin-action-btn');
        if (!btn) return;
        
        const action = btn.getAttribute('data-action');
        const id = btn.getAttribute('data-id');
        
        if (action === 'toggle-read') {
            e.preventDefault();
            const isRead = btn.getAttribute('data-is-read') === '1';
            
            const formData = new FormData();
            formData.append('csrf_token', csrfToken);
            formData.append('action', isRead ? 'unread' : 'read');
            
            fetch('/admin/submissions/' + id + '/read', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error: ' + (data.message || 'Failed to update status'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error updating submission status');
            });
        } else if (action === 'view') {
            e.preventDefault();
            const row = document.getElementById('message-' + id);
            if (row) {
                row.classList.toggle('hidden');
            }
        }
    });
})();
</script>

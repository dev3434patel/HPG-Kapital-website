<div class="min-h-screen flex items-center justify-center bg-light-gray pt-16">
    <div class="w-full max-w-md px-6">
        <div class="bg-card rounded-2xl p-8 shadow-xl border border-border/50">
            <h1 class="text-3xl font-bold text-navy mb-6 text-center">Admin Login</h1>
            
            <?php if (isset($error)): ?>
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md">
                    <?php
                    $errorMessages = [
                        'invalid_credentials' => 'Invalid email or password.',
                        'missing_fields' => 'Please fill in all fields.',
                        'invalid_email' => 'Invalid email format.',
                        'rate_limit' => 'Too many login attempts. Please try again later.',
                        'session_expired' => 'Your session has expired. Please log in again.',
                    ];
                    echo $view->escape($errorMessages[$error] ?? 'An error occurred. Please try again.');
                    ?>
                </div>
            <?php endif; ?>

            <form action="<?= $view->url('/admin/login') ?>" method="POST" class="space-y-6">
                <input type="hidden" name="csrf_token" value="<?= $view->escape($csrfToken ?? '') ?>">
                
                <div>
                    <label for="email" class="block text-sm font-semibold text-navy mb-2">
                        Email
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        placeholder="admin@example.com"
                        class="w-full px-4 py-3 border border-border rounded-md focus:outline-none focus:ring-2 focus:ring-royal-blue"
                        autocomplete="email"
                    >
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-navy mb-2">
                        Password
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        placeholder="Enter your password"
                        class="w-full px-4 py-3 border border-border rounded-md focus:outline-none focus:ring-2 focus:ring-royal-blue"
                        autocomplete="current-password"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full bg-luxury-red hover:bg-luxury-red/90 text-white font-semibold uppercase tracking-wider min-h-[44px] touch-target px-6 py-5 rounded-md transition-colors"
                >
                    Login
                </button>
            </form>
        </div>
    </div>
</div>


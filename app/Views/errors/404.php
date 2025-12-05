<div class="pt-16 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-6xl sm:text-8xl font-bold text-navy mb-4">404</h1>
        <h2 class="text-2xl sm:text-3xl font-bold text-navy mb-4">Page Not Found</h2>
        <p class="text-lg text-muted-foreground mb-8 max-w-md mx-auto">
            The page you're looking for doesn't exist or has been moved.
        </p>
        <a 
            href="<?= $view->url('/') ?>"
            class="inline-block bg-luxury-red hover:bg-luxury-red/90 text-white font-semibold uppercase tracking-wider px-6 sm:px-8 py-5 sm:py-6 rounded-md transition-colors"
        >
            Return Home
        </a>
    </div>
</div>


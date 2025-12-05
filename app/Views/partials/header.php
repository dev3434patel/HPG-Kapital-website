<?php
$currentPath = $_SERVER['REQUEST_URI'] ?? '/';
$isActive = function($path) use ($currentPath) {
    return $currentPath === $path || ($path !== '/' && strpos($currentPath, $path) === 0);
};
?>
<header id="main-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-white/95 backdrop-blur-sm" data-scrolled="bg-background/95 backdrop-blur-xl shadow-lg">
    <div class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <a href="<?= $view->url('/') ?>" class="flex items-center" aria-label="HPG Kapital Home">
                <img 
                    src="<?= $view->asset('images/HPG LOGO TP.png') ?>" 
                    alt="HPG Kapital Logo" 
                    class="h-16 w-auto object-contain"
                    loading="eager"
                    onerror="this.src='<?= $view->asset('images/placeholder.svg') ?>'; this.alt='HPG Kapital';"
                />
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-8" aria-label="Main navigation">
                <a
                    href="<?= $view->url('/') ?>"
                    class="text-sm font-medium text-foreground hover:text-primary transition-colors <?= $isActive('/') ? 'text-primary' : '' ?>"
                >
                    Home
                </a>
                <a
                    href="<?= $view->url('/about') ?>"
                    class="text-sm font-medium text-foreground hover:text-primary transition-colors <?= $isActive('/about') ? 'text-primary' : '' ?>"
                >
                    About
                </a>
                
                <div class="relative group" aria-label="Services menu">
                    <button 
                        class="flex items-center space-x-1 text-sm font-medium text-foreground hover:text-primary transition-colors"
                        aria-expanded="false"
                        aria-haspopup="true"
                        id="services-menu-button"
                    >
                        <span>Services</span>
                        <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <div 
                        class="absolute top-full left-0 mt-2 w-64 bg-background/80 backdrop-blur-xl rounded-2xl shadow-2xl border border-border/50 overflow-hidden opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200"
                        role="menu"
                        aria-labelledby="services-menu-button"
                    >
                        <a href="<?= $view->url('/capital-markets') ?>" class="block px-6 py-3 text-sm text-foreground hover:bg-accent/10 hover:text-primary transition-all" role="menuitem">Capital Markets Advisory</a>
                        <a href="<?= $view->url('/eb5-advisory') ?>" class="block px-6 py-3 text-sm text-foreground hover:bg-accent/10 hover:text-primary transition-all" role="menuitem">EB-5 Advisory</a>
                        <a href="<?= $view->url('/loan-products') ?>" class="block px-6 py-3 text-sm text-foreground hover:bg-accent/10 hover:text-primary transition-all" role="menuitem">Loan Products</a>
                        <a href="<?= $view->url('/hospitality-financing') ?>" class="block px-6 py-3 text-sm text-foreground hover:bg-accent/10 hover:text-primary transition-all" role="menuitem">Hospitality Financing</a>
                        <a href="<?= $view->url('/gc-referral') ?>" class="block px-6 py-3 text-sm text-foreground hover:bg-accent/10 hover:text-primary transition-all" role="menuitem">Preferred GC Referral</a>
                    </div>
                </div>

                <a
                    href="<?= $view->url('/contact') ?>"
                    class="text-sm font-medium text-foreground hover:text-primary transition-colors <?= $isActive('/contact') ? 'text-primary' : '' ?>"
                >
                    Contact
                </a>
            </nav>

            <div class="hidden lg:block">
                <a 
                    href="<?= $view->url('/contact') ?>"
                    class="inline-block bg-luxury-red hover:bg-luxury-red/90 text-white font-semibold uppercase text-xs tracking-wider px-6 py-3 rounded-md transition-colors"
                >
                    Get Started
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button
                class="lg:hidden text-foreground min-h-[44px] min-w-[44px] touch-target flex items-center justify-center"
                onclick="toggleMobileMenu()"
                aria-label="Toggle menu"
                aria-expanded="false"
                id="mobile-menu-button"
                aria-controls="mobile-menu"
            >
                <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <nav 
            id="mobile-menu" 
            class="lg:hidden hidden overflow-hidden"
            aria-label="Mobile navigation"
        >
            <div class="flex flex-col space-y-4 pt-6 pb-4">
                <a href="<?= $view->url('/') ?>" class="text-sm font-medium text-foreground hover:text-primary">Home</a>
                <a href="<?= $view->url('/about') ?>" class="text-sm font-medium text-foreground hover:text-primary">About</a>
                <div class="space-y-2">
                    <div class="text-sm font-medium text-muted-foreground">Services</div>
                    <a href="<?= $view->url('/capital-markets') ?>" class="block pl-4 text-sm text-foreground hover:text-primary">Capital Markets Advisory</a>
                    <a href="<?= $view->url('/eb5-advisory') ?>" class="block pl-4 text-sm text-foreground hover:text-primary">EB-5 Advisory</a>
                    <a href="<?= $view->url('/loan-products') ?>" class="block pl-4 text-sm text-foreground hover:text-primary">Loan Products</a>
                    <a href="<?= $view->url('/hospitality-financing') ?>" class="block pl-4 text-sm text-foreground hover:text-primary">Hospitality Financing</a>
                    <a href="<?= $view->url('/gc-referral') ?>" class="block pl-4 text-sm text-foreground hover:text-primary">Preferred GC Referral</a>
                </div>
                <a href="<?= $view->url('/contact') ?>" class="text-sm font-medium text-foreground hover:text-primary">Contact</a>
            </div>
        </nav>
    </div>
</header>


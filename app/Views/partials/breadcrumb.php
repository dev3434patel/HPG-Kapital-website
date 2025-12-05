<?php
// Breadcrumb Component - Matches React Breadcrumb.tsx
$currentPath = $_SERVER['REQUEST_URI'] ?? '/';
$currentPath = rtrim(parse_url($currentPath, PHP_URL_PATH), '/') ?: '/';

// Don't show breadcrumb on home page
if ($currentPath === '/') {
    return;
}

$routeLabels = [
    '/' => 'Home',
    '/about' => 'About Us',
    '/capital-markets' => 'Capital Markets',
    '/eb5-advisory' => 'EB-5 Advisory',
    '/loan-products' => 'Loan Products',
    '/hospitality-financing' => 'Hospitality Financing',
    '/gc-referral' => 'GC Referral Program',
    '/contact' => 'Contact Us',
    '/admin' => 'Admin',
    '/admin/login' => 'Admin Login',
    '/admin/dashboard' => 'Admin Dashboard',
];

$pathnames = array_filter(explode('/', $currentPath));
$breadcrumbs = [['label' => 'Home', 'path' => '/']];

$currentPath = '';
foreach ($pathnames as $pathname) {
    $currentPath .= '/' . $pathname;
    $label = $routeLabels[$currentPath] ?? ucfirst(str_replace('-', ' ', $pathname));
    $breadcrumbs[] = ['label' => $label, 'path' => $currentPath];
}
?>
<nav aria-label="Breadcrumb" class="container mx-auto px-6 py-4">
    <ol class="flex items-center space-x-2 text-sm text-muted-foreground">
        <?php foreach ($breadcrumbs as $index => $crumb): ?>
            <?php $isLast = $index === count($breadcrumbs) - 1; ?>
            <li class="flex items-center">
                <?php if ($index === 0): ?>
                    <a
                        href="<?= $view->url($crumb['path']) ?>"
                        class="flex items-center hover:text-accent transition-colors"
                        aria-label="Home"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </a>
                <?php else: ?>
                    <svg class="w-4 h-4 mx-2 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <?php if ($isLast): ?>
                        <span class="text-foreground font-medium" aria-current="page">
                            <?= $view->escape($crumb['label']) ?>
                        </span>
                    <?php else: ?>
                        <a
                            href="<?= $view->url($crumb['path']) ?>"
                            class="hover:text-accent transition-colors"
                        >
                            <?= $view->escape($crumb['label']) ?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ol>
</nav>


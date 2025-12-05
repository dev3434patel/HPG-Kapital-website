<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="HPG Kapital - Commercial real estate capital advisory firm specializing in hospitality financing, capital markets advisory, EB-5 advisory, and loan products.">
    <meta name="keywords" content="hospitality financing, commercial real estate, capital markets, EB-5, loan products, HPG Kapital">
    <title><?= isset($title) ? $view->escape($title) : 'HPG Kapital' ?></title>
    
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="<?= $view->asset('css/tailwind.css') ?>">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="<?= $view->asset('css/custom.css') ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= $view->asset('images/favicon.ico') ?>">
</head>
<body class="bg-background text-foreground">
    <!-- Skip Link for Accessibility -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-50 focus:px-4 focus:py-2 focus:bg-navy focus:text-white focus:rounded">
        Skip to main content
    </a>

    <?php $view->partial('header'); ?>
    
    <?php $view->partial('breadcrumb'); ?>

    <main id="main-content" class="flex-1" tabindex="-1">
        <?= $content ?>
    </main>

    <?php $view->partial('footer'); ?>

    <!-- JavaScript -->
    <script src="<?= $view->asset('js/main.js') ?>"></script>
</body>
</html>


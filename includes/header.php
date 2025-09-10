<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' | ' . SITE_NAME : SITE_NAME . ' - Investiční společnost zaměřená na bateriová centra'; ?></title>
    <meta name="description" content="<?php echo isset($page_description) ? $page_description : 'Batterra je česká investiční společnost zaměřená na výstavbu a provoz moderních bateriových center. 100% transparentnost.'; ?>">
    
    <!-- Preload critical fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/components.css">
    <link rel="stylesheet" href="/assets/css/pages.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="<?php echo isset($page_title) ? $page_title : SITE_NAME; ?>">
    <meta property="og:description" content="<?php echo isset($page_description) ? $page_description : 'Investiční společnost zaměřená na bateriová centra'; ?>">
    <meta property="og:image" content="<?php echo SITE_URL; ?>/assets/images/og-image.jpg">
    <meta property="og:url" content="<?php echo SITE_URL . $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:type" content="website">
    
    <!-- Additional head content -->
    <?php if (isset($additional_head)) echo $additional_head; ?>
</head>
<body class="<?php echo isset($body_class) ? $body_class : ''; ?>">
    <header class="site-header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="/" aria-label="Batterra - Domovská stránka">
                        <span class="logo-text">BATTERRA</span>
                    </a>
                </div>
                
                <?php include 'nav.php'; ?>
                
                <div class="header-cta">
                    <a href="/kontakt.php" class="btn btn-primary">Domluvit schůzku</a>
                </div>
                
                <button class="mobile-menu-toggle" aria-label="Otevřít menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>
    
    <main class="main-content"><?php // Main content starts here ?>
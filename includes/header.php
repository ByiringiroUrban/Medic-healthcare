<?php
// This file should be included at the top of every page, so we can start the session here.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : "Medic"; ?> - Healthcare</title>
    <!-- CSS links here -->
     <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Swiper.js for Testimonials Slider -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="assets/css/style.css">
    <?php if (isset($use_dashboard_css) && $use_dashboard_css): ?>
        <link rel="stylesheet" href="assets/css/dashboard.css">
    <?php endif; ?>
</head>
<body>
    <header class="header">

        <div class="top-bar">
            <div class="container">
                <div class="top-bar-content">
                    <div class="contact-info">
                        <span><i class="fa-solid fa-phone"></i> Call Us: +250 788 854 243</span>
                        <span><i class="fa-solid fa-envelope"></i> Email: byiringirourban20@gmail.com</span>
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Navigation -->
        <div class="main-nav">
            <div class="container">
                <div class="nav-content">
                    <a href="index.php" class="logo"><i class="fa-solid fa-plus"></i> Medic</a>
                    <nav>
                        <ul>
                            <li><a href="index.php" class="active">Home +</a></li>
                            <li><a href="about.php">About Us +</a></li>
                            <li><a href="departments.php">Department +</a></li>
                            <li><a href="shop.php">Shop +</a></li>
                            <li><a href="page.php">Pages +</a></li>
                            <li><a href="blogs.php">Blog Classic +</a></li>
                            <li><a href="contact.php">Contact +</a></li>
                        </ul>
                    </nav>
                    <div class="header-buttons">
                        <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
                            <?php if ($_SESSION["role"] === 'admin'): ?>
                                <a href="admin_dashboard.php" class="btn btn-secondary">Admin Panel</a>
                            <?php else: ?>
                                <a href="dashboard.php" class="btn btn-secondary">My Dashboard</a>
                            <?php endif; ?>
                            <a href="logout.php" class="btn btn-primary">Logout</a>
                        <?php else: ?>
                            <a href="login.php" class="btn btn-primary">Login </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>

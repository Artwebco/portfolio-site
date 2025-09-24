<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?> <!-- THIS IS CRUCIAL -->
</head>

<body <?php body_class(); ?>>

    <header class="site-header">
        <div class="container mx-auto flex-center">

            <div class="site-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php
                    if (function_exists('the_custom_logo') && has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        // Fallback: site name
                    ?>
                        <span class="logo-nikola"><?php bloginfo('name'); ?></span>
                    <?php
                    }
                    ?>
                </a>
            </div>

            <button class="hamburger" aria-label="Open Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'menu',
                    'fallback_cb' => false
                ));
                ?>
            </nav>

            <div class="contact-info flex-center">
                <div class="location">
                    <i class="fa-light fa-location-dot"></i>
                    <span>Skopje, Macedonia</span>
                </div>
                <div class="phone">
                    <i class="fa-light fa-phone"></i>
                    <span>+389 75 400 364</span>
                </div>
                <a href="#contact" class="contact-button">
                    <i class="fa-regular fa-envelope"></i>
                    <span>Contact Me</span>
                </a>
            </div>
        </div>
    </header>
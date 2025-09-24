<?php
function my_theme_scripts()
{
    // CSS
    wp_enqueue_style(
        'main-styles',
        get_template_directory_uri() . '/assets/css/style.css',
        array(),
        null,
        'all'
    );

    wp_enqueue_style(
        'font-awesome',
        get_template_directory_uri() . '/assets/fonts/fontawesome/css/all.min.css',
        array(),
        '6.5.0'
    );

    // ✅ JS goes here
    wp_enqueue_script(
        'menu-toggle',
        get_template_directory_uri() . '/assets/js/menu-toggle.js',
        array(),
        null,
        true // load in footer
    );
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');



// Register Menus
function nikola_register_menus()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'nikola-wp-dev')
    ));
}
add_action('after_setup_theme', 'nikola_register_menus');


// Theme setup (logo + menus)
function my_theme_setup()
{
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'my-theme'),
    ));
}
add_action('after_setup_theme', 'my_theme_setup');

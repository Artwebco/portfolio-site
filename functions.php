<?php
function my_theme_scripts()
{
    wp_enqueue_style(
        'main-styles',
        get_template_directory_uri() . '/assets/css/style.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/style.css'),
        'all'
    );
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');


function nikola_register_menus()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'nikola-wp-dev')
    ));
}
add_action('after_setup_theme', 'nikola_register_menus');

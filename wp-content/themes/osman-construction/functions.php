<?php

define('THEME_VERSION', '1.0.1');

// Theme setup
function osman_theme_setup() {
    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => 'Primary Menu',
    ));
}
add_action('after_setup_theme', 'osman_theme_setup');

// Enqueue global styles and scripts
function osman_enqueue_assets() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'osman_enqueue_assets');
if (!defined('DONOTCACHEPAGE')) {
    define('DONOTCACHEPAGE', true);
}
?>
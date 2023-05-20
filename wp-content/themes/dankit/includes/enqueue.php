<?php
function dankit_enqueue()
{
    $url = get_theme_file_uri();
    $ver = BOOTSTRAPTOPIC_DEV_MODE ? time() : false;
    // Google fonts
    wp_register_style('dankit_google_fonts1', 'https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic');
    wp_register_style('dankit_google_fonts2', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800');
    wp_enqueue_style('dankit_google_fonts1');
    wp_enqueue_style('dankit_google_fonts2');
    wp_register_style('dankit_google_fonts2', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800');

    // Core theme CSS (includes Bootstrap)
    wp_enqueue_style('main_styles', get_stylesheet_directory_uri() . '../css/main_styles.css');

    // My css styles
    wp_enqueue_style('style', get_stylesheet_uri());

    // Font Awesome icons (free version)
    wp_enqueue_script('modernizr-js', 'https://use.fontawesome.com/releases/v6.3.0/js/all.js');

    // Scripts
    wp_register_script('dankit_js_bootstrap', $url .
        '/assets/js/bootstrap.bundle.min.js', ['jquery'], $ver, true);
    wp_enqueue_script('dankit_js_bootstrap');
}

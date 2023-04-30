<?php

function bootkit_enqueue()
{
    $ver = BOOTSTRAPTOPIC_DEV_MODE ? time() : false;
    //echo 'Hello';
    $url = get_theme_file_uri();
    // echo $url . '/assets/vendor/bootstrap/bootstrap.min.css';
    wp_register_style('bootkit_google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans&display=swap', [], $ver); // Google fonts
    wp_register_style('bootkit_bootstrap', $url . '/assets/vendor/bootstrap/css/bootstrap.min.css', [], $ver); // bootstrap.min.css
    wp_register_style('bootkit_modern_business', $url . '/assets/css/modern-business.css', [], $ver); // modern-business.css
    wp_register_style('bootkit_font-awesome_fonts', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', [], $ver);
    wp_register_style('my_bootkit', $url . '/css/my_bootkit.css');

    wp_enqueue_style('bootkit_google_fonts');
    wp_enqueue_style('bootkit_bootstrap');
    wp_enqueue_style('bootkit_modern_business');
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('my_bootkit');
    wp_enqueue_style('bootkit_font-awesome_fonts');

    wp_register_script('bootkit_bootstrap', $url .
        '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', ['jquery'], $ver, true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootkit_bootstrap');
}

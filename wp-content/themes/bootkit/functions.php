<?php

// Setup
define('BOOTSTRAPTOPIC_DEV_MODE', true);

// Includes
include get_theme_file_path('includes/enqueue.php');
include get_theme_file_path('includes/setup.php');
include get_theme_file_path('includes/custom-nav-walker.php');
include get_theme_file_path('includes/widgets.php');
include get_theme_file_path('includes/next-prev.php');
include get_theme_file_path('includes/taxonomies.php');
include get_theme_file_path('includes/custom-post-types.php');
include get_theme_file_path('includes/theme-customizer.php');

// Hooks
add_action('wp_enqueue_scripts', 'bootkit_enqueue');
add_action('after_setup_theme', 'bootkit_setup_theme');
add_action('widgets_init', 'bootkit_widgets');
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
add_action('init', 'bootkit_taxonomies');
add_action('init', 'bootkit_register_post_type_init');
add_action('customize_register', 'bootkit_customize_register');

// Shortcodes

// [foobar]

function foobar_func($atts)
{
    return "foo and bar";
}
add_shortcode('foobar', 'foobar_func');

// [bartag foo="foo-value"]

function bartag_func($atts)
{
    extract(shortcode_atts(array(
        'foo' => 'значение по умолчанию 1',
        'bar' => 'значение по умолчанию 2',
    ), $atts));
    return "foo = {$foo}";
}
add_shortcode('bartag', 'bartag_func');

// [myurl]
function site_url_shortcode($atts)
{
    return site_url();
}
add_shortcode('myurl', 'site_url_shortcode');
// Tests
<?php
// Setup
define('BOOTSTRAPTOPIC_DEV_MODE', true);
// Includes
include get_theme_file_path('includes/enqueue.php');
include get_theme_file_path('includes/setup.php');
include get_theme_file_path('includes/custom-nav-walker.php');
include get_theme_file_path('includes/widgets.php');
include get_theme_file_path('includes/next-prev.php');
get_template_part('partials/posts/content', 'excerpt');
// Hooks
add_action('wp_enqueue_scripts', 'dankit_enqueue');
add_action('after_setup_theme', 'dankit_setup_theme');
add_action('widgets_init', 'dankit_widgets');
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
add_theme_support('post-thumbnails');
// Shortcodes

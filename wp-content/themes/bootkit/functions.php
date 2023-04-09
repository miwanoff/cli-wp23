<?php

// Setup
define('BOOTSTRAPTOPIC_DEV_MODE', true);

// Includes
include get_theme_file_path('includes/enqueue.php');

// Hooks
add_action('wp_enqueue_scripts', 'bootkit_enqueue');

// Shortcodes
<?php
/*
Plugin Name: Follow us
Plugin URI: https://example.com/
Text Domain: follow-us
Description: This plugin adds follow us link to the post, font awesome required
Version: 1.0
Author: Bohdan Shcherbak
Author URI: https://example.com/
Ліцензія: GPL2
 */

if (!function_exists('add_action')) {
    echo "Hi there! I'm just a plugin, no much I can do when called directly.";
    exit;
}

function follow_us_scripts()
{
    $plugin_url = plugin_dir_url(__FILE__);

//wp_enqueue_style( 'style',  $plugin_url . "/css/style.css");
    wp_register_style('follow_us_font-awesome_fonts', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', [], $ver);
    wp_enqueue_style('follow_us_font-awesome_fonts');
}

add_action('wp_enqueue_scripts', 'follow_us_scripts');

function follow_us_to_post_content($content)
{
    return '<div class="follow"><a href="https://www.instagram.com/bogsvity_777/" target="_blank">' . __('Follow us') . '<i class="fa fa-heart"></i></a></div>' . $content;
}
add_filter('the_content', 'follow_us_to_post_content');
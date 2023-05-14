<?php
/*
Plugin Name: Load More Scroll
Plugin URI: http://ex.com/
Description: Simple Load More Scroll plugin with AJAX
Author: MAI
Version: 1.1
Author URI: http://ex.com/
 */

function create_script()
{
    global $wp_query;
    // don't display the button if there are not enough posts
    if ($wp_query->max_num_pages > 1) {
        echo "\n<script id='loadmore'>\n";
        echo "var ajaxurl = '" . site_url() . "/wp-admin/admin-ajax.php';\n";
        echo "var bootkit_posts = '" . serialize($wp_query->query_vars) . "';\n";
        $n = (get_query_var('paged')) ? get_query_var('paged') : 1;
        echo "var current_page = " . $n . ";\n";
        echo "var max_pages = " . $wp_query->max_num_pages . ";\n";
        echo "</script>\n";
    }
}
add_action('get_footer', 'create_script');

function bootkit_load_more_scripts()
{
    // In most cases it is already included on the page and this line can be removed
    wp_enqueue_script('jquery');
    // register our main script but do not enqueue it yet
    wp_register_script('loadmore', plugin_dir_url(__FILE__) . 'js/loadmore.js', array('jquery'));
    wp_enqueue_script('loadmore');
}
add_action('wp_enqueue_scripts', 'bootkit_load_more_scripts');

function bootkit_load_posts()
{
    $args = unserialize(stripslashes($_POST['query'])); // запрос от скрипта
    $args['paged'] = $_POST['page'] + 1; // номер страницы
    $args['post_status'] = 'publish'; // только опубликованные
    $args['posts_per_page'] = get_option('posts_per_page'); // сколько постов на странице (подгружать по 2)
    // определяем, какие посты будут показаны в базовом цикле WordPress
    query_posts($args);
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            //echo the_title();
            //echo "<br>";
            include "templates/template.php";
        }
    }
    die();
}

add_action('wp_ajax_loadmore', 'bootkit_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'bootkit_load_posts');

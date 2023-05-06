<?php
/*
Plugin Name: Time to Post Title
Plugin URI: https://example.com/
Version: 1.0
Author: M.A.I.
Author URI: https://example.com/
License: GPL2
 */
function time_to_post_content($content)
{
    return '<div class="time">' . __('Time of post creation: ') . get_the_time() . " " . get_the_date() . '</div>' . $content;
}
add_filter('the_content', 'time_to_post_content');
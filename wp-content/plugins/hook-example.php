<?php
/**
 * Plugin Name: Hooks example
 */

 function hooked_title($title)
{
    return 'Hooked ' . $title;
}

add_filter('the_title', 'hooked_title');
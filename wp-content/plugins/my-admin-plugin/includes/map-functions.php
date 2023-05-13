<?php
/*
 * Add a new menu item to the admin console
 */

function map_add_link()
{
    add_menu_page(
        'My First Page', // Page title
        'My First Plugin', // Menu item text
        'manage_options',
        'my-admin-plugin/includes/map-page.php'
    );
}
add_action('admin_menu', 'map_add_link');
<?php
function bootkit_widgets()
{
// register_sidebar(["name" => __("Bootkit first Sidebar", "bootkit"), "id" => "bootkit_sidebar", "description" =>
// __("Bootkit first Sidebar for something.")]);
    register_sidebar([
        'name' => __('Bootkit first Sidebar', 'bootkit'),
        'id' => 'bootkit_sidebar',
        'description' => __('Bootkit first Sidebar for something.'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);
}

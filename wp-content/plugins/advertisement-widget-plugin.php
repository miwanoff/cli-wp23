<?php
/*
Plugin Name: Advertisement Widget Plugin
Plugin URI: http://ex.com
Description: Simple Advertisement Widget Plugin including banner image and link
Version: 1.0
Author: MAI
Author URI: http://ex.com
License: GPL2
 */

// The widget class
class Advertisement_Widget extends WP_Widget
{
    // Main constructor
    public function __construct()
    {
        $widget_ops = array('classname' => 'Advertisement_Widget', 'description' => 'Displays Ads');
        $this->WP_Widget('Advertisement_Widget', 'Advertisement Widget', $widget_ops);
    }
    // The widget form (for the backend) public function form( $instance) {
    /* ... */

    // Update widget settings
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['src'] = $new_instance['src'];
        $instance['description'] = $new_instance['description'];
        $instance['link'] = $new_instance['link'];
        return $instance;
    }

    // Display the widget
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $src = $instance['src'];
        $description = $instance['description'];
        $link = $instance['link'];
        ?>
<?php echo $before_widget; ?>
<?php if ($title) {
            echo $before_title . $title . $after_title;
        }

        if ($description) {
            echo "<h4 class='desc'>" . $description . "</h4>";
        }
        ?>
<?php echo '<a href="' . $link . '" target="_blank"><img src=' . $src . " ' style=\"margin-top:20px;\"/>"; ?></a>
<?php echo $after_widget; ?>
<?php
}

    // Form for the widget
    public function form($instance)
    {
        $instance = wp_parse_args((array) $instance, array('title' => ''));
        $title = $instance['title'];
        $src = esc_attr($instance['src']);
        $description = esc_attr($instance['description']);
        $link = esc_attr($instance['link']);
        ?>
<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat"
            id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"
            type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>

<p><label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description');?></label>
    <textarea rows="4" cols="50" class="widefat" id="<?php echo $this->get_field_id('description'); ?>"
        name="<?php echo $this->get_field_name('description'); ?>"><?php echo ($description); ?> </textarea>
</p>



<p><label for="<?php echo $this->get_field_id('src'); ?>"><?php _e('Advertisement Banner src');?></label>

    <input class="widefat" id="<?php echo $this->get_field_id('src'); ?>"
        name="<?php echo $this->get_field_name('src'); ?>" type="text" value="<?php echo $src; ?>" />

</p>

<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Ads Link');?></label>
<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>"
    name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
</p>
<?php
}
}

// Register the widget
function my_register_custom_widget()
{
    register_widget('Advertisement_Widget');
}
add_action('widgets_init', 'my_register_custom_widget');
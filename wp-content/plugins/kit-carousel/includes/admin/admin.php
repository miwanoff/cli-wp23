<?php
// create custom plugin settings menu
//add_action('admin_menu', 'kc_create_menu');
function kc_create_menu()
{
    //create new top-level menu
    add_menu_page('Kit Carousel Plugin Settings', 'Kit Carousel Settings', 'administrator', __FILE__, 'kc_settings_page', plugins_url('/images/icon.png', __FILE__));
    //call register settings function
    add_action('admin_init', 'register_mysettings');
}
function register_mysettings()
{
    //register our settings
    register_setting('kc-settings-group', 'kc_post_type');
    register_setting('kc-settings-group', 'kc_category_name');
    register_setting('kc-settings-group', 'kc_tag');
}
function kc_settings_page()
{
    ?>
<div class="wrap">
    <h2>Kit Carousel</h2>
    <form method="post" action="options.php">
        <?php settings_fields('kc-settings-group');?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Post Type</th>
                <td><input type="text" name="kc_post_type" value="<?php echo get_option('kc_post_type'); ?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Category Name</th>
                <td><input type="text" name="kc_category_name" value="<?php echo get_option('kc_category_name'); ?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Tags</th>
                <td><input type="text" name="kc_tag" value="<?php echo get_option('kc_tag'); ?>" /></td>
            </tr>
        </table>
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes')?>" />
        </p>
    </form>
</div>
<?php }?>
<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$success_save = false;
if(isset($_POST['save_bulk_setting'])) {
    // Verify nonce
    if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], 'save_bulk_setting_nonce')) {
        die(WPAICG_NONCE_ERROR);
    }
    if (isset($_POST['wpaicg_restart_queue']) && !empty($_POST['wpaicg_restart_queue'])) {
        update_option('wpaicg_restart_queue', sanitize_text_field($_POST['wpaicg_restart_queue']));
    } else {
        delete_option('wpaicg_restart_queue');
    }
    if (isset($_POST['wpaicg_custom_prompt_enable']) && !empty($_POST['wpaicg_custom_prompt_enable'])) {
        update_option('wpaicg_custom_prompt_enable', 1);
    } else {
        delete_option('wpaicg_custom_prompt_enable');
    }
    if (isset($_POST['wpaicg_custom_prompt_auto']) && !empty($_POST['wpaicg_custom_prompt_auto'])) {
        update_option('wpaicg_custom_prompt_auto', wp_kses_post($_POST['wpaicg_custom_prompt_auto']));
    } else {
        delete_option('wpaicg_custom_prompt_auto');
    }
    if (isset($_POST['wpaicg_try_queue']) && !empty($_POST['wpaicg_try_queue'])) {
        update_option('wpaicg_try_queue', sanitize_text_field($_POST['wpaicg_try_queue']));
    } else {
        delete_option('wpaicg_try_queue');
    }
    $success_save = true;
}
$wpaicg_restart_queue = get_option('wpaicg_restart_queue', '');
$wpaicg_try_queue = get_option('wpaicg_try_queue', '');
$wpaicg_ai_model = get_option('wpaicg_ai_model','');
$wpaicg_custom_prompt_enable = get_option('wpaicg_custom_prompt_enable',false);
$wpaicg_default_custom_prompt = 'Create a compelling and well-researched article of at least 1000 words on the topic of "[title]" in English. Structure the article with clear headings enclosed within the appropriate heading tags (e.g., <h1>, <h2>, etc.) and engaging subheadings. Ensure that the content is informative and provides valuable insights to the reader. Incorporate relevant examples, case studies, and statistics to support your points. Organize your ideas using unordered lists with <ul> and <li> tags where appropriate. Conclude with a strong summary that ties together the key takeaways of the article. Remember to enclose headings in the specified heading tags to make parsing the content easier. Additionally, wrap even paragraphs in <p> tags for improved readability.

Here\'s an example of how you could structure your article:

<h1>Title of the Article</h1>

<h2>Introduction</h2>
<p>Begin your article with an engaging introduction...</p>

<h2>Subheading 1</h2>
<p>Discuss the first point of your article...</p>
<ul>
    <li>Key point 1</li>
    <li>Key point 2</li>
    <li>Key point 3</li>
</ul>

<h2>Subheading 2</h2>
<p>Elaborate on the second point of your article...</p>
<ul>
    <li>Relevant example or case study</li>
    <li>Important statistic</li>
    <li>Supporting evidence</li>
</ul>

<!-- Add more subheadings and content as needed -->

<h2>Conclusion</h2>
<p>Summarize the key takeaways of your article and provide a strong conclusion...</p>';
$wpaicg_custom_prompt_auto = get_option('wpaicg_custom_prompt_auto',$wpaicg_default_custom_prompt);
?>
<?php
if($success_save){
    echo '<p style="font-weight: bold; color: #00aa00">Record updated successfully</p>';
}
?>
<form action="" method="post" class="wpaicg_auto_settings">
    <?php wp_nonce_field('save_bulk_setting_nonce'); ?>
    <table class="form-table">
        <tr>
            <th scope="row">Restart Failed Jobs After</th>
            <td>
                <select name="wpaicg_restart_queue">
                    <option value="">Dont Restart</option>
                    <?php
                    for($i = 20; $i <=60; $i+=10){
                        echo '<option'.($wpaicg_restart_queue == $i ? ' selected':'').' value="'.esc_html($i).'">'.esc_html($i).'</option>';
                    }
                    ?>
                </select>
                minutes
            </td>
        </tr>
        <tr>
            <th scope="row">Attempt up to a maximum of</th>
            <td>
                <select name="wpaicg_try_queue">
                    <?php
                    for($i = 1; $i <=10; $i++){
                        echo '<option'.($wpaicg_try_queue == $i ? ' selected':'').' value="'.esc_html($i).'">'.esc_html($i).'</option>';
                    }
                    ?>
                </select>
                times
            </td>
        </tr>
        <tr>
            <th>Enable Custom Prompt</th>
            <td>
                <label><input<?php echo $wpaicg_custom_prompt_enable ? ' checked':''?> class="wpaicg_custom_prompt_enable" type="checkbox" value="1" name="wpaicg_custom_prompt_enable"></label>
                <div style="<?php echo $wpaicg_custom_prompt_enable ? '' : 'display:none'?>" class="wpaicg_custom_prompt_guide">
                    <h3>Best Practices and Tips</h3>
                    <ol>
                        <li>Ensure <code>[title]</code> is included in your prompt.</li>
                        <li>You can add your language to the prompt. Just replace "in English" with your language.</li>
                        <li>This works best with gpt-4 and gpt-3.5-turbo. Please note that GPT-4 is currently in limited beta, which means that access to the GPT-4 API from OpenAI is available only through a waiting list and is not open to everyone yet. You can sign up for the waiting list at <a href="https://openai.com/waitlist/gpt-4-api" target="_blank">here</a>.</li>
                        <li>If you are using gpt-4 then make sure to adjust your max token around 3000-4000 if you want longer content.</li> 
                        <li>For gpt-3.5-turbo, you can use the default max token of 1500.</li>
                        <li>Please note that if custom prompt is enabled the plugin will bypass language, style, tone etc settings. You need to specify them in your promot.</li>
                        </ol>
                </div>
            </td>
        </tr>
        <tr style="<?php echo $wpaicg_custom_prompt_enable ? '' : 'display:none'?>" class="wpaicg_custom_prompt_auto">
            <th>Custom Prompt</th>
            <td>
                <textarea rows="20" name="wpaicg_custom_prompt_auto"><?php echo esc_html(str_replace("\\",'',$wpaicg_custom_prompt_auto))?></textarea>
                <div style="font-style: italic;display: flex; justify-content: space-between">
                    <div>Ensure <code>[title]</code> is included in your prompt.</div>
                    <button style="color: #fff;background: #df0707;border-color: #df0707;" data-prompt="<?php echo esc_html($wpaicg_default_custom_prompt)?>" class="button wpaicg_custom_prompt_reset" type="button">Reset</button>
                </div>
            </td>
        </tr>
    </table>
    <button class="button-primary button" name="save_bulk_setting">Save</button>
</form>
<script>
    jQuery(document).ready(function ($){
        let wpaicg_ai_model = '<?php echo esc_html($wpaicg_ai_model)?>';
        $('.wpaicg_custom_prompt_enable').click(function (){
            if($(this).prop('checked')){
                $('.wpaicg_custom_prompt_auto').show();
                $('.wpaicg_custom_prompt_guide').show();
            }
            else{
                $('.wpaicg_custom_prompt_auto').hide();
                $('.wpaicg_custom_prompt_guide').hide();
            }
        });
        $('.wpaicg_custom_prompt_reset').click(function (){
            let prompt = $(this).attr('data-prompt');
            $('textarea[name=wpaicg_custom_prompt_auto]').val(prompt);
        });
    })
</script>

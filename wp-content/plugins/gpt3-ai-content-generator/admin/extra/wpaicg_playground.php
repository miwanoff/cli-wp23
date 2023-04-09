<?php
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<style>
    /* Container */
    .wpaicg_form_container {
        padding: 30px;
        max-width: auto;
    }

    /* Form elements */
    .wpaicg_form_container select,
    .wpaicg_form_container textarea {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #d1d1d1;
        border-radius: 4px;
        font-size: 14px;
        margin-bottom: 20px;
    }

    /* Buttons */
    .wpaicg_form_container button {
        padding: 10px 15px;
        font-size: 14px;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 10px;
    }

    .wpaicg_form_container .wpaicg_generator_button {
        background-color: #2271B1;
        color: #ffffff;
        border: none;
    }

    .wpaicg_form_container .wpaicg_generator_stop {
        background-color: #dc3232;
        color: #ffffff;
        border: none;
        display: none;
    }

    /* Spinner */
    .wpaicg_form_container .spinner {
        display: inline-block;
        visibility: hidden;
        vertical-align: middle;
        margin-left: 5px;
    }

    /* Textarea */
    .wpaicg_prompt {
        height: auto !important;
        min-height: 100px;
        resize: vertical;
    }

    /* Notice text */
    .wpaicg_notice_text_pg {
        padding: 10px;
        background-color: #F8DC6F;
        text-align: left;
        margin-bottom: 12px;
        color: #000;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }
    /* add border for table */
    .wpaicg_playground_table {
    max-width: auto;
    width: 100%;
}


</style>
<div class="wpaicg-grid-three" style="margin-top: 20px;">
    <div class="wpaicg-grid-1">
        <table>
        <tbody>
        <tr>
            <td>
                <h3>Category</h3>
                <select id="category_select" class="regular-text">
                    <option value="">Select a category</option>
                    <option value="wordpress">WordPress</option>
                    <option value="blogging">Blogging</option>
                    <option value="writing">Writing</option>
                    <option value="ecommerce">E-commerce</option>
                    <option value="online_business">Online Business</option>
                    <option value="entrepreneurship">Entrepreneurship</option>
                    <option value="seo">SEO</option>
                    <option value="web_design">Web Design</option>
                    <option value="social_media">Social Media</option>
                    <option value="email_marketing">Email Marketing</option>
                </select>
            </td>
        </tr>
        <tr class="sample_prompts_row" style="display: none;">
            <td>
                <h3>Prompt</h3>
                <select id="sample_prompts" class="regular-text">
                    <option value="">Select a prompt</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <h3>Custom Prompt</h3>
                <textarea type="text" class="regular-text wpaicg_prompt">Write a blog post on how to effectively monetize a blog, discussing various methods such as affiliate marketing, sponsored content, and display advertising, as well as tips for maximizing revenue.</textarea>
                &nbsp;<button class="button wpaicg_generator_button"><span class="spinner"></span>Generate</button>
                &nbsp;<button class="button button-primary wpaicg_generator_stop">Stop</button>
            </td>
        </tr>
        </tbody>
        </table>
    </div>
    <div class="wpaicg-grid-2">
    <?php
                wp_editor('','wpaicg_generator_result', array('media_buttons' => true, 'textarea_name' => 'wpaicg_generator_result'));
                ?>
                <p class="wpaicg-playground-buttons">
                    <button class="button button-primary wpaicg-playground-save">Save as Draft</button>
                    <button class="button wpaicg-playground-clear">Clear</button>
                </p>
        
    
    </div>
</div>

<script>
    jQuery(document).ready(function ($){
        // Define the prompts
        var prompts = [
            {category: 'wordpress', prompt: 'Write a beginner-friendly tutorial on how to set up a secure and optimized WordPress website, focusing on security measures, performance enhancements, and best practices.'},
            {category: 'wordpress', prompt: 'Create a list of essential WordPress plugins for various niches, explaining their features, use cases, and benefits for website owners.'},
            {category: 'wordpress', prompt: 'Develop an in-depth guide on how to improve the loading speed of a WordPress website, covering hosting, caching, image optimization, and more.'},
            {category: 'wordpress', prompt: 'Write an article on how to choose the perfect WordPress theme for a specific business niche, taking into account design, functionality, and customization options.'},
            {category: 'wordpress', prompt: 'Create a comprehensive guide on managing a WordPress website, including updating themes and plugins, performing backups, and monitoring site health.'},
            {category: 'wordpress', prompt: 'Write a tutorial on how to create a custom WordPress theme from scratch, covering design principles, template hierarchy, and best practices for coding.'},
            {category: 'wordpress', prompt: 'Develop a resource guide on how to leverage WordPress Multisite to manage multiple websites efficiently, including setup, management, and use cases.'},
            {category: 'wordpress', prompt: 'Write an article on the benefits of using WooCommerce for e-commerce websites, including features, extensions, and comparisons to other e-commerce platforms.'},
            {category: 'wordpress', prompt: 'Create a guide on how to optimize a WordPress website for search engines, focusing on SEO-friendly themes, plugins, and on-page optimization techniques.'},
            {category: 'wordpress', prompt: 'Write a case study on a successful WordPress website, detailing its design, growth strategies, and the impact of its content on its target audience.'},
            {category: 'blogging', prompt: 'Write a blog post on how to effectively monetize a blog, discussing various methods such as affiliate marketing, sponsored content, and display advertising, as well as tips for maximizing revenue.'},
            {category: 'blogging', prompt: 'Write a blog post about the importance of networking and collaboration in the blogging community, including practical tips for building relationships and partnering with other bloggers and influencers.'},
            {category: 'blogging', prompt: 'Create a blog post that explores various content formats for blogging, such as written articles, podcasts, and videos, and discusses their pros and cons, as well as strategies for selecting the best format for a specific audience.'},
            {category: 'blogging', prompt: 'Write a blog post detailing the essential elements of a successful blog design and layout, focusing on user experience and visual appeal.'},
            {category: 'blogging', prompt: 'Write a blog post discussing the importance of authentic storytelling in blogging and how it can enhance audience engagement and brand loyalty.'},
            {category: 'blogging', prompt: 'Write a blog post about leveraging social media for blog promotion, including tips on cross-platform marketing and strategies for increasing blog visibility.'},
            {category: 'blogging', prompt: 'Write a blog post exploring the role of search engine optimization in blogging success, with a step-by-step guide on optimizing blog content for improved search rankings.'},
            {category: 'blogging', prompt: 'Write a blog post about the value of developing a consistent posting schedule and editorial calendar, sharing strategies for maintaining productivity and audience interest.'},
            {category: 'blogging', prompt: 'Write a blog post about the benefits and challenges of embracing a lean startup methodology, with actionable tips for implementing this approach in a new business venture.'},
            {category: 'writing', prompt: 'Write an article discussing the benefits of incorporating mindfulness and meditation practices into daily routines for improved mental health.'},
            {category: 'writing', prompt: 'Write an article exploring the impact of sustainable agriculture practices on global food security and the environment.'},
            {category: 'writing', prompt: 'Write an article analyzing the role of renewable energy sources in combating climate change and reducing global carbon emissions.'},
            {category: 'writing', prompt: 'Write an article examining the history and cultural significance of traditional art forms from around the world.'},
            {category: 'writing', prompt: 'Write an article discussing the importance of financial literacy and practical tips for managing personal finances.'},
            {category: 'writing', prompt: 'Write an article highlighting advancements in telemedicine and its potential to transform healthcare access and delivery.'},
            {category: 'writing', prompt: 'Write an article discussing the ethical implications of artificial intelligence and its potential effects on society.'},
            {category: 'writing', prompt: 'Write an article exploring the benefits of lifelong learning and its impact on personal and professional growth.'},
            {category: 'writing', prompt: 'Write an article analyzing the role of urban planning and design in creating sustainable and livable cities.'},
            {category: 'writing', prompt: 'Write an article discussing the influence of technology on modern communication and its effect on human relationships.'},
            {category: 'ecommerce', prompt: 'Design a digital marketing campaign for an online fashion store, focusing on customer engagement and boosting sales.'},
            {category: 'ecommerce', prompt: 'Create a step-by-step guide for optimizing an e-commerce websites user experience, including navigation, product presentation, and checkout process.'},
            {category: 'ecommerce', prompt: 'Write a persuasive email sequence for a cart abandonment campaign, aimed at encouraging customers to complete their purchases.'},
            {category: 'ecommerce', prompt: 'Develop a content strategy for an e-commerce blog, focusing on topics that will educate, inform, and entertain potential customers.'},
            {category: 'ecommerce', prompt: 'Outline the benefits and features of a new e-commerce platform designed to simplify the process of setting up and managing an online store.'},
            {category: 'ecommerce', prompt: 'Create a video script for a product demonstration that highlights the unique selling points of an innovative kitchen gadget.'},
            {category: 'ecommerce', prompt: 'Design a customer loyalty program for an e-commerce business, focusing on rewards, incentives, and strategies to drive repeat purchases.'},
            {category: 'ecommerce', prompt: 'Write a case study showcasing the successful implementation of an e-commerce solution for a small brick-and-mortar retailer.'},
            {category: 'ecommerce', prompt: 'Develop an infographic that illustrates the growth of e-commerce, including key statistics, trends, and milestones in the industry.'},
            {category: 'ecommerce', prompt: 'Create a series of social media posts for an e-commerce brand that showcases their products and engages their target audience.'},
            {category: 'online_business', prompt: 'Create a comprehensive guide on selecting the best e-commerce platform for a new online business, considering features, pricing, and scalability.'},
            {category: 'online_business', prompt: 'Develop a social media marketing plan for a small online business, focusing on choosing the right platforms, content creation, and audience engagement.'},
            {category: 'online_business', prompt: 'Write an in-depth article on utilizing search engine optimization (SEO) strategies to drive organic traffic to an online business website.'},
            {category: 'online_business', prompt: 'Design a webinar series that teaches aspiring entrepreneurs the essentials of building and managing a successful online business.'},
            {category: 'online_business', prompt: 'Create a resource guide on the top tools and software solutions for managing an online business, covering inventory management, marketing, and customer service.'},
            {category: 'online_business', prompt: 'Write a case study about a successful online business that pivoted during challenging times and thrived through innovation and adaptability.'},
            {category: 'online_business', prompt: 'Develop a list of best practices for creating an engaging and visually appealing online business website that attracts customers and drives sales.'},
            {category: 'online_business', prompt: 'Outline a customer support strategy for an online business, focusing on communication channels, response times, and customer satisfaction.'},
            {category: 'online_business', prompt: 'Write an article on the importance of branding and visual identity for an online business, including tips for creating a consistent and memorable brand.'},
            {category: 'online_business', prompt: 'Create a guide on using email marketing to nurture leads and convert them into loyal customers for an online business.'}, 
            {category: 'entrepreneurship', prompt: 'Write an article on the essential skills every entrepreneur should develop.'},
            {category: 'seo', prompt: 'Write an in-depth guide on conducting comprehensive keyword research for website content, focusing on understanding user intent, search volume, and competition.'},
            {category: 'seo', prompt: 'Develop a blog post on the essential on-page SEO factors that every website owner should know, including proper URL structures, title tags, header tags, and meta descriptions.'},
            {category: 'seo', prompt: 'Create a comprehensive guide on link-building strategies for improving website authority and search rankings, covering techniques such as guest blogging, broken link building, and outreach.'},
            {category: 'seo', prompt: 'Write an article about the impact of website speed on SEO and user experience, discussing tools and techniques for analyzing and improving site performance.'},
            {category: 'seo', prompt: 'Develop a tutorial on how to create SEO-friendly content that appeals to both search engines and human readers, focusing on readability, keyword usage, and information value.'},
            {category: 'seo', prompt: 'Write a blog post about the importance of mobile-first indexing and responsive web design in modern SEO, including tips for optimizing websites for mobile devices.'},
            {category: 'seo', prompt: 'Create a guide on how to use Google Search Console effectively for monitoring and improving website SEO performance, including features such as index coverage reports, sitemaps, and search analytics.'},
            {category: 'seo', prompt: 'Write an article discussing the role of voice search in SEO, highlighting strategies for optimizing website content for voice search queries and emerging trends in voice search technology.'},
            {category: 'seo', prompt: 'Develop a blog post about the significance of user experience (UX) in SEO, including tips for enhancing website navigation, layout, and overall user satisfaction to improve search rankings.'},
            {category: 'seo', prompt: 'Create an article on the importance of local SEO for small businesses, focusing on strategies such as Google My Business optimization, citation building, and local content creation.'},
            {category: 'web_design', prompt: 'Write an article about the importance of responsive web design in today\'s digital landscape.'},
            {category: 'social_media', prompt: 'Write a blog post about using social media effectively to promote your WordPress website.'},
            {category: 'email_marketing', prompt: 'Write a tutorial on how to set up an email newsletter using a WordPress plugin.'}
        ];
        // Function to handle category selection
        $('#category_select').on('change', function() {
            var selectedCategory = $(this).val();
            if (selectedCategory) {
                // Clear and populate the prompts dropdown
                $('#sample_prompts').html('<option value="">Select a prompt</option>');
                prompts.forEach(function(promptObj) {
                    if (promptObj.category === selectedCategory) {
                        $('#sample_prompts').append('<option value="' + promptObj.prompt + '">' + promptObj.prompt + '</option>');
                    }
                });
                $('.sample_prompts_row').show();
            } else {
                // Hide the prompts dropdown and clear its value
                $('.sample_prompts_row').hide();
                $('#sample_prompts').val('');
            }
        });

        // Function to handle sample prompt selection
        $('#sample_prompts').on('change', function() {
            var selectedPrompt = $(this).val();
            if (selectedPrompt) {
                // Clear the textarea and set the selected prompt
                $('.wpaicg_prompt').val(selectedPrompt);
            }
        });
        var wpaicg_generator_working = false;
        var eventGenerator = false;
        var wpaicg_limitLines = 1;
        function stopOpenAIGenerator(){
            $('.wpaicg-playground-buttons').show();
            $('.wpaicg_generator_stop').hide();
            wpaicg_generator_working = false;
            $('.wpaicg_generator_button .spinner').hide();
            $('.wpaicg_generator_button').removeAttr('disabled');
            eventGenerator.close();
        }
        $('.wpaicg_generator_button').click(function(){
            var btn = $(this);
            var title = $('.wpaicg_prompt').val();
            if(!wpaicg_generator_working && title !== ''){
                var count_line = 0;
                var wpaicg_generator_result = $('.wpaicg_generator_result');
                btn.attr('disabled','disabled');
                btn.find('.spinner').show();
                btn.find('.spinner').css('visibility','unset');
                wpaicg_generator_result.val('');
                wpaicg_generator_working = true;
                $('.wpaicg_generator_stop').show();
                eventGenerator = new EventSource('<?php echo esc_html(add_query_arg('wpaicg_stream','yes',site_url().'/index.php'));?>&title='+title+'&nonce=<?php echo wp_create_nonce('wpaicg-ajax-nonce')?>');
                var editor = tinyMCE.get('wpaicg_generator_result');
                var basicEditor = true;
                if ( $('#wp-wpaicg_generator_result-wrap').hasClass('tmce-active') && editor ) {
                    basicEditor = false;
                }
                var currentContent = '';
                var wpaicg_newline_before = false;
                var wpaicg_response_events = 0;
                eventGenerator.onmessage = function (e) {
                    if(basicEditor){
                        currentContent = $('#wpaicg_generator_result').val();
                    }
                    else{
                        currentContent = editor.getContent();
                        currentContent = currentContent.replace(/<\/?p(>|$)/g, "");
                    }
                    if(e.data === "[DONE]"){
                        count_line += 1;
                        if(basicEditor) {
                            $('#wpaicg_generator_result').val(currentContent+'\n\n');
                        }
                        else{
                            editor.setContent(currentContent+'\n\n');
                        }
                        wpaicg_response_events = 0;
                    }
                    else{
                        var result = JSON.parse(e.data);
                        if(result.error !== undefined){
                            var content_generated = result.error.message;
                        }
                        else{
                            var content_generated = result.choices[0].delta !== undefined ? (result.choices[0].delta.content !== undefined ? result.choices[0].delta.content : '') : result.choices[0].text;
                        }
                        if((content_generated === '\n' || content_generated === ' \n' || content_generated === '.\n' || content_generated === '\n\n' || content_generated === '.\n\n') && wpaicg_response_events > 0 && currentContent !== ''){
                            if(!wpaicg_newline_before) {
                                wpaicg_newline_before = true;
                                if(basicEditor){
                                    $('#wpaicg_generator_result').val(currentContent+'<br /><br />');
                                }
                                else{
                                    editor.setContent(currentContent+'<br /><br />');
                                }
                            }
                        }
                        else if(content_generated === '\n' && wpaicg_response_events === 0  && currentContent === ''){

                        }
                        else{
                            wpaicg_newline_before = false;
                            wpaicg_response_events += 1;
                            if(basicEditor){
                                $('#wpaicg_generator_result').val(currentContent+content_generated);
                            }
                            else{
                                editor.setContent(currentContent+content_generated);
                            }
                        }
                    }
                    if(count_line === wpaicg_limitLines){
                        stopOpenAIGenerator();
                    }
                };
                eventGenerator.onerror = function (e) {
                };
            }
        });
        $('.wpaicg_generator_stop').click(function (){
            stopOpenAIGenerator();
        });
        $('.wpaicg-playground-clear').click(function (){
            // $('.wpaicg_prompt').val('');
            var editor = tinyMCE.get('wpaicg_generator_result');
            var basicEditor = true;
            if ( $('#wp-wpaicg_generator_result-wrap').hasClass('tmce-active') && editor ) {
                basicEditor = false;
            }
            if(basicEditor){
                $('#wpaicg_generator_result').val('');
            }
            else{
                editor.setContent('');
            }
        });
        $('.wpaicg-playground-save').click(function (){
            var wpaicg_draft_btn = $(this);
            var title = $('.wpaicg_prompt').val();
            var editor = tinyMCE.get('wpaicg_generator_result');
            var basicEditor = true;
            if ( $('#wp-wpaicg_generator_result-wrap').hasClass('tmce-active') && editor ) {
                basicEditor = false;
            }
            var content = '';
            if (basicEditor){
                content = $('#wpaicg_generator_result').val();
            }
            else{
                content = editor.getContent();
            }
            if(title === ''){
                alert('Please enter title');
            }
            else if(content === ''){
                alert('Please wait content generated');
            }
            else{
                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php')?>',
                    data: {title: title, content: content, action: 'wpaicg_save_draft_post_extra','nonce': '<?php echo wp_create_nonce('wpaicg-ajax-nonce')?>'},
                    dataType: 'json',
                    type: 'POST',
                    beforeSend: function (){
                        wpaicg_draft_btn.attr('disabled','disabled');
                        wpaicg_draft_btn.append('<span class="spinner"></span>');
                        wpaicg_draft_btn.find('.spinner').css('visibility','unset');
                    },
                    success: function (res){
                        wpaicg_draft_btn.removeAttr('disabled');
                        wpaicg_draft_btn.find('.spinner').remove();
                        if(res.status === 'success'){
                            window.location.href = '<?php echo admin_url('post.php')?>?post='+res.id+'&action=edit';
                        }
                        else{
                            alert(res.msg);
                        }
                    },
                    error: function (){
                        wpaicg_draft_btn.removeAttr('disabled');
                        wpaicg_draft_btn.find('.spinner').remove();
                        alert('Something went wrong');
                    }
                });
            }
        })
    })
</script>

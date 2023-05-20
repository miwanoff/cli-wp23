<?php get_header(); ?>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    get_template_part('partials/content-excerpt');
                }
            }
            ?>
            <!-- Pagination -->
            <div class="d-flex justify-content-end mb-4">
                <?php previous_posts_link("&larr; Newer Posts"); ?>
                <?php next_posts_link("Older Posts &rarr;"); ?>
            </div>
        </div>
        <?php get_sidebar(); ?>
        get_template_part('partials/content', none);
        <?php if (have_posts()) {
            while (have_posts()) {
                the_post();
                //get_template_part('partials/posts/content-excerpt');
                get_template_part('partials/content', 'excerpt');
            }
        } else {
            get_template_part('partials/content', 'none');
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>
<?php get_header(); ?>
<!-- Page Content -->
<header class="masthead" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/about-bg.jpg ')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1 class="subheading"><?php single_cat_title() ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
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

            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <?php previous_posts_link("&larr; Older"); ?>
                    <!-- <a class="page-link" href="#">&larr; Older</a> -->
                </li>
                <li class="page-item">
                    <?php next_posts_link("Newer &rarr;"); ?>
                    <!-- <a class="page-link" href="#">Newer &rarr;</a> -->
                </li>
            </ul>
        </div>
        <?php get_sidebar(); ?>
    </div>
    <!-- /.row -->

    <!-- /.container -->

</div>
<?php get_footer(); ?>
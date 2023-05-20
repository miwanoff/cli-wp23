/*
* Template Name: Full Width Page
*/
<?php

/*
* Template Name: Full Width Page
*/

get_header(); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/post-bg.jpg')">
    <?php
    if (has_post_thumbnail()) {
        the_post_thumbnail("full", ["class" => "img-fluid rounded"]);
    }
    ?>
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <?php if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                    ?>
                            <h1 class="text-center"><?php the_title() ?></h1>
                    <?php
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php the_content(); ?>
            </div>
        </div>
        <!-- Tag cloud -->
        <?php the_tags('', ', '); ?>
        <hr>
        <?php if (post_password_required()) {
            return;
        }
        ?>
        <?php
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
        ?>
        <?php get_sidebar(); ?>
        <?php get_footer(); ?>
    </div>
</article>
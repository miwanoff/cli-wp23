<?php get_header();
$image_url = "";
if (has_post_thumbnail()) {
    $image_url = get_the_post_thumbnail_url();
}
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('<?php echo $image_url ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <?php if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                    ?>
                            <h1><?php the_title() ?></h1>
                    <?php
                        }
                    } ?>
                    <h2 class="subheading"><?php the_category(" ") ?></h2>
                    <?php if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            global $post;
                            $author_ID = $post->post_author;
                            $author_URL = get_author_posts_url($author_ID);
                        }
                    }
                    ?>
                    <span class="meta">
                        Posted by
                        <a href="#!"><?php echo $author_URL; ?>"><?php the_author(); ?></a>
                        on <?php the_time(get_option('date_format'));
                            echo " ";
                            the_time(get_option('time_format')); ?>
                    </span>
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
            <?php get_sidebar(); ?>
        </div>
        <!-- Tag cloud -->
        <?php the_tags('', ', '); ?>
        <hr>
        <?php
        if (post_password_required()) {
            return;
        }
        ?>
        <?php
        if (comments_open() || get_comments_number()) {
            comments_template();
        }
        ?>
        <!-- Post Author Info -->
        <div class="card">
            <div class="card-header">
                <strong>
                    Posted by
                    <a href="<?php echo $author_URL; ?>"><?php the_author(); ?></a>
                </strong>
            </div>
            <div class="card-body">
                <div class="author-image">
                    <?php echo get_avatar($author_ID, 90, '', false, ['class' => 'img-circle']); ?>
                </div>
                <?php echo nl2br(get_the_author_meta('description')); ?>
            </div>
        </div><!-- Post Single - Author End -->
    </div>
</article>
<?php get_footer(); ?>
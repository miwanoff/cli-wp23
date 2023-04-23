<?php get_header("v2");?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8">
            <?php if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
            <!-- Title -->
            <h1 class="mt-4"><?php the_title()?></h1>

            <!-- Post category: -->
            <h2 class="mt-4"><?php the_category(" ")?></h2>
            <p class="card-text">
                <!-- Post Content -->
                <?php the_content();?>
            </p>
            <?php
}
}?>
        </div>
        <?php get_sidebar();?>
        <!-- /.row -->
    </div>
    <!-- /.container -->

</div>
<?php get_footer();?>
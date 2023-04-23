<?php
get_header();?>
<!-- Page Content -->
<div class="container">
    <h1 class="my-4">Welcome to Modern Business</h1>
    <!-- Marketing Icons Section -->
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php if (have_posts()) {
    while (have_posts()) {
        the_post();
        get_template_part('partials/posts/content', 'excerpt');

    }
}
?>

            <!-- Pagination -->
            <?php /*  posts_nav_link() */?>
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <?php previous_posts_link("&larr; Older");?>
                    <!-- <a class="page-link" href="#">&larr; Older</a> -->
                </li>
                <li class="page-item">
                    <?php next_posts_link("Newer &rarr;");?>
                    <!-- <a class="page-link" href="#">Newer &rarr;</a> -->
                </li>
            </ul>

        </div>
        <?php get_sidebar();?>
        <?php /* get_sidebar('second') sidebar-second.php */?>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
<?php get_footer();?>
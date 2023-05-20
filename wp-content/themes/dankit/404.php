<?php get_header(); ?>

<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="mt-4 mb-3">404
        <small>
            <?php _e("Page Not Found") ?>
        </small>
    </h1>
    <div class="d-flex justify-content-start mb-4"><a class="btn btn-primary text-uppercase" href="<?php echo home_url(); ?>">Back to Homepage</a></div>
    <div class="jumbotron">
        <h1 class="display-1">404</h1>
        <p>
            <?php _e("The page you're looking for could not be found") ?>
        </p>
    </div>
    <!-- /.jumbotron -->

</div>
<!-- /.container -->
<?php get_footer(); ?>
<?php
/* Template Name: Mini */
get_header();?>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <!-- Title -->
            <h1 class="mt-4 mb-3"><?php the_title()?></h1>
            <hr>
        </div>
    </div>
</div>

<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Post Content Column -->
        <?php query_posts('showposts=8');?>
        <?php while (have_posts()){
             the_post();?>
        <?php if (has_post_thumbnail()) {?>
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item center">
            <div class="card h-100  ">
                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('thumbnail', array(
        'class' => 'mx-auto d-block w-100 h-auto'));?></a>
                </p>
                <div class="card-body">
                    <p>
                        <a href="<?php the_permalink();?>" rel="bookmark"><?php the_title();?></a>
                    </p>
                </div>
            </div>
        </div>
        <?php }?>
        <?php }?>
    </div>
</div>
<?php get_footer();?>
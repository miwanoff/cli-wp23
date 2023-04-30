<?php
/* Template Name: Mini */
get_header("v2");?>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <!-- Title -->
            <h1 class="mt-4 mb-3"><?php the_title()?></h1>

            <!-- Post Content -->
            <?php the_content();

$defaults = array(
    'before' => '<div class="row justify-content-center align-items-center">' . __('Pages:'),
    'after' => '</div>',
);
wp_link_pages($defaults);
edit_post_link();
?>
            <hr>
        </div>
    </div>
</div>


<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Post Content Column -->
        <?php query_posts('showposts=8');?>
        <?php while (have_posts()) {
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
<?php
$categories = get_terms('category', 'orderby=name&hide_empty=0');
if ($categories) {
    echo '<ul>';
    foreach ($categories as $cat) {
        // term_id - ID рубрики, а $cat->name - название рубрики
        echo "<li value='{$cat->term_id}'>{$cat->name}</li>";
    }
    echo '</ul>';
}
get_footer();?>
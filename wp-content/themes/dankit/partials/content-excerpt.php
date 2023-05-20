<!-- Post preview-->
<div class="post-preview">
    <?php
    if (has_post_thumbnail()) {
        the_post_thumbnail("full", ["class" => "card-img-top"]);
    }
    ?>
    <a href="<?php the_permalink()?>">
        <h2 class="post-title"><?php the_title()?></h2>
        <h3 class="post-subtitle"><?php the_excerpt()?></h3>
    </a>
    <p class="post-meta">
        Posted by
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author()?></a>
        on <?php echo get_the_date() ?><br>
        Post category: <?php the_category(" ")?><br>
        Comments: <?php comments_number("0");?>
    </p>
</div>
<!-- Divider-->
<hr class="my-4" />
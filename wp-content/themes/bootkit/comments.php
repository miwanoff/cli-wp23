<?php if (post_password_required()) {
    return;
}
?>
<!-- Comments Form -->
<div class="card my-4">
    <!-- <h5 class="card-header">Leave a Comment:</h5> -->
    <div class="card-body">
        <!-- <form>
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form> -->
        <?php
comment_form([
    'comment_field' => '<div class="form-group">
    <textarea name="comment" cols="58" rows="3" class="form-control"></textarea>
</div>',
    'fields' => [
        'author' =>
        '<div class="col col-sm-4">
            <label>' . __('Name', 'bootkit') . '</label>
            <input type="text" name="author" class="form-control" />
        </div>',
        'email' =>
        '<div class="col col-sm-4">
            <label>' . __('Email', 'bootkit') . '</label>
            <input type="text" name="email" class="form-control" />
        </div>',
        'url' =>
        '<div class="col col-sm-4">
            <label>' . __('Website', 'bootkit') . '</label>
            <input type="text" name="url" class="form-control" />
        </div>',
    ],
    'class_submit' => 'btn btn-primary',
    'label_submit' => __('Submit Comment', 'bootkit'),
    'title_reply' => __('<h5 class="card-header">Leave a Comment</span>:', 'bootkit'),
]
);

?>
    </div>
</div>

<!-- Single Comment -->
<!-- <div class="media mb-4">
    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
    <div class="media-body">
        <h5 class="mt-0">Commenter Name</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
        purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
        vulputate fringilla. Donec lacinia congue felis in faucibus.
    </div>
</div> -->

<!-- Comment with nested comments -->
<!-- <div class="media mb-4">
    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
    <div class="media-body">
        <h5 class="mt-0">Commenter Name</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
        purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
        vulputate fringilla. Donec lacinia congue felis in faucibus.
        <div class="media mt-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                sollicitudin.
                Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum
                nunc
                ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
        <div class="media mt-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc
                ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
    </div>
</div> -->
<?php
if (have_comments()) {
    ?>
<!-- Comments List -->

<?php

    foreach ($comments as $comment) {
        ?>
<div class="media mb-4">
    <div class="comment-meta">
        <div class="comment-author vcard">
            <span class="comment-avatar clearfix">
                <?php echo get_avatar($comment, 60, '', '', ['class' => 'd-flex mr-3 rounded-circle']); ?>
            </span>
        </div>
    </div>
    <div class="comment-content clearfix">
        <div class="comment-author">
            <?php comment_author();?>
            <span><?php comment_date();?></span>
        </div>
        <div class="media-body">
            <?php comment_text();?>
        </div>
    </div>
</div>
<?php
}
    the_comments_pagination();
    ?>
<!-- .commentlist end -->
<?php
}
?>
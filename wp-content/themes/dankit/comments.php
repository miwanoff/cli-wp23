  <!-- Comments Form -->
  <div class="card my-4">
      <h5 class="card-header">Leave a Comment:</h5>
      <div class="card-body">
          <!-- <form>
                   <div class="form-group">
                       <textarea class="form-control" rows="3"></textarea>
                   </div>
                   <button type="submit" class="btn btn-primary">Submit</button>
               </form> -->
          <?php comment_form(
                [
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
                  <?php comment_author(); ?>
                  <span><?php comment_date(); ?></span>
              </div>
              <div class="media-body">
                  <?php comment_text(); ?>
              </div>
          </div>
      </div>
  <?php
    }
    the_comments_pagination();
    ?>
  <!-- .commentlist end -->

  <?php
    if (have_comments()) {
    ?>
      <h5 class="comments-title"><span><?php comments_number(); ?></span></h5>

      <!-- Comments List-->
      ...
      <!-- .commentlist end -->
  <?php
    }
    ?>
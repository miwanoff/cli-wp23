 <!-- Sidebar Widgets Column -->
 <div class="col-md-4">
     <?php get_search_form(); ?>
     <?php if (is_active_sidebar('dankit_sidebar')) {
            dynamic_sidebar('dankit_sidebar');
        } ?>
 </div>
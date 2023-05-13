<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        <!-- Top Social ============================================= -->
        <div id="top-social">
            <ul>
                <?php
if (get_theme_mod('bootkit_facebook_handle')) {
    ?>
                <li><a href="<?php echo get_theme_mod('bootkit_facebook_handle'); ?>" target="_blank">
                        <i class="fa fa-facebook"></i></a>
                </li>
                <?php
}
?>
            </ul>
        </div><!-- #top-social end -->

    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<?php wp_footer();?>
</body>

</html>
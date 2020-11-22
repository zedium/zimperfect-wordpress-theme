
			</div>

<!-- Scripts -->

<?php
    wp_enqueue_script( 'jquery', get_template_directory_uri(). '/assets/js/jquery.min.js',array(), '1.0.0', true );
    wp_enqueue_script( 'browser', get_template_directory_uri(). '/assets/js/browser.min.js', $in_footer=true );
    wp_enqueue_script( 'breakpoints', get_template_directory_uri(). '/assets/js/breakpoints.min.js', $in_footer=true );
    wp_enqueue_script( 'util', get_template_directory_uri(). '/assets/js/util.js', $in_footer=true );
    wp_enqueue_script( 'main', get_template_directory_uri(). '/assets/js/main.js', $in_footer=true );
    wp_enqueue_script( 'custom', get_template_directory_uri(). '/assets/js/custom.js', $in_footer=true );
    wp_footer();
?>

</body>
</html>
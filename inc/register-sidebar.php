<?php

add_action( 'widgets_init', 'zim_register_sidebars' );
function zim_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'zim-about-sidebar',
            'name'          => __( 'About sidebar' ),
            'description'   => __( 'About sidebar' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
}
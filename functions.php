<?php

require_once 'inc/theme-options.php';
require_once 'inc/aboutwidget.php';
require_once 'inc/latestpostswidget.php';
include_once 'inc/register-sidebar.php';


add_action('widget_init', 'zfunc_register_widgets');

function zfunc_register_widgets(){
  register_widget('AboutWidget');
}

add_theme_support( 'post-thumbnails' ); 


function register_zimperfect_menus() {
    register_nav_menus(
      array(
        'main-menu' => __( 'Main Menu' )
        
       )
     );
   }
   add_action( 'init', 'register_zimperfect_menus' );


function enq_scripts(){
    
}

add_action('wp_enqueue_scripts', 'enq_scripts');


add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
  return 'class="button large next"';
}
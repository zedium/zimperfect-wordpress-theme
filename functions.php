<?php

require_once 'inc/theme-options.php';


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
<?php


require_once 'inc/theme-options.php';
require_once 'inc/aboutwidget.php';
require_once 'inc/latestpostswidget.php';
require_once 'inc/posts-in-categories.php';
include_once 'inc/register-sidebar.php';


add_action('widget_init', 'zfunc_register_widgets');

function zfunc_register_widgets(){
  register_widget('AboutWidget');
}

add_theme_support( 'post-thumbnails' ); 


function register_zimperfect_menus() {
    register_nav_menus(
      array(
        'main-menu' => __( 'Main Menu' ),
        'sliding-menu'=> __('Sliding Menu')       
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



add_action('after_setup_theme', 'zimperfect_add_thumbnail_size');
function zimperfect_add_thumbnail_size(){
  add_image_size('main_post_thumbnails', 840, 341, true);
  add_image_size('sidebar_post_thumbnail', 350, 175, true);
  add_image_size('sidebar_post_micro_thumbnail', 64, 64, true);
}



add_filter('nav_menu_item_title', 'change_nav_menu_item_title', 1,4);

function change_nav_menu_item_title($title, $item, $args, $depth){

  if(!empty($item->description)){
    $title = '<h3>' . $title . '</h3>';
    $title .= '<p>' . $item->description . '</p>';
  }

  return $title;

}

function post_description_meta_box_markup($object)
{
  //var_dump($object);
  wp_nonce_field(basename(__FILE__), "post-description-meta-box-nonce");
  ?>
  <div>
    <label for="post-description-metabox">Post Description</label>
    <textarea id="post-description-metabox" name="post-description-metabox" class="components-text-control__input" rows=3><?php echo get_post_meta($object->ID, "post-description-meta-box-text", true); ?></textarea>
  </div>
  <?php
}

function add_post_description_meta_box()
{
    add_meta_box("post-description-metabox", "Post Description", "post_description_meta_box_markup", "post", "side", "high", null);
}

add_action("add_meta_boxes", "add_post_description_meta_box");


add_action("save_post", "save_post_description_meta_box", 10, 3);

function save_post_description_meta_box($post_id, $post, $update){
  if (!isset($_POST["post-description-meta-box-nonce"]) || !wp_verify_nonce($_POST["post-description-meta-box-nonce"], basename(__FILE__)))
    return $post_id;

  if(!current_user_can("edit_post", $post_id))
    return $post_id;

  if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
    return $post_id;

  $slug = "post";
  if($slug != $post->post_type)
    return $post_id;


  $post_description_meta_data = '';
  if(isset($_POST["post-description-metabox"]))
  {
      $post_description_meta_data = $_POST["post-description-metabox"];
  }
  update_post_meta($post_id, "post-description-meta-box-text", $post_description_meta_data);  
}



add_action( 'rest_api_init', function () {
  register_rest_route( 'zimperfect/v1', '/like/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => 'zimperfect_update_likes',
    'permission_callback' => '__return_true'
  ) );

  register_rest_route( 'zimperfect/v1', '/likes/(?P<id>\d+)', array(
    'methods' => 'GET',
    'callback' => 'zimperfect_get_likes',
    'permission_callback' => '__return_true'
  ) );

} );




/*
* Callbalc for REST request to update likes
*/



function zimperfect_update_likes( $data ) {
  
  $postID = $data['id'];
  

  

  $ip = $_SERVER['REMOTE_ADDR'];
  $key = 'postlike-' . $ip;
  
  $meta = get_post_meta($postID, $key, true);
  
  if(empty($meta)){
    
    //return "doesn exists $postID $key"  ;
    add_post_meta($postID, $key, "1", true);
       
  }

  $postLikes = getPostLikes($postID);
  return array('response'=>'OK', 'data'=>$postLikes);
  
}



/*
* Callbalc for REST request to get likes
*/
function zimperfect_get_likes($data){
  $postID = $data['id'];

  return getPostLikes($postID);
}





/*
* 
* get_post_meta does group in meta keys that similiar
* for example when the meta key is postlike-172.18.0.1 if it was repeated twice, function will return one 
* key with value of array contains two 1 e.g postlike-172.18.0.1 => array(1,1)
* Due to this we use count($value) for counting likes.
*/


function getPostLikes($postID){
  $metas = get_post_meta($postID);
  //return $metas;
  $likesCount = 0;
  foreach($metas as $meta => $value){
    
    if(strstr($meta, 'postlike-')){
      $likesCount += count($value);
    }
  }
  return $likesCount;
}
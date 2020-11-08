<?php

class PostsFromCategoryWidget extends WP_Widget{
    
    public $args = array(
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
        'before_widget' => '<section class="blurb">',
        'after_widget'  => '</div>'
    );

    public function __construct()
    {
        parent::__construct('posts-in-categories-widget', 'Imperfect Posts From Category');
        add_action( 'widgets_init', function() {
            register_widget( 'PostsFromCategoryWidget' );
        });


    }
    public function widget($args, $instance){
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        $recent_posts = wp_get_recent_posts( array('numberposts'=>$instance['postcount'], 'category'=>$instance['category']) );
        ?>
        <div class="postcountwidget">
        <?php if( $instance['display_type'] == 'regular' ){ ?>
            <section>
            <div class="mini-posts">
                <?php 
                
                
                foreach($recent_posts as $recent_post){
                    
                ?>
                <!-- Mini Post -->
                    <article class="mini-post">
                        <header>
                            <h3><a href="<?php echo get_permalink( $recent_post['ID'] );?>"><?php echo $recent_post['post_title'] ?></a></h3>
                            <time class="published" datetime="<?php the_date() ?>"><?php echo $recent_post['post_date'] ?></time>
                            <a href="#" class="author"><img src="<?php echo get_avatar_url( get_the_author_meta('user_email', $recent_post['post_author']) ) ?>" alt="" /></a>
                        </header>
                        <a href="<?php the_permalink( $recent_post['ID'] ) ?>" class="image"><?php echo get_the_post_thumbnail($recent_post['ID'], $size = 'sidebar_post_thumbnail') ?></a>
                    </article>

                <?php }
                wp_reset_query(); 
                ?>

            </div>
        </section>       
        <?php } else if( $instance['display_type'] == 'mini'){ ?>
            <!-- Posts List -->
            <section>
                <ul class="posts">
                    <?php
                    
                    foreach($recent_posts as $recent_post){
                    ?>
                    <li>
                        <article>
                            <header>
                                <h3><a href="<?php echo get_permalink( $recent_post['ID'] );?>"><?php echo $recent_post['post_title'] ?></a></h3>
                                <time class="published" datetime="<?php echo $recent_post['post_date'] ?>"><?php echo $recent_post['post_date'] ?></time>
                            </header>
                            <a href="<?php echo get_permalink( $recent_post['ID'] ); ?>" class="image"><?php echo get_the_post_thumbnail($recent_post['ID'], $size = array(51, 51)) ?></a>
                        </article>
                    </li>
                    <?php
                    }
                    wp_reset_query(); 
                    ?>
                </ul>
            </section>
        <?php } 

        echo $args['after_widget'];
    }
    public function form($instance){
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'zimperfect-theme-textdomain' );
        $postcount = ! empty( $instance['postcount'] ) ? $instance['postcount'] : esc_html__( '', 'zimperfect-theme-textdomain' );
        $display_type = ! empty( $instance['display_type'] ) ? $instance['display_type'] : esc_html__( '', 'zimperfect-theme-textdomain' );
        $category = ! empty( $instance['category'] ) ? $instance['category'] : esc_html__( '', 'zimperfect-theme-textdomain' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'zimperfect-theme-textdomain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'postcount' ) ); ?>"><?php echo esc_html__( 'Post count:', 'zimperfect-theme-textdomain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'postcount' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'postcount' ) ); ?>" type="text" value="<?php echo esc_attr( $postcount ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'display_type' ) ); ?>"><?php echo esc_html__( 'Display type:', 'zimperfect-theme-textdomain' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'display_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'display_type' ) ); ?>" type="text">
                <option value='mini' <?php echo ($display_type == 'mini') ? 'selected="selected"' : ''; ?>>Mini</option>
                <option value='regular' <?php echo ($display_type == 'regular') ? 'selected="selected"' : ''; ?>>Regular</option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php echo esc_html__( 'Category:', 'zimperfect-theme-textdomain' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" type="text">
                <?php 
                $categories = $this->getCategories();
                foreach($categories as $category_id=>$category_name){ ?>
                <option value='<?php echo $category_id ?>' <?php echo ($category_id == $category) ? 'selected="selected"' : ''; ?>><?php echo $category_name ?></option>
                <?php } ?>
                
            </select>
        </p>
        <?php
    }
    public function update($new_instance, $old_instance){
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['postcount'] = ( !empty( $new_instance['postcount'] ) ) ? $new_instance['postcount'] : '';
        $instance['display_type'] = ( !empty( $new_instance['display_type'] ) ) ? $new_instance['display_type'] : '';
        $instance['category'] = ( !empty( $new_instance['category'] ) ) ? $new_instance['category'] : '';
 
        return $instance;
    }


    public function getCategories(){
        $raw_categories = get_categories( array(
            'orderby' => 'name',
            'order'   => 'ASC'
          ) );
        
        $categories = array();

        foreach($raw_categories as $category){
            $categories[$category->cat_ID] = $category->name;
        }

        return $categories;
    }
}

$postsFromCategoryWidget = new PostsFromCategoryWidget();
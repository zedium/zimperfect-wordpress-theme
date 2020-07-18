<?php

class LatestPostsWidget extends WP_Widget{
    
    public $args = array(
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
        'before_widget' => '<section class="blurb">',
        'after_widget'  => '</div>'
    );

    public function __construct()
    {
        parent::__construct('latestposts-widget', 'Zimperfect Latest Us');
        add_action( 'widgets_init', function() {
            register_widget( 'LatestPostsWidget' );
        });
    }
    public function widget($args, $instance){
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
 
        echo '<div class="textwidget">';
 
        echo esc_html__( $instance['text'], 'text_domain' );
 
        echo '</div>';
 
        echo $args['after_widget'];
    }
    public function form($instance){
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'zimperfect-theme-textdomain' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'zimperfect-theme-textdomain' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'zimperfect-theme-textdomain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'postcount' ) ); ?>"><?php echo esc_html__( 'Post count:', 'zimperfect-theme-textdomain' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'postcount' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        <?php
    }
    public function update($new_instance, $old_instance){
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
 
        return $instance;
    }
}

$aboutWidget = new LatestPostsWidget();
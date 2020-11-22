<?php 
       
       if ( post_password_required() ) {
        return;
    }

    if ( comments_open() || pings_open() ) {

        if ( $comments ) {
            echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
        }
    
        comment_form(
            array(
                'class_form'         => 'section-inner thin max-percentage',
                'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
                'title_reply_after'  => '</h2>',
            )
        );
    
    } elseif ( is_single() ) {
    
        if ( $comments ) {
            echo '<hr class="styled-separator is-style-wide" aria-hidden="true" />';
        }
    
        ?>
    
        <div class="comment-respond" id="respond">
    
            <p class="comments-closed"><?php _e( 'Comments are closed.', 'twentytwenty' ); ?></p>
    
        </div><!-- #respond -->
    
        <?php
    }
        
?>
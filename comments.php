<?php
    /**
     * The template for displaying Comments.
     *
     * The area of the page that contains comments and the comment form.
     *
     * @package WordPress
     * @subpackage zimperfect
     * @since zimperfect 1.0
     */
     
    /*
     * If the current post is protected by a password and the visitor has not yet
     * entered the password we will return early without loading the comments.
     */
    if ( post_password_required() )
        return;
    ?>
    <article class="post"> 
    <div id="comments" class="comments-area">
     
        <?php if ( have_comments() ) : ?>
            <h2 class="comments-title">
                <?php
                    printf( _nx( 'One thought on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title', 'zimperfect-theme-textdomain' ),
                        number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
                ?>
            </h2>
     
            <ol class="comment-list">
                <?php
                    wp_list_comments( array(
                        'style'       => 'ul',
                        'short_ping'  => true,
                        'avatar_size' => 74,
                    ) );
                ?>
            </ol><!-- .comment-list -->
     
            <?php
                // Are there comments to navigate through?
                if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'zimperfect-theme-textdomain' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( __( '&amp;larr; Older Comments', 'zimperfect-theme-textdomain' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &amp;rarr;', 'zimperfect-theme-textdomain' ) ); ?></div>
            </nav><!-- .comment-navigation -->
            <?php endif; // Check for comment navigation ?>
     
            <?php if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="no-comments"><?php _e( 'Comments are closed.' , 'zimperfect-theme-textdomain' ); ?></p>
            <?php endif; ?>
     
        <?php endif; // have_comments() ?>
     
        <?php comment_form(); ?>
     
    </div><!-- #comments -->
    </article>
    <?php
    return;
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
    
            <p class="comments-closed"><?php _e( 'Comments are closed.', 'zimperfect-theme-textdomain' ); ?></p>
    
        </div><!-- #respond -->
    
        <?php
    }
        
?>
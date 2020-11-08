<?php


if ( ! class_exists( 'Redux' ) ) {
    return;
}

$opt_name = 'zimperfect';

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    'display_name'         => $theme->get( 'Zimperfect options' ),
    'display_version'      => $theme->get( '1.0' ),
    'menu_title'           => esc_html__( 'Zimperfect Options', 'zimperfect-theme-textdomain' ),
    'customizer'           => true,
);

Redux::setArgs( $opt_name, $args );

Redux::setSection( $opt_name,
    array(
        'title'  => esc_html__( 'Basic Options', 'zimperfect-theme-textdomain' ),
        'id'     => 'zimperfect-basic',
        'desc'   => esc_html__( 'Basic options.', 'zimperfect-theme-textdomain' ),
        'icon'   => 'el el-home',

        'fields' => array(
            array(
            'id'       => 'zopt-logo',
            'type'     => 'media',
            'title'    => esc_html__( 'Select Logo', 'zimperfect-theme-textdomain' ),
            'desc'     => esc_html__( 'Logo will be shown in header.', 'zimperfect-theme-textdomain' ),
            'subtitle' => esc_html__( 'Main logo.', 'zimperfect-theme-textdomain' ),
            'hint'     => array(
                            'content' => 'Zimperfect logo',
                        )
            ),
            array(
                'id'       => 'zopt-site-title',
                'type'     => 'text',
                'title'    => esc_html__( 'Website Title', 'zimperfect-theme-textdomain' ),
                'desc'     => esc_html__( 'This Title will be shown in Title section', 'zimperfect-theme-textdomain' ),
                'subtitle' => esc_html__( 'Website title', 'zimperfect-theme-textdomain' ),
                'hint'     => array(
                                'content' => 'Title',
                            )
                
            ),
            array(
                'id'       => 'zopt-site-description',
                'type'     => 'text',
                'title'    => esc_html__( 'Website Description', 'zimperfect-theme-textdomain' ),
                'desc'     => esc_html__( 'This description will be shown in description section', 'zimperfect-theme-textdomain' ),
                'subtitle' => esc_html__( 'Website description', 'zimperfect-theme-textdomain' ),
                'hint'     => array(
                                'content' => 'Description',
                            )
            ),
            array(
                'id'       => 'zopt-site-footer-text',
                'type'     => 'text',
                'title'    => esc_html__( 'Website Footer Text', 'zimperfect-theme-textdomain' ),
                'desc'     => esc_html__( 'This text will be shown in footer section', 'zimperfect-theme-textdomain' ),
                'subtitle' => esc_html__( 'Website footer text', 'zimperfect-theme-textdomain' ),
                'hint'     => array(
                                'content' => 'Footer text',
                            )
            )
        )
    )
);

Redux::setSection( $opt_name,
    array(
        'title'  => esc_html__( 'Social Networks', 'zimperfect-theme-textdomain' ),
        'id'     => 'zimperfect-social',
        'desc'   => esc_html__( 'Social Networks.', 'zimperfect-theme-textdomain' ),
        'icon'   => 'el el-home',

        'fields' => array(
            array(
            'id'       => 'zopt-social-twitter',
            'type'     => 'text',
            'title'    => esc_html__( 'Twitter Account', 'zimperfect-theme-textdomain' ),
            'desc'     => esc_html__( 'Twitter account will be displayed in footer', 'zimperfect-theme-textdomain' ),
            'subtitle' => esc_html__( 'Twitter Account', 'zimperfect-theme-textdomain' ),
            'hint'     => array(
                            'content' => 'Twitter',
                        )
            ),
            array(
                'id'       => 'zopt-social-facebook',
                'type'     => 'text',
                'title'    => esc_html__( 'Facebook Account', 'zimperfect-theme-textdomain' ),
                'desc'     => esc_html__( 'Facebook account will be displayed in footer', 'zimperfect-theme-textdomain' ),
                'subtitle' => esc_html__( 'Facebook Account', 'zimperfect-theme-textdomain' ),
                'hint'     => array(
                                'content' => 'Facebook',
                              )
            ),
            array(
                'id'       => 'zopt-social-instagram',
                'type'     => 'text',
                'title'    => esc_html__( 'Instagram Account', 'zimperfect-theme-textdomain' ),
                'desc'     => esc_html__( 'Instagram account will be displayed in footer', 'zimperfect-theme-textdomain' ),
                'subtitle' => esc_html__( 'Instagram Account', 'zimperfect-theme-textdomain' ),
                'hint'     => array(
                                'content' => 'Instagram',
                              )
            ),
            array(
                'id'       => 'zopt-social-rss',
                'type'     => 'text',
                'title'    => esc_html__( 'RSS Url', 'zimperfect-theme-textdomain' ),
                'desc'     => esc_html__( 'RSS Url will be displayed in footer', 'zimperfect-theme-textdomain' ),
                'subtitle' => esc_html__( 'RSS Url', 'zimperfect-theme-textdomain' ),
                'hint'     => array(
                                'content' => 'RSS URL',
                              )
            ),
            array(
                'id'       => 'zopt-social-email',
                'type'     => 'text',
                'title'    => esc_html__( 'Email Address', 'zimperfect-theme-textdomain' ),
                'desc'     => esc_html__( 'Email address will be displayed in footer', 'zimperfect-theme-textdomain' ),
                'subtitle' => esc_html__( 'Email Address', 'zimperfect-theme-textdomain' ),
                'hint'     => array(
                                'content' => 'Email Address',
                              )
            )
        )
    )
);
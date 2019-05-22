<?php
/**
 * @Packge     : Medical
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

function medical_widgets_init() {
    // sidebar widgets register
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'medical' ),
            'id'            => 'medical-post-sidebar',
            'before_widget' => '<div id="%1$s" class="single-widget single-sidebar-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgets-title">',
            'after_title'   => '</h4>',
        )
    );
    
    // footer widgets register
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer One', 'medical' ),
            'id'            => 'footer-1',
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h6>',
            'after_title'   => '</h6>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Two', 'medical' ),
            'id'            => 'footer-2',
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h6>',
            'after_title'   => '</h6>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Three', 'medical' ),
            'id'            => 'footer-3',
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h6>',
            'after_title'   => '</h6>',
        )
    );


}
add_action( 'widgets_init', 'medical_widgets_init' );

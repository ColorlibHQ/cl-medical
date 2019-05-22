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

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'medical_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'medical' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'medical_general_options_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'medical' ),
            'panel'    => 'medical_options_panel',
            'priority' => 1,
        ),
    ),
    /**
     * Header Section
     */
    array(
        'id'   => 'medical_headertop_options_section',
        'args' => array(
            'title'    => esc_html__( 'Header Top', 'medical' ),
            'panel'    => 'medical_options_panel',
            'priority' => 2,
        ),
    ),
    /**
     * Blog Section
     */
    array(
        'id'   => 'medical_blog_options_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'medical' ),
            'panel'    => 'medical_options_panel',
            'priority' => 3,
        ),
    ),

	/**
	 * Page Section
	 */
	array(
		'id'   => 'medical_page_options_section',
		'args' => array(
			'title'    => esc_html__( 'page', 'medical' ),
			'panel'    => 'medical_options_panel',
			'priority' => 4,
		),
	),


	/**
     * 404 Page Section
     */
    array(
        'id'   => 'medical_fof_options_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'medical' ),
            'panel'    => 'medical_options_panel',
            'priority' => 6,
        ),
    ),
    /**
     * Footer Section
     */
    array(
        'id'   => 'medical_footer_options_section',
        'args' => array(
            'title'    => esc_html__( 'Footer', 'medical' ),
            'panel'    => 'medical_options_panel',
            'priority' => 7,
        ),
    ),

);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

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
 * General Section Fields
 ***********************************/


// Theme Main Color Picker
Epsilon_Customizer::add_field(
    'medical_themecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Main Color.', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_general_options_section',
        'default'     => '#67bc00',
    )
);
// Google map api key field
$url = 'https://developers.google.com/maps/documentation/geocoding/get-api-key';

Epsilon_Customizer::add_field(
    'medical_map_apikey',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Google map api key', 'medical' ),
        'description'       => sprintf( __( 'Set google map api key. To get api key %s click here %s.', 'medical' ), '<a target="_blank" href="'.esc_url( $url  ).'">', '</a>' ),
        'section'           => 'medical_general_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
        
    )
);

/***********************************
 * Header Section Fields
 ***********************************/

// Top Header Bar switch field
Epsilon_Customizer::add_field(
    'medical-topheader-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Toggle top header bar', 'medical' ),
        'section'     => 'medical_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

// Header top Phone number
Epsilon_Customizer::add_field(
	'medical-header-top-phone',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Phone Number', 'medical' ),
		'section'     => 'medical_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => '+953 012 3654 896',
	)
);
// Header top email
Epsilon_Customizer::add_field(
	'medical-header-top-email',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Email Address', 'medical' ),
		'section'     => 'medical_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => 'support@colorlib.com',
	)
);
// Header top bar action button
Epsilon_Customizer::add_field(
	'medical-header-top-action-btn',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Top Bar Action Button Label', 'medical' ),
		'section'     => 'medical_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => esc_html__( 'Book Appointment', 'medical' )
	)
);
// Header top email
Epsilon_Customizer::add_field(
	'medical-header-top-action-url',
	array(
		'type'        => 'url',
		'label'       => esc_html__( 'Top Bar Action Button URL', 'medical' ),
		'section'     => 'medical_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

// Header Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'medical_header_navbar_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav-bar Background Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_headertop_options_section',
        'default'     => '',
    )
);

// Header Sticky  Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'medical_header_navbarsticky_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Sticky Nav Bar Background Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_headertop_options_section',
        'default'     => '',
    )
);
// Header Nav Bar Menu Color Picker
Epsilon_Customizer::add_field(
    'medical_header_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header Nav Bar Menu Hover Color Picker
Epsilon_Customizer::add_field(
    'medical_header_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Hover Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_headertop_options_section',
        'default'     => '#69be00',
    )
);
// Header sticky nav bar menu color picker
Epsilon_Customizer::add_field(
    'medical_header_sticky_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header sticky nav bar menu hover color picker
Epsilon_Customizer::add_field(
    'medical_header_sticky_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Hover Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_headertop_options_section',
        'default'     => '#69be00',
    )
);
// Page Header Background Color Picker
Epsilon_Customizer::add_field(
    'medical_headerbgcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => 'rgba(4,9,30,0.85)',
    )
);
// Page Header text Color Picker
Epsilon_Customizer::add_field(
    'medical_headertextcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Text Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#fff',
    )
);
// Header overlay switch field
Epsilon_Customizer::add_field(
    'medical-headeroverlay-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Toggle header overlay', 'medical' ),
        'section'     => 'colors',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
// Header overlay color
Epsilon_Customizer::add_field(
    'medical_headeroverlaycolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Overlay Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => 'rgba(0,0,0,0.5)',
    )
);

/***********************************
 * Blog Section Fields
 ***********************************/
// Featured Post
Epsilon_Customizer::add_field(
	'medical-featured-post-toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Featured post Show/Hide', 'medical' ),
		'section'     => 'medical_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
Epsilon_Customizer::add_field(
	'medical_featured_post',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Featured Post ID', 'medical' ),
		'section'     => 'medical_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => '',
	)
);

// Category show
Epsilon_Customizer::add_field(
	'medical-category-show',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Featured Category Show/Hide', 'medical' ),
		'section'     => 'medical_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
// Category Number
Epsilon_Customizer::add_field(
	'medical_cat_number',
	array(
		'type'        => 'epsilon-slider',
		'label'       => esc_html__( 'Featured Category Number', 'medical' ),
		'description' => esc_html__( 'Set how many featured categories you want to show in blog page top.', 'medical' ),
		'section'     => 'medical_blog_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => '3',
	)
);

// Post excerpt length field
Epsilon_Customizer::add_field(
    'medical_post_excerpt',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Post Excerpt', 'medical' ),
        'description' => esc_html__( 'Set post excerpt length.', 'medical' ),
        'section'     => 'medical_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);
// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'medical-blog-sidebar-settings',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'medical' ),
        'section'  => 'medical_blog_options_section',
        'description' => esc_html__( 'Select the option to set blog page sidebar position.', 'medical' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 2,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);
if( defined( 'MEDICAL_COMPANION_VERSION' ) ) {
// Header social switch field
Epsilon_Customizer::add_field(
    'medical-blog-social-share-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Social Share Show/Hide', 'medical' ),
        'section'     => 'medical_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

// Header social switch field
Epsilon_Customizer::add_field(
    'medical-blog-like-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Like Button Show/Hide', 'medical' ),
        'section'     => 'medical_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
}



/***********************************
 * Page Section Fields
 ***********************************/

// Blog sidebar layout field
Epsilon_Customizer::add_field(
	'medical-page-sidebar-settings',
	array(
		'type'     => 'epsilon-layouts',
		'label'    => esc_html__( 'page Layout', 'medical' ),
		'section'  => 'medical_page_options_section',
		'description' => esc_html__( 'Select the option to set page sidebar position.', 'medical' ),
		'layouts'  => array(
			'1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
			'2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
			'3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
		),
		'default'  => array(
			'columnsCount' => 1,
			'columns'      => array(
				1 => array(
					'index' => 1,
				),
				2 => array(
					'index' => 2,
				),
				3 => array(
					'index' => 3,
				)
			),
		),
		'min_span' => 4,
		'fixed'    => true
	)
);



/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'medical_fof_text_one',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'medical' ),
        'section'           => 'medical_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Ooops 404 Error !'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'medical_fof_text_two',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'medical' ),
        'section'           => 'medical_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Either something went wrong or the page dosen\'t exist anymore.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'medical_fof_textonecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_fof_options_section',
        'default'     => '#404551', 
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'medical_fof_texttwocolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_fof_options_section',
        'default'     => '#abadbe',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'medical_fof_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_fof_options_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'medical-widget-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'medical' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'medical' ),
        'section'     => 'medical_footer_options_section',
        'default'     => false,
    )
);

// Footer copy right text add settings

// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'medical' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

Epsilon_Customizer::add_field(
    'medical-copyright-text-settings',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'medical' ),
        'section'     => 'medical_footer_options_section',
        'default'     => wp_kses_post( $copyText ),
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'medical_footer_bgimg_settings',
    array(
        'type'        => 'epsilon-image',
        'label'       => esc_html__( 'Footer Widget Background Image', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_footer_options_section',
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'medical_footer_widget_bgColor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Background Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_footer_options_section',
        'default'     => '#222',
    )
);
// Footer widget text color field
Epsilon_Customizer::add_field(
    'medical_footer_widget_color_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Text Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_footer_options_section',
        'default'     => '#777',
    )
);
// Footer widget title color field
Epsilon_Customizer::add_field(
    'medical_footer_widgettitlecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widgets Title Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_footer_options_section',
        'default'     => '#fff',
    )
);
// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'medical_footer_widget_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_footer_options_section',
        'default'     => '#777',
    )
);
// Footer widget anchor hover Color
Epsilon_Customizer::add_field(
    'medical_footer_widget_anchorhovcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Hover Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_footer_options_section',
        'default'     => '#67bc00',
    )
);

// Footer bottom bg Color
Epsilon_Customizer::add_field(
    'medical_footer_bottom_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Background Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_footer_options_section',
        'default'     => '#222',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'medical_footer_bottom_textcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Text Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_footer_options_section',
        'default'     => '#777',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'medical_footer_bottom_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_footer_options_section',
        'default'     => '#67bc00',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'medical_footer_bottom_anchorhovercolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Hover Color', 'medical' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'medical_footer_options_section',
        'default'     => '#67bc00',
    )
);

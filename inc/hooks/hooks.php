<?php 
/**
 * @Packge 	   : Medical
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 *
 * Before Wrapper
 *
 * @Preloader
 *
 */
add_action( 'medical_preloader', 'medical_site_preloader', 10 );

/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 * 
 */

add_action( 'medical_header', 'medical_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'medical_footer', 'medical_footer_area', 10 );
add_action( 'medical_footer', 'medical_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'medical_wrp_start', 'medical_wrp_start_cb', 10 );
add_action( 'medical_wrp_end', 'medical_wrp_end_cb', 10 );

/**
 * Hook for Page wrapper.
 */
add_action( 'medical_page_wrp_start', 'medical_page_wrp_start_cb', 10 );
add_action( 'medical_page_wrp_end', 'medical_page_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'medical_blog_col_start', 'medical_blog_col_start_cb', 10 );
add_action( 'medical_blog_col_end', 'medical_blog_col_end_cb', 10 );

/**
 * Hook for Page column.
 */
add_action( 'medical_page_col_start', 'medical_page_col_start_cb', 10 );
add_action( 'medical_page_col_end', 'medical_page_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'medical_blog_posts_thumb', 'medical_blog_posts_thumb_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'medical_blog_posts_title', 'medical_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'medical_blog_posts_meta', 'medical_blog_posts_meta_cb', 10 );

/**
 * Hook for blog posts bottom meta.
 */
add_action( 'medical_blog_posts_bottom_meta', 'medical_blog_posts_bottom_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'medical_blog_posts_excerpt', 'medical_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'medical_blog_posts_content', 'medical_blog_posts_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'medical_blog_sidebar', 'medical_blog_sidebar_cb', 10 );

/**
 * Hook for page sidebar.
 */
add_action( 'medical_page_sidebar', 'medical_page_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'medical_blog_posts_share', 'medical_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'medical_blog_single_meta', 'medical_blog_single_meta_cb', 10 );

/**
 * Hook for blog single footer nav next - previous link and comments form.
 */
add_action( 'medical_blog_single_footer_nav', 'medical_blog_single_footer_nav_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'medical_page_content', 'medical_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'medical_fof', 'medical_fof_cb', 10 );

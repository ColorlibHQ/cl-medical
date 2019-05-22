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
?>

<!-- Post Item Start -->
<div id="<?php the_ID(); ?>" <?php post_class( esc_attr( 'single-post row' ) ); ?>>
    <div class="col-lg-12">
        <?php if( has_post_thumbnail() ){ ?>
            <div class="feature-img">
		        <?php
		        /**
		         * Blog Post thumbnail
		         * @Hook  medical_blog_posts_thumb
		         *
		         * @Hooked medical_blog_posts_thumb_cb
		         *
		         *
		         */
		        do_action( 'medical_blog_posts_thumb' );
		        ?>
            </div>

        <?php
        } ?>

    </div>

    <div class="col-lg-3  col-md-3 meta-details">
        <?php
        /**
         * Blog Post Meta
         * @Hook  medical_blog_posts_meta
         *
         * @Hooked medical_blog_posts_meta_cb
         *
         *
         */
        do_action( 'medical_blog_posts_meta' );
        ?>

        <div class="user-details row">
            <?php
            /**
             * Blog single post meta category, tag, next - previous link, comments form
             * and biography
             * @Hook  medical_blog_single_meta
             *
             * @Hooked medical_blog_single_meta_cb
             *
             *
             */
            do_action( 'medical_blog_single_meta' );
            ?>
        </div>
    </div>

	<?php	
		
	echo '<div class="col-lg-9 col-md-9 blog-detail-txt">';

        /**
         * Blog post title
         * @Hook  medical_blog_posts_content
         *
         * @Hooked medical_blog_posts_title_cb
         *
         *
         */
        do_action( 'medical_blog_posts_title' );

	/**
	 * Blog single page content 
	 * Post social share
	 * @Hook  medical_blog_posts_content
	 *
	 * @Hooked medical_blog_posts_content_cb
	 * 
	 *
	 */
	do_action( 'medical_blog_posts_content' );


	echo '</div>';


	?>
</div>
<?php

/**
 * Blog single page content 
 * @Hook  medical_blog_single_footer_nav
 *
 * @Hooked medical_blog_single_footer_nav_cb
 * 
 *
 */
do_action( 'medical_blog_single_footer_nav' );

// comment template.
if ( comments_open() || get_comments_number() ) {
	comments_template();
}
	
?>           
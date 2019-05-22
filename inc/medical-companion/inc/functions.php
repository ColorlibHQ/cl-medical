<?php 
/**
 * @Packge     : Medical Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( ! defined( 'WPINC' ) ) {
    die;
}

// Add Image Size
add_image_size( 'medical_360x220', 360, 220, true );


// Instagram object Instance
function medical_instagram_instance() {
    
    $api = Wpzoom_Instagram_Widget_API::getInstance();

    return $api;
}

// Blog Section
function medical_blog_section( $postnumber ) {
    
    ?>
    <div class="row">
        <?php 
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => esc_html( $postnumber ),
        );
        
        $query = new WP_Query( $args );
        
        if( $query->have_posts() ):
            while( $query->have_posts() ):
                $query->the_post();
                ?>

                <div class="single-recent-blog col-lg-4 col-md-4">
                    <?php
                    // Thumbnail
	                if( has_post_thumbnail() ) {
		                echo '<div class="thumb">';
		                the_post_thumbnail( 'medical_360x220', array( 'class' => 'img-fluid' ) );
		                echo '</div>';
	                }
	                ?>					
                    <a href="<?php the_permalink(); ?>">
                        <h4><?php the_title(); ?></h4>
                    </a>
                    <?php
                        // Limited Excerpt
                        echo medical_excerpt_length( '25' );
                    ?>
                    <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <?php
                            $avatar = get_avatar( absint( get_the_author_meta( 'ID' ) ), 30 );
                            if( $avatar  ) {
                                echo wp_kses_post( $avatar );
                            } ?>
                            <a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a>
                        </div>
                        <div class="meta">
                            <?php
                            echo '<a href="'. esc_url( medical_blog_date_permalink() ) .'">'. esc_html( get_the_date( 'jS M' ) ) .'</a>';

                            // Post Love
                            if( medical_opt('medical-blog-like-toggle') && function_exists('get_simple_likes_button') ) {
                                echo get_simple_likes_button( absint( get_the_ID() ) );
                            }
                            
                            //Comments ==============
                            echo medical_posted_comments(); 
                            ?>
                        </div>
                    </div>								
                </div>	
                <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
    <?php
}

// Section Heading 
function medical_section_heading( $title = '', $subtitle = '' ) {
    if( $title || $subtitle ):
        ?>
        <div class="row justify-content-center">
            <div class="col-md-8 pb-60 header-text text-center">
                <?php 
                // Title
                if( $title ){
                    echo medical_heading_tag(
                        array(
                            'tag'    => 'h1',
                            'class'  => 'mb-10',
                            'text'   => esc_html( $title ),
                        )
                    );
                }
                // Sub Title
                if( $subtitle ){
                    echo medical_paragraph_tag(
                        array(
                            'text'  => esc_html( $subtitle ),
                        )
                    );
                }
                ?>
            </div>
        </div>

        <?php
    endif;
}

// Set contact form 7 default form template
function medical_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-lg-6 form-group">[text* your-name class:common-input class:mb-20 class:form-control placeholder "Enter Your Name"][email* your-email class:common-input class:mb-20 class:form-control placeholder "Enter Email Address"][text* your-subject class:common-input class:mb-20 class:form-control placeholder "Enter Subject"]</div><div class="col-lg-6 form-group">[textarea* your-message class:common-textarea class:form-control rows:9 placeholder "Message"]</div><div class="col-lg-12"><div class="alert-msg" style="text-align: left;"></div>[submit class:genric-btn class:primary "Send Message"]</div></div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'medical_contact7_form_content', 10, 2 );

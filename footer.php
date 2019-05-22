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

/**
 * Footer Area
 *
 * @Footer
 * @Back To Top Button
 *
 * @Hook medical_footer
 *
 * @Hooked  medical_footer_area 10
 * @Hooked  medical_back_to_top 20
 *
 */

do_action( 'medical_footer' );

wp_footer(); 
?>
</body>
</html>
<?php
/**
 * @Packge     : Medical Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( ! defined( 'MEDICAL_COMPANION_VERSION' ) ) {
    define( 'MEDICAL_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( ! defined( 'MEDICAL_COMPANION_DIR_PATH' ) ) {
    define( 'MEDICAL_COMPANION_DIR_PATH',  get_parent_theme_file_path().'/inc/medical-companion/' );
}

// Define inc dir path constant
if( ! defined( 'MEDICAL_COMPANION_INC_DIR_PATH' ) ) {
    define( 'MEDICAL_COMPANION_INC_DIR_PATH', MEDICAL_COMPANION_DIR_PATH . 'inc/' );
}

// Define sidebar widgets dir path constant
if( ! defined( 'MEDICAL_COMPANION_SW_DIR_PATH' ) ) {
    define( 'MEDICAL_COMPANION_SW_DIR_PATH', MEDICAL_COMPANION_INC_DIR_PATH . 'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( ! defined( 'MEDICAL_COMPANION_EW_DIR_PATH' ) ) {
    define( 'MEDICAL_COMPANION_EW_DIR_PATH', MEDICAL_COMPANION_INC_DIR_PATH . 'elementor-widgets/' );
}

// Define demo data dir path constant
if( ! defined( 'MEDICAL_COMPANION_DEMO_DIR_PATH' ) ) {
    define( 'MEDICAL_COMPANION_DEMO_DIR_PATH', MEDICAL_COMPANION_INC_DIR_PATH . 'demo-data/' );
}

// Define plugin dir url constant
if( ! defined( 'MEDICAL_THEME_DIR_URL' ) ) {
    define( 'MEDICAL_THEME_DIR_URL', get_template_directory_uri() );
}

// Define inc dir url constant
if( ! defined( 'MEDICAL_COMPANION_DIR_URL' ) ) {
    define( 'MEDICAL_COMPANION_DIR_URL', MEDICAL_THEME_DIR_URL . '/inc/medical-companion/' );
}

// Define inc dir url constant
if( ! defined( 'MEDICAL_COMPANION_INC_DIR_URL' ) ) {
    define( 'MEDICAL_COMPANION_INC_DIR_URL', MEDICAL_COMPANION_DIR_URL . '/inc/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'MEDICAL_COMPANION_EW_DIR_URL' ) ) {
    define( 'MEDICAL_COMPANION_EW_DIR_URL', MEDICAL_COMPANION_INC_DIR_URL . 'elementor-widgets/' );
}

// Define demo data dir url constant
if( ! defined( 'MEDICAL_COMPANION_DD_DIR_URL' ) ) {
    define( 'MEDICAL_COMPANION_DD_DIR_URL', MEDICAL_COMPANION_INC_DIR_URL . 'demo-data/' );
}

// Define Meta dir url constant
if( ! defined( 'MEDICAL_COMPANION_META_DIR_URL' ) ) {
    define( 'MEDICAL_COMPANION_META_DIR_URL', MEDICAL_COMPANION_INC_DIR_URL . 'medical-meta/' );
}


$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();

if( ( 'CL-Medical' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'CL-Medical' == $is_parent->get( 'Name' ) ) ) {
    require_once MEDICAL_COMPANION_DIR_PATH . 'medical-init.php';
} else {

    add_action( 'admin_notices', 'medical_companion_admin_notice', 99 );
    function medical_companion_admin_notice() {
        $url = 'https://wordpress.org/themes/medical/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Medical Companion</strong> plugin you have to also install the %1$sMedical Theme%2$s', 'medical' ), '<a href="' . esc_url( $url ) . '" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}

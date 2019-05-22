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
 * Define constant
 *
 */
 
// Base URI
if( ! defined( 'MEDICAL_DIR_URI' ) ) {
	define( 'MEDICAL_DIR_URI', get_template_directory_uri().'/' );
}

// assets URI
if( ! defined( 'MEDICAL_DIR_ASSETS_URI' ) ) {
	define( 'MEDICAL_DIR_ASSETS_URI', MEDICAL_DIR_URI.'assets/' );
}

// Css File URI
if( ! defined( 'MEDICAL_DIR_CSS_URI' ) ) {
	define( 'MEDICAL_DIR_CSS_URI', MEDICAL_DIR_ASSETS_URI .'css/' );
}

// Js File URI
if( ! defined( 'MEDICAL_DIR_JS_URI' ) ) {
	define( 'MEDICAL_DIR_JS_URI', MEDICAL_DIR_ASSETS_URI .'js/' );
}

// Base Directory
if( ! defined( 'MEDICAL_DIR_PATH' ) ) {
	define( 'MEDICAL_DIR_PATH', get_parent_theme_file_path().'/' );
}

//Inc Folder Directory
if( ! defined( 'MEDICAL_DIR_PATH_INC' ) ) {
	define( 'MEDICAL_DIR_PATH_INC', MEDICAL_DIR_PATH.'inc/' );
}

//Medical libraries Folder Directory
if( ! defined( 'MEDICAL_DIR_PATH_LIBS' ) ) {
	define( 'MEDICAL_DIR_PATH_LIBS', MEDICAL_DIR_PATH_INC.'libraries/' );
}

//Classes Folder Directory
if( ! defined( 'MEDICAL_DIR_PATH_CLASSES' ) ) {
	define( 'MEDICAL_DIR_PATH_CLASSES', MEDICAL_DIR_PATH_INC.'classes/' );
}

//Hooks Folder Directory
if( ! defined( 'MEDICAL_DIR_PATH_HOOKS' ) ) {
	define( 'MEDICAL_DIR_PATH_HOOKS', MEDICAL_DIR_PATH_INC.'hooks/' );
}

//Widgets Folder Directory
if( ! defined( 'MEDICAL_DIR_PATH_WIDGET' ) ) {
	define( 'MEDICAL_DIR_PATH_WIDGET', MEDICAL_DIR_PATH_INC.'widgets/' );
}




/**
 * Include File
 *
 */

require_once( MEDICAL_DIR_PATH_INC . 'medical-companion/medical-companion.php' );
require_once( MEDICAL_DIR_PATH_INC . 'breadcrumbs.php' );
require_once( MEDICAL_DIR_PATH_INC . 'category-meta.php' );
require_once( MEDICAL_DIR_PATH_INC . 'widgets-reg.php' );
require_once( MEDICAL_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
require_once( MEDICAL_DIR_PATH_INC . 'medical-functions.php' );
require_once( MEDICAL_DIR_PATH_INC . 'commoncss.php' );
require_once( MEDICAL_DIR_PATH_INC . 'support-functions.php' );
require_once( MEDICAL_DIR_PATH_INC . 'wp-html-helper.php' );
require_once( MEDICAL_DIR_PATH_INC . 'customizer/customizer.php' );
require_once( MEDICAL_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
require_once( MEDICAL_DIR_PATH_CLASSES . 'Class-Config.php' );
require_once( MEDICAL_DIR_PATH_HOOKS . 'hooks.php' );
require_once( MEDICAL_DIR_PATH_HOOKS . 'hooks-functions.php' );
require_once( MEDICAL_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
require_once( MEDICAL_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


/**
 * Instantiate Medical object
 *
 * Inside this object:
 * Enqueue scripts, Google font, Theme support features, Epsilon Dashboard .
 *
 */

$obj = new Medical();

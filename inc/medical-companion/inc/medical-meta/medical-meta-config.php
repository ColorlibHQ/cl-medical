<?php 
if( !defined( 'WPINC' ) ){
    die;
}
/**
 * @Packge     : Medical Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
    

    // Medical meta scripts enqueue
    add_action( 'admin_enqueue_scripts', 'medical_meta_scripts' );
    function medical_meta_scripts() {
        wp_enqueue_style( 'medical-meta-style', MEDICAL_COMPANION_META_DIR_URL . 'assets/css/medical-meta.css' );
        wp_enqueue_script( 'medical-meta-script', MEDICAL_COMPANION_META_DIR_URL .'assets/js/medical-meta.js', array('jquery'), '1.0', true );
    }

    // Page Header select option meta
    add_action("add_meta_boxes", "medical_add_custom_meta_box");
    function medical_add_custom_meta_box() {
        // page header background meta box
        add_meta_box("pageheader-meta-box", esc_html__( "Builder Page Header Settings", 'medical' ), "medical_bpheader_meta_box_markup", "page", "side", "high", null);
    }

    // Page Header settings meta field markup
    function medical_bpheader_meta_box_markup( $object ) {

    wp_nonce_field( basename( __FILE__ ), "medical-bpheader-meta-nonce" );

    ?>
        <div class="header-opt header-show-opt">
            <p class="post-attributes-label-wrapper">
                <label for="pageheader-dropdown" class="post-attributes-label"><?php esc_html_e( 'Select Page Header', 'medical' ); ?></label>
            </p>
            <?php 
            $val = get_post_meta( $object->ID ,'_medical_builderpage_header_show', true );
            ?>
            <select name="bpheadershow" class="medical-admin-selectbox" id="page_header_selectbox">
                <option value="show" <?php echo esc_attr( $val == 'show' ? 'selected' : '' ); ?>><?php esc_html_e( 'Show', 'medical' ); ?></option>
                <option value="hide" <?php echo esc_attr( $val == 'hide' ? 'selected' : '' ); ?> ><?php esc_html_e( 'Hide', 'medical' ); ?></option>
            </select>

        </div>
        <div class="header-opt header-img">
            <p class="post-attributes-label-wrapper">
                <label for="pageheader-dropdown" class="post-attributes-label"><?php esc_html_e( 'Set Page Header Background', 'medical' ); ?></label>
            </p>
            <?php 
            $val = get_post_meta( $object->ID ,'_medical_builderpage_headerimg', true );
            ?>
            <select name="bpheaderimg" class="medical-admin-selectbox" id="page_header_bg_selectbox">
                <option value="customize" <?php echo esc_attr( $val == 'customize' ? 'selected' : '' ); ?>><?php esc_html_e( 'From Customize', 'medical' ); ?></option>
                <option value="featured" <?php echo esc_attr( $val == 'featured' ? 'selected' : '' ); ?> ><?php esc_html_e( 'Featured Image', 'medical' ); ?></option>
            </select>

        </div>
    <?php  
    }

    // Page header background settings save
    function medical_save_builder_page_header_settings_meta( $post_id, $post, $update ) {
        if ( ! isset( $_POST["medical-bpheader-meta-nonce"] ) || ! wp_verify_nonce( $_POST["medical-bpheader-meta-nonce"], basename( __FILE__ ) ) )
            return $post_id;

        if( ! current_user_can( "edit_post", $post_id ) )
            return $post_id;

        if( defined( "DOING_AUTOSAVE" ) && DOING_AUTOSAVE )
            return $post_id;

        $slug = "page";
        if( $slug != $post->post_type )
            return $post_id;

        $meta_headershow = "show";

        if( isset( $_POST["bpheadershow"] ) ) {
            $meta_headershow = $_POST["bpheadershow"];
        }
        update_post_meta( absint( $post_id ), "_medical_builderpage_header_show", sanitize_text_field( $meta_headershow ) );

        $meta_headerimg = "";

        if( isset( $_POST["bpheaderimg"] ) ) {
            $meta_headerimg = $_POST["bpheaderimg"];
        }
        update_post_meta( absint( $post_id ), "_medical_builderpage_headerimg", sanitize_text_field( $meta_headerimg ) );

    }

    add_action( "save_post", "medical_save_builder_page_header_settings_meta", 10, 3 );
?>
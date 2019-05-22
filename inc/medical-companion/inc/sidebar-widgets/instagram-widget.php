<?php
/**
 * @version  1.0
 * @package  Medical
 *
 */
 
 
/**************************************
*Creating instagram Widget
***************************************/
 
class medical_instagram_widget extends WP_Widget {


function __construct() {

parent::__construct(
// Base ID of your widget
'medical_instagram_widget',


// Widget name will appear in UI
esc_html__( '[ Medical ] Instagram Widget', 'medical' ),

// Widget description
array( 'description' => esc_html__( 'Add footer instagram widget.', 'medical' ), )
);

}

// This is where the action happens
public function widget( $args, $instance ) {
	
$title 		= apply_filters( 'widget_title', $instance['title'] );
$itemnumber 	= apply_filters( 'widget_itemnumber', $instance['itemnumber'] );


// before and after widget arguments are defined by themes
echo wp_kses_post( $args['before_widget'] );
if ( ! empty( $title ) )
echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );

    $api = medical_instagram_instance();

    $getitems   = $api->get_items( $itemnumber, '40' );




    $items      = $getitems['items'];

    $username   = $getitems['username'];  


 if( is_array( $items ) && count( $items ) > 0 ):
       
?>

<ul class="instafeed d-flex flex-wrap">
	<?php 
	foreach( $items as $item ){

		$imgurl = $item['image-url'];

		echo '<li><img src="'.esc_url( $imgurl ).'" alt="'.esc_attr( medical_image_alt( $imgurl ) ).'"></li>';
	}
	?>
</ul>

<?php
endif;
//
echo wp_kses_post( $args['after_widget'] );
}
		
// Widget Backend 
public function form( $instance ) {
	
if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
}else {
	$title = esc_html__( 'INSTAFEED', 'medical' );
}


//	Action Url
if ( isset( $instance[ 'itemnumber' ] ) ) {
	$itemnumber = $instance[ 'itemnumber' ];
}else {
	$itemnumber = '';
}


// Widget admin form
?>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ,'medical'); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'itemnumber' ) ); ?>"><?php esc_html_e( 'Item Number:' ,'medical'); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'itemnumber' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'itemnumber' ) ); ?>" type="number" value="<?php echo esc_attr( $itemnumber ); ?>" />

</p>


<?php 
}

	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {

	
$instance = array();
$instance['title'] 	  = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['itemnumber'] = ( ! empty( $new_instance['itemnumber'] ) ) ? strip_tags( $new_instance['itemnumber'] ) : '';
return $instance;

}

} // Class medical_newsletter_widget ends here


// Register and load the widget
function medical_instagram_load_widget() {
	register_widget( 'medical_instagram_widget' );
}
add_action( 'widgets_init', 'medical_instagram_load_widget' );
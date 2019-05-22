<?php
/**
 * @version  1.0
 * @package  Medical
 *
 */
 
 
/**************************************
*Creating Newsletter Widget
***************************************/
 
class medical_newsletter_widget extends WP_Widget {


function __construct() {

parent::__construct(
// Base ID of your widget
'medical_newsletter_widget',


// Widget name will appear in UI
esc_html__( '[ Medical ] Newsletter Form', 'medical' ),

// Widget description
array( 'description' => esc_html__( 'Add footer newsletter signup form.', 'medical' ), )
);

}

// This is where the action happens
public function widget( $args, $instance ) {
	
$title 		= apply_filters( 'widget_title', $instance['title'] );
$actionurl 	= apply_filters( 'widget_actionurl', $instance['actionurl'] );
$desc 		= apply_filters( 'widget_desc', $instance['desc'] );

// mc validation
wp_enqueue_script( 'mc-validate');

// before and after widget arguments are defined by themes
echo wp_kses_post( $args['before_widget'] );
if ( ! empty( $title ) )
echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );


?>

<div id="mc_embed_signup" class="newsletter-widget newsletter">

	<?php 
	if( $desc ){
		echo '<p>'.esc_html( $desc ).'</p>';
	}
	?>




    <form target="_blank" novalidate action="<?php echo esc_url( $actionurl ); ?>" id="mc-embedded-subscribe-form" method="post" class="form-group d-flex flex-row">

        <div class="col-autos">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                </div>
                <input type="email" name="EMAIL" class="form-control input-email" placeholder="<?php esc_html_e( 'Enter email', 'medical' ); ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" required>
            </div>
        </div>
        <button class="bbtns submit-form">Subcribe</button>

        <div class="info"></div>

    </form>

</div>


<?php
echo wp_kses_post( $args['after_widget'] );
}
		
// Widget Backend 
public function form( $instance ) {
	
if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
}else {
	$title = esc_html__( 'Newsletter', 'medical' );
}


//	Action Url
if ( isset( $instance[ 'actionurl' ] ) ) {
	$actionurl = $instance[ 'actionurl' ];
}else {
	$actionurl = '';
}

//	Text Area
if ( isset( $instance[ 'desc' ] ) ) {
	$desc = $instance[ 'desc' ];
}else {
	$desc = '';
}


// Widget admin form
?>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ,'medical'); ?></label>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'actionurl' ) ); ?>"><?php esc_html_e( 'Action URL:' ,'medical'); ?></label>
<p ><?php esc_html_e( 'Enter here your MailChimp action URL.' ,'medical'); ?> <a href="http://docs.creativegigs.net/docs/aproch/how-to-use-optin-form/how-to-locate-mailchimp-newsletter-form-action-url/" target="_blank"><?php esc_html_e( 'How to' ,'medical'); ?></a></p>
<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'actionurl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'actionurl' ) ); ?>" type="text" value="<?php echo esc_attr( $actionurl ); ?>" />

</p>
<p>
<label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_html_e( 'Short Description:' ,'medical'); ?></label> 
<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"><?php echo esc_textarea( $desc ); ?></textarea>
</p>

<?php 
}

	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {

	
$instance = array();
$instance['title'] 	  = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['actionurl'] = ( ! empty( $new_instance['actionurl'] ) ) ? strip_tags( $new_instance['actionurl'] ) : '';
$instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';

return $instance;

}

} // Class medical_newsletter_widget ends here


// Register and load the widget
function medical_newsletter_load_widget() {
	register_widget( 'medical_newsletter_widget' );
}
add_action( 'widgets_init', 'medical_newsletter_load_widget' );
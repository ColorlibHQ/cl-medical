<?php 
/**
 * @Packge     : Medical Companion
 * @Version    : 1.0.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( ! defined( 'WPINC' ) ) {
    die;
}

// Medical Bokking scripts enqueue
add_action( 'admin_enqueue_scripts', 'medical_booking_scripts' );
function medical_booking_scripts() {

    wp_enqueue_style( 'booking-style', MEDICAL_COMPANION_DIR_URL.'css/booking.css', array(), '1.0', false );
    wp_enqueue_script( 'repeater-script', MEDICAL_COMPANION_DIR_URL.'js/repeater.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'booking-script', MEDICAL_COMPANION_DIR_URL.'js/booking.js', array('jquery'), '1.0', true );
}


// Register car booking post type
function medical_custom_init() {
    $args = array(
      'public' => false,
      'label'  => esc_html__( 'Appointment', 'medical' )
    );
    register_post_type( 'appointment', $args );
}
add_action( 'init', 'medical_custom_init' );

// remove post type menu
function medical_remove_menu_items() {

    remove_menu_page( 'edit.php?post_type=appointment' );

}
add_action( 'admin_menu', 'medical_remove_menu_items' );

// Add admin menu for car booking list
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu() {
    add_menu_page( 
        esc_html__( 'Appointment Lists', 'medical' ), 
        esc_html__( 'Appointment', 'medical' ), 
        'manage_options', 
        'medical-appointment', 
        'medical_booking_admin_page', // Callback HTML Markup
        'dashicons-calendar-alt', 
        6  
    );
}

// Medical booking admin page
function medical_booking_admin_page() {
?>
  
    <div class="booking-settings-nav">
        <ul>
            <li class="tablist" ><?php esc_html_e( 'List', 'medical' ); ?></li>
            <li class="tabsettings"><?php esc_html_e( 'Form Settings', 'medical' ); ?></li>
        </ul>
    </div>


    <div class="booking-area booking-lists" style="display:block;">
        <?php medical_booking_lists(); ?>
    </div>
    <div class="booking-area booking-settings" style="display:none">
        <?php
        // Form handling
        medical_booking_settings_form_data(); 
        // Form
        medical_booking_settings_form();
        ?>

    </div>

<?php

}

// Booking settings form
function medical_booking_settings_form() {
    ?>
    <h2 style="text-align: center;"><?php esc_html_e( 'Settings', 'medical' ); ?></h2>
    <form action="#" method="post">
            
        <!-- Pickup -->
        <div id="repeater">
            <div class="repeater-heading">
                <h5 class="pull-left"><?php esc_html_e( 'Disease type', 'medical' ); ?></h5>
                <span class="btn btn-primary pt-5 pull-right repeater-add-btn">
                <?php esc_html_e( 'Add Disease Type into Form Dropdown', 'medical' ); ?>
                </span>
            </div>
            <div class="clearfix"></div>

            <?php 
            
            $repeater = unserialize( get_option( 'repeater' ) );

            if( is_array( $repeater ) && count( $repeater ) > 0 ):
                foreach( $repeater as $val ) :

                    ?>
                    <div class="items" data-group="repeater">
                        <!-- Repeater Content -->
                        <div class="item-content">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label"><?php esc_html_e( 'Disease-From', 'medical' ); ?></label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" value="<?php echo $val; ?>" id="inputName" placeholder="Name" data-name="name">
                                </div>
                            </div>
                        </div>
                        <!-- Repeater Remove Btn -->
                        <div class="pull-right repeater-remove-btn">
                            <span class="btn btn-danger remove-btn">
                            <?php esc_html_e( 'Remove', 'medical' ); ?>
                            </span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <?php 
                endforeach;
            else:
            ?>
            <div class="items" data-group="repeater">
                <!-- Repeater Content -->
                <div class="item-content">
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label"><?php esc_html_e( 'Appointment From', 'medical' ); ?></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Name" data-name="name">
                        </div>
                    </div>
                </div>
                <!-- Repeater Remove Btn -->
                <div class="pull-right repeater-remove-btn">
                    <span class="btn btn-danger remove-btn">
                    <?php esc_html_e( 'Remove', 'medical' ); ?>
                    </span>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php
            endif;
            ?>


        </div>
        <!-- Pick up End -->

        <button type="submit" class="booking-submit" name="updateopt"><?php esc_html_e( 'Submit', 'medical' ); ?></button>
    </form>
    <?php
}
// Booking Settings form data
function medical_booking_settings_form_data() {

    if( isset( $_POST['updateopt'] ) ) {

        // Repeater
        if( isset( $_POST[ 'repeater' ] ) ) {

            $repeater = serialize( $_POST[ 'repeater' ] );
            update_option( 'repeater', $repeater );

        }
    }

}

// Booking List
function medical_booking_lists() {
    $args = array(
        'post_type'     => 'appointment',
        'posts_per_page' => '-1'
    );

    $booking_lists = get_posts( $args );
    
    echo '<div class="booking-list"><ul>';
    echo '<h2 style="text-align:center;">Booking List</h2>';

    medical_delete_booking();
    // echo '<pre>';
    // print_r( $booking_lists );
    // echo '</pre>';


    foreach( $booking_lists as $list ) {

        $patientID    = get_post_meta( $list->ID, 'medical_username', true );
        if( $patientID ){
            echo '<li style="padding: 8px;background-color:#f8f8f8;"><span style="margin-left: 30px;">'.esc_html( $list->post_name ).'</span><span style="float:right;"><button class="view-booking" data-target="modal-'.esc_attr( $list->ID ).'" >'.esc_html__( 'View', 'medical' ).'</button></span>'.medical_booking_admin_modal( $list->ID ).'</li>';
        }
    }
    echo '</ul></div>';

    ?>
    <script>
        ( function( $ ) {

            $( '.view-booking' ).on( 'click', function() {

                var modal = $(this).attr( 'data-target' );

                $('.' + modal ).show();

            });

            $( '.close-btn' ).on( 'click', function() {

                var modal = $(this).parent();

                $( modal ).hide();

            });

        } )( jQuery );
    </script>
    <?php
}
    
// Booking view modal
function medical_booking_admin_modal( $id ) {
    $username       = get_post_meta( $id, 'medical_username', true );
    $userphone      = get_post_meta( $id, 'medical_userphone', true );
    $useremail      = get_post_meta( $id, 'medical_useremail', true );
    $dateOfBirth    = get_post_meta( $id, 'medical_dateofbirth', true );
    $diseaseType    = get_post_meta( $id, 'medical_diseasetype', true );
    $appointmentdate= get_post_meta( $id, 'medical_appointmentdate', true );
    $message        = get_post_meta( $id, 'medical_message', true );
    
    ?>
    <div class="booking-modal modal-<?php echo esc_attr( $id ); ?>" style="position:absolute;top:0;background-color:rgba(0, 0, 0, 0.4);top:0;bottom:0;left:0;right:0;display:none;">
    <div class="close-btn">Close</div>
        <div style="background-color: #f9f9f9;padding:15px;max-width: 370px;margin: 0 auto;margin-top: 10%;">
        
            <h3 class="text-center"><?php esc_html_e( 'Appointment Info', 'medical' ) ?></h3>
                <style>
                    table{ border:1px solid #ddd; border-spacing:0 }
                    table tr td{ border: 1px solid #ddd; padding: 5px; }
                </style>
                <table>
                    <tr>
                        <td><?php esc_html_e( 'Name:', 'medical' ); ?></td>
                        <td><?php echo esc_html( $username ); ?></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e( 'Phone:', 'medical' ); ?></td>
                        <td><?php echo esc_html( $userphone ); ?></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e( 'Email:', 'medical' ); ?></td>
                        <td><?php echo esc_html( $useremail ); ?></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e( 'Date Of Birth:', 'medical' ); ?></td>
                        <td><?php echo esc_html( $dateOfBirth ); ?></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e( 'Disease Type:', 'medical' ); ?></td>
                        <td><?php echo esc_html( $diseaseType ); ?></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e( 'Appointment Date:', 'medical' ); ?></td>
                        <td><?php echo esc_html( $appointmentdate ); ?></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e( 'Message:', 'medical' ); ?></td>
                        <td><?php echo esc_html( $message ); ?></td>
                    </tr>
                    
                </table>
            
            

            <form action="#" method="post">
                <input type="hidden" name="bookingid" value="<?php echo absint( $id ) ?>" >
                <button name="deletebooking" class="deletebooking" type="submit">Delete</button>                
            </form>
        </div>
    </div>
    <?php
}

// Booking Form Data 
function medical_booking_form_data() {

    $error = new WP_Error();

    if( isset( $_POST['booking_submit'] )  ) {


        //Name 
        if( ! empty( $_POST['userName'] ) ) {
            $username = $_POST['userName'];
        } else {
            $error->add( 'field', __( 'Patient Name can\'t be empty.', 'medical' ) );
        }

        // Phone
        if( ! empty( $_POST['userPhone'] ) ) {
            $userphone = $_POST['userPhone'];
        } else {
            $error->add( 'field', __( 'Phone Number field can\'t be empty.', 'medical' ) );
        }
        
        // Email
        if( ! empty( $_POST['userEmail'] ) ) {
            $useremail = $_POST['userEmail'];
        } else {
            $error->add( 'field', __( 'Email field can\'t be empty.', 'medical' ) );
        }
        
        // Date of Birth
        if( ! empty( $_POST['dateofbirth'] ) ) {
            $dateOfBirth = $_POST['dateofbirth'];
        } else {
            $error->add( 'field', __( 'Date Of Birth field can\'t be empty.', 'medical' ) );
        }

        // Disease Type
        if( ! empty( $_POST['diseasetype'] ) ) {
            $diseasetype = $_POST['diseasetype'];
        } else {
            $error->add( 'field', __( 'Disease field can\'t be empty.', 'medical' ) );
        }

        // Appointment Date
        if( ! empty( $_POST['appointmentdate'] ) ) {
            $appointmentdate = $_POST['appointmentdate'];
        } else {
            $error->add( 'field', __( 'Appointment Date field can\'t be empty.', 'medical' ) );
        }

        // Message
        if( ! empty( $_POST['message'] ) ) {
            $message = $_POST['message'];
        } else {
            $error->add( 'field', __( 'Message field can\'t be empty.', 'medical' ) );
        }

        if( 1 > count( $error->get_error_messages() ) ) {

            $args = array(
                'post_type'     => 'appointment',
                'post_title'    => sanitize_text_field( $username ),
                'post_status'   => 'publish',
                'post_content'  => sanitize_text_field( $message ),
            );

            $insert_ID = wp_insert_post( $args );

            if( $insert_ID ) {
                update_post_meta( $insert_ID, 'medical_dateofbirth', sanitize_text_field( $dateOfBirth ) );
                update_post_meta( $insert_ID, 'medical_appointmentdate', sanitize_text_field( $appointmentdate ) );
                update_post_meta( $insert_ID, 'medical_username', sanitize_text_field( $username ) );
                update_post_meta( $insert_ID, 'medical_useremail', sanitize_text_field( $useremail ) );
                update_post_meta( $insert_ID, 'medical_userphone', sanitize_text_field( $userphone ) );
                update_post_meta( $insert_ID, 'medical_diseasetype', sanitize_text_field( $diseasetype ) );
                update_post_meta( $insert_ID, 'medical_message', sanitize_text_field( $message ) );
            }

        } else {
            return $error->get_error_messages();
            
        }

    }

}
// Delete Booking 
function medical_delete_booking() {

    if ( isset( $_POST['deletebooking'] ) && isset( $_POST['bookingid'] ) ) {
        $delete = wp_delete_post( absint( $_POST['bookingid'] ) );

        if( $delete ) {
            echo '<h4 style="text-align:center;">'.esc_html__( 'Successfully Deleted', 'medical' ).'</h4>';
        }

    }
    
}


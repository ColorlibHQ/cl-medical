<?php
namespace Medicalelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 * Medical elementor section widget.
 *
 * @since 1.0
 */
class Medical_Service_hour extends Widget_Base {

	public function get_name() {
		return 'medical-service-hour';
	}

	public function get_title() {
		return __( 'Servicing Hour', 'medical' );
	}

	public function get_icon() {
		return 'eicon-clock';
	}

	public function get_categories() {
		return [ 'medical-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  Servicing Hour content ------------------------------
		$this->start_controls_section(
			'Service_hour',
			[
				'label' => __( 'Servicing Hour', 'medical' ),
			]
		);
        $this->add_control(
            'service_title',
            [
                'label'         => esc_html__( 'Title', 'medical' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Servicing Hours', 'medical' )
            ]
        );
        $this->add_control(
            'service_desc',
            [
                'label'         => esc_html__( 'Service Description', 'medical' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'medical' )
            ]
        );
        $this->add_control(
            'servicing_day_time', [
                'label' => __( 'Create Time Schedule', 'medical' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ day }}}',
                'fields' => [
                    [
                        'name'  => 'day',
                        'label' => __( 'Servicing Day', 'medical' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__('Monday - Friday', 'medical')
                    ],
                    [
                        'name'  => 'time',
                        'label' => __( 'Servicing Time', 'medical' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block'   => true,
                        'default'   => esc_html__('10:00am to 05:00pm', 'medical')
                    ],
                ],
            ]
        );

		$this->end_controls_section(); // End about content


        //------------------------------ Style Content ------------------------------

        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Title', 'medical' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'day_list_color', [
                'label'     => __( 'Day List Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .open-hour-wrap .date-list .colm-1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'time_list_color', [
                'label'     => __( 'Time List Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .open-hour-wrap .date-list .colm-2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();


	}

	protected function render() {
    medical_booking_form_data();

    $settings = $this->get_settings();
    $times = $settings['servicing_day_time'];

    ?>
        <section class="appointment-area">			
            <div class="container">
                <div class="row justify-content-between align-items-center pb-120 appointment-wrap">
                    <div class="col-lg-5 col-md-6 appointment-left">
                        <?php
                        //Title 
                        echo medical_heading_tag(
                            array(
                                'tag'   => 'h1',
                                'text'  => $settings['service_title']
                            )
                        );

                        //Description
                        if( !empty( $settings['service_desc'] ) ){
                            echo medical_get_textareahtml_output( $settings['service_desc'] );
                        }
                        ?>
                        <ul class="time-list">
                            <?php
                            if( is_array( $times ) && count( $times ) > 0 ){
                                foreach ($times as $time) { ?>
                                    <li class="d-flex justify-content-between">
                                        <span><?php echo esc_html( $time['day'] ) ?></span>
                                        <span><?php echo esc_html( $time['time'] ) ?></span>
                                    </li>
                                <?php                                    
                                }
                            }
                            ?>															
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 appointment-right pt-60 pb-60">
                        <form class="form-wrap" action="#" method="post">
                            <h3 class="pb-20 text-center mb-30">Book an Appointment</h3>		
                            <input type="text" class="form-control" name="userName" placeholder="Patient Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Patient Name'" required>
                            <input type="tel" class="form-control" name="userPhone" placeholder="Phone " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'" required>
                            <input type="email" class="form-control" name="userEmail" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" required>
                            <input id="datepicker1" name="dateofbirth" class="dates form-control"  placeholder="Date of Birth" type="text" required>   
                            <div class="form-select" id="service-select">
                                <select name="diseasetype" required>
                                    <option data-display="">Disease Type</option>
                                    <?php 
                                    $repeater = unserialize( get_option( 'repeater' ) );
                                    foreach( $repeater as $val ) {
                                        echo '<option value="' .esc_attr( $val ). '">' . esc_html( $val ) . '</option>';
                                    }
                                    
                                    ?>
                                </select>
                            </div>	
                            <input id="datepicker2" class="dates form-control" name="appointmentdate" placeholder="appointment Date" type="text" required>  
                            <textarea name="message" class="" rows="5" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"></textarea> 
                            <button type="submit" name="booking_submit" class="primary-btn text-uppercase">Confirm Booking</button>
                        </form>
                    </div>
                </div>
            </div>	
        </section>

    <?php

    }

}

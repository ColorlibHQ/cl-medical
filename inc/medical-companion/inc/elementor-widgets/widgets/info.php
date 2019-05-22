<?php
namespace Medicalelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Medical elementor few words section widget.
 *
 * @since 1.0
 */

class Medical_Info extends Widget_Base {

	public function get_name() {
		return 'medical-info';
	}

	public function get_title() {
		return __( 'Info', 'medical' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'medical-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Info content ------------------------------
        $this->start_controls_section(
            'info_content',
            [
                'label' => __( 'Info', 'medical' ),
            ]
        );
        $this->add_control(
            'info_details',
            [
                'label'       => esc_html__( 'Section Title', 'medical' ),
                'label_block' => true,
                'type'        => Controls_Manager::WYSIWYG,
            ]
        );
        $this->add_control(
            'info_image',
            [
                'label'       => esc_html__( 'Info Section Image', 'medical' ),
                'label_block' => true,
                'type'        => Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section(); // End few words content


	}

	protected function render() {

    $settings = $this->get_settings();
        ?>
        <section class="info-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 no-padding info-area-left">
                    <?php
                        if( !empty( $settings['info_image']['url'] ) ){
                            echo '<img class="img-fluid" src="'. esc_url( $settings['info_image']['url'] ) .'" alt="">';
                        }
                    ?>
                    </div>
                    <div class="col-lg-6 info-area-right">
                        <?php
                            if( !empty( $settings['info_details'] ) ){
                                echo wp_kses_post( $settings['info_details'] );
                            }
                        ?>
                    </div>
                </div>
            </div>	
        </section>
         
        <?php
    }
	
}

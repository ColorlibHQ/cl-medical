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

class Medical_Clients extends Widget_Base {

	public function get_name() {
		return 'medical-clients';
	}

	public function get_title() {
		return __( 'Clients', 'medical' );
	}

	public function get_icon() {
		return 'eicon-logo';
	}

	public function get_categories() {
		return [ 'medical-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        
		// ----------------------------------------  Clients content ------------------------------
		$this->start_controls_section(
			'clients_content',
			[
				'label' => __( 'Clients', 'medical' ),
			]
		);
		$this->add_control(
            'clients', [
                'label' => __( 'Client', 'medical' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'medical' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name'  => 'url',
                        'label' => __( 'Client Url', 'medical' ),
                        'type'  => Controls_Manager::TEXT,
                        'default' => '#'
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Client Logo', 'medical' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content


	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();
    ?>
    <section class="brands-area">
        <div class="container">
            <div class="brand-wrap section-gap">
                <div class="row align-items-center active-brand-carusel justify-content-start no-gutters">
                <?php 
                    if( is_array( $settings['clients'] ) && count( $settings['clients'] ) > 0 ):
                        foreach( $settings['clients'] as $client ):

                        $bgUrl = '';
                        if( !empty( $client['img']['url'] ) ){
                            $bgUrl = $client['img']['url'];
                        }

                        ?>
                        <div class="col single-brand">
                            <a href="<?php echo esc_url( $client['url'] ); ?>">
                                <?php
                                echo medical_img_tag(
                                    array(
                                        'url'   => esc_url( $bgUrl ),
                                        'class' => esc_attr( 'mx-auto' )
                                    )
                                );
                                ?>
                            </a>
                        </div>
                        <?php
                        endforeach; 
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            
            $('.active-brand-carusel').owlCarousel({
                items: 5,
                loop: true,
                autoplayHoverPause: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 3,
                    },
                    991: {
                        items: 4,
                    },
                    1024: {
                        items: 5,
                    }
                }
            });

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}

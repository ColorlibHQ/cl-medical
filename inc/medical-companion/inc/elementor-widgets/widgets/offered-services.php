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
 * Medical elementor Team Member section widget.
 *
 * @since 1.0
 */
class Medical_Offered_Services extends Widget_Base {

	public function get_name() {
		return 'medical-offered-services';
	}

	public function get_title() {
		return __( 'Offered Services', 'medical' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'medical-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  training Section Heading ------------------------------
        $this->start_controls_section(
            'services_heading',
            [
                'label' => __( 'Services Section Heading', 'medical' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'medical' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'medical' ),
                'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true

            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Services content ------------------------------
		$this->start_controls_section(
			'services_block',
			[
				'label' => __( 'Offered Services', 'medical' ),
			]
		);
		$this->add_control(
            'services_content', [
                'label' => __( 'Create Services', 'medical' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'  => 'title',
                        'label' => __( 'Title', 'medical' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html( '24/7 Emergency', 'medical' )
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'medical' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default' => esc_html( 'inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.', 'medical' )
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Service Feature Image', 'medical' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
                    [
                        'name'  => 'title_url',
                        'label' => __( 'Service URL', 'medical' ),
                        'type'  => Controls_Manager::URL,
                    ]
                ],
            ]
		);

        $this->end_controls_section(); // End Services content
        

		// --------------------------------- Departments Lists ------------------------------
		$this->start_controls_section(
			'department_list_block',
			[
				'label' => __( 'Departments Lists', 'medical' ),
			]
		);
		$this->add_control(
            'list_title', [
                'label' => __( 'List Title', 'medical' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('Departments', 'medical')

            ]
        );
		$this->add_control(
            'department_list', [
                'label' => __( 'Department Lists', 'medical' ),
                'type'  => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'default'   => wp_kses_post(
                    '<ul>
                        <li><a href="">Pediatric Diagnosis</a></li>
                        <li><a href="">Outpatient Rehabilitation</a></li>
                        <li><a href="">Laryngological Functions</a></li>
                        <li><a href="">Ophthalmology Unit</a></li>
                        <li><a href="">Cardiac Unit</a></li>
                        <li><a href="">Outpatient Surgery</a></li>
                        <li><a href="">Gynaecological Wings</a></li>
                    </ul>' 
                    )

            ]
        );
        $this->add_control(
            'list_btn_label', [
                'label' => __( 'List Button Label', 'medical' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('View All List', 'medical')

            ]
        );
        $this->add_control(
            'list_btn_url', [
                'label' => __( 'List Button URL', 'medical' ),
                'type'  => Controls_Manager::URL,
                'label_block' => true,

            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'list_bg',
                'label' => __( 'Background', 'medical' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .offered-service-area .offered-right',
            ]
        );
		$this->end_controls_section(); // End Services content


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'medical' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .offered-left h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .offered-left p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style services Box ------------------------------
        $this->start_controls_section(
            'style_trainingbox', [
                'label' => __( 'Style Services Content', 'medical' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_servicestitle', [
                'label' => __( 'Title Color', 'medical' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_hover_title', [
                'label' => __( 'Title Hover Color', 'medical' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service:hover a h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'color_servicesdescription', [
                'label' => __( 'Description Color', 'medical' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'department_list_color', [
                'label' => __( 'List Color', 'medical' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offered-right ul li' => 'color: {{VALUE}};',
                ],
                'default'   => ''
            ]
        );
        $this->add_control(
            'department_list_overlay', [
                'label' => __( 'List Overlay Color', 'medical' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offered-right .overlay-bg' => 'background: {{VALUE}};',
                ],
                'default'   => 'rgba(105, 190, 0, 0.85)'
            ]
        );
      
        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'medical' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );        
        $this->add_control(
            'section_bg_color', [
                'label' => __( 'Section Background Color', 'medical' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offered-service-area' => 'background: {{VALUE}};',
                ],
            ]
        );
        
        
        $this->end_controls_section();


	}

	protected function render() {
    $settings = $this->get_settings();
    $services = $settings['services_content'];

    ?>
        <section class="offered-service-area section-gap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 offered-left">
                        <?php
                            //Section Title
                            if( !empty( $settings['sect_title'] ) ){
                                echo '<h1> '. esc_html( $settings['sect_title'] ) .' </h1>';
                            }

                            //Section Sub-title
                            if( !empty( $settings['sect_subtitle'] ) ){
                                echo '<p> '. esc_html( $settings['sect_subtitle'] ) .' </p>';
                            }
                        ?>
                        <div class="service-wrap row">
                            <?php
                            if( is_array( $services ) && count( $services ) > 0 ){
                                foreach( $services as $service ){ ?>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-service">
                                            <div class="thumb">
                                                <?php
                                                if( !empty( $service['img']['url'] ) ){
                                                    echo '<img class="img-fluid" src="'. esc_url( $service['img']['url'] ) .'" alt="'. esc_html__( 'Service Feature Image', 'medical' ) .'">	';
                                                }
                                                ?>	
                                            </div>
                                            <?php
                                                if( !empty( $service['title'] ) ){
                                                    echo '<a href="'. esc_url( $service['title_url']['url'] ) .'"><h4>'. esc_html( $service['title'] ) .'</h4></a>';
                                                }

                                                if( !empty( $service['desc'] ) ){
                                                    echo '<p>'. esc_html( $service['desc'] ) .'</p>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>								
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="offered-right relative">
                            <div class="overlay overlay-bg"></div>
                            <?php
                            if( !empty( $settings['list_title'] ) ){
                                echo '<h3 class="relative text-white">'. esc_html( $settings['list_title'] ) .'</h3>';
                            }
                            if( !empty( $settings['department_list'] ) ){
                                echo wp_kses_post( $settings['department_list'] );
                            }
                            if( !empty( $settings['list_btn_label'] ) ){
                                echo '<a class="viewall-btn" href="'. esc_url( $settings['list_btn_url']['url'] ) .'">'. esc_html( $settings['list_btn_label'] ) .'</a>';
                            }
                            ?>
                            		
                        </div>	
                    </div>
                </div>
            </div>	
        </section>
    <?php

    }

}

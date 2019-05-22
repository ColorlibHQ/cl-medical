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
class Medical_Services extends Widget_Base {

	public function get_name() {
		return 'medical-services';
	}

	public function get_title() {
		return __( 'Services', 'medical' );
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
				'label' => __( 'Services', 'medical' ),
			]
		);
		$this->add_control(
            'services_content', [
                'label' => __( 'Create Training', 'medical' ),
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
                        'name'  => 'icon',
                        'label' => __( 'Icon', 'medical' ),
                        'type'  => Controls_Manager::ICON,
                    ]
                ],
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
                'default'   => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .title h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .title p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .single-facilities h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'color_servicesdescription', [
                'label' => __( 'Description Color', 'medical' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-facilities p' => 'color: {{VALUE}};',
                ],
            ]
        );
      
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'service_icon',
                'label' => __( 'Service Icon Color', 'medical' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .single-facilities span',
            ]
        );
     
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'title_icon_hover',
                'label' => __( 'Title & Icon Hover Color', 'medical' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .single-facilities:hover span, .single-facilities:hover h4',
            ]
        );
       

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'medical' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_overlay',
            [
                'label' => __( 'Overlay', 'medical' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'medical' ),
                'label_off' => __( 'Hide', 'medical' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
			'sectionoverlaybg', [
				'label'     => __( 'Button Hover Background Color', 'medical' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => 'rgba(0, 0, 0, 0.4)',
				'selectors' => [
					'{{WRAPPER}} .facilities-area .overlay-bg' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'bg_overlay' => 'yes'
				]
			]
		);
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'medical' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'medical' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .facilities-area',
            ]
        );
        
        $this->end_controls_section();


	}

	protected function render() {
    $settings = $this->get_settings();
    $services = $settings['services_content'];

    ?>
        <section class="facilities-area section-gap relative">
            <?php if( $settings['bg_overlay'] == 'yes' ){
                echo '<div class="overlay-bg overlay"></div>';
            } ?>            
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-70 col-lg-7">
                        <div class="title text-center">
                            <?php
                            //Title 
                            echo medical_heading_tag(
                                array(
                                    'tag'   => 'h1',
                                    'text'  => $settings['sect_title'],
                                    'class' => 'mb-10'
                                )
                            );

                            //Sub-Title
                            if( !empty( $settings['sect_subtitle'] ) ){
                                echo medical_get_textareahtml_output( $settings['sect_subtitle'] );
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    if( is_array( $services ) && count( $services ) > 0 ){
                        foreach ($services as $service) { ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="single-facilities">
                                    <span class="<?php echo esc_html( $service['icon'] ) ?>"></span>
                                    <h4><?php echo esc_html( $service['title'] ) ?></h4>
                                    <?php echo medical_get_textareahtml_output( $service['desc'] ) ?>
                                </div>
                            </div>
                        <?php                            
                        }
                    }
                    ?>											
                </div>
            </div>	
        </section>

    <?php

    }

}

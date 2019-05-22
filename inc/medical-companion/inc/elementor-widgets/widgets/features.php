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
class Medical_Features extends Widget_Base {

	public function get_name() {
		return 'medical-features';
	}

	public function get_title() {
		return __( 'Features', 'medical' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'medical-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Features Section Heading ------------------------------
        $this->start_controls_section(
            'features_heading',
            [
                'label' => __( 'Features Section Heading', 'medical' ),
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
        
		// ----------------------------------------   Features content ------------------------------
		$this->start_controls_section(
			'features_block',
			[
				'label' => __( 'Features', 'medical' ),
			]
		);
		$this->add_control(
            'features_content', [
                'label' => __( 'Create Features', 'medical' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'medical' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name'  => 'description',
                        'label' => __( 'Description', 'medical' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'label_block' => true,
                        'default' => 'inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct women face higher conduct.'
                    ],
	                [
		                'name'  => 'icon',
		                'label' => __( 'Icon', 'medical' ),
		                'type'  => Controls_Manager::ICON
	                ]
                ],
            ]
		);

		$this->end_controls_section(); // End features content


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
                'default'   => '#222',
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

        //------------------------------ Style Features ------------------------------
        $this->start_controls_section(
            'style_features', [
                'label' => __( 'Style Features', 'medical' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'features_title_heading',
            [
                'label'     => __( 'Style Feature Title ', 'medical' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_featuretitle', [
                'label' => __( 'Title Color', 'medical' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .details h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_feature_desc', [
                'label' => __( 'Feature Description Color', 'medical' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#777',
                'selectors' => [
                    '{{WRAPPER}} .details p' => 'color: {{VALUE}};',
                ],
            ]
        );
        // Feature Item style=================================
        $this->add_control(
            'features_fonticon_heading',
            [
                'label'     => __( 'Style Font Icon', 'medical' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_fonticon', [
                'label'     => __( 'Font Icon Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#67bc00',
                'selectors' => [
                    '{{WRAPPER}} .single-feature .icon span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'fontsize',
            [
                'label' => __( 'Icon Font Size', 'medical' ),
                'type'  => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'  => [
                    'unit' => 'px',
                    'size' => 35,
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-feature .icon span' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_section();
        

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>

        <section class="feature-area section-gap">
            <div class="container">

                <?php
                // Section Heading
                medical_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
                ?>

                <div class="row">
                <?php
                if( is_array( $settings['features_content'] ) && count( $settings['features_content'] ) > 0 ):
                    foreach( $settings['features_content'] as $feature ):
                        ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-feature d-flex flex-row">
                            <div class="icon">
	                            <?php
	                            if( ! empty( $feature['icon'] ) ) {
		                            echo '<span class="'. $feature['icon'] .'"></span>';
	                            } ?>
                            </div>
                            <div class="details">
                                <h4><?php echo esc_html( $feature['label'] ); ?></h4>
                                <p><?php echo esc_html( $feature['description'] ); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    endforeach;
                endif;
                ?>
                </div>
            </div>
        </section>

    <?php

    }

	
}

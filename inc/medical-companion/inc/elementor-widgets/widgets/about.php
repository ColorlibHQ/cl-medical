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
class Medical_About extends Widget_Base {

	public function get_name() {
		return 'medical-about';
	}

	public function get_title() {
		return __( 'About', 'medical' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'medical-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_content',
			[
				'label' => __( 'About Us', 'medical' ),
			]
		);
        $this->add_control(
            'title',
            [
                'label'         => esc_html__( 'Title', 'medical' ),
                'description'   => esc_html__('Use <br> tag for line break', 'medical'),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Who we are <br> to Serve the nation', 'medical' )
            ]
        );
        $this->add_control(
            'description',
            [
                'label'         => esc_html__( 'Description', 'medical' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => __( 'inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.', 'medical' )
            ]
        );
        $this->add_control(
            'about_features_content', [
                'label' => __( 'Create Features', 'medical' ),
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
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'medical' ),
                        'type'  => Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name'  => 'icon',
                        'label' => __( 'Icon', 'medical' ),
                        'type'  => Controls_Manager::ICON,

                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'leftimg',
                'label' => __( 'Background', 'medical' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .home-about-area:after',
            ]
        );

		$this->end_controls_section(); // End about content


        //------------------------------ Style Content ------------------------------

        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Color', 'medical' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Title Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .home-about-right h1'   => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'description_color', [
                'label'     => __( 'Description Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .home-about-right p'   => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
			'color_icon', [
				'label'     => __( 'Icon Color', 'medical' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#67bc00',
				'selectors' => [
					'{{WRAPPER}} .home-about-area .single-services .fa' => 'color: {{VALUE}};',
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
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .single-services span' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
            'color_featuretitle', [
                'label'     => __( 'Feature Title Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .home-about-area .single-services h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Feature Description Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777777',
                'selectors' => [
                    '{{WRAPPER}} .single-services p' => 'color: {{VALUE}};',
                ],
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
            ]
        );
        $this->add_control(
            'sect_ooverlay_bgcolor',
            [
                'label'     => __( 'Overlay Color', 'medical' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionoverlaybg',
                'label' => __( 'Overlay', 'medical' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .home-about-area .overlay-bg',
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
                'selector' => '{{WRAPPER}} .home-about-area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
    <section class="home-about-area section-gap relative">
        <div class="container">
            <div class="row align-items-center justify-content-end">
                <div class="col-lg-6 no-padding home-about-right">
                    <?php
                    // Title
                    echo medical_heading_tag(
                        array(
                            'tag'   => 'h1',
                            'text'  => $settings['title']
                        )
                    );
                    //Description
                    echo medical_paragraph_tag(
                        array(
                            'text'  => $settings['description'],
                        )
                    );


		            if( ! empty( $settings['about_features_content'] ) ):
                    ?>
                    <div class="row no-gutters">
                        <?php
                        foreach( $settings['about_features_content'] as $val ): ?>
                            <div class="single-services col">
                                <?php
                                if( ! empty( $val['icon'] ) ) {
                                    echo '<span class="'. $val['icon'] .'"></span>';
                                } ?>
                                <a href="#">
                                    <?php
                                    // Title
                                    if( ! empty( $val['label'] ) ) {
                                        echo medical_heading_tag(
                                            array(
                                                'tag'   => 'h4',
                                                'text'  => esc_html( $val['label'] )
                                            )
                                        );
                                    }
                                    ?>
                                </a>
                                <?php
                                // Description
                                if( ! empty( $val['desc'] ) ) {
                                    echo medical_get_textareahtml_output( $val['desc'] );
                                }
                                ?>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php

    }

}

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
class Medical_Team_Member extends Widget_Base {

	public function get_name() {
		return 'medical-team-member';
	}

	public function get_title() {
		return __( 'Team Member', 'medical' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'medical-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Team Section Top content ------------------------------
        $this->start_controls_section(
            'team_sectcontent',
            [
                'label' => __( 'Team Section Top', 'medical' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'medical' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'medical' ),
                'type' => Controls_Manager::TEXTAREA,

            ]
        );

        $this->end_controls_section(); // End section top content
		// ----------------------------------------  Team Member content ------------------------------
		$this->start_controls_section(
			'team_memcontent',
			[
				'label' => __( 'Team Member', 'medical' ),
			]
		);
		$this->add_control(
            'teamslider', [
                'label' => __( 'Create Team Member', 'medical' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'label',
                        'label' => __( 'Name', 'medical' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name' => 'desig',
                        'label' => __( 'Designation', 'medical' ),
                        'type' => Controls_Manager::TEXT,
                    ],
                    [
                        'name' => 'img',
                        'label' => __( 'Photo', 'medical' ),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'facebook',
                        'label' => __( 'Facebook URL', 'medical' ),
                        'type' => Controls_Manager::URL,
                    ],
                    [
                        'name' => 'twitter',
                        'label' => __( 'Twitter URL', 'medical' ),
                        'type' => Controls_Manager::URL,
                    ],
                    [
                        'name' => 'dribbble',
                        'label' => __( 'Dribbble URL', 'medical' ),
                        'type' => Controls_Manager::URL,
                    ],
                    [
                        'name' => 'behance',
                        'label' => __( 'Behance URL', 'medical' ),
                        'type' => Controls_Manager::URL,
                    ],
                ],
            ]
		);

		$this->end_controls_section(); // End Team Member content



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


		//------------------------------ Style Team Member Content ------------------------------
		$this->start_controls_section(
			'style_teaminfo', [
				'label' => __( 'Style Team Member Info', 'medical' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'team_imghov',
            [
                'label' => __( 'Member Image Hover Color', 'medical' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'memberimghoverbg',
                'label' => __( 'Background', 'medical' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .team-area .thumb div',
            ]
        );
        //
        $this->add_control(
            'team_nameopt',
            [
                'label' => __( 'Name Style', 'medical' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_name', [
                'label' => __( 'Name Color', 'medical' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_name',
                'selector' => '{{WRAPPER}} .single-team h4',
            ]
        );
        //
        $this->add_control(
            'team_desigopt',
            [
                'label' => __( 'Designation Style', 'medical' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_desigopt', [
                'label' => __( 'Designation Color', 'medical' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_desigopt',
                'selector' => '{{WRAPPER}} .single-team p',
            ]
        );


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>

    <section class="team-area section-gap" id="team">
        <div class="container">
            <?php
            // Section Heading
            medical_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
            ?>

            <div class="row justify-content-center d-flex align-items-center">
                <?php 
                if( is_array( $settings['teamslider'] ) && count( $settings['teamslider'] ) > 0 ):
                    foreach( $settings['teamslider'] as $team ):
                             

                ?>
                <div class="col-lg-3 col-md-6 single-team">
                    <div class="thumb">
                        <?php 
                        //
                        if( ! empty( $team['img']['url'] ) ) {

                            echo medical_img_tag(
                                array(
                                    'url'   => esc_url( $team['img']['url'] ),
                                    'class' => 'img-fluid'
                                )
                            );

                        }
                        ?>

                        <div class="align-items-end justify-content-center d-flex">
                            <div class="social-links">
                                <?php
                                    if( !empty( $team['facebook']['url'] ) ){
                                        echo '<a href="'. esc_url( $team['facebook']['url'] ) .'"><i class="fa fa-facebook"></i></a>';
                                    }
                                    if( !empty( $team['twitter']['url'] ) ){
                                        echo '<a href="'. esc_url( $team['twitter']['url'] ) .'"><i class="fa fa-twitter"></i></a>';
                                    }
                                    if( !empty( $team['dribbble']['url'] ) ){
                                        echo '<a href="'. esc_url( $team['dribbble']['url'] ) .'"><i class="fa fa-dribbble"></i></a>';
                                    }
                                    if( !empty( $team['behance']['url'] ) ){
                                        echo '<a href="'. esc_url( $team['behance']['url'] ) .'"><i class="fa fa-behance"></i></a>';
                                    }
                                ?>
                            </div>
		                    <?php
		                    // Designation
		                    if( !empty( $team['desig'] ) ){
			                    echo medical_paragraph_tag(
				                    array(
					                    'text' => esc_html( $team['desig'] )
				                    )
			                    );
		                    }

		                    // Member Name
		                    if( !empty( $team['label'] ) ){
			                    echo medical_heading_tag(
				                    array(
					                    'tag'  => 'h4',
					                    'text' => esc_html( $team['label'] )
				                    )
			                    );
		                    }

		                    ?>
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

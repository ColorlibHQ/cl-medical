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
class Medical_Testimonial extends Widget_Base {

	public function get_name() {
		return 'medical-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'medical' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'medical-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // Testimonial Heading
		$this->start_controls_section(
			'testimonial_heading',
			[
				'label' => __( 'Testimonial Section Heading', 'medical' ),
			]
		);
		$this->add_control(
			'sect_title', [
				'label' => __( 'Title', 'medical' ),
				'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Enjoy our Client’s Feedback', 'medical' )

			]
		);
		$this->add_control(
			'sect_subtitle', [
				'label' => __( 'Sub Title', 'medical' ),
				'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'Who are in extremely love with eco friendly system.', 'medical' )

			]
		);

		$this->end_controls_section(); // End section top content


		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'feedback',
			[
				'label' => __( 'Feedback', 'medical' ),
			]
		);


		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'medical' ),
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
		                'name' => 'reviewstar',
		                'label' => __('Star Review', 'medical'),
		                'type' => Controls_Manager::CHOOSE,
		                'options' => [
			                '1' => [
				                'title' => __('1', 'medical'),
				                'icon' => 'fa fa-star',
			                ],
			                '2' => [
				                'title' => __('2', 'medical'),
				                'icon' => 'fa fa-star',
			                ],
			                '3' => [
				                'title' => __('3', 'medical'),
				                'icon' => 'fa fa-star',
			                ],
			                '4' => [
				                'title' => __('4', 'medical'),
				                'icon' => 'fa fa-star',
			                ],
			                '5' => [
				                'title' => __('5', 'medical'),
				                'icon' => 'fa fa-star',
			                ],
		                ],
	                ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'medical' ),
                        'type'  => Controls_Manager::WYSIWYG,
                        'default'   => __('Accessories Here you can find the best computeraccessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory', 'medical')
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Image', 'medical' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

        $this->end_controls_section(); // End Feedback content
        
        // ---------------------------------------- Video Settings ------------------------------
        $this->start_controls_section(
            'feedback_video',
            [
                'label' => __( 'Feedback Video', 'medical' ),
            ]
        );
        $this->add_control(
			'video_url', [
				'label'     => __( 'Video URL', 'medical' ),
				'type'      => Controls_Manager::URL,
				
			]
		);
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'poster_img',
                'label' => __( 'Background', 'medical' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .feedback-left',
            ]
        );
		$this->end_controls_section(); // End  content

        /**
         * Style Tab
         *
         */
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
					'{{WRAPPER}} .header-text h1' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_sectsubtitle', [
				'label'     => __( 'Section Sub Title Color', 'medical' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .header-text p' => 'color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();
        
        /*------------------------------ Testimonial Item Style ------------------------------*/
        $this->start_controls_section(
            'testimonial_item', [
                'label' => __( 'Testimonial Item Style', 'medical' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'testimonial_title_color', [
				'label'     => __( 'Testimonial Title Color', 'medical' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .single-feedback-carusel h4' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'testimonial_desc_color', [
				'label'     => __( 'Testimonial Description Color', 'medical' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .single-feedback-carusel p' => 'color: {{VALUE}};',
				],
			]
        );
        
		$this->end_controls_section();

        
        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'medical' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
			'video_overlay', [
				'label'     => __( 'Video Overlay Color', 'medical' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feedback-left .overlay-bg' => 'background-color: {{VALUE}};',
				],
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
        $this->add_control(
			'background_overlay_switch', [
				'label'     => __( 'Background Overlay Show/Hide', 'medical' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Show', 'medical' ),
				'label_off' => __( 'Hide', 'medical' ),
				'return_value' => 'yes',
				'default'   => 'yes',
			]
		);
        $this->add_control(
			'background_overlay', [
				'label'     => __( 'Background Overlay Color', 'medical' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feedback-area > .overlay-bg' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'background_overlay_switch' => 'yes'
                ]
			]
		);
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'medical' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .feedback-area',
            ]
        );
        

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();

    ?>
        <section class="feedback-area section-gap relative">
            <?php
            if( $settings['background_overlay_switch'] == 'yes' ){
                echo '<div class="overlay overlay-bg"></div>';
            }
            ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 pb-60 header-text text-center">
                        <?php
                        if( ! empty( $settings['sect_title'] ) ){
                            echo '<h1 class="mb-10 sec-title">'. esc_html( $settings['sect_title'] ) .'</h1>';
                        }
                        
                        if( ! empty( $settings['sect_subtitle'] ) ){
                            echo '<p class="sub-title">'. esc_html( $settings['sect_subtitle'] ) .'</p>';
                        }

                        ?>
                    </div>
                </div>			
                <div class="row feedback-contents justify-content-center align-items-center">
                    <?php
                    if( !empty( $settings['video_url']['url'] ) || !empty( $settings['poster_img']['url'] ) ){
                        ?>
                        <div class="col-lg-6 feedback-left relative d-flex justify-content-center align-items-center">
                            <div class="overlay overlay-bg"></div>
                            <a class="play-btn" href="<?php echo esc_url( $settings['video_url']['url']  ) ?>">
                                <img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/assets/images/play-btn.png" alt="">
                            </a>
                        </div>
                        <?php
                    } ?>
                    <div class="col-lg-6 feedback-right">
                        <div class="active-review-carusel">
                            <?php
                            if ( is_array( $settings['review_slider'] ) && count( $settings['review_slider'] ) > 0 ):
                                foreach ( $settings['review_slider'] as $review ): ?>
                                    <div class="single-feedback-carusel">
                                        <?php
                                        if ( ! empty( $review['img']['url'] ) ) {
                                            echo medical_img_tag(
                                                array(
                                                    'url'   => esc_url( $review['img']['url'] )
                                                )
                                            );
                                        }
                                        ?>
                                        <div class="title d-flex flex-row">
                                            <?php
                                            // Name =======
                                            if ( ! empty( $review['label'] ) ) {
                                                echo medical_heading_tag(
                                                    array(
                                                        'tag'  => 'h4',
                                                        'text' => esc_html( $review['label'] ),
                                                        'class'=> 'pb-10'
                                                    )
                                                );
                                            }

                                            // Star Review ==================
                                            $star = $review['reviewstar'];
                                            if (!empty( $star )) {
                                                echo '<div class="star">';
                                                for ($i = 1; $i <= 5; $i++) {

                                                    if ($star >= $i) {
                                                        echo '<span class="fa fa-star checked"></span>';
                                                    } else {
                                                        echo '<span class="fa fa-star"></span>';
                                                    }
                                                }
                                                echo '</div>';
                                            }
                                            ?>										
                                        </div>
                                        <?php
                                            if( !empty( $review['desc'] ) ){
                                                echo  wp_kses_post( wpautop( $review['desc'] ) );
                                            }
                                            
                                        ?>
                                        
                                    </div>
                                    <?php
                                endforeach;
                            endif;
                            ?>								
                        </div>
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

            $('.active-review-carusel').owlCarousel({
                items:1,
                loop:true,
                autoplay:true,
                autoplayHoverPause: true,        
                margin:30,
                dots: true
            });

        })(jQuery);
        </script>
        <?php 
        }
    }
	
}

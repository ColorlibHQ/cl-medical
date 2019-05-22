<?php
namespace Medicalelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
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

class Medical_Accordion extends Widget_Base {

	public function get_name() {
		return 'medical-accordion';
	}

	public function get_title() {
		return __( 'Accordion', 'medical' );
	}

	public function get_icon() {
		return 'eicon-accordion';
	}

	public function get_categories() {
		return [ 'medical-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Accordion content ------------------------------
        $this->start_controls_section(
            'accordion_content',
            [
                'label' => __( 'Accordion Section Heading', 'medical' ),
            ]
        );
        $this->add_control(
            'accordion_sectiontitle',
            [
                'label'       => esc_html__( 'Section Title', 'medical' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'accordion_sectionsubtitle',
            [
                'label'       => esc_html__( 'Section Sub Title', 'medical' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
            ]
        );

        $this->end_controls_section(); // End few words content

        // ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'accordion_sec',
			[
				'label' => __( 'Accordion', 'medical' ),
			]
		);
		$this->add_control(
            'accordion_item', [
                'label' => __( 'Create Accordion', 'medical' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ title }}}',
                'fields' => [
                    [
                        'name'  => 'title',
                        'label' => __( 'Title', 'medical' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Title'
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'medical' ),
                        'type'  => Controls_Manager::WYSIWYG,
                        'default'=>esc_html__('Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.', 'medical')
                    ]
                ],
            ]
		);

        $this->end_controls_section(); // End Feedback content

        $this->start_controls_section(
            'video_sec', 
            [
				'label' => __( 'Video', 'medical' ),
			]
        );
        $this->add_control(
            'section_video_url', [
                'label'     => __( 'Video URL', 'medical' ),
                'type'      => Controls_Manager::URL,
                
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'video_poster_img',
                'label' => __( 'Background', 'medical' ),
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .video-right',
            ]
        );

        $this->end_controls_section(); // End Feedback content

        
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
                    '{{WRAPPER}} .header-text h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .header-text p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style Accordion Item ------------------------------
        $this->start_controls_section(
            'accordion_item_style', [
                'label' => __( 'Style Accordion Item', 'medical' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'item_title_color', [
                'label'     => __( 'Title Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .accordion > dt > a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_title_bg_color', [
                'label'     => __( 'Title Background Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#f9f9ff',
                'selectors' => [
                    '{{WRAPPER}} .accordion > dt > a' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_active_color', [
                'label'     => __( 'Active Title Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .accordion > dt > a.active' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_active_bg_color', [
                'label'     => __( 'Active Title Background Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#69be00',
                'selectors' => [
                    '{{WRAPPER}} .accordion > dt > a.active' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'description_color', [
                'label'     => __( 'Description Color', 'medical' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .accordion > dd' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

       

	}

	protected function render() {

    $settings = $this->get_settings();
    $accordions = !empty( $settings['accordion_item'] ) ? $settings['accordion_item'] : '';
        ?>
        <section class="our-mission-area section-gap">
            <div class="container">
                <?php
                // Section Heading
                medical_section_heading( $settings['accordion_sectiontitle'], $settings['accordion_sectionsubtitle'] );

                ?>							
                <div class="row">
                    <div class="col-md-6 accordion-left">

                        <!-- accordion 2 start-->
                        <dl class="accordion">
                            <?php
                            if( is_array( $accordions ) && count( $accordions ) > 0 ){ 
                                foreach( $accordions as $accordion ){ ?>
                                    <dt>
                                        <a href=""><?php echo esc_html( $accordion['title'] ) ?></a>
                                    </dt>
                                    <dd> <?php echo esc_html( $accordion['desc'] ) ?> </dd>
                                    <?php
                                }
                            }
                            ?>                                                             
                        </dl>
                        <!-- accordion 2 end-->
                    </div>
                    <div class="col-md-6 video-right justify-content-center align-items-center d-flex relative">
                        <div class="overlay overlay-bg"></div>
                        <a class="play-btn" href="<?php echo esc_url( $settings['section_video_url']['url']  ) ?>">
                            <img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/assets/images/play-btn.png" alt="">
                        </a>
                    </div>
                </div>
            </div>	
        </section>
         
        <?php
    }
	
}

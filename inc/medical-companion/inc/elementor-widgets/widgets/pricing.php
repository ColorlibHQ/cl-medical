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
class Medical_Pricing extends Widget_Base {

	public function get_name() {
		return 'medical-pricing';
	}

	public function get_title() {
		return __( 'Pricing Table', 'medical' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'medical-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // Pricing Heading
		$this->start_controls_section(
			'pricing_heading',
			[
				'label' => __( 'Pricing Section Heading', 'medical' ),
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


		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'pricing_content',
			[
				'label' => __( 'Customers Review', 'medical' ),
			]
		);

		$this->add_control(
			'pricing_table', [
				'label' => __( 'Create Pricing Table', 'medical' ),
				'type'  => Controls_Manager::REPEATER,
				'title_field' => '{{{ table_heading }}}',
				'fields' => [
					[
						'name'  => 'table_heading',
						'label' => __( 'Table heading', 'medical' ),
						'type'  => Controls_Manager::TEXT,
						'label_block' => true,
						'default' => 'Real basic'
					],
                    [
						'name'  => 'pricing_list',
						'label' => __( 'Pricing list', 'medical' ),
						'type'  => Controls_Manager::WYSIWYG,
						'label_block' => true,
						'default' => '<ul class="lists">
                                        <li>2.5 GB Space</li>
                                        <li>Secure Online Transfer</li>
                                        <li>Unlimited Styles</li>
                                        <li>Customer Service</li>
                                    </ul>'
					],
                    [
                        'name'  => 'price',
                        'label' => __( 'Table price', 'medical' ),
                        'type'  => Controls_Manager::TEXT,
                        'default' => '39'
                    ],
                    [
                        'name'  => 'monthoryear',
	                    'label' => __( 'Monthly/Yearly', 'medical' ),
	                    'type'  => Controls_Manager::SELECT,
	                    'options'   => [
		                    'month' => 'Monthly',
		                    'year'  => 'Yearly',
	                    ],
	                    'default'   => 'month'
                    ],
                    [
                        'name'  => 'pricing_table_btn',
                        'label' => __( 'Button Label', 'medical' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'   => 'Get Started'
                    ],
                    [
                        'name'  => 'pricing_btn_url',
                        'label' => __( 'Button URL', 'medical' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'   => ''
                    ]

				]
			]
		);



		$this->end_controls_section(); // End exibition content

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

        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'style_btn', [
                'label' => __( 'Style Button', 'medical' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'color_btn_label', [
				'label'     => __( 'Pricing Button Label Color', 'medical' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .primary-btn.header-btn' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_btn_bg', [
				'label'     => __( 'Pricing Button Background Color', 'medical' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#3bacf0',
				'selectors' => [
					'{{WRAPPER}} .primary-btn.header-btn' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_btn_hover_bg', [
				'label'     => __( 'Pricing Button Hover Background', 'medical' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#88d200',
				'selectors' => [
					'{{WRAPPER}} .single-price:hover .primary-btn' => 'background-color: {{VALUE}};',
				],
			]
		);



        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();

    ?>
        <section class="price-area section-gap" id="price">
            <div class="container">
	            <?php
	            // Section Heading
	            medical_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
	            ?>
                <div class="row">
                <?php
                if ( is_array( $settings['pricing_table'] ) && count( $settings['pricing_table'] ) > 0 ):
                    foreach ( $settings['pricing_table'] as $pricing ):
                        ?>
                        <div class="col-lg-4">
                            <div class="single-price no-padding">
                                <div class="price-top">
                                    <?php
                                        echo medical_heading_tag(
                                            array(
                                                'tag'   => 'h4',
                                                'text'  => esc_html( $pricing['table_heading'] )
                                            )
                                        );
                                    ?>
                                </div>
	                            <?php
                                    if( ! empty( $pricing['pricing_list'] ) ) {
                                        echo medical_get_textareahtml_output( $pricing['pricing_list'] );
                                    }
	                            ?>

                                <div class="price-bottom">
                                    <div class="price-wrap d-flex flex-row justify-content-center">
                                        <span class="price">$</span>
	                                    <?php
                                            echo medical_heading_tag(
                                                array(
                                                    'tag'   => 'h1',
                                                    'text'  => esc_html( $pricing['price'] )
                                                )
                                            );
	                                    ?>
                                        <span class="time"><?php echo esc_html__('Per', 'medical'); ?><br>
                                            <?php echo esc_html( $pricing['monthoryear'] ); ?>
                                        </span>
                                    </div>
                                    <a href="#" class="primary-btn header-btn"><?php echo esc_html( $pricing['pricing_table_btn'] ) ?></a>
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

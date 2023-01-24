<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Solume_Elementor_Pricing extends Widget_Base {

	public function get_name() {
		return 'solume_elementor_pricing';
	}

	public function get_title() {
		return esc_html__( 'Pricing', 'solume' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	public function get_categories() {
		return [ 'solume' ];
	}

	public function get_script_depends() {
		return [ '' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'solume' ),
			]
		);	
				
			// Add Class control

		    $this->add_control(
				'pricing_active',
				[
					'label'   => esc_html__( 'Active Mode', 'solume' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'no',
					'options' => [
						'yes' => esc_html__( 'Yes', 'solume' ),
						'no'  => esc_html__( 'No', 'solume' ),
					],
				]
			);

			$this->add_control(
				'class_icon',
				[
					'label' => esc_html__( 'Icon', 'solume' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'icomoon icomoon-star',
						'library' 	=> 'icomoon',
					],
					'condition' => [
						'pricing_active' => 'yes'
					]
				]
			);
				
			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'solume' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Personal', 'solume' ),
				]
			);

			$this->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'solume' ),
					'type' => Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'As a process transformation company, we rethinks and rebuilds processes for the digital', 'solume' ),
				]
			);

			 $this->add_control(
	            'currency_symbol',
	            [
	                'label' => __( 'Currency Symbol', 'solume' ),
	                'type' => Controls_Manager::SELECT,
	                'options' => [
	                    '' => __( 'None', 'solume' ),
	                    'dollar' => '&#36; ' . _x( 'Dollar', 'Currency Symbol', 'solume' ),
	                    'euro' => '&#128; ' . _x( 'Euro', 'Currency Symbol', 'solume' ),
	                    'baht' => '&#3647; ' . _x( 'Baht', 'Currency Symbol', 'solume' ),
	                    'franc' => '&#8355; ' . _x( 'Franc', 'Currency Symbol', 'solume' ),
	                    'guilder' => '&fnof; ' . _x( 'Guilder', 'Currency Symbol', 'solume' ),
	                    'krona' => 'kr ' . _x( 'Krona', 'Currency Symbol', 'solume' ),
	                    'lira' => '&#8356; ' . _x( 'Lira', 'Currency Symbol', 'solume' ),
	                    'peseta' => '&#8359 ' . _x( 'Peseta', 'Currency Symbol', 'solume' ),
	                    'peso' => '&#8369; ' . _x( 'Peso', 'Currency Symbol', 'solume' ),
	                    'pound' => '&#163; ' . _x( 'Pound Sterling', 'Currency Symbol', 'solume' ),
	                    'real' => 'R$ ' . _x( 'Real', 'Currency Symbol', 'solume' ),
	                    'ruble' => '&#8381; ' . _x( 'Ruble', 'Currency Symbol', 'solume' ),
	                    'rupee' => '&#8360; ' . _x( 'Rupee', 'Currency Symbol', 'solume' ),
	                    'indian_rupee' => '&#8377; ' . _x( 'Rupee (Indian)', 'Currency Symbol', 'solume' ),
	                    'shekel' => '&#8362; ' . _x( 'Shekel', 'Currency Symbol', 'solume' ),
	                    'yen' => '&#165; ' . _x( 'Yen/Yuan', 'Currency Symbol', 'solume' ),
	                    'won' => '&#8361; ' . _x( 'Won', 'Currency Symbol', 'solume' ),
	                    'custom' => __( 'Custom', 'solume' ),
	                ],
	                'default' => 'dollar',
	            ]
	        );

			$this->add_control(
				'currency_symbol_custom',
				[
					'label' => esc_html__( 'Custom Symbol', 'solume' ),
					'type' => Controls_Manager::TEXT,
					'condition' => [
	                    'currency_symbol' => 'custom',
	                ],
				]
			);

			$this->add_control(
				'price',
				[
					'label' => esc_html__( 'Price', 'solume' ),
					'type' => Controls_Manager::NUMBER,
					'default' => 39.99,
				]
			);

			$this->add_control(
				'period',
				[
					'label' => esc_html__( 'Period', 'solume' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( '/mo', 'solume' ),
				]
			);

			$repeater = new \Elementor\Repeater();
				
			$repeater->add_control(
				'text_service',
				[
					'label' => esc_html__( 'Text Service', 'solume' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Add list text service', 'solume' ),
				]
			);

			$repeater->add_control(
				'text_service_cancel_or_checked',
				[
					'label' => esc_html__('Enable/Disable', 'solume' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Enable', 'solume' ),
					'label_off' => esc_html__( 'Disable', 'solume' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$repeater->add_control(
				'class_icon_text_service',
				[
					'label' => esc_html__( 'Icon', 'solume' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'ovaicon ovaicon-checked-1',
						'library' 	=> 'ovaicon',
					],
					'condition' => [
						'text_service_cancel_or_checked' => 'yes'
					]
				]
			);

			$repeater->add_control(
				'class_icon_text_service_disable',
				[
					'label' => esc_html__( 'Icon', 'solume' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'ovaicon ovaicon-cancel',
						'library' 	=> 'ovaicon',
					],
					'condition' => [
						'text_service_cancel_or_checked!' => 'yes'
					]
				]
			);

			$this->add_control(
				'list_service_text',
				[
					'label' => esc_html__( 'List Text Service', 'solume' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[	
							'text_service'      => esc_html__( 'Support Your Business', 'solume' ),
						],
						[	
							'text_service'      => esc_html__( 'Revoke Dokument Access', 'solume' ),
						],
						[	
							'text_service'      => esc_html__( 'Detailed Risk Profiling', 'solume' ),
						],
						[	
							'text_service'      => esc_html__( 'Enter Unlimited Bils', 'solume' ),  
						],
						[	
							'text_service'      => esc_html__( 'Bank Transactions', 'solume' ),
						],
						[	
							'text_service'      => esc_html__( 'Financial Strategy', 'solume' ),
							'text_service_cancel_or_checked' => 'no'
						],
					],
					'title_field' => '{{{ text_service }}}',
				]
			);

			$this->add_control(
				'link',
				[
					'label' => esc_html__( 'Link Button', 'solume' ),
					'type' => Controls_Manager::URL,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => esc_html__( 'https://your-link.com', 'solume' ),
					'show_label' => true,
				]
			);

			$this->add_control(
				'text_button',
				[
					'label' 	=> esc_html__( 'Text Button', 'solume' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( 'Get Started', 'solume' ),
				]
			);

		$this->end_controls_section();

		/* Begin content Style */
		$this->start_controls_section(
            'content_pricing_style',
            [
                'label' => esc_html__( 'Content', 'solume' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
				'content_pricing_bgcolor',
				[
					'label' 	=> esc_html__( 'Background Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing' => 'background-color: {{VALUE}};',
					],
				]
			);
            
            $this->add_control(
				'content_pricing_bgcolor_hover',
				[
					'label' 	=> esc_html__( 'Background Color Hover', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing:hover' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'content_pricing_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'solume' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-pricing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_control(
				'pricing_hover_animation',
				[
					'label' => __( 'Hover Animation', 'solume' ),
					'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
					'prefix_class' => 'elementor-animation-',
				]
			);

	        $this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'solume' ),
					'selector' => '{{WRAPPER}} .ova-pricing',
				]
			);

        $this->end_controls_section();
		/* End content style */

        /* Begin title Style */
		$this->start_controls_section(
            'title_style',
            [
                'label' => esc_html__( 'Title', 'solume' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'title_typography',
					'selector' 	=> '{{WRAPPER}} .ova-pricing .pricing-title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .pricing-title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing:hover .pricing-title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'title_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'solume' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-pricing .pricing-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End title style */

		/* Begin icon Style */
		$this->start_controls_section(
            'icon_style',
            [
                'label' => esc_html__( 'Icon', 'solume' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
                'condition' => [
                	'pricing_active' => 'yes'
                ]
            ]
        );
            
			$this->add_responsive_control(
				'size_icon',
				[
					'label' 		=> esc_html__( 'Size', 'solume' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);
               
            $this->add_control(
				'icon_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .icon i' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'icon_bgcolor',
				[
					'label' 	=> esc_html__( 'Background Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .icon' => 'background-color: {{VALUE}};',
					],
				]
			);


        $this->end_controls_section();
		/* End icon style */

		/* Begin price Style */
		$this->start_controls_section(
            'price_style',
            [
                'label' => esc_html__( 'Price', 'solume' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'price_typography',
					'selector' 	=> '{{WRAPPER}} .ova-pricing .price .ova-price',
				]
			);

			$this->add_control(
				'price_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .price .ova-price' => 'color: {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();
		/* End price style */

		/* Begin period Style */
		$this->start_controls_section(
            'period_style',
            [
                'label' => esc_html__( 'Period', 'solume' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'period_typography',
					'selector' 	=> '{{WRAPPER}} .ova-pricing .price .period',
				]
			);

			$this->add_control(
				'period_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .price .period' => 'color: {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();
		/* End period style */

		/* Begin description Style */
		$this->start_controls_section(
            'description_style',
            [
                'label' => esc_html__( 'Description', 'solume' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'description_typography',
					'selector' 	=> '{{WRAPPER}} .ova-pricing .pricing-description',
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .pricing-description' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'description_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'solume' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-pricing .pricing-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End description style */

		/* Begin shape Style */
		$this->start_controls_section(
            'shape_style',
            [
                'label' => esc_html__( 'Shape', 'solume' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

			$this->add_control(
				'shape_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .shape:before' => 'border-color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'shape_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'solume' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-pricing .shape' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'shape_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'solume' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-pricing .shape:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End shape style */

		/* Begin list text service Style */
		$this->start_controls_section(
            'list_text_service_style',
            [
                'label' => esc_html__( 'List Text Service', 'solume' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );   

            $this->add_responsive_control(
				'space_between_text_service',
				[
					'label' 		=> esc_html__( 'Space Between', 'solume' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 40,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .pricing-service .pricing-service-list li' => 'padding-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

            $this->add_control(
				'list_text_service_icon_heading',
				[
					'label' 	=> esc_html__( 'Icon', 'solume' ),
					'type' 		=> Controls_Manager::HEADING,
				]
			);

				$this->add_responsive_control(
					'size_icon_service',
					[
						'label' 		=> esc_html__( 'Size', 'solume' ),
						'type' 			=> Controls_Manager::SLIDER,
						'size_units' 	=> [ 'px'],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 35,
								'step' => 1,
							],
						],
						'selectors' => [
							'{{WRAPPER}} .ova-pricing .pricing-service .pricing-service-list li i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);
	               
	            $this->add_control(
					'icon_service_color',
					[
						'label' 	=> esc_html__( 'Color Enable', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-pricing .pricing-service .pricing-service-list li.text-service-enable i' => 'color: {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'icon_service_color_cancel',
					[
						'label' 	=> esc_html__( 'Color Disable', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-pricing .pricing-service .pricing-service-list li.text-service-disable i' => 'color: {{VALUE}};',
						],
					]
				);

            $this->add_control(
				'list_text_service_heading',
				[
					'label' 	=> esc_html__( 'Text Service', 'solume' ),
					'type' 		=> Controls_Manager::HEADING,
					'separator' => 'before'
				]
			);

	            $this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' 		=> 'list_text_service_typography',
						'selector' 	=> '{{WRAPPER}} .ova-pricing .pricing-service .pricing-service-list li .text_service',
					]
				);

				$this->add_control(
					'list_text_service_color',
					[
						'label' 	=> esc_html__( 'Color Enable', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}}  .ova-pricing .pricing-service .pricing-service-list li.text-service-enable .text_service' => 'color: {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'list_text_service_color_disable',
					[
						'label' 	=> esc_html__( 'Color Disable', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}}  .ova-pricing .pricing-service .pricing-service-list li.text-service-disable .text_service' => 'color: {{VALUE}};',
						],
					]
				);

        $this->end_controls_section();
		/* End list text service style */

		/* Begin button Style */
		$this->start_controls_section(
            'button_style',
            [
                'label' => esc_html__( 'Button', 'solume' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'text_button_typography',
					'selector' 	=> '{{WRAPPER}} .ova-pricing .pricing-btn',
				]
			);
            
            $this->add_control(
				'button_text_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .pricing-btn' => 'color: {{VALUE}};',
					],
				]
			);

			 $this->add_control(
				'button_text_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .pricing-btn:hover' => 'color: {{VALUE}};',
					],
				]
			);

            $this->add_control(
				'button_bgcolor',
				[
					'label' 	=> esc_html__( 'Background Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .pricing-btn' => 'background-color: {{VALUE}};',
					],
				]
			);
            
            $this->add_control(
				'button_bgcolor_hover',
				[
					'label' 	=> esc_html__( 'Background Color Hover', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-pricing .pricing-btn:hover' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'button_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'solume' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-pricing .pricing-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_responsive_control(
	            'button_border_radius',
	            [
	                'label' 		=> esc_html__( 'Border Radius', 'solume' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-pricing .pricing-btn, {{WRAPPER}} .ova-pricing .pricing-btn:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'label' => esc_html__( 'Border', 'solume' ),
					'selector' => '{{WRAPPER}} .ova-pricing .pricing-btn',
				]
			);

        $this->end_controls_section();
		/* End button style */

	}


    private function get_currency_symbol( $symbol_name ) {
        $symbols = [
            'dollar' => '&#36;',
            'euro' => '&#128;',
            'franc' => '&#8355;',
            'pound' => '&#163;',
            'ruble' => '&#8381;',
            'shekel' => '&#8362;',
            'baht' => '&#3647;',
            'yen' => '&#165;',
            'won' => '&#8361;',
            'guilder' => '&fnof;',
            'peso' => '&#8369;',
            'peseta' => '&#8359',
            'lira' => '&#8356;',
            'rupee' => '&#8360;',
            'indian_rupee' => '&#8377;',
            'real' => 'R$',
            'krona' => 'kr',
        ];

        return isset( $symbols[ $symbol_name ] ) ? $symbols[ $symbol_name ] : '';
    }

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		if ( ! empty( $settings['currency_symbol'] ) ) {
            if ( 'custom' !== $settings['currency_symbol'] ) {
                $symbol = $this->get_currency_symbol( $settings['currency_symbol'] );
            } else {
                $symbol = $settings['currency_symbol_custom'];
            }
        }

        $active            =    isset( $settings['pricing_active'] ) ? $settings['pricing_active'] : '';

		$title             =    $settings['title'];
		$description       =    $settings['description'];
		$price             =    $settings['price'];
		$period            =    $settings['period'];
		$class_icon        =    isset( $settings['class_icon']['value'] ) ? $settings['class_icon']['value'] : '';
		$list_service_text =    $settings['list_service_text'];

		$text_button       =    $settings['text_button'];
		$link              =    $settings['link'];
		$nofollow          =    ( isset( $link['nofollow'] ) && $link['nofollow'] ) ? 'rel=nofollow' : '';
		$target            =    ( isset( $link['is_external'] ) && $link['is_external'] !== '' ) ? 'target=_blank' : ''; 


		?>
		    <div class="ova-pricing <?php if( $active === 'yes' ) echo 'ova-pricing-active'?>">

                <?php if( $active === 'yes' ) : ?>
	           	    <div class="icon">
	                	<?php if( !empty( $class_icon ) ) : ?> 
			                <i class="<?php echo esc_attr( $class_icon ) ;?>"></i>
			            <?php endif; ?>
	                </div>
                <?php endif; ?>

           	    <?php if( !empty( $title ) ) : ?>
	                <h3 class="pricing-title">
	                	<?php echo esc_html( $title ) ; ?>
	                </h3>
                <?php endif; ?>
                
                <div class="price">
		            <?php if( !empty( $price ) ) :?>
		            	<span class="currency-symbol"><?php echo esc_html( $symbol ) ;?></span>
		                <div class="ova-price"><?php echo esc_html( $price ) ;?></div>
		                <span class="period"><?php echo esc_html( $period ) ;?></span>
		            <?php endif; ?>
                </div>

                <?php if( !empty( $description ) ) : ?>
	                <p class="pricing-description">
	                	<?php echo esc_html( $description ) ; ?>
	                </p>
                <?php endif; ?>

                <div class="shape"></div>

                <div class="pricing-service">

	                <?php if( $list_service_text != '' ): ?>
	                    <ul class="pricing-service-list">
	                    	<?php foreach( $list_service_text as $list_st ) { 
	                    		$text_service_cancel_or_checked  = $list_st['text_service_cancel_or_checked'];
                                $class_icon_text_service         = $list_st['class_icon_text_service']['value'];
                                $class_icon_text_service_disable = $list_st['class_icon_text_service_disable']['value'];
	                    	?>
		                    	<?php if( $text_service_cancel_or_checked === 'yes' ) : ?>
			                        <li class="text-service-enable">
			                            <span class="text_service"><?php echo esc_html( $list_st['text_service'] ) ; ?></span> 
			                            <i class="<?php echo esc_attr( $class_icon_text_service ) ; ?>"></i>
			                        </li>
			                    <?php else: ?>
			                    	<li class="text-service-disable">
			                            <span class="text_service"><?php echo esc_html( $list_st['text_service'] ) ; ?></span> 
			                            <i class="<?php echo esc_attr( $class_icon_text_service_disable ) ; ?>"></i>
			                        </li>
			                    <?php endif; ?>
	                       <?php } ?>
	                    </ul>
	                <?php endif; ?>
                </div>

                <?php if( !empty( $text_button ) ) : ?>
	                <a <?php if( !empty( $link['url'] ) ) : ?> href="<?php echo esc_url( $link['url'] ) ;?>" <?php endif; ?> 
	                    class="pricing-btn" <?php echo esc_attr( $nofollow ) ;?> <?php echo esc_attr( $target ) ;?> title="<?php echo esc_attr( $text_button ); ?>">
                        <span class="text-button">
                        	<?php echo esc_html( $text_button ) ;?>
                        </span>
	                </a>
	            <?php endif; ?>

            </div>

		<?php
	}
	
}
$widgets_manager->register( new Solume_Elementor_Pricing() );
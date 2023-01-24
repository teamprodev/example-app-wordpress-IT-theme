<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Solume_Elementor_FAQ_Tab extends Widget_Base {

	public function get_name() {
		return 'solume_elementor_faq_tab';
	}

	public function get_title() {
		return esc_html__( 'FAQ Tab', 'solume' );
	}

	public function get_icon() {
		return 'eicon-tabs';
	}

	public function get_categories() {
		return [ 'solume' ];
	}

	public function get_script_depends() {
		return [ 'solume-elementor-faq-tab' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		//CONTENT
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'solume' ),
			]
		);	
			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'list_title', [
					'label' => esc_html__( 'Title', 'solume' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Title' , 'solume' ),
					'label_block' => true,
				]
			);

			$repeater->add_control(
				'list_content',
				[
					'label' => esc_html__( 'Template shortcode', 'solume' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'rows' => 10,	
					'placeholder' => esc_html__( '[solume-elementor-template id="ID"]', 'solume' ),
				]
			);

			$this->add_control(
				'list',
				[
					'label' => esc_html__( 'FAQ List', 'solume' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'list_title' => esc_html__( 'Platform', 'solume' ),
							'list_content' => esc_html__( '[solume-elementor-template id="ID"]', 'solume' ),
						],
						[
							'list_title' => esc_html__( 'Partners', 'solume' ),
							'list_content' => esc_html__( '[solume-elementor-template id="ID"]', 'solume' ),
						],
					],
					'title_field' => '{{{ list_title }}}',
				]
			);

		
		$this->end_controls_section();
		//END CONTENT

		//CONTACT INFO
		$this->start_controls_section(
			'section_contact_info',
			[
				'label' => esc_html__( 'Contact Info', 'solume' ),
			]
		);	

			$this->add_control(
				'label',
				[
					'label'   => esc_html__( 'Label', 'solume' ),
					'type'    => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__('Still Need Help', 'solume'),
				]
			);
			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'type',
				[
					'label' 	=> esc_html__( 'Type', 'solume' ),
					'type'   	=> Controls_Manager::SELECT,
					'default' 	=> 'email',
					'options' 	=> [
						'email' 	=> esc_html__('Email', 'solume'),
						'phone' 	=> esc_html__('Phone', 'solume'),
						'link' 		=> esc_html__('Link', 'solume'),
						'text' 		=> esc_html__('Text', 'solume'),
					]
				]
			);
			
			$repeater->add_control(
				'icon_email',
				[
					'label' 	=> esc_html__( 'Choose Icon', 'solume' ),
					'type'  	=> Controls_Manager::ICONS,
					'default' 	=> [
						// 'value' 	=> 'icomoon icomoon-envelope',
						'value' 	=> 'ovaicon ovaicon-mail-1',
						'library' 	=> 'icomoon',
					],
					'condition' => [
						'type' 	=> 'email',
					]
				]
			);
			
			$repeater->add_control(
				'email_title',
				[
					'label'   		=> esc_html__( 'Email title', 'solume' ),
					'type'    		=> \Elementor\Controls_Manager::TEXT,
					'description' 	=> esc_html__( 'ABC', 'solume' ),
					'condition' 	=> [
						'type' 	=> 'email',
					]

				]
			);

			$repeater->add_control(
				'email_label',
				[
					'label'   		=> esc_html__( 'Email Label', 'solume' ),
					'type'    		=> \Elementor\Controls_Manager::TEXT,
					'description' 	=> esc_html__( 'email@company.com', 'solume' ),
					'default' 		=> 'email@company.com',
					'condition' 	=> [
						'type'	=> 'email',
					]

				]
			);

			$repeater->add_control(
				'email_link',
				[
					'label'   		=> esc_html__( 'Email Link', 'solume' ),
					'type'    		=> \Elementor\Controls_Manager::TEXT,
					'description' 	=> esc_html__( 'email@company.com', 'solume' ),
					'condition' 	=> [
						'type' => 'email',
					]

				]
			);
			
			$repeater->add_control(
				'icon_phone',
				[
					'label' 	=> esc_html__( 'Choose Icon', 'solume' ),
					'type'  	=> Controls_Manager::ICONS,
					'default' 	=> [
						'value'		=> 'ovaicon ovaicon-phone-call',
						'library' 	=> 'icomoon',
					],
					'condition' => [
						'type' => 'phone',
					]
				]
			);

			$repeater->add_control(
				'phone_title',
				[
					'label'   		=> esc_html__( 'Phone Title', 'solume' ),
					'type'    		=> \Elementor\Controls_Manager::TEXT,
					'description' 	=> esc_html__( 'Hotline: ', 'solume' ),
					'default'		=> 'Call us',
					'condition' 	=> [
						'type' => 'phone',
					]

				]
			);

			$repeater->add_control(
				'phone_label',
				[
					'label'   		=> esc_html__( 'Phone Label', 'solume' ),
					'type'    		=> \Elementor\Controls_Manager::TEXT,
					'description' 	=> esc_html__( '+012 (345) 678', 'solume' ),
					'default' 		=> '+012 (345) 678',
					'condition' 	=> [
						'type' => 'phone',
					]

				]
			);

			$repeater->add_control(
				'phone_link',
				[
					'label'   		=> esc_html__( 'Phone Link', 'solume' ),
					'type'    		=> \Elementor\Controls_Manager::TEXT,
					'description' 	=> esc_html__( '+012345678', 'solume' ),
					'condition' 	=> [
						'type' => 'phone',
					]

				]
			);

			$repeater->add_control(
				'icon_link',
				[
					'label' 	=> esc_html__( 'Choose Icon', 'solume' ),
					'type'  	=> Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'icomoon icomoon-link',
						'library' 	=> 'icomoon',
					],
					'condition' => [
						'type' => 'link',
					]
				]
			);

			$repeater->add_control(
				'link_title',
				[
					'label'   		=> esc_html__( 'Link Title', 'solume' ),
					'type'    		=> \Elementor\Controls_Manager::TEXT,
					'description'   => esc_html__( 'Link Title', 'solume' ),
					'default' 		=> 'Title link ',
					'condition' 	=> [
						'type' => 'link',
					]

				]
			);
			$repeater->add_control(
				'link_label',
				[
					'label'   		=> esc_html__( 'Link Label', 'solume' ),
					'type'    		=> \Elementor\Controls_Manager::TEXT,
					'description' 	=> esc_html__( 'https://your-domain.com', 'solume' ),
					'default' 		=> 'https://your-domain.com',
					'condition' 	=> [
						'type' => 'link',
					]

				]
			);

			$repeater->add_control(
				'link_address',
				[
					'label'   		=> esc_html__( 'Link', 'solume' ),
					'type'    		=> \Elementor\Controls_Manager::URL,
					'description'	=> esc_html__( 'https://your-domain.com', 'solume' ),
					'show_external' => false,
					'default' 		=> [
						'url' 			=> '#',
						'is_external' 	=> false,
						'nofollow' 		=> false,
					],
					'condition' 	=> [
						'type' => 'link',
					],
				]
			);

			$repeater->add_control(
				'icon_text',
				[
					'label' 	=> esc_html__( 'Choose Icon', 'solume' ),
					'type'  	=> Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'icomoon icomoon-chat',
						'library' 	=> 'icomoon',
					],
					'condition' => [
						'type' => 'text',
					]
				]
			);

			$repeater->add_control(
				'text',
				[
					'label'   => esc_html__( 'Text', 'solume' ),
					'type'    => \Elementor\Controls_Manager::TEXT,
					'description' => esc_html__( 'Your text', 'solume' ),
					'default' => 'Your text',
					'condition' => [
						'type' => 'text',
					]

				]
			);
			$repeater->add_control(
				'description',
				[
					'label'   => esc_html__( 'Description', 'solume' ),
					'type'    => \Elementor\Controls_Manager::TEXT,
					'description' => esc_html__( 'Description', 'solume' ),
					'default' => 'Your text',
					'condition' => [
						'type' => 'text',
					]

				]
			);

			$this->add_control(
				'items_info',
				[
					'label'       => esc_html__( 'Items Info', 'solume' ),
					'type'        => Controls_Manager::REPEATER,
					'fields'      => $repeater->get_controls(),
					'default' => [
						[
							'type' => 'text',
							'text' => esc_html__('Chat with us', 'solume'),
							'description' => esc_html__('10am to 8pm EST', 'solume'),
						],
						[
							'type' => 'email',
							'icon_email' => [
								'value' => 'ovaicon ovaicon-twitter-1',
								'library' => 'icomoon',
							],
							'email_title' => esc_html__('Send us a tweet', 'solume'),
							'email_label' => esc_html__('@example','solume'),
							'email_link' => esc_html__('@example.com', 'solume'),
							
						],
						[
							'type' => 'email',
							'email_title' => esc_html__('Email us', 'solume'),
							'email_label' => esc_html__('Send us a message','solume'),
							'email_link' => esc_html__('example@email.com', 'solume'),
						],
					],
					'title_field' => '{{{ type }}}',
				]
			);	


		$this->end_controls_section();
		// END	CONTACT INFO

		
		//====STYLE Tab GENERAL====//
		$this->start_controls_section(
			'section_style_general',
			[
				'label' => esc_html__( 'General', 'solume' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,

			]
		);

			$this->add_responsive_control(
				'general_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'solume' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-tabs .tab-title .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'general_margin',
				[
					'label' 		=> esc_html__( 'Margin', 'solume' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-tabs .tab-title .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			
			$this->add_control(
				'background_general',
				[
					'label' 	=> esc_html__( 'Background', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-tabs .tab-title .title' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'border_radius_general',
				array(
					'label'      => esc_html__( 'Border Radius', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .ova-tabs .tab-title .title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow_general',
					'label' => esc_html__( 'Box Shadow', 'solume' ),
					'selector' => '{{WRAPPER}} .ova-tabs .tab-title .title',
				]
			);



		$this->end_controls_section();
		//====END STYLE Tab GENERAL====//

		//====STYLE Tab CONTENT====//
	
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => esc_html__( 'Title', 'solume' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,

			]
		);
		
		$this->start_controls_tabs(
			'style_title'
		);
			$this->start_controls_tab(
				'style_normal_title',
				[
					'label' => esc_html__( 'Normal', 'solume' ),
				]
			);
			//code
				$this->add_control(
					'title_color',
					[
						'label'	 	=> esc_html__( 'Color', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-tabs .tab-title .title .item-title .faq-title' => 'color : {{VALUE}};',
						],
					]
				);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' 		=> 'title_typography',
						'selector' 	=> '{{WRAPPER}} .ova-tabs .tab-title .title .item-title .faq-title',
					]
				);

				$this->add_control(
					'background_color',
					[
						'label' 	=> esc_html__( 'Background', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-tabs .tab-title .title .item-title ' => 'background-color : {{VALUE}};',
						],
					]
				);

				$this->add_responsive_control(
					'title_padding',
					[
						'label' 		=> esc_html__( 'Padding', 'solume' ),
						'type' 			=> Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', 'em', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .ova-tabs .tab-title .title .item-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$this->add_responsive_control(
					'title_margin',
					[
						'label' 		=> esc_html__( 'Margin', 'solume' ),
						'type' 			=> Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', 'em', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .ova-tabs .tab-title .title .item-title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$this->add_control(
					'border_radius_title',
					array(
						'label'      => esc_html__( 'Border Radius', 'solume' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => array( 'px', '%' ),
						'selectors'  => array(
							'{{WRAPPER}} .ova-tabs .tab-title .title .item-title ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						),
					)
				);

				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' 		=> 'border_title',
						'label' 	=> esc_html__( 'Border', 'solume' ),
						'selector' 	=> '{{WRAPPER}}  .ova-tabs .tab-title .title .item-title ',
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'box_shadow_title',
						'label' => esc_html__( 'Box Shadow', 'solume' ),
						'selector' => '{{WRAPPER}} .ova-tabs .tab-title .title .item-title',
					]
				);

				
	

			$this->end_controls_tab();

			$this->start_controls_tab(
				'style_hover_title',
				[
					'label' => esc_html__( 'Hover', 'solume' ),
				]
			);
			// code
				$this->add_control(
					'title_color_hover',
					[
						'label'	 	=> esc_html__( 'Color', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-tabs .tab-title .title .item-title:hover .faq-title' => 'color : {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'background_color_hover',
					[
						'label' 	=> esc_html__( 'Background hover', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-tabs .tab-title .title .item-title:hover' => 'background-color : {{VALUE}};',
						],
					]
				);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'style_active_title',
				[
					'label' => esc_html__( 'Active', 'solume' ),
				]
			);
			// code
				$this->add_control(
					'title_color_active',
					[
						'label'	 	=> esc_html__( 'Color', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-tabs .tab-title .title .item-title.active_title .faq-title' => 'color : {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'background_color_active',
					[
						'label' 	=> esc_html__( 'Background active', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-tabs .tab-title .title .item-title.active_title ' => 'background-color : {{VALUE}};',
						],
					]
				);
			
			$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->start_controls_tabs(
			'style_title_mobile'
		);
			$this->start_controls_tab(
				'style_normal_title_mobile',
				[
					'label' => esc_html__( 'Mobile', 'solume' ),
				]
			);

				$this->add_control(
					'title_color_mobile',
					[
						'label'	 	=> esc_html__( 'Color', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [	
							'{{WRAPPER}} .ova-tabs .tab-content .item-title	' 				 => 'color : {{VALUE}};',
							'{{WRAPPER}} .ova-tabs .tab-content .item-title .faq-title	' 	 => 'color : {{VALUE}};',	
						],
					]
				);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name' 		=> 'title_mobile_typography',
						'selector' 	=> '{{WRAPPER}} .ova-tabs .tab-content .item-title .faq-title',
					]
				);

				$this->add_control(
					'background_color_mobile',
					[
						'label' 	=> esc_html__( 'Background', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-tabs .tab-content .item-title		'  => 'background-color : {{VALUE}};'
						],
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' 		=> 'border_title_mobile',
						'label' 	=> esc_html__( 'Border', 'solume' ),
						'selector' 	=> '{{WRAPPER}} .ova-tabs .tab-content .item-title',
					]
				);

				$this->add_responsive_control(
					'padding_mobile_title',
					[
						'label' 		=> esc_html__( 'Padding', 'solume' ),
						'type' 			=> Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', 'em', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .ova-tabs .tab-content .item-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$this->add_responsive_control(
					'margin_title_mobile',
					[
						'label' 		=> esc_html__( 'Margin Title', 'solume' ),
						'type' 			=> Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', 'em', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .ova-tabs .tab-content .item-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$this->add_control(
					'border_radius_title_mobile',
					array(
						'label'      => esc_html__( 'Border Radius', 'solume' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => array( 'px', '%' ),
						'selectors'  => array(
							'{{WRAPPER}} .ova-tabs .tab-content .item-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						),
					)
				);

				$this->add_group_control(
					\Elementor\Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'box_shadow_title_mobile',
						'label' => esc_html__( 'Box Shadow', 'solume' ),
						'selector' => '{{WRAPPER}} .ova-tabs .tab-content .item-title',
					]
				);

				$this->add_control(
					'selected_icon',
					[
						'label' => esc_html__( 'Icon', 'elementor' ),
						'type' => Controls_Manager::ICONS,
						'separator' => 'before',
						'fa4compatibility' => 'icon',
						'default' => [
							'value' => 'ovaicon ovaicon-next',
							'library' => 'icomoon',
						],
						'recommended' => [
							'fa-solid' => [
								'chevron-down',
								'angle-down',
								'angle-double-down',
								'caret-down',
								'caret-square-down',
							],
							'fa-regular' => [
								'caret-square-down',
							],
						],
						'skin' => 'inline',
						'label_block' => false,
					]
				);
	
				$this->add_control(
					'selected_active_icon',
					[
						'label' => esc_html__( 'Active Icon', 'elementor' ),
						'type' => Controls_Manager::ICONS,
						'fa4compatibility' => 'icon_active',
						'default' => [
							'value' => 'ovaicon ovaicon-download',
							'library' => 'icomoon',
						],
						'recommended' => [
							'fa-solid' => [
								'chevron-up',
								'angle-up',
								'angle-double-up',
								'caret-up',
								'caret-square-up',
							],
							'fa-regular' => [
								'caret-square-up',
							],
						],
						'skin' => 'inline',
						'label_block' => false,
						
					]
				);
				
				$this->add_control(
					'icon_fontsize',
					[
						'label' => esc_html__( 'Font Size', 'solume' ),
						'type' => Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 1,
								'max' => 60,
								'step' => 1,
							]
						],
						'selectors' => [
							'{{WRAPPER}} .ova-tabs .tab-content .item-title .icon i'     => 'font-size: {{SIZE}}{{UNIT}};',
							'{{WRAPPER}} .ova-tabs .tab-content .item-title .icon-active i' => 'font-size: {{SIZE}}{{UNIT}};',
							
						],
					]
				);
			$this->end_controls_tab();
			// end mobile 

			//mobile hover
			$this->start_controls_tab(
				'style_normal_title_mobile_hover',
				[
					'label' => esc_html__( 'Mobile hover', 'solume' ),
				]
			);

				$this->add_control(
					'title_color_mobile_hover',
					[
						'label'	 	=> esc_html__( 'Color', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [	
							'{{WRAPPER}} .ova-tabs .tab-content .item-title:hover	' 				 => 'color : {{VALUE}};',
							'{{WRAPPER}} .ova-tabs .tab-content .item-title:hover .faq-title	' 	 => 'color : {{VALUE}};',	
						],
					]
				);

				$this->add_control(
					'background_color_hover_mobile',
					[
						'label' 	=> esc_html__( 'Background', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-tabs .tab-content .item-title:hover		'  => 'background-color : {{VALUE}};'
						],
					]
				);

				$this->add_control(
					'border_title_hover',
					[
						'label' 	=> esc_html__( 'Border color', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-tabs .tab-content .item-title:hover		'  => 'border-color : {{VALUE}};'
						],
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'box_shadow_title_hover_mobile',
						'label' => esc_html__( 'Box Shadow', 'solume' ),
						'selector' => '{{WRAPPER}} .ova-tabs .tab-content .item-title:hover',
					]
				);

			
			
			$this->end_controls_tab();
			//end mobile hover

			//mobile active
			$this->start_controls_tab(
				'style_normal_title_mobile_active',
				[
					'label' => esc_html__( 'Mobile Active', 'solume' ),
				]
			);

				$this->add_control(
					'title_color_mobile_active',
					[
						'label'	 	=> esc_html__( 'Color', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [	
							'{{WRAPPER}} .ova-tabs .tab-content .item-title.active_title	' 			=> 'color : {{VALUE}};',
							'{{WRAPPER}} .ova-tabs .tab-content .item-title.active_title .faq-title	' 	=> 'color : {{VALUE}};',	
						],
					]
				);

				$this->add_control(
					'background_color_active_mobile',
					[
						'label' 	=> esc_html__( 'Background', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-tabs .tab-content .item-title.active_title'  => 'background-color : {{VALUE}};'
						],
					]
				);

				$this->add_control(
					'border_title_active_mobile',
					[
						'label' 	=> esc_html__( 'Border color', 'solume' ),
						'type' 		=> Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .ova-tabs .tab-content .item-title.active_title		'  => 'border-color : {{VALUE}};'
						],
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'box_shadow_title_active_mobile',
						'label' => esc_html__( 'Box Shadow', 'solume' ),
						'selector' => '{{WRAPPER}} .ova-tabs .tab-content .item-title.active_title',
					]
				);

				$this->add_responsive_control(
					'title_margin_mobile_active',
					[
						'label' 		=> esc_html__( 'Margin Title', 'solume' ),
						'type' 			=> Controls_Manager::DIMENSIONS,
						'size_units' 	=> [ 'px', 'em', '%' ],
						'selectors' 	=> [
							'{{WRAPPER}} .ova-tabs .tab-content .item-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

			
			
			$this->end_controls_tab();
			//end mobile active


		$this->end_controls_tabs();
		

		$this->end_controls_section(); 
		//====END STYLE Tab CONTENT====//


		//====STYLE Tab CONTENT====//
		$this->start_controls_section(
			'section_style_contact_info',
			[
				'label' => esc_html__( 'Contact Info', 'solume' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_responsive_control(
				'contact_info_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'solume' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		
			$this->add_control(
				'background_contact_info',
				[
					'label' 	=> esc_html__( 'Background', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'border_radius_contact_info',
				array(
					'label'      => esc_html__( 'Border Radius', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow_contact_info',
					'label' => esc_html__( 'Box Shadow', 'solume' ),
					'selector' => '{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info',
				]
			);

			//CODE TAB LABEL
			$this->start_controls_tabs(
				'style_label'
			);

				$this->start_controls_tab(
					'style_contact_tab_label',
					[
						'label' => esc_html__( 'Label', 'solume' ),
					]
				);
					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' 		=> 'contact_label_typography',
							'selector' 	=> '{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .contact .label',
						]
					);

					$this->add_control(
						'contact_label_color',
						[
							'label'	 	=> esc_html__( 'Color', 'solume' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .contact .label' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' 		=> 'border_label',
							'label' 	=> esc_html__( 'Border', 'solume' ),
							'selector' 	=> '{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .contact .label',
						]
					);

					$this->add_responsive_control(
						'label_padding',
						[
							'label' 		=> esc_html__( 'Padding', 'solume' ),
							'type' 			=> Controls_Manager::DIMENSIONS,
							'size_units' 	=> [ 'px', 'em', '%' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .contact .label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
		
					$this->add_responsive_control(
						'label_margin',
						[
							'label' 		=> esc_html__( 'Margin', 'solume' ),
							'type' 			=> Controls_Manager::DIMENSIONS,
							'size_units' 	=> [ 'px', 'em', '%' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .contact .label' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
		
				
				$this->end_controls_tab();

			$this->end_controls_tabs();
			//END TAB LABEL

			//CODE TAB INFO
			$this->start_controls_tabs(
				'style_info'
			);

				$this->start_controls_tab(
					'style_contact_tab_info',
					[
						'label' => esc_html__( 'Info', 'solume' ),
					]
				);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' 		=> 'contact_title_typography',
							'label'	 	=> esc_html__( 'Title Typograpphy', 'solume' ),
							'selector' 	=> '{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .info .item .contact-title',
						]
					);

					$this->add_control(
						'contact_info_title_color',
						[
							'label'	 	=> esc_html__( 'Title Color', 'solume' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .info .item .contact-title' => 'color : {{VALUE}};',
							],
						]
					);

					
					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' 		=> 'contact_desc_typography',
							'label'	 	=> esc_html__( 'Desc Typograpphy', 'solume' ),
							'selector' 	=> '{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .info .item .content',
						]
					);

					$this->add_control(
						'contact_info_desc_color',
						[
							'label'	 	=> esc_html__( 'Desc Color', 'solume' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .info .item .content' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'contact_info_desc_color_hover',
						[
							'label'	 	=> esc_html__( 'Desc link hover Color', 'solume' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .info .item a:hover .content' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'contact_info_icon_fontsize',
						[
							'label' 		=> esc_html__( 'Icon Size', 'solume' ),
							'type' 			=> Controls_Manager::SLIDER,
							'size_units' 	=> [ 'px' ],
							'range' => [
								'px' => [
									'min' 	=> 1,
									'max' 	=> 300,
									'step' 	=> 1,
								]
							],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .contact .info .item i' => 'font-size: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .contact .info .item svg' => 'width: {{SIZE}}{{UNIT}};',
		
							],
						]
					);
		
					$this->add_control(
						'contact_info_icon_color',
						[
							'label' 	=> esc_html__( 'Color Icon', 'solume' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .contact .info .item i' => 'color : {{VALUE}} !important;',
								'{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .contact .info .item svg path' => 'fill: {{VALUE}}',
		
							],
						]
					);
		
					$this->add_responsive_control(
						'contact_info_icon_margin',
						[
							'label' 		=> esc_html__( 'Margin', 'solume' ),
							'type' 			=> Controls_Manager::DIMENSIONS,
							'size_units' 	=> [ 'px', 'em', '%' ],
							'selectors' 	=> [
								'{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .contact .info .item i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
								'{{WRAPPER}} .ova-tabs .tab-title .ova-contact-info .contact .info .item svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		
							],
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();
			//END TAB INFO
		$this->end_controls_section(); 
		//====END STYLE Tab CONTACT INFO====//

	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$label 		= $settings['label'] ? $settings['label'] : '';
		$items_info = $settings['items_info'];
		
		?>
		<?php if ( $settings['list'] ): ?>
			<div class="ova-tabs">
				<?php $data_title = 0; ?>
				<div class="tab-title">
					<div class="title">
						<?php	foreach (  $settings['list'] as $item ) : ?>
							<?php $data_title++; ?>
							<div class="item-title" data-tab="<?php echo esc_attr($data_title); ?>" data-desktop="<?php echo esc_attr($data_title); ?>">
								<div class="faq-title" >
									<?php printf( $item['list_title'] ) ; ?>
								</div>
							</div>
						
						<?php endforeach; ?>
					</div>

					<div class="ova-contact-info">
						<div class="contact">
						<?php if ( $label ): ?>
							<h6 class="label">
								<?php echo esc_html( $label ); ?>
							</h6>
						<?php endif; ?>
						<ul class="info">
							<?php foreach( $items_info as $item ):
								$type = $item['type'];
							?>
								<li class="item">

									<?php switch ( $type ) {

										case 'email':

											$email_title = $item['email_title'];
											$email_label = $item['email_label'];
											$email_icon  = $item['icon_email'];
											$email_link  = $item['email_link'];
											if($email_icon){ ?>	
												<?php \Elementor\Icons_Manager::render_icon( $email_icon, [ 'aria-hidden' => 'true' ] );  ?>
												
											<?php
											}
											?>
												<div class="ova-email">
													<?php
													
													if($email_title){ ?>
														<p  class="contact-title"> <?php echo esc_html( $email_title ); ?> </p>
														<?php
													}
													if($email_link){ ?>
														<a class="content" href="mailto:<?php echo esc_attr( $email_link ); ?> ">
																<?php echo esc_html( $email_label ); ?> 
														</a>
													<?php
													} else{ ?>
														<p class="content">	<?php	echo esc_html( $email_label ); ?> </p>
													<?php }
													?>
												</div>
												<?php
											break;

										case 'phone':

											$phone_title = $item['phone_title'];
											$phone_label = $item['phone_label'];
											$phone_icon  = $item['icon_phone'];
											$phone_link  = $item['phone_link'];

											if($phone_icon){ ?>
																						
												<?php \Elementor\Icons_Manager::render_icon( $phone_icon, [ 'aria-hidden' => 'true' ] );  ?>

											<?php } ?>

											<div class="ova-phone">
											<?php
												
												if( $phone_title ) { ?>
													<p  class="contact-title"><?php echo esc_html( $phone_title );?></p>
												<?php }
												if($phone_link){ ?>
													<a  class="content"> href="tel:<?php echo esc_attr( $phone_link ); ?> ">
														 <?php echo esc_html( $phone_label ); ?> 
													</a>
												<?php
												} else{ ?>
													<p class="content"> <?php echo esc_html( $phone_label ); ?> </p>
											<?php	}
											?>
											</div>
											<?php
											break;

										case 'link':

											$this->add_render_attribute( 'title' );
											$link_icon   = $item['icon_link'];
											$link_title  = $item['link_title'];
											$link_label  = $item['link_label'];
											$link_link   = $item['link_address']['url'];
											$target_link = $item['link_address']['is_external'] ? ' target="_blank"' : '';

											if( $link_icon ) { ?>	
												<?php \Elementor\Icons_Manager::render_icon( $link_icon, [ 'aria-hidden' => 'true' ] );  ?>
												
											<?php } ?>

											<div class="ova-link">
											<?php
												
												if($link_title){
													?>
													<p class="contact-title"><?php echo esc_html( $link_title );?></p>
													<?php
												}
												if($link_label){ 

													if($link_link){ ?>
											
														<a class="content" href="<?php echo esc_url( $link_link ); ?> " <?php printf( $target_link ); ?>>
															<?php echo esc_html( $link_label ); ?> 
														</a>
													<?php
													} else{ ?>
														<p class="content"> <?php echo esc_html( $link_label ); ?> </p>
												<?php }
												}  ?>
											</div>
											<?php
											break;

										case 'text':
											
											$text_icon  = $item['icon_text'];
											$text_title = $item['text'];
											$text_label = $item['description'];
											
											if( $text_icon ) { ?>	
												<?php \Elementor\Icons_Manager::render_icon( $text_icon, [ 'aria-hidden' => 'true' ] );  ?>

											<?php } ?>
											
											<div class="ova-text">
												<?php
													if($text_title){ ?>
													<p class="contact-title"> 
														<?php echo esc_html( $text_title ); ?>
													</p>	
													<?php }
													if($text_label){ ?>
														<p class="descreption content"> 
															<?php echo esc_html( $text_label ); ?>
														</p>
													<?php }
												?>
											</div>
											<?php
											break;
										default:
											break;
									} ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
					</div>
				</div>
				<?php $data_content = 0; ?>
				<div class="tab-content">
					<?php	foreach (  $settings['list'] as $item ) : ?>
						<?php $data_content++; ?>

						<div class="item-title " data-tab="<?php echo esc_attr($data_content); ?>" data-mobile="<?php  echo esc_attr($data_content); ?>">
							<div class="faq-title">
								<?php echo esc_html( $item['list_title'] ); ?> 
							</div>
							<?php  if( $settings['selected_icon']['value'] ){ ?>
								<div class="icon">
									<?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );  ?>
								</div>	
								<?php  } ?>
								<?php  if( $settings['selected_active_icon']['value'] ){ ?>
									<div class="icon-active">
										<?php \Elementor\Icons_Manager::render_icon( $settings['selected_active_icon'], [ 'aria-hidden' => 'true' ] );  ?>
									</div>	
								<?php  } ?>	
						</div>
						<div class="item-content" id="tab-<?php echo esc_attr( $data_content ); ?>">
							<?php printf( $item['list_content'] ) ; ?>
						</div>
					<?php endforeach; ?>
				</div>
			
			</div>
		<?php endif;?>
			
			
		<?php
	}
	
}
$widgets_manager->register( new Solume_Elementor_FAQ_Tab() );
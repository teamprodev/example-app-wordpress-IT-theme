<?php

class Solume_Elementor {
	
	function __construct() {
            
		// Register Header Footer Category in Pane
	    add_action( 'elementor/elements/categories_registered', array( $this, 'solume_add_category' ) );

	    add_action( 'elementor/frontend/after_register_scripts', array( $this, 'solume_enqueue_scripts' ) );
		
		add_action( 'elementor/widgets/register', array( $this, 'solume_include_widgets' ) );
		
		add_filter( 'elementor/controls/animations/additional_animations', array( $this, 'solume_add_animations'), 10 , 0 );

		add_action( 'wp_print_footer_scripts', array( $this, 'solume_enqueue_footer_scripts' ) );

		// load icons
		add_filter( 'elementor/icons_manager/additional_tabs', array( $this, 'solume_icons_filters_new' ), 9999999, 1 );

		// Add style Icon 
		add_action( 'elementor/element/icon/section_style_icon/after_section_end', array( $this, 'solume_icons_custom' ), 10, 2 );

		// Add style Icon box		
		add_action( 'elementor/element/icon-box/section_style_content/after_section_end', array( $this, 'solume_icon_content_custom' ), 10, 2 );
		add_action( 'elementor/element/icon-box/ova_content/after_section_end', array( $this, 'solume_icon_box_custom' ), 10, 2 );

		//Add icons social custom
		add_action( 'elementor/element/social-icons/section_social_hover/after_section_end', array( $this, 'solume_social_icons_custom' ), 10, 2 );

        //Add accordion custom control style
		add_action( 'elementor/element/accordion/section_title_style/after_section_end', array( $this, 'solume_accordion_custom' ), 10, 2 );
        
        //Add text editor custom control style
		add_action( 'elementor/element/text-editor/section_style/after_section_end', array( $this, 'solume_text_editor_custom' ), 10, 2 );

		//Add Button custom control style
		add_action( 'elementor/element/button/section_style/after_section_end', array( $this, 'solume_button_custom' ), 10, 2 );

	}

	
	function solume_add_category(  ) {

	    \Elementor\Plugin::instance()->elements_manager->add_category(
	        'hf',
	        [
	            'title' => __( 'Header Footer', 'solume' ),
	            'icon' => 'fa fa-plug',
	        ]
	    );

	    \Elementor\Plugin::instance()->elements_manager->add_category(
	        'solume',
	        [
	            'title' => __( 'Solume', 'solume' ),
	            'icon' => 'fa fa-plug',
	        ]
	    );

	}

	function solume_enqueue_scripts(){
        
        $files = glob(get_theme_file_path('/assets/js/elementor/*.js'));
        
        foreach ($files as $file) {
            $file_name = wp_basename($file);
            $handle    = str_replace(".js", '', $file_name);
            $src       = get_theme_file_uri('/assets/js/elementor/' . $file_name);
            if (file_exists($file)) {
                wp_register_script( 'solume-elementor-' . $handle, $src, ['jquery'], false, true );
            }
        }


	}

	function solume_include_widgets( $widgets_manager ) {
        $files = glob(get_theme_file_path('elementor/widgets/*.php'));
        foreach ($files as $file) {
            $file = get_theme_file_path('elementor/widgets/' . wp_basename($file));
            if (file_exists($file)) {
                require_once $file;
            }
        }
    }

    function solume_add_animations(){
    	$animations = array(
            'Solume' => array(
                'ova-move-up' 		=> esc_html__('Move Up', 'solume'),
                'ova-move-down' 	=> esc_html__( 'Move Down', 'solume' ),
                'ova-move-left'     => esc_html__('Move Left', 'solume'),
                'ova-move-right'    => esc_html__('Move Right', 'solume'),
                'ova-scale-up'      => esc_html__('Scale Up', 'solume'),
                'ova-flip'          => esc_html__('Flip', 'solume'),
                'ova-helix'         => esc_html__('Helix', 'solume'),
                'ova-popup'			=> esc_html__( 'PopUp','solume' )
            ),
        );

        return $animations;
    }

   

	function solume_enqueue_footer_scripts(){
		// Font Icon
	    wp_enqueue_style('ovaicon', SOLUME_URI.'/assets/libs/ovaicon/font/ovaicon.css', array(), null);

	    // Font Icomoon
	    wp_enqueue_style('ovaicomoon', SOLUME_URI.'/assets/libs/icomoon/style.css', array(), null);
	}
	
	

	public function solume_icons_filters_new( $tabs = array() ) {

		$newicons = [];

		// Ova icon
		$font_data['json_url'] = SOLUME_URI.'/assets/libs/ovaicon/ovaicon.json';
		$font_data['name'] = 'ovaicon';

		$newicons[ $font_data['name'] ] = [
			'name'          => $font_data['name'],
			'label'         => esc_html__( 'Default', 'solume' ),
			'url'           => '',
			'enqueue'       => '',
			'prefix'        => 'ovaicon-',
			'displayPrefix' => '',
			'ver'           => '1.0',
			'fetchJson'     => $font_data['json_url']
		];

		// Icomoon
		$font_icomoon_data['json_url'] = SOLUME_URI.'/assets/libs/icomoon/icomoon.json';
		$font_icomoon_data['name'] = 'icomoon';

		$newicons[ $font_icomoon_data['name'] ] = [
			'name'          => $font_icomoon_data['name'],
			'label'         => esc_html__( 'Icomoon', 'solume' ),
			'url'           => '',
			'enqueue'       => '',
			'prefix'        => 'icomoon-',
			'displayPrefix' => '',
			'ver'           => '1.0',
			'fetchJson'     => $font_icomoon_data['json_url']
		];

		return array_merge( $tabs, $newicons );

	}

	
	function solume_icon_box_custom( $element, $args ) {
	/** @var \Elementor\Element_Base $element */
	$element->start_controls_section(
		'ova_icon_box',
		[
			'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
			'label' => esc_html__( 'Ova Icon box', 'solume' ),
		]
	);
		$element->add_responsive_control(
			'ova_icon_box_margin',
			[
				'label' 		=> esc_html__( 'Margin', 'solume' ),
				'type' 			=>  \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .elementor-icon-box-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
				],
			]
		);

		$element->add_responsive_control(
			'ova_icon_box_padding',
			[
				'label' 		=> esc_html__( 'Padding', 'solume' ),
				'type' 			=>  \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', 'em', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .elementor-icon-box-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} ;',
				],
			]
		);

		$element->add_control(
			'ova_icon_box_bg',
			[
				'label' 	=> esc_html__( 'Background', 'solume' ),
				'type' 		=> \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-box-wrapper .elementor-icon-box-icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$element->add_control(
			'border_radius_icon_box',
			array(
				'label'      => esc_html__( 'Border Radius', 'solume' ),
				'type'       =>  \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .elementor-icon-box-wrapper .elementor-icon-box-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);


		$element->add_responsive_control(
			'ova_icon_box_display',
			[
				'label' 	=> esc_html__( 'Display', 'solume' ),
				'type' 		=> \Elementor\Controls_Manager::CHOOSE,
				'options' 	=> [
					'inline-block' => [
						'title' => esc_html__( 'Inline-block', 'solume' ),
						'icon' 	=> 'eicon-h-align-left',
					],
					'block' => [
						'title' => esc_html__( 'Block', 'solume' ),
						'icon' 	=> 'eicon-h-align-center',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-icon-box-wrapper .elementor-icon-box-icon' => 'display: {{VALUE}}',
				],
			]
		);

		

	$element->end_controls_section();
	}

	function solume_icon_content_custom ( $element, $args ) {
		/** @var \Elementor\Element_Base $element */
		$element->start_controls_section(
			'ova_content',
			[
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Ova Content', 'solume' ),
			]
		);
		
			$element->add_control(
				'ova_icon_box_2_content_bg',
				[
					'label' 	=> esc_html__( 'Background', 'solume' ),
					'type' 		=> \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  .elementor-icon-box-wrapper' => 'background-color: {{VALUE}} !important;',
					],
				]
			);

			$element->add_control(
				'ova_icon_box_2_content_bg_hover',
				[
					'label' 	=> esc_html__( 'Background hover', 'solume' ),
					'type' 		=> \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  .elementor-icon-box-wrapper:hover' => 'background-color: {{VALUE}} !important;',
					],
				]
			);

			$element->add_responsive_control(
				'ova_icon_box-2_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'solume' ),
					'type' 			=>  \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .elementor-icon-box-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$element->add_control(
				'border_radius_icon_box-2',
				array(
					'label'      => esc_html__( 'Border Radius', 'solume' ),
					'type'       =>  \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}}  .elementor-icon-box-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

			$element->add_control(
				'ova_icon_box-2-hover',
				[
					'label' 	=> esc_html__( 'content hover', 'solume' ),
					'type' 		=> \Elementor\Controls_Manager::COLOR,
					'selectors' => [

						'{{WRAPPER}}  .elementor-icon-box-wrapper:hover .elementor-icon-box-content h3' => 'color: {{VALUE}} !important;',
					],
				]
			);



		$element->end_controls_section();
	}


	function solume_icons_custom ( $element, $args ) {
		/** @var \Elementor\Element_Base $element */
		$element->start_controls_section(
			'ova_icon',
			[
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Ova Icon', 'solume' ),
			]
		);

			$element->add_control(
	            'ova_icon_bg',
	            [
	                'label' 	=> esc_html__( 'Background', 'solume' ),
	                'type' 		=> \Elementor\Controls_Manager::COLOR,
	                'selectors' => [
	                    '{{WRAPPER}} .elementor-icon-wrapper .elementor-icon' => 'background-color: {{VALUE}};',
	                ],
	            ]
	        );

			$element->add_responsive_control(
				'ova_icon_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'solume' ),
					'type' 			=>  \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .elementor-icon-wrapper .elementor-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$element->add_control(
				'border_radius_contact_info',
				array(
					'label'      => esc_html__( 'Border Radius', 'solume' ),
					'type'       =>  \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .elementor-icon-wrapper .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

			$element->add_responsive_control(
	            'ova_social_icons_display',
	            [
	                'label' 	=> esc_html__( 'Display', 'solume' ),
	                'type' 		=> \Elementor\Controls_Manager::CHOOSE,
	                'options' 	=> [
	                    'block' => [
	                        'title' => esc_html__( 'Block', 'solume' ),
	                        'icon' 	=> 'eicon-h-align-left',
	                    ],
	                    'flex' => [
	                        'title' => esc_html__( 'Flex', 'solume' ),
	                        'icon' 	=> 'eicon-h-align-center',
	                    ],
	                ],
	                'selectors' => [
	                    '{{WRAPPER}} .elementor-icon-wrapper .elementor-icon' => 'display: {{VALUE}}',
	                ],
	            ]
	        );


		$element->end_controls_section();
	}

	function solume_social_icons_custom ( $element, $args ) {
		/** @var \Elementor\Element_Base $element */
		$element->start_controls_section(
			'ova_social_icons',
			[
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Ova Social Icon', 'solume' ),
			]
		);

			$element->add_responsive_control(
	            'ova_social_icons_display',
	            [
	                'label' 	=> esc_html__( 'Display', 'solume' ),
	                'type' 		=> \Elementor\Controls_Manager::CHOOSE,
	                'options' 	=> [
	                    'inline-block' => [
	                        'title' => esc_html__( 'Block', 'solume' ),
	                        'icon' 	=> 'eicon-h-align-left',
	                    ],
	                    'inline-flex' => [
	                        'title' => esc_html__( 'Flex', 'solume' ),
	                        'icon' 	=> 'eicon-h-align-center',
	                    ],
	                ],
	                'selectors' => [
	                    '{{WRAPPER}} .elementor-icon.elementor-social-icon' => 'display: {{VALUE}}',
	                ],
	            ]
	        );

		$element->end_controls_section();
	}

	function solume_accordion_custom( $element, $args ) {
    	/** @var \Elementor\Element_Base $element */
		$element->start_controls_section(
			'ova_accordion',
			[
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Ova Accordion', 'solume' ),
			]
		);

			$element->add_responsive_control(
				'icon_size',
				[
					'label' 	=> esc_html__( 'Icon Size', 'solume' ),
					'type' 		=> \Elementor\Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> 'px',
					],
					'tablet_default' => [
						'unit' => 'px',
					],
					'mobile_default' => [
						'unit' => 'px',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 40,
						],
					],
					'size_units' 	=> [ 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .elementor-accordion .elementor-tab-title i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$element->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' 		=> 'ova_border_item',
					'label' 	=> esc_html__( 'Border', 'solume' ),
					'selector' 	=> '{{WRAPPER}} .elementor-accordion .elementor-accordion-item',
				]
			);
	
			$element->add_responsive_control(
		        'item_padding_active',
		        [
		            'label' 		=> esc_html__( 'Title Padding', 'solume' ),
		            'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
		            'size_units' 	=> [ 'px', '%', 'em' ],
		            'selectors' 	=> [
		             '{{WRAPPER}}  .elementor-accordion .elementor-accordion-item .elementor-tab-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		            ],
		         ]
		    );

			$element->add_responsive_control(
		        'item_title_padding_active',
		        [
		            'label' 		=> esc_html__( 'Title Active Padding', 'solume' ),
		            'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
		            'size_units' 	=> [ 'px', '%', 'em' ],
		            'selectors' 	=> [
		             '{{WRAPPER}}  .elementor-accordion .elementor-accordion-item .elementor-tab-title.elementor-active' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		            ],
		         ]
		    );

			$element->add_responsive_control(
		        'content_margin',
		        [
		            'label' 		=> esc_html__( 'content Margin', 'solume' ),
		            'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
		            'size_units' 	=> [ 'px', '%', 'em' ],
		            'selectors' 	=> [
		             '{{WRAPPER}} .elementor-accordion .elementor-accordion-item .elementor-tab-content.elementor-active p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		            ],
		         ]
		    );
			// elementor-tab-title
			$element->add_responsive_control(
				'ova_accordion_display',
				[
					'label' 	=> esc_html__( 'Display', 'solume' ),
					'type' 		=> \Elementor\Controls_Manager::CHOOSE,
					'options' 	=> [
						'inline-block' => [
							'title' => esc_html__( 'Inline-block', 'solume' ),
							'icon' 	=> 'eicon-h-align-left',
						],
						'flex' => [
							'title' => esc_html__( 'flex', 'solume' ),
							'icon' 	=> 'eicon-h-align-center',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .elementor-accordion .elementor-accordion-item .elementor-tab-title' => 'display: {{VALUE}};align-items: center;',
						'{{WRAPPER}} .elementor-accordion .elementor-tab-title .elementor-accordion-icon' => 'width: auto;',
					],
				]
			);

		$element->end_controls_section();
    }

    // Ova text-editor custom 
    function solume_text_editor_custom( $element, $args ) {
		/** @var \Elementor\Element_Base $element */
		$element->start_controls_section(
			'ova_tabs',
			[
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Ova Text Editor', 'solume' ),
			]
		);

			$element->add_responsive_control(
				'text_margin',
				[
					'label' 		=> esc_html__( 'Margin', 'solume' ),
					'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', '%', 'em' ],
					'selectors' 	=> [
					'{{WRAPPER}}  p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$element->add_responsive_control(
		        'text_padding',
		        [
		            'label' 		=> esc_html__( 'Padding', 'solume' ),
		            'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
		            'size_units' 	=> [ 'px', '%', 'em' ],
		            'selectors' 	=> [
		             '{{WRAPPER}}  p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		            ],
		         ]
		    );

		$element->end_controls_section();
	}  

	// Ova button custom 
    function solume_button_custom( $element, $args ) {
		/** @var \Elementor\Element_Base $element */
		$element->start_controls_section(
			'ova_button',
			[
				'tab' 	=> \Elementor\Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Ova Button', 'solume' ),
			]
		);
            
            $element->add_responsive_control(
	            'ova_button_display',
	            [
	                'label' 	=> esc_html__( 'Display', 'solume' ),
	                'type' 		=> \Elementor\Controls_Manager::CHOOSE,
	                'options' 	=> [
	                    'block' => [
	                        'title' => esc_html__( 'Block', 'solume' ),
	                        'icon' 	=> 'eicon-h-align-left',
	                    ],
	                    'inline-flex' => [
	                        'title' => esc_html__( 'Inline Flex', 'solume' ),
	                        'icon' 	=> 'eicon-h-align-center',
	                    ],
	                ],
	                'selectors' => [
	                    '{{WRAPPER}} .elementor-button' => 'display: {{VALUE}}',
	                ],
	            ]
	        );

	        $element->add_responsive_control(
	            'ova_button_align_item',
	            [
	                'label' 	=> esc_html__( 'Align Item', 'solume' ),
	                'type' 		=> \Elementor\Controls_Manager::CHOOSE,
	                'options' 	=> [
	                    'flex-start' => [
	                        'title' => esc_html__( 'Flex Start', 'solume' ),
	                        'icon' 	=> 'eicon-v-align-top',
	                    ],
	                    'center' => [
	                        'title' => esc_html__( 'Center', 'solume' ),
	                        'icon' 	=> 'eicon-v-align-middle',
	                    ],
	                    'flex-end' => [
	                        'title' => esc_html__( 'Flex End', 'solume' ),
	                        'icon' 	=> ' eicon-v-align-bottom',
	                    ]
	                ],
	                'selectors' => [
	                    '{{WRAPPER}} .elementor-button-content-wrapper' => 'align-items: {{VALUE}}',
	                ],
	            ]
	        );

	         $element->add_responsive_control(
	            'ova_button_text_align',
	            [
	                'label' 	=> esc_html__( 'Text Align', 'solume' ),
	                'type' 		=> \Elementor\Controls_Manager::CHOOSE,
	                'options' 	=> [
	                    'left' => [
	                        'title' => esc_html__( 'Left', 'solume' ),
	                        'icon' 	=> 'eicon-text-align-left',
	                    ],
	                    'center' => [
	                        'title' => esc_html__( 'Center', 'solume' ),
	                        'icon' 	=> 'eicon-text-align-center',
	                    ],
	                    'right' => [
	                        'title' => esc_html__( 'Right', 'solume' ),
	                        'icon' 	=> 'eicon-text-align-right',
	                    ],
	                ],
	                'selectors' => [
	                    '{{WRAPPER}} .elementor-button' => 'text-align: {{VALUE}}',
	                ],
	            ]
	        );


            $element->add_responsive_control(
				'icon_size',
				[
					'label' 	=> esc_html__( 'Icon Size', 'solume' ),
					'type' 		=> \Elementor\Controls_Manager::SLIDER,
					'default' 	=> [
						'unit' 	=> 'px',
					],
					'tablet_default' => [
						'unit' => 'px',
					],
					'mobile_default' => [
						'unit' => 'px',
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 40,
						],
					],
					'size_units' 	=> [ 'px' ],
					'selectors' 	=> [
						'{{WRAPPER}} .elementor-button-icon  i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);		

		$element->end_controls_section();
	} 

}

return new Solume_Elementor();






<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Utils;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Solume_Elementor_Testimonial extends Widget_Base {

	public function get_name() {
		return 'solume_elementor_testimonial';
	}

	public function get_title() {
		return esc_html__( 'Ova Testimonial', 'solume' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'solume' ];
	}

	public function get_script_depends() {
		// Carousel
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/libs/carousel/assets/owl.carousel.min.css' );
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/assets/libs/carousel/owl.carousel.min.js', array('jquery'), false, true );
		return [ 'solume-elementor-testimonial' ];
	}

	protected function register_controls() {


		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'solume' ),
			]
		);

			$this->add_control(
				'version',
				[
					'label' => esc_html__( 'Version', 'solume' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'version_1',
					'options' => [
						'version_1' => esc_html__( 'Version 1', 'solume' ),
						'version_2' => esc_html__( 'Version 2', 'solume' ),
						'version_3' => esc_html__( 'Version 3', 'solume' ),
					]
				]
			);


			$repeater = new \Elementor\Repeater();

				$repeater->add_control(
					'name_author',
					[
						'label'   => esc_html__( 'Author Name', 'solume' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
					]
				);

				$repeater->add_control(
					'link',
					[
						'label' 		=> esc_html__( 'Link', 'solume' ),
						'type' 			=> \Elementor\Controls_Manager::URL,
						'placeholder' 	=> esc_html__( 'https://your-link.com', 'solume' ),
						'default' 		=> [
							'url' 				=> '',
							'is_external' 		=> false,
							'nofollow' 			=> false,
							'custom_attributes' => '',
						],
						'label_block' => true,
					]
				);

				$repeater->add_control(
					'job',
					[
						'label'   => esc_html__( 'Job', 'solume' ),
						'type'    => \Elementor\Controls_Manager::TEXT,

					]
				);

				$repeater->add_control(
					'image_author',
					[
						'label'   => esc_html__( 'Author Image', 'solume' ),
						'type'    => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => Utils::get_placeholder_image_src(),
						],
					]
				);

				$repeater->add_control(
					'title_testimonial',
					[
						'label'   => esc_html__( 'Title', 'solume' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
					]
				);


				$repeater->add_control(
					'testimonial',
					[
						'label'   => esc_html__( 'Testimonial ', 'solume' ),
						'type'    => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( '"Sed ullamcorper morbi tincidunt or massa eget egestas purus. Non nisi est sit amet facilisis magna etiam."', 'solume' ),
					]
				);

				$this->add_control(
					'tab_item',
					[
						'label'       => esc_html__( 'Items Testimonial', 'solume' ),
						'type'        => Controls_Manager::REPEATER,
						'fields'      => $repeater->get_controls(),
						'default' => [
							[
								'name_author' => esc_html__('Donald Salvor', 'solume'),
								'job' => esc_html__('CTO/CO-Fouder', 'solume'),
								'title_testimonial' => esc_html__('“Excellent Work”','solume'),
								'testimonial' => esc_html__('"I will be pet i will be pet and then i will hiss sit in box get scared by doggo also cucumerro yet the best thing in the call universe is a cardboard box."', 'solume'),
							],
							[
								'name_author' => esc_html__('James Peter', 'solume'),
								'job' => esc_html__('Founder', 'solume'),
								'title_testimonial' => esc_html__('“fast quality”','solume'),
								'testimonial' => esc_html__('"I will be pet i will be pet and then i will hiss sit in box get scared by doggo also cucumerro yet the best thing in the call universe is a cardboard box."', 'solume'),
							],
							[
								'name_author' => esc_html__('Peek Thakul', 'solume'),
								'job' => esc_html__('Founder', 'solume'),
								'title_testimonial' => esc_html__('“highly recommended”','solume'),
								'testimonial' => esc_html__('"Tools to network more effectively, including an orientation CD giving the Formula for Success" in BNI, a badge, a vinyl card holder to carry."', 'solume'),
							],
							[
								'name_author' => esc_html__('Peek Thakul', 'solume'),
								'job' => esc_html__('Founder', 'solume'),
								'title_testimonial' => esc_html__('“highly recommended”','solume'),
								'testimonial' => esc_html__('"Tools to network more effectively, including an orientation CD giving the Formula for Success" in BNI, a badge, a vinyl card holder to carry."', 'solume'),
							],
						],
						
						'title_field' => '{{{ name_author }}}',
						'condition' 	=> [
							'version' 		=> 'version_1',
						]
					]
				);

				$repeater_v2 = new \Elementor\Repeater();

					$repeater_v2->add_control(
						'name_author',
						[
							'label'   => esc_html__( 'Author Name', 'solume' ),
							'type'    => \Elementor\Controls_Manager::TEXT,
						]
					);

					$repeater_v2->add_control(
						'link',
						[
							'label' 		=> esc_html__( 'Link', 'solume' ),
							'type' 			=> \Elementor\Controls_Manager::URL,
							'placeholder' 	=> esc_html__( 'https://your-link.com', 'solume' ),
							'default' 		=> [
								'url' 				=> '',
								'is_external' 		=> false,
								'nofollow' 			=> false,
								'custom_attributes' => '',
							],
							'label_block' => true,
						]
					);

					$repeater_v2->add_control(
						'job',
						[
							'label'   => esc_html__( 'Job', 'solume' ),
							'type'    => \Elementor\Controls_Manager::TEXT,

						]
					);

					$repeater_v2->add_control(
						'image_author',
						[
							'label'   => esc_html__( 'Author Image', 'solume' ),
							'type'    => \Elementor\Controls_Manager::MEDIA,
							'default' => [
								'url' => Utils::get_placeholder_image_src(),
							],
						]
					);

					$repeater_v2->add_control(
						'testimonial',
						[
							'label'   => esc_html__( 'Testimonial ', 'solume' ),
							'type'    => \Elementor\Controls_Manager::TEXTAREA,
							'default' => esc_html__( '"Sed ullamcorper morbi tincidunt or massa eget egestas purus. Non nisi est sit amet facilisis magna etiam."', 'solume' ),
						]
					);

				$this->add_control(
					'tab_item_v2',
					[
						'label'       => esc_html__( 'Items Testimonial', 'solume' ),
						'type'        => Controls_Manager::REPEATER,
						'fields'      => $repeater_v2->get_controls(),
						'default' => [
							[
								'name_author' => esc_html__('Donald Salvor', 'solume'),
								'job' => esc_html__('CTO/CO-Fouder', 'solume'),
								'testimonial' => esc_html__('"I will be pet i will be pet and then i will hiss sit in box get scared by doggo also cucumerro yet the best thing in the call universe is a cardboard box."', 'solume'),
							],
							[
								'name_author' => esc_html__('James Peter', 'solume'),
								'job' => esc_html__('Founder', 'solume'),
								'testimonial' => esc_html__('"I will be pet i will be pet and then i will hiss sit in box get scared by doggo also cucumerro yet the best thing in the call universe is a cardboard box."', 'solume'),
							],
							[
								'name_author' => esc_html__('Peek Thakul', 'solume'),
								'job' => esc_html__('Founder', 'solume'),
								'testimonial' => esc_html__('"Tools to network more effectively, including an orientation CD giving the Formula for Success" in BNI, a badge, a vinyl card holder to carry."', 'solume'),
							],
							[
								'name_author' => esc_html__('Peek Thakul', 'solume'),
								'job' => esc_html__('Founder', 'solume'),
								'testimonial' => esc_html__('"Tools to network more effectively, including an orientation CD giving the Formula for Success" in BNI, a badge, a vinyl card holder to carry."', 'solume'),
							],
						],
						'title_field' => '{{{ name_author }}}',
						'condition' 	=> [
							'version' 		=> 'version_2',
						]
					]
				);


				$repeater_v3 = new \Elementor\Repeater();

					$repeater_v3->add_control(
						'name_author',
						[
							'label'   => esc_html__( 'Author Name', 'solume' ),
							'type'    => \Elementor\Controls_Manager::TEXT,
						]
					);

					$repeater_v3->add_control(
						'link',
						[
							'label' 		=> esc_html__( 'Link', 'solume' ),
							'type' 			=> \Elementor\Controls_Manager::URL,
							'placeholder' 	=> esc_html__( 'https://your-link.com', 'solume' ),
							'default' 		=> [
								'url' 				=> '',
								'is_external' 		=> false,
								'nofollow' 			=> false,
								'custom_attributes' => '',
							],
							'label_block' => true,
						]
					);

					$repeater_v3->add_control(
						'job',
						[
							'label'   => esc_html__( 'Job', 'solume' ),
							'type'    => \Elementor\Controls_Manager::TEXT,

						]
					);

					$repeater_v3->add_control(
						'image_author',
						[
							'label'   => esc_html__( 'Author Image', 'solume' ),
							'type'    => \Elementor\Controls_Manager::MEDIA,
							'default' => [
								'url' => Utils::get_placeholder_image_src(),
							],
						]
					);

					$repeater_v3->add_control(
						'title_testimonial',
						[
							'label'   => esc_html__( 'Title', 'solume' ),
							'type'    => \Elementor\Controls_Manager::TEXTAREA,
						]
					);


					$repeater_v3->add_control(
						'testimonial',
						[
							'label'   => esc_html__( 'Testimonial ', 'solume' ),
							'type'    => \Elementor\Controls_Manager::TEXTAREA,
							'default' => esc_html__( '"Sed ullamcorper morbi tincidunt or massa eget egestas purus. Non nisi est sit amet facilisis magna etiam."', 'solume' ),
						]
					);

					$repeater_v3->add_control(
						'hr_rate_start',
						[
							'type' => \Elementor\Controls_Manager::DIVIDER,
							'separator' => 'before',
						]
					);	
			
					$repeater_v3->add_control(
						'rating',
						[
							'label' => esc_html__( 'Rating', 'solume' ),
							'type' => Controls_Manager::NUMBER,
							'min' => 0,
							'max' => 10,
							'step' => 0.1,
							'default' => 5,
							'dynamic' => [
								'active' => true,
							],
						]
					);
			
					$repeater_v3->add_control(
						'star_style',
						[
							'label' => esc_html__( 'Icon', 'solume' ),
							'type' => Controls_Manager::SELECT,
							'options' => [
								'star_fontawesome' => 'Font Awesome',
								'star_unicode' => 'Unicode',
							],
							'default' => 'star_fontawesome',
							'render_type' => 'template',
							'prefix_class' => 'elementor--star-style-',
							'separator' => 'before',
						]
					);
			
					$repeater_v3->add_control(
						'unmarked_star_style',
						[
							'label' => esc_html__( 'Unmarked Style', 'solume' ),
							'type' => Controls_Manager::CHOOSE,
							'options' => [
								'solid' => [
									'title' => esc_html__( 'Solid', 'solume' ),
									'icon' => 'eicon-star',
								],
								'outline' => [
									'title' => esc_html__( 'Outline', 'solume' ),
									'icon' => 'eicon-star-o',
								],
							],
							'default' => 'solid',
						]
					);


				$this->add_control(
					'tab_item_v3',
					[
						'label'       => esc_html__( 'Items Testimonial', 'solume' ),
						'type'        => Controls_Manager::REPEATER,
						'fields'      => $repeater_v3->get_controls(),
						'default' => [
							[
								'name_author' => esc_html__('Guy Hawkins', 'solume'),
								'job' => esc_html__('Founder', 'solume'),
								'title_testimonial' => esc_html__('So Cute! Made in India. Organic Cotton.','solume'),
								'testimonial' => esc_html__('"Such a cute little sweatshirt. My son loves this shirt. It’s really soft and he said he likes to cuddle while he’s wearing it lol.  Nulla Lorem mollit cupidatat irure. Laborum magna nulla duis ullamco cillum dolor. Voluptate exercitation incididunt aliquip "', 'solume'),
							],
							[
								'name_author' => esc_html__('James Peter', 'solume'),
								'job' => esc_html__('CTO/CO-Fouder', 'solume'),
								'title_testimonial' => esc_html__('So Cute! Made in India. Organic Cotton.','solume'),
								'testimonial' => esc_html__('"Such a cute little sweatshirt. My son loves this shirt. It’s really soft and he said he likes to cuddle while he’s wearing it lol.  Nulla Lorem mollit cupidatat irure. Laborum magna nulla duis ullamco cillum dolor. Voluptate exercitation incididunt aliquip "', 'solume'),
							],
							[
								'name_author' => esc_html__('Peek Thakul', 'solume'),
								'job' => esc_html__('Founder', 'solume'),
								'title_testimonial' => esc_html__('So Cute! Made in India. Organic Cotton.','solume'),
								'testimonial' => esc_html__('"Such a cute little sweatshirt. My son loves this shirt. It’s really soft and he said he likes to cuddle while he’s wearing it lol.  Nulla Lorem mollit cupidatat irure. Laborum magna nulla duis ullamco cillum dolor. Voluptate exercitation incididunt aliquip "', 'solume'),
							],
							[
								'name_author' => esc_html__('Peek Thakul', 'solume'),
								'job' => esc_html__('Founder', 'solume'),
								'title_testimonial' => esc_html__('So Cute! Made in India. Organic Cotton.','solume'),
								'testimonial' => esc_html__('"Such a cute little sweatshirt. My son loves this shirt. It’s really soft and he said he likes to cuddle while he’s wearing it lol.  Nulla Lorem mollit cupidatat irure. Laborum magna nulla duis ullamco cillum dolor. Voluptate exercitation incididunt aliquip "', 'solume'),
							],
						],
						
						'title_field' => '{{{ name_author }}}',
						'condition' 	=> [
							'version'		=> 'version_3',
						]
					]
				);
			

		$this->end_controls_section();

		/*****************  END SECTION CONTENT ******************/


		/*****************************************************************
						START SECTION ADDITIONAL
		******************************************************************/

		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => esc_html__( 'Additional Options', 'solume' ),
			]
		);


		/***************************  VERSION 1 ***********************/
			$this->add_control(
				'margin_items',
				[
					'label'   => esc_html__( 'Margin Right Items', 'solume' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 40,
				]
				
			);

			$this->add_control(
				'item_number',
				[
					'label'       => esc_html__( 'Item Number', 'solume' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Number Item', 'solume' ),
					'default'     => 3,
					'condition' 	=> [
						'version' 		=> 'version_1',
					]
				]
			);

			$this->add_control(
				'item_number_v2',
				[
					'label'       => esc_html__( 'Item Number', 'solume' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Number Item', 'solume' ),
					'default'     => 1,
					'condition' 	=> [
						'version' 		=> 'version_2',
					]
				]
			);

			$this->add_control(
				'item_number_v3',
				[
					'label'       => esc_html__( 'Item Number', 'solume' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Number Item', 'solume' ),
					'default'     => 1,
					'condition' 	=> [
						'version' 		=> 'version_3',
					]
				]
			);

	

			$this->add_control(
				'slides_to_scroll',
				[
					'label'       => esc_html__( 'Slides to Scroll', 'solume' ),
					'type'        => Controls_Manager::NUMBER,
					'description' => esc_html__( 'Set how many slides are scrolled per swipe.', 'solume' ),
					'default'     => 1,
				]
			);

			$this->add_control(
				'pause_on_hover',
				[
					'label'   => esc_html__( 'Pause on Hover', 'solume' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'solume' ),
						'no'  => esc_html__( 'No', 'solume' ),
					],
					'frontend_available' => true,
				]
			);


			$this->add_control(
				'infinite',
				[
					'label'   => esc_html__( 'Infinite Loop', 'solume' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'solume' ),
						'no'  => esc_html__( 'No', 'solume' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'autoplay',
				[
					'label'   => esc_html__( 'Autoplay', 'solume' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'no',
					'options' => [
						'yes' => esc_html__( 'Yes', 'solume' ),
						'no'  => esc_html__( 'No', 'solume' ),
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'autoplay_speed',
				[
					'label'     => esc_html__( 'Autoplay Speed', 'solume' ),
					'type'      => Controls_Manager::NUMBER,
					'default'   => 3000,
					'step'      => 500,
					'condition' => [
						'autoplay' => 'yes',
					],
					'frontend_available' => true,
				]
			);

			$this->add_control(
				'smartspeed',
				[
					'label'   => esc_html__( 'Smart Speed', 'solume' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => 500,
				]
			);

			$this->add_control(
				'dot_control',
				[
					'label'   => esc_html__( 'Show Dots', 'solume' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => esc_html__( 'Yes', 'solume' ),
						'no'  => esc_html__( 'No', 'solume' ),
					],
					'frontend_available' => true,
					'condition' => [
						'version' => 'version_2',
					],
				]
			);

			$this->add_control(
				'nav_control',
				[
					'label'   => __( 'Show Nav', 'solume' ),
					'type'    => Controls_Manager::SWITCHER,
					'default' => 'yes',
					'options' => [
						'yes' => __( 'Yes', 'solume' ),
						'no'  => __( 'No', 'solume' ),
					],
					'frontend_available' => true,
					'condition' => [
						'version' => 'version_1',
						'version' => 'version_3',
					],
				]
			);

			$this->add_control(
				'nav_left',
				[
					'label' 		=> __( 'Nav left', 'solume' ),
					'type' 			=> Controls_Manager::TEXT,
					'default'		=> __('icomoon icomoon-arrow-left', 'solume'),
					'condition' 	=> [
						'version' 		=> 'version_1',
						'nav_control' 	=> 'yes',
					]
				]
			);

			$this->add_control(
				'nav_right',
				[
					'label' 		=> __( 'Nav right', 'solume' ),
					'type' 			=> Controls_Manager::TEXT,
					'default' 		=> __('icomoon icomoon-arrow-right', 'solume'),
					'condition' 	=> [
						'version' 		=> 'version_1',
						'version' 		=> 'version_3',
						'nav_control' 	=> 'yes',
					]
				]
			);

			$this->add_control(
				'nav_left_v3',
				[
					'label' 		=> __( 'Nav left', 'solume' ),
					'type' 			=> Controls_Manager::TEXT,
					'default'		=> __('icomoon icomoon-chevron-left', 'solume'),
					'condition' 	=> [
						'version' 		=> 'version_3',
						'nav_control' 	=> 'yes',
					]
				]
			);
		
			$this->add_control(
				'nav_right_v3',
				[
					'label' 		=> __( 'Nav right', 'solume' ),
					'type' 			=> Controls_Manager::TEXT,
					'default'		=> __('icomoon icomoon-chevron-right', 'solume'),
					'condition' 	=> [
						'version' 		=> 'version_3',
						'nav_control' 	=> 'yes',
					]
				]
			);

		$this->end_controls_section();

		/****************************  END SECTION ADDITIONAL *********************/

		/*************  SECTION NAME JOB. *******************/
		$this->start_controls_section(
			'section_general',
			[
				'label' => esc_html__( 'General', 'solume' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			

			$this->add_control(
				'quote_color',
				[
					'label'     => esc_html__( 'Quote Job', 'solume' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .client_info .icon-quote span:before' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .icon-quote span::before' => 'color : {{VALUE}};',
						
					],
				]
			);

			$this->add_control(
				'dot_active_color',
				[
					'label'     => esc_html__( 'Dot Active Color', 'solume' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial.version_2 .slide-testimonials .owl-dots .owl-dot.active span' => 'background : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .owl-dots .owl-dot.active span' => 'background : {{VALUE}};',
						
					],
				]
			);

			$this->add_responsive_control(
				'general__padding',
				[
					'label'      => esc_html__( 'Padding', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .owl-stage-outer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		###############  end section job  ###############

		/*************  SECTION img  *******************/
		$this->start_controls_section(
			'section_img',
			[
				'label' => esc_html__( 'Img', 'solume' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' 		=> 'border_img',
					'label' 	=> esc_html__( 'Border', 'solume' ),
					'selector' 	=> '{{WRAPPER}} .ova-testimonial .slide-testimonials .owl-item .item .client_info .info .client img',
				]
			);
		
		$this->end_controls_section();
		/************* END  SECTION img  *******************/
			
		/*************  SECTION content title testimonial  *******************/
		$this->start_controls_section(
			'section_content_title',
			[
				'label' => esc_html__( 'Tilte Testimonial', 'solume' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'version' 		=> 'version_1',
					'version' 		=> 'version_3',
				]
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'title_testimonial_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info p.title',
				]
			);

			$this->add_control(
				'content_title_color',
				[
					'label'     => esc_html__( 'Color', 'solume' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info p.title' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_title_margin',
				[
					'label'      => esc_html__( 'Margin', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info p.title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_title_padding',
				[
					'label'      => esc_html__( 'Padding', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info p.title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();
		###############  end section content title testimonial  ###############

		/*************  SECTION content testimonial  *******************/
		$this->start_controls_section(
			'section_content_testimonial',
			[
				'label' => esc_html__( 'Content Testimonial', 'solume' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'content_testimonial_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info p.evaluate',
				]
			);

			$this->add_control(
				'content_color',
				[
					'label'     => esc_html__( 'Color', 'solume' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info p.evaluate' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_margin',
				[
					'label'      => esc_html__( 'Margin', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info p.evaluate' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_padding',
				[
					'label'      => esc_html__( 'Padding', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info p.evaluate' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();
		###############  end section content testimonial  ###############


		/*************  SECTION NAME AUTHOR. *******************/
		$this->start_controls_section(
			'section_author_name',
			[
				'label' => esc_html__( 'Author Name', 'solume' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'author_name_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .name',
				]
			);

			$this->add_control(
				'author_name_color',
				[
					'label'     => esc_html__( 'Color Author', 'solume' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'
						{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .name' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'author_name_color_hover',
				[
					'label'     => esc_html__( 'Color link hover', 'solume' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'
						{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .name a:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'author_name_margin',
				[
					'label'      => esc_html__( 'Margin', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'author_name_padding',
				[
					'label'      => esc_html__( 'Padding', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();
		###############  end section author  ###############


		/*************  SECTION NAME JOB. *******************/
		$this->start_controls_section(
			'section_job',
			[
				'label' => esc_html__( 'Job', 'solume' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'job_typography',
					'selector' => '{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .job',
				]
			);

			$this->add_control(
				'job_color',
				[
					'label'     => esc_html__( 'Color Job', 'solume' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'
						{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .job' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'job_margin',
				[
					'label'      => esc_html__( 'Margin', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .job' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'job_padding',
				[
					'label'      => esc_html__( 'Padding', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial .slide-testimonials .client_info .info .name-job .job' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);


		$this->end_controls_section();
		###############  end section job  ###############

		/*************  SECTION NAME nav. *******************/
		$this->start_controls_section(
			'section_nav',
			[
				'label' => esc_html__( 'Nav', 'solume' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'version' 		=> 'version_1',
					'version' 		=> 'version_3',
				]
			]
		);
			$this->add_control(
				'icon_fontsize',
				[
					'label' 		=> esc_html__( 'Font Size', 'solume' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 1,
							'max' 	=> 40,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-testimonial.version_1 .slide-testimonials .owl-nav button i::before' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .owl-nav button i::before' => 'font-size: {{SIZE}}{{UNIT}};',

					],
				]
			);

			$this->add_control(
				'nav_color',
				[
					'label'     => esc_html__( 'Color', 'solume' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial.version_1 .slide-testimonials .owl-nav button i::before' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .owl-nav button i::before' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'nav_color_hover',
				[
					'label'     => esc_html__( 'Color hover', 'solume' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial.version_1 .slide-testimonials .owl-nav button i:hover::before' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .owl-nav button i:hover::before' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'nav_padding',
				[
					'label'      => esc_html__( 'Padding', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-testimonial.version_1 .slide-testimonials .owl-nav button i::before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .owl-nav button i::before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' 		=> 'border_nav',
					'label' 	=> esc_html__( 'Border', 'solume' ),
					'selector' 	=> '{{WRAPPER}} .ova-testimonial.version_1 .slide-testimonials .owl-nav button i::before',
					'selector' 	=> '{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .owl-nav button i::before',
			
					]
			);

			$this->add_control(
				'nav_color-border_hover',
				[
					'label'     => esc_html__( 'Color border hover', 'solume' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial.version_1 .slide-testimonials .owl-nav button i:hover::before' => 'border-color : {{VALUE}};',
						'{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .owl-nav button i:hover::before' => 'border-color : {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();
		###############  end section nav  ###############

		$this->start_controls_section(
			'section_stars_style',
			[
				'label' => esc_html__( 'Stars', 'solume' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' 	=> [
					'version' 		=> 'version_3',
				]
			]
		);

			$this->add_responsive_control(
				'icon_size',
				[
					'label' => esc_html__( 'Size', 'solume' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .elementor-star-rating' => 'font-size: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_responsive_control(
				'icon_space',
				[
					'label' => esc_html__( 'Spacing', 'solume' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
						],
					],
					'selectors' => [
						'body:not(.rtl) {{WRAPPER}} .elementor-star-rating i:not(:last-of-type)' => 'margin-right: {{SIZE}}{{UNIT}}',
						'body.rtl {{WRAPPER}} .elementor-star-rating i:not(:last-of-type)' => 'margin-left: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_control(
				'stars_color',
				[
					'label' => esc_html__( 'Color', 'solume' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-testimonial.version_3 .slide-testimonials .owl-item .item .client_info .ova-rating .elementor-star-rating i::before' => 'color: {{VALUE}}',
						
					],
					'separator' => 'before',
				]
			);

			$this->add_control(
				'stars_unmarked_color',
				[
					'label' => esc_html__( 'Unmarked Color', 'solume' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .elementor-star-rating i' => 'color: {{VALUE}}',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function get_rating($rating) {

		$settings = $this->get_settings();
		$rating_scale = 5;

		return [ $rating, $rating_scale ];
	}

	protected function render_stars( $icon, $rating ) {
		$rating_data = $this->get_rating($rating);
		$rating = (float) $rating_data[0];
		$floored_rating = floor( $rating );
		$stars_html = '';

		for ( $stars = 1.0; $stars <= $rating_data[1]; $stars++ ) {
			if ( $stars <= $floored_rating ) {
				$stars_html .= '<i class="elementor-star-full">' . $icon . '</i>';
			} elseif ( $floored_rating + 1 === $stars && $rating !== $floored_rating ) {
				$stars_html .= '<i class="elementor-star-' . ( $rating - $floored_rating ) * 10 . '">' . $icon . '</i>';
			} else {
				$stars_html .= '<i class="elementor-star-empty">' . $icon . '</i>';
			}
		}

		return $stars_html;
	}

	protected function render() {



		$settings = $this->get_settings();
		$version  = $settings['version'];

		$tab_item 	 = $settings['tab_item'];
		$tab_item_v2 = $settings['tab_item_v2'];
		$tab_item_v3 = $settings['tab_item_v3'];

		$data_options['items']   			= $settings['item_number'];
		$data_options['slideBy']            = $settings['slides_to_scroll'];
		$data_options['margin']             = $settings['margin_items'];
		$data_options['autoplayHoverPause'] = $settings['pause_on_hover'] === 'yes' ? true : false;
		$data_options['loop']               = $settings['infinite'] === 'yes' ? true : false;
		$data_options['autoplay']           = $settings['autoplay'] === 'yes' ? true : false;
		$data_options['autoplayTimeout']    = $settings['autoplay_speed'];
		$data_options['smartSpeed']         = $settings['smartspeed'];
		$data_options['nav']     			= ( isset( $settings['nav_control'] ) && $settings['nav_control'] === 'yes'  ) ? true : false;
		$data_options['dots']    			= $settings['dot_control'] === 'yes' ? true : false;
	
		$data_options['rtl']				= is_rtl() ? true: false;

		if( $version == 'version_1' ) {
			$data_options['nav']     	= ( isset( $settings['nav_control'] ) && $settings['nav_control'] === 'yes'  ) ? true : false;
			$data_options['dots']    	=  false;
			$data_options['nav_left']   = $settings['nav_left'];
			$data_options['nav_right']  = $settings['nav_right'];
		}

		if( $version == 'version_2' ) {
			$data_options['nav']     = false;
			$data_options['dots']    = $settings['dot_control'] === 'yes' ? true : false;
			$data_options['items']   = $settings['item_number_v2'];
			
		}

		if( $version == 'version_3' ) {
			
			$data_options['nav']     	= ( isset( $settings['nav_control'] ) && $settings['nav_control'] === 'yes'  ) ? true : false;
			$data_options['dots']    	=  false;
			$data_options['items']   	= $settings['item_number_v3'];
			$data_options['nav_left']   = $settings['nav_left_v3'];
			$data_options['nav_right']  = $settings['nav_right_v3'];
			
		}
		?>

		<?php if( $version === 'version_1' ){ ?>

			<section class="ova-testimonial version_1">

					<div class="slide-testimonials owl-carousel owl-theme " data-options="<?php echo esc_attr(json_encode($data_options)); ?>">
						<?php if(!empty($tab_item)) : foreach ($tab_item as $item) : ?>
							<div class="item">
								<div class="client_info">
								
									<?php if( $item['title_testimonial'] != '' ) : ?>
										<p class="title">
											<?php echo esc_html($item['title_testimonial']); ?>
										</p>
									<?php endif; ?>
									<?php if( $item['testimonial'] != '' ) : ?>
										<p class="evaluate">
											<?php echo esc_html($item['testimonial']); ?>
										</p>
									<?php endif; ?>

									<div class="info">
										<div class="name-job">
											
											<?php if( $item['name_author'] != '' ) { ?>
												<?php if( $item['link']['url'] ) {  
													$target = $item['link']['is_external'] ? ' target="_blank"' : '';
													?>
													<p class="name ">
														<a href="<?php echo esc_url( $item['link']['url'] ); ?>" <?php printf( $target ); ?> >
															<?php echo esc_html($item['name_author']); ?>
														</a>
													</p>
												<?php } else { ?>
													
													<p class="name ">
														<?php echo esc_html($item['name_author']); ?>
													</p>
												<?php } ?>

											<?php } ?>

											<?php if( $item['job'] != '' ) { ?>
												<p class="job">
													<?php echo esc_html($item['job']); ?>
												</p>
											<?php } ?>
										</div>

										<div class="client">
											<?php if( $item['image_author'] != '' ) { ?>

												<?php $alt = isset($item['name_author']) && $item['name_author'] ? $item['name_author'] : esc_html__( 'testimonial','solume' ); ?>
												
												<?php if( $item['link']['url'] ) {  

													$target = $item['link']['is_external'] ? ' target="_blank"' : '';
													?>

													<a href="<?php echo esc_url( $item['link']['url'] ); ?>" <?php printf( $target ); ?> >
														<img src="<?php echo esc_attr($item['image_author']['url']); ?>" alt="<?php echo esc_attr( $alt ); ?>" >
													</a>
						
													<?php } else {?>
														<img src="<?php echo esc_attr($item['image_author']['url']); ?>" alt="<?php echo esc_attr( $alt ); ?>" >
													<?php }	?>
												<?php } ?>
										</div>
										
									</div><!-- end info -->
								</div>
							</div>
						<?php endforeach; endif; ?>
					</div>


			</section>

		<?php } ?>
		<?php if( $version === 'version_2' ){ ?>
			<section class="ova-testimonial version_2">

					<div class="slide-testimonials owl-carousel owl-theme " data-options="<?php echo esc_attr(json_encode($data_options)); ?>">
						<?php if(!empty($tab_item_v2)) : foreach ($tab_item_v2 as $item) : ?>
							<div class="item">
								<div class="client_info">
									
									
									<div class="info">

										<?php if( $item['testimonial'] != '' ) : ?>
											<p class="evaluate "><?php echo esc_html($item['testimonial']); ?></p>
										<?php endif; ?>
										<div class="image-info">
											<div class="client">
												<?php if( $item['image_author'] != '' ) { ?>
												
													<?php $alt = isset($item['name_author']) && $item['name_author'] ? $item['name_author'] : esc_html__( 'testimonial','solume' ); ?>
													<?php if( $item['link']['url'] ) {  
														
														$target = $item['link']['is_external'] ? ' target="_blank"' : '';
														?>

														<a href="<?php echo esc_url( $item['link']['url'] ); ?>" <?php printf( $target ); ?> >
															<img src="<?php echo esc_attr($item['image_author']['url']); ?>" alt="<?php echo esc_attr( $alt ); ?>" >
														</a>

														<?php } else { ?>
															
															<img src="<?php echo esc_attr($item['image_author']['url']); ?>" alt="<?php echo esc_attr( $alt ); ?>" >
														<?php }	?>
													<?php } ?>
											</div>
											<div class="name-job">
												<?php if( $item['name_author'] != '' ) { ?>
													<?php if( $item['link']['url'] ) {  
													$target = $item['link']['is_external'] ? ' target="_blank"' : '';
													?>
													<p class="name ">
														<a href="<?php echo esc_url( $item['link']['url'] ); ?>" <?php printf( $target ); ?> >
															<?php echo esc_html($item['name_author']); ?>
														</a>
													</p>
													<?php } else { ?>
														
														<p class="name ">
															<?php echo esc_html($item['name_author']); ?>
														</p>
												<?php } ?>
												
												<?php } ?>
												<?php if( $item['job'] != '' ) { ?>
												<p class="job"><?php echo esc_html($item['job']); ?></p>
												<?php } ?>
											</div>
										</div>
										
									</div>
									<!-- end info -->
									
								</div>
							</div>
						<?php endforeach; endif; ?>
					</div>

			</section>
		<?php } ?>
		<?php if( $version === 'version_3' ){ ?>

		<section class="ova-testimonial version_3">

				<div class="slide-testimonials owl-carousel owl-theme " data-options="<?php echo esc_attr(json_encode($data_options)) ?>">
					<?php if(!empty($tab_item_v3)) : foreach ($tab_item_v3 as $item) : ?>
						<div class="item">
							<div class="client_info">
						
								<div class="info">
									<div class="client">
										<?php if( $item['image_author'] != '' ) { ?>

											<?php $alt = isset($item['name_author']) && $item['name_author'] ? $item['name_author'] : esc_html__( 'testimonial','solume' ); ?>
											
											<?php if( $item['link']['url'] ) {  

												$target = $item['link']['is_external'] ? ' target="_blank"' : '';
												?>

												<a href="<?php echo esc_url( $item['link']['url'] ); ?>" <?php printf( $target ); ?> >
													<img src="<?php echo esc_attr($item['image_author']['url']); ?>" alt="<?php echo esc_attr( $alt ); ?>" >
												</a>
					
												<?php } else {?>
													<img src="<?php echo esc_attr($item['image_author']['url']); ?>" alt="<?php echo esc_attr( $alt ); ?>" >
												<?php }	?>
											<?php } ?>
									</div>

									<div class="name-job">
										
										<?php if( $item['name_author'] != '' ) { ?>
											<?php if( $item['link']['url'] ) {  
												$target = $item['link']['is_external'] ? ' target="_blank"' : '';
												?>
												<p class="name ">
													<a href="<?php echo esc_url( $item['link']['url'] ); ?>" <?php printf( $target ); ?> >
														<?php echo esc_html($item['name_author']); ?>
													</a>
												</p>
											<?php } else { ?>
												
												<p class="name ">
													<?php echo esc_html($item['name_author']); ?>
												</p>
											<?php } ?>

										<?php } ?>

										<?php if( $item['job'] != '' ) { ?>
											<p class="job">
												<?php echo esc_html($item['job']); ?>
											</p>
										<?php } ?>
									</div>

									
									
								</div><!-- end info -->

								<?php if( $item['title_testimonial'] != '' ) : ?>
									<p class="title">
										<?php echo esc_html($item['title_testimonial']); ?>
									</p>
								<?php endif; ?>
								<?php if( $item['testimonial'] != '' ) : ?>
									<p class="evaluate">
										<?php echo esc_html($item['testimonial']); ?>
									</p>
								<?php endif; ?>
								<?php 
										$icon = '&#xE934;';
										$rating_data = $this->get_rating($item['rating']);
										$textual_rating = $rating_data[0] . '/' . $rating_data[1];
										$rating = (float) $item['rating'];
										$unmarked_star_style = $item['unmarked_star_style'];
										$star_style = $item['star_style'];
										
										if ( 'star_fontawesome' === $star_style ) {
											if ( 'outline' === $unmarked_star_style ) {
												$icon = '&#xE933;';
											}
										} elseif ( 'star_unicode' === $star_style ) {
											$icon = '&#9733;';
								
											if ( 'outline' === $unmarked_star_style ) {
												$icon = '&#9734;';
											}
										}
								

										
										$stars_element = '<div class="elementor-star-rating" title="'.$textual_rating.'">' . $this->render_stars( $icon, $item['rating'] ) . ' </div>';
										
										?>
										<?php if($rating != 0) : ?>
											<div class="ova-rating <?php echo esc_html( $star_style ); ?>">
												<?php print_r ( $stars_element ); ?>
											</div>
										<?php endif ?>
										
											
										<?php
								
								?>
								
							</div>
						</div>
					<?php endforeach; endif; ?>
				</div>


		</section>

<?php } ?>
		<?php
	}
	// end render
}

$widgets_manager->register( new Solume_Elementor_Testimonial() );


<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Color;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Solume_Elementor_Contact_Box extends Widget_Base {

	public function get_name() {
		return 'solume_elementor_contact_box';
	}

	public function get_title() {
		return esc_html__( 'Contact Box', 'solume' );
	}

	public function get_icon() {
		return 'eicon-map-pin';
	}

	public function get_categories() {
		return [ 'solume' ];
	}

	public function get_script_depends() {
		return [ '' ];
	}

	protected function register_controls() {

		/**
		 * Content Tab
		 */
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'solume' ),
				
			]
		);	

			$this->add_control(
				'label',
				[
					'label' => esc_html__( 'Label', 'solume' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__('Email Address', 'solume'),
				]
			);

			$this->add_control(
				'icon',
				[
					'label' 	=> esc_html__( 'Choose Icon', 'solume' ),
					'type'  	=>  \Elementor\Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'icomoon icomoon-envelope',
						'library' 	=> 'icomoon',
					],
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
							'max' => 300,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info-box .icon'     => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-contact-info-box .icon svg' => 'width: {{SIZE}}{{UNIT}};',
						
					],
				]
			);

			$this->add_responsive_control(
				'align_box',
				[
					'label' 	=> esc_html__( 'Alignment', 'solume' ),
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
					'default' 	=> 'center',
					'toggle' 	=> true,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info-box' => 'text-align: {{VALUE}}',
					],
				]
			);



			$repeater = new \Elementor\Repeater();

				$repeater->add_control(
					'type',
					[
						'label' => esc_html__( 'Type', 'solume' ),
						'type' => Controls_Manager::SELECT,
						'default' => 'email',
						'options' => [
							'email' => esc_html__('Email', 'solume'),
							'phone' => esc_html__('Phone', 'solume'),
							'link' => esc_html__('Link', 'solume'),
							'text' => esc_html__('Text', 'solume'),
						]
					]
				);

				$repeater->add_control(
					'email_label',
					[
						'label'   => esc_html__( 'Email Label', 'solume' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( 'email@company.com', 'solume' ),
						'condition' => [
							'type' => 'email',
						]

					]
				);

				$repeater->add_control(
					'email_address',
					[
						'label'   => esc_html__( 'Email Adress', 'solume' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( 'email@company.com', 'solume' ),
						'condition' => [
							'type' => 'email',
						]

					]
				);


				$repeater->add_control(
					'phone_label',
					[
						'label'   => esc_html__( 'Phone Label', 'solume' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( '+012 (345) 678', 'solume' ),
						'condition' => [
							'type' => 'phone',
						]

					]
				);

				$repeater->add_control(
					'phone_address',
					[
						'label'   => esc_html__( 'Phone Adress', 'solume' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( '+012345678', 'solume' ),
						'condition' => [
							'type' => 'phone',
						]

					]
				);

				$repeater->add_control(
					'link_label',
					[
						'label'   => esc_html__( 'Link Label', 'solume' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( 'https://your-domain.com', 'solume' ),
						'condition' => [
							'type' => 'link',
						]

					]
				);

				$repeater->add_control(
					'link_address',
					[
						'label'   => esc_html__( 'Link Adress', 'solume' ),
						'type'    => \Elementor\Controls_Manager::URL,
						'description' => esc_html__( 'https://your-domain.com', 'solume' ),
						'condition' => [
							'type' => 'link',
						],
						'show_external' => false,
						'default' => [
							'url' => '#',
							'is_external' => false,
							'nofollow' => false,
						],

					]
				);

				$repeater->add_control(
					'text',
					[
						'label'   => esc_html__( 'Text', 'solume' ),
						'type'    => \Elementor\Controls_Manager::TEXT,
						'description' => esc_html__( 'Your text', 'solume' ),
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
								'type' => 'email',
								'email_label' => esc_html__('info@company.com', 'solume'),
								'email_address' => esc_html__('info@company.com', 'solume'),
							],
							[
								'type' => 'email',
								'email_label' => esc_html__('contact@company.com', 'solume'),
								'email_address' => esc_html__('contact@company.com', 'solume'),
							],
							
						],
						'title_field' => '{{{ type }}}',
					]
				);

			

		$this->end_controls_section(); // End Content Tab


		/**
		 * Icon Style Tab
		 */
		$this->start_controls_section(
			'section_box_style',
			[
				'label' => esc_html__( 'Box', 'solume' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'Box_padding',
				[
					'label' => esc_html__( 'Padding', 'solume' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'border_radius_contact_info_box',
				array(
					'label'      => esc_html__( 'Border Radius', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .ova-contact-info-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

			$this->add_control(
				'contact_info_box_background',
				[
					'label' 	=> esc_html__( 'Background', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info-box' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' 		=> 'box_shadow',
					'label' 	=> esc_html__( 'Box Shadow', 'solume' ),
					'selector' 	=> '{{WRAPPER}} .ova-contact-info-box',
				]
			);

		$this->end_controls_section(); 
		// End Box Style Tab

		/**
		 * Icon Style Tab
		 */
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'solume' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			

			$this->add_control(
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'solume' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info-box .icon' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-contact-info-box .icon svg path' => 'fill : {{VALUE}};',

					],
				]
			);

			$this->add_responsive_control(
				'icon_margin',
				[
					'label' => esc_html__( 'Margin', 'solume' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info-box .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section(); // End Icon Style Tab

		/**
		 * Label Style Tab
		 */
		$this->start_controls_section(
			'section_label_style',
			[
				'label' => esc_html__( 'Label', 'solume' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			
			$this->add_control(
				'label_color',
				[
					'label' => esc_html__( 'Color', 'solume' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info-box .contact .label' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'label_typography',
					'selector' => '{{WRAPPER}} .ova-contact-info-box .contact .label',
				]
			);

			$this->add_responsive_control(
				'label_margin',
				[
					'label' => esc_html__( 'Margin', 'solume' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info-box .contact .label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section(); // End Label Style Tab


		/**
		 * Info Style Tab
		 */
		$this->start_controls_section(
			'section_info_style',
			[
				'label' => esc_html__( 'Info', 'solume' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			

			$this->add_control(
				'info_color',
				[
					'label' => esc_html__( 'Color', 'solume' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info-box .contact .info .item' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-contact-info-box .contact .info .item a' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'info_color_hover',
				[
					'label' => esc_html__( 'Link Color hover', 'solume' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info-box .contact .info .item a:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'info_typography',
					'selector' => '{{WRAPPER}} .ova-contact-info-box .contact .info .item, {{WRAPPER}} .ova-contact-info-box .contact .info .item a',
				]
			);

			$this->add_responsive_control(
				'info_margin',
				[
					'label' => esc_html__( 'Margin', 'solume' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info-box .contact .info .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
			'info_padding',
			[
				'label' => esc_html__( 'Padding', 'solume' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-contact-info-box .contact .info .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

			$this->add_control(
				'info_box_background',
				[
					'label' 	=> esc_html__( 'Background', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info-box .contact .info .item' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'info_box_background_hover',
				[
					'label' 	=> esc_html__( 'Background Hover', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info-box .contact .info .item:hover' => 'background-color : {{VALUE}};',
					],
				]
			);
			$this->add_responsive_control(
				'border_radius_info',
				array(
					'label'      => esc_html__( 'Border Radius', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .ova-contact-info-box .contact .info .item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

		



		$this->end_controls_section(); // End Label Style Tab

	}

	protected function render() {

		$settings = $this->get_settings();

		$icon = $settings['icon'] ? $settings['icon']['value'] : '';
		$label = $settings['label'] ? $settings['label'] : '';
		$items_info = $settings['items_info'];	
		
		?>
			<div class="ova-contact-info-box ">
				
				<?php if( $icon ){ ?>
					<div class="icon">
						<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );  ?>
					</div>	
				<?php } ?>
				

				<div class="contact">
					
					<?php if( $label ){ ?>
						<div class="label">
							<?php echo esc_html( $label ); ?>
						</div>
					<?php } ?>

					<ul class="info">
						<?php foreach( $items_info as $item ):

							$type 	= $item['type'];
							
							?>

								<li class="item">

									<?php switch ( $type ) {

										case 'email':

											$email_address = $item['email_address'];
											$email_label = $item['email_label'];
											if( $email_label ){
												if( $email_address ){
													?>
													<a href="mailto:<?php echo esc_attr( $email_address ) ?> ">
														<?php echo esc_html( $email_label ); ?>
													</a>
													<?php
												} else {

													echo esc_html( $email_label );
												}
											}
											break;

										case 'phone':

											$phone_address = $item['phone_address'];
											$phone_label = $item['phone_label'];
											if( $phone_label ) {
												if( $phone_address ){
													?>
													<a href="tel:<?php echo esc_attr( $phone_address ) ?> ">
														<?php echo esc_html( $phone_label ); ?>
													</a>
													<?php
												} else{
													echo esc_html( $phone_label ); 
												}
											}
											break;

										case 'link':

											$this->add_render_attribute( 'title' );

											$link_address = $item['link_address']['url'];
											$link_label = $item['link_label'];

											$title = $item['link_label'] ? $item['link_label'] : '';

											if ( ! empty( $item['link_address']['url'] ) ) {

												$this->add_link_attributes( 'url', $item['link_address'] );

												echo sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'url' ), $title );

											}else{

												echo esc_html( $title );

											}
											
											break;

										case 'text':
											$text = $item['text'];
											?>
												<?php echo esc_html( $text ); ?>
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

		<?php
	}
// end render
}


$widgets_manager->register( new Solume_Elementor_Contact_Box() );


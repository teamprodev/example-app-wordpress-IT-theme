<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Color;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Solume_Elementor_Contact_Info extends Widget_Base {

	public function get_name() {
		return 'solume_elementor_contact_info';
	}

	public function get_title() {
		return esc_html__( 'Contact Info', 'solume' );
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
				'label'   => esc_html__( 'Label', 'solume' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('', 'solume'),
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
						'value' 	=> 'icomoon icomoon-map-marker-alt',
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
							'type' => 'phone',
							'text' => esc_html__('Chat with us', 'solume'),
							'description' => esc_html__('10am to 8pm EST', 'solume'),
						],
					],
					'title_field' => '{{{ type }}}',
				]
			);		

		$this->end_controls_section(); // End Content Tab

		/**
		* Label Style Tab Content
		*/
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Content', 'solume' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_responsive_control(
				'content_margin',
				[
					'label'	 		=> esc_html__( 'Margin', 'solume' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units'	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-contact-info .contact .info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'content_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'solume' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-contact-info .contact .info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'color_contact_info_background',
				[
					'label' 	=> esc_html__( 'Background', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .contact .info' => 'background-color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' 		=> 'border',
					'label' 	=> esc_html__( 'Border', 'solume' ),
					'selector' 	=> '{{WRAPPER}} .ova-contact-info .contact .info',
				]
			);

			$this->add_control(
				'border_radius_contact_info',
				array(
					'label'      => esc_html__( 'Border Radius', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .ova-contact-info .contact .info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

			$this->add_responsive_control(
				'item_margin',
				[
					'label' 		=> esc_html__( 'Item margin', 'solume' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-contact-info .contact .info .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'item_padding',
				[
					'label' 		=> esc_html__( 'Item Padding', 'solume' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-contact-info .contact .info .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section(); 
		// End  Style Tab Content

		/**
		* Label Style Tab Label
		*/
		$this->start_controls_section(
			'section_label_style',
			[
				'label' => esc_html__( 'Label', 'solume' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'label!' 	=> '',
				]
			]
		);	
			$this->add_control(
				'label_color',
				[
					'label'	 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .contact .label' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'label_typography',
					'selector' 	=> '{{WRAPPER}} .ova-contact-info .contact .label',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' 		=> 'border_label',
					'label' 	=> esc_html__( 'Border', 'solume' ),
					'selector' 	=> '{{WRAPPER}}  .ova-contact-info .contact .label',
				]
			);

			$this->add_responsive_control(
				'label_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'solume' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-contact-info .contact .label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .ova-contact-info .contact .label' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			

		$this->end_controls_section(); 
		// End Style tab Label

		/**
		* Info Style Tab Title
		*/
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'solume' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .contact .info .item .title' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label' 	=> esc_html__( 'Link Color hover', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .contact .info .item .title:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'info_typography',
					'selector' 	=> '{{WRAPPER}} .ova-contact-info .contact .info .item .title',
				]
			);

			$this->add_responsive_control(
				'info_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'solume' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-contact-info .contact .info .item .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section(); 
		// End Label Style Tab Title	

		/**
		 * 
		 * Icon Style Tab Icon
		 */
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'solume' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
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
							'max' 	=> 300,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-contact-info .info .item i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-contact-info .info .item svg' => 'width: {{SIZE}}{{UNIT}};',

					],
				]
			);

			$this->add_control(
				'icon_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .info .item i' => 'color : {{VALUE}} !important;',
						'{{WRAPPER}} .ova-contact-info .info .item svg path' => 'fill: {{VALUE}}',

					],
				]
			);

			$this->add_responsive_control(
				'icon_margin',
				[
					'label' 		=> esc_html__( 'Margin', 'solume' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-contact-info .info .item i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-contact-info .info .item svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],
				]
			);

			$this->add_responsive_control(
				'icon_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'solume' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-contact-info .info .item i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .ova-contact-info .info .item svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' 		=> 'border_icon',
					'label' 	=> esc_html__( 'Border', 'solume' ),
					'selector' 	=> '{{WRAPPER}} .ova-contact-info .info .item i',
				]
			);

			$this->add_control(
				'border_radius_icon',
				array(
					'label'      => esc_html__( 'Border Radius', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .ova-contact-info .info .item i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

			$this->add_control(
				'hr',
				[
					'type' => \Elementor\Controls_Manager::DIVIDER,
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'icon_padding_bf',
				[
					'label' 		=> esc_html__( 'Padding before', 'solume' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-contact-info .info .item i::before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

					],
				]
			);

			$this->add_control(
				'border_radius_icon_bf',
				array(
					'label'      => esc_html__( 'Border Radius', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .ova-contact-info .info .item i::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
	
			$this->add_control(
				'color_contact_bf_background',
				[
					'label' 	=> esc_html__( 'Background', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .info .item i::before' => 'background-color : {{VALUE}};',
					],
				]
			);



		$this->end_controls_section(); 
		// End Style tab Icon

		/**
		 * Info Style item content
		 */
		$this->start_controls_section(
			'section_item_content_style',
			[
				'label' => esc_html__( 'Item Content', 'solume' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'item_content_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .contact .info .content ' => 'color : {{VALUE}};',
						
					],
				]
			);

			$this->add_control(
				'item_content_color_hover',
				[
					'label' 	=> esc_html__( 'Link Color hover', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-contact-info .contact .info .item a.content:hover' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'item_content_typography',
					'selector' 	=> '{{WRAPPER}} .ova-contact-info .contact .info .item .content',
				]
			);

			$this->add_responsive_control(
				'item_content_padding',
				[
					'label' 		=> esc_html__( 'Padding', 'solume' ),
					'type' 			=> Controls_Manager::DIMENSIONS,
					'size_units' 	=> [ 'px', 'em', '%' ],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-contact-info .contact .info .item .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section(); 
		// End Info Style item content

}
	protected function render() {

		$settings = $this->get_settings();
		
		$label 		= $settings['label'] ? $settings['label'] : '';
		$items_info = $settings['items_info'];
		
		?>
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
													<p class="title"> 
														<?php echo esc_html( $email_title ); ?> 
												    </p>
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
												<p class="title"><?php echo esc_html( $phone_title );?></p>
											<?php }
											if($phone_link){ ?>
												<a class="content" href="tel:<?php echo esc_attr( $phone_link ); ?> ">
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
												<p class="title"><?php echo esc_html( $link_title );?></p>
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
												<p class="title"> 
													<?php echo esc_html( $text_title ); ?>
												</p>	
												<?php }
												if($text_label){ ?>
													<p class="description content"> 
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

		<?php
	}
// end render
}


$widgets_manager->register( new Solume_Elementor_Contact_Info() );
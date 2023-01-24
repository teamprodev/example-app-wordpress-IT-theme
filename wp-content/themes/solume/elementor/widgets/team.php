<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Solume_Elementor_Team extends Widget_Base {

	public function get_name() {
		return 'solume_elementor_team';
	}

	public function get_title() {
		return esc_html__( 'Team', 'solume' );
	}

	public function get_icon() {
		return 'eicon-user-circle-o';
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
	            'type',
	            [
	                'label' 	=> esc_html__( 'Type', 'solume' ),
	                'type' 		=> Controls_Manager::SELECT,
	                'options' 	=> [
	                    'v1' => esc_html__( 'Type 1', 'solume' ),
	                    'v2' => esc_html__( 'Type 2', 'solume' ),
	                ],
	                'default' 	=> 'v1',
	            ]
	        );

	        $this->add_control(
				'link_team',
				[
					'label' 		=> esc_html__( 'Link', 'solume' ),
					'type' 			=> Controls_Manager::URL,
					'placeholder' 	=> esc_html__( 'https://your-link.com', 'solume' ),
				]
			);

			$this->add_control(
				'mask_image',
				[
					'label' 	=> esc_html__( 'Mask Image', 'solume' ),
					'type' 		=> Controls_Manager::MEDIA,
					'default' 	=> [
						'url' 	=> Utils::get_placeholder_image_src(),
					],
					'condition' => [
						'type' 	=> 'v1'
					],
				]
			);

			$this->add_control(
				'image',
				[
					'label' 	=> esc_html__( 'Image Team', 'solume' ),
					'type' 		=> Controls_Manager::MEDIA,
					'dynamic' 	=> [
						'active' 	=> true,
					],
					'default' 	=> [
						'url' 	=> Utils::get_placeholder_image_src(),
					],
				]
			);
				
			$this->add_control(
				'name',
				[
					'label' 	=> esc_html__( 'Name', 'solume' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( 'Jhon Wick', 'solume' ),
				]
			);

			$this->add_control(
				'job',
				[
					'label' 	=> esc_html__( 'Job', 'solume' ),
					'type' 		=> Controls_Manager::TEXT,
					'default' 	=> esc_html__( 'Marketing', 'solume' ),
				]
			);

			// list items control
			$repeater = new \Elementor\Repeater(); 

			$repeater->add_control(
				'class_icon',
				[
					'label' => esc_html__( 'Icon', 'solume' ),
					'type' => Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'icomoon icomoon-twitte',
						'library' 	=> 'icomoon',
					],
				]
			);
			 
			$repeater->add_control(
				'link',
				[
					'label' 	=> esc_html__( 'Link', 'solume' ),
					'type' 		=> Controls_Manager::URL,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => esc_html__( 'https://your-link.com', 'solume' ),
				]
			);
			
            $this->add_control(
				'items',
				[
					'label' 	=> esc_html__( 'Social items', 'solume' ),
					'type' 		=> Controls_Manager::REPEATER,
					'fields' 	=> $repeater->get_controls(),
					'default' 	=> [
						[
							'class_icon' 		=> [
								'value' 	=> 'icomoon icomoon-twitte',
						        'library' 	=> 'icomoon',
							]
						],
						[	
							'class_icon' 		=> [
								'value' 	=> 'icomoon icomoon-facebook',
						        'library' 	=> 'icomoon',
							]
						],
						[	
							'class_icon' 		=> [
								'value' 	=> 'icomoon icomoon-tiktok',
						        'library' 	=> 'icomoon',
							]
						],
	
					],
					'condition' => [
						'type' 	=> 'v2'
					],
				]
			);

		$this->end_controls_section();

		// Tabs style

		/* Begin name Style */
		$this->start_controls_section(
            'name_style',
            [
                'label' => esc_html__( 'Name', 'solume' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'name_typography',
					'selector' 	=> '{{WRAPPER}} .ova-team .info .name',
				]
			);

			$this->add_control(
				'name_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team .info .name' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'name_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team:hover .info .name' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'name_margin',
	            [
	                'label' 		=> esc_html__( 'Margin', 'solume' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-team .info .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End name style */

		/* Begin job Style */
		$this->start_controls_section(
            'job_style',
            [
                'label' => esc_html__( 'Job', 'solume' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'job_typography',
					'selector' 	=> '{{WRAPPER}} .ova-team .info .job',
				]
			);

			$this->add_control(
				'job_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-team .info .job' => 'color: {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();
		/* End job style */
        
        /* Begin Social Icon Style */
        $this->start_controls_section(
			'section_style_icon',
			[
				'label' 	=> esc_html__( 'Icons', 'solume' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'type' 	=> 'v2',
				],
			]
		);

			$this->start_controls_tabs( 'tabs_icon_style' );

				$this->start_controls_tab(
					'icon_normal',
					[
						'label' => esc_html__( 'Normal', 'solume' ),
					]
				);

					$this->add_control(
						'color_icon',
						[
							'label' 	=> esc_html__( 'Color', 'solume' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .list-icon ul .item i' => 'color : {{VALUE}};',
							],
						]
					);

                    $this->add_control(
						'background_color_icon',
						[
							'label' 	=> esc_html__( 'Background Color', 'solume' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .list-icon ul .item' => 'background-color : {{VALUE}};',
							],
							
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'icon_hover',
					[
						'label' => esc_html__( 'Hover', 'solume' ),
					]
				);

					$this->add_control(
						'color_social_icons_hover',
						[
							'label' 	=> esc_html__( 'Color', 'solume' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .ova-team .list-icon .item i:hover' => 'color : {{VALUE}};',
							],
						]
					);

					$this->add_control(
						'bg_color_social_icons_hover',
						[
							'label' 	=> esc_html__( 'Background Color', 'solume' ),
							'type' 		=> Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .list-icon ul .item:hover' => 'background-color : {{VALUE}};',
							],
						]
					);

                $this->end_controls_tab();
			$this->end_controls_tabs();

		$this->end_controls_section();

	}

	// Render Template Here
	protected function render() {

		$settings   = $this->get_settings();

		$type 	    = $settings['type'];
		$name       = $settings['name'];
		$job 	    = $settings['job'];
		$items 		= $settings['items'];

		// Get url image
		$url 	= $settings['image']['url'];
		$alt 	= isset( $settings['image']['alt'] ) ? $settings['image']['alt'] : '';

		// Get url mask image
		$url_mask = $settings['mask_image']['url'];

		if ( empty( $alt ) ) {
			$alt = $name ? $name : esc_html__( 'Team', 'solume' );
		}

		$link_team 	      = $settings['link_team']['url'];
		$link_team_target = ( $settings['link_team']['is_external'] == 'on' ) ? ' target="_blank"' : '' ;


		?>

		    <div class="ova-team ova-team-<?php echo esc_attr($type); ?>">
                
                <?php if ( ! empty ( $url ) ): ?>
                	<?php if( $type === 'v1' ) : ?>
                		<?php if ( ! empty ( $link_team ) ) : ?>
							<a href="<?php echo esc_url($link_team); ?>" <?php echo esc_attr($link_team_target); ?>>
						<?php endif; ?>

	                		<?php if ( ! empty ( $url_mask ) ): ?>
							    <div class="img-team">
							<?php endif; ?>

								    <img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" style="-webkit-mask-image: url(<?php echo esc_attr($url_mask);?>); background-image: url(<?php echo esc_attr($url_mask);?>)">

							<?php if ( ! empty ( $url_mask ) ): ?>
							   </div>
							<?php endif; ?>
						<?php if ( ! empty ( $link_team ) ) : ?>
							</a>
						<?php endif; ?>

					<?php else : ?>
						<div class="img-team">
							<img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
							<?php if ( !empty( $items ) ) : ?>
								<div class="list-icon" >
									<ul>
										<?php 
										foreach( $items as $item ) { 

											$link = $item['link']['url'];
											$is_external = $item['link']['is_external'];
											$target = ( $is_external == 'on' ) ? ' target="_blank"' : '';

											?>
											<li class="item">
												<a href="<?php echo esc_url( $link );?>"<?php echo esc_attr( $target ); ?>>
													<i class="<?php echo esc_attr( $item['class_icon']['value'] ); ?>"></i>
												</a>
											</li>
										<?php } ?>
									</ul>
								</div>
						    <?php endif; ?>
						</div>

					<?php endif; ?>
				<?php endif; ?>

				<div class="info">

					<?php if ( ! empty ( $name ) ): ?>

						<?php if ( ! empty ( $link_team ) ) : ?>
							<a href="<?php echo esc_url($link_team); ?>" <?php echo esc_attr($link_team_target); ?>>
						<?php endif; ?>

						    <h3 class="name"><?php echo esc_html($name); ?></h3>

						<?php if ( ! empty ( $link_team ) ) : ?>
							</a>
						<?php endif; ?>

					<?php endif; ?>

					<?php if ( ! empty ( $job ) ): ?>
						<p  class="job">
							<?php echo esc_html( $job ); ?>
						</p>
					<?php endif; ?>

				</div>

			</div>

		<?php
	}
	
}
$widgets_manager->register( new Solume_Elementor_Team() );
<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class Solume_Elementor_Counter extends Widget_Base {

	
	public function get_name() {
		return 'solume_elementor_counter';
	}

	
	public function get_title() {
		return esc_html__( 'Ova Counter', 'solume' );
	}

	
	public function get_icon() {
		return 'eicon-counter';
	}

	
	public function get_categories() {
		return [ 'solume' ];
	}

	public function get_script_depends() {
		// appear js
		wp_enqueue_script( 'solume-counter-appear', get_theme_file_uri('/assets/libs/appear/appear.js'), array('jquery'), false, true);
		// Odometer for counter
		wp_enqueue_style( 'odometer', get_template_directory_uri().'/assets/libs/odometer/odometer.min.css' );
		wp_enqueue_script( 'odometer', get_template_directory_uri().'/assets/libs/odometer/odometer.min.js', array('jquery'), false, true );
		return [ 'solume-elementor-counter' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Ova Counter', 'solume' ),
			]
		);	
			
			// Add Class control

		     $this->add_control(
				'template',
				[
					'label' => esc_html__( 'Template', 'solume' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'template1',
					'options' => [
						'template1' => esc_html__('Template 1', 'solume'),
						'template2' => esc_html__('Template 2', 'solume'),
					]
				]
			);

		    $this->add_control(
				'icon',
				[
					'label' 	=> __( 'Icon', 'solume' ),
					'type' 		=> Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'ovaicon ovaicon-user-1',
						'library' 	=> 'all',
					],
				]
			);

		    $this->add_control(
				'number',
				[
					'label' 	=> esc_html__( 'Number', 'solume' ),
					'type'    => Controls_Manager::NUMBER,
					'default' => esc_html__( '200', 'solume' ),
				]
			);

			$this->add_control(
				'suffix',
				[
					'label'  => esc_html__( 'Suffix', 'solume' ),
					'type'   => Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Plus', 'solume' ),
					'default' => '+',
				]
			);

			$this->add_control(
				'title',
				[
					'label' 	=> esc_html__( 'Title', 'solume' ),
					'type' 	=> Controls_Manager::TEXT,
					'default' => esc_html__( 'Brances in Country', 'solume' ),
				]
			);

			$this->add_responsive_control(
				'text_align',
				[
					'label' 	=> esc_html__( 'Alignment', 'solume' ),
					'type' 		=> Controls_Manager::CHOOSE,
					'options' 	=> [
						'left' 	=> [
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
						'{{WRAPPER}} .ova-counter' => 'text-align: {{VALUE}};',
					],
				]
			);
			
		$this->end_controls_section();

		/* Begin Counter Style */
		$this->start_controls_section(
            'counter_style',
            [
               'label' => esc_html__( 'Ova Counter', 'solume' ),
               'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'counter_bgcolor_template1',
					'label' => esc_html__( 'Background', 'solume' ),
					'types' => [ 'gradient' ],
					'selector' => '{{WRAPPER}} .ova-counter',
					'condition' => [
						'template' => 'template1'
					]
				]
			);

			$this->add_control(
				'counter_bgcolor_teamplate2',
				[
					'label' 	=> esc_html__( 'Background', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter' => 'background: {{VALUE}};',
					],
					'condition' => [
						'template' => 'template2'
					]
				]
			);

			$this->add_control(
				'counter_bgcolor_teamplate2_hover',
				[
					'label' 	=> esc_html__( 'Background Hover', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter:hover' => 'background: {{VALUE}};',
					],
					'condition' => [
						'template' => 'template2'
					]
				]
			);

		    $this->add_responsive_control(
	            'counter_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'solume' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

	        $this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow',
					'label' => esc_html__( 'Box Shadow', 'solume' ),
					'selector' => '{{WRAPPER}} .ova-counter',
				]
			);

        $this->end_controls_section();
		/* End counter style */
        
        /* Begin icon Style */
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
					'label' 		=> esc_html__( 'Size', 'solume' ),
					'type' 			=> Controls_Manager::SLIDER,
					'size_units' 	=> [ 'px' ],
					'range' => [
						'px' => [
							'min' 	=> 0,
							'max' 	=> 90,
							'step' 	=> 1,
						]
					],
					'selectors' 	=> [
						'{{WRAPPER}} .ova-counter .icon' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'icon_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter .icon' => 'color : {{VALUE}} !important;',
					],
				]
			);

			$this->add_control(
				'icon_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter:hover .icon' => 'color : {{VALUE}} !important;',
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
						'{{WRAPPER}} .ova-counter .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section(); 
		// End Style tab Icon

		/* Begin number (odometer) Style */
		$this->start_controls_section(
            'number_style',
            [
                'label' => esc_html__( 'Number', 'solume' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

			 $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'number_typography',
					'selector' 	=> '{{WRAPPER}} .ova-counter .odometer',
				]
			);

			$this->add_control(
				'number_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter .odometer' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'number_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter:hover .odometer' => 'color: {{VALUE}};',
					],
				]
			);

        $this->end_controls_section();
		/* End number style */

		/* Begin suffix Style */
		$this->start_controls_section(
            'suffix_style',
            [
                'label' => esc_html__( 'Suffix', 'solume' ),
                'tab' 	=> Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' 		=> 'suffix_typography',
					'selector' 	=> '{{WRAPPER}} .ova-counter .suffix',
				]
			);

			$this->add_control(
				'suffix_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter .suffix' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'suffix_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter:hover .suffix' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
	            'suffix_padding',
	            [
	                'label' 		=> esc_html__( 'Padding', 'solume' ),
	                'type' 			=> Controls_Manager::DIMENSIONS,
	                'size_units' 	=> [ 'px', '%', 'em' ],
	                'selectors' 	=> [
	                    '{{WRAPPER}} .ova-counter .suffix' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End suffix style */

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
					'selector' 	=> '{{WRAPPER}} .ova-counter .title',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter .title' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'title_color_hover',
				[
					'label' 	=> esc_html__( 'Color Hover', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-counter:hover .title' => 'color: {{VALUE}};',
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
	                    '{{WRAPPER}} .ova-counter .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
	                ],
	            ]
	        );

        $this->end_controls_section();
		/* End title style */

		
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

        $template   = $settings['template'];
        $class_icon = $settings['icon']['value'];
		$number     = isset( $settings['number'] ) ? $settings['number'] : '100';
		$suffix     = $settings['suffix'];
		$title      = $settings['title'];

		 ?>
           
           <div class="ova-counter ova-counter-<?php echo esc_attr( $template ); ?>" 
                data-count="<?php echo esc_attr( $number ); ?>">

            <?php if(!empty( $class_icon )) : ?>
            	<div class="icon">
					<i class="<?php echo esc_attr( $class_icon ); ?>"></i>
				</div>
			<?php endif; ?>
            

			<span class="odometer">0</span>
			<span class="suffix">
				<?php echo esc_html( $suffix ); ?>
	        </span>
			
      	     <?php if (!empty( $title )): ?>
				<h4 class="title">
					<?php echo esc_html( $title ); ?>
				</h4>
			<?php endif;?>

           </div>
		 	
		<?php
	}

	
}
$widgets_manager->register( new Solume_Elementor_Counter() );
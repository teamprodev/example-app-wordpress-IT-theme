<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Color;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Solume_Elementor_Number_Box extends Widget_Base {

	public function get_name() {
		return 'solume_elementor_number_box';
	}

	public function get_title() {
		return esc_html__( 'Number Box', 'solume' );
	}

	public function get_icon() {
		return 'eicon-number-field';
	}

	public function get_categories() {
		return [ 'solume' ];
	}

	public function get_script_depends() {
		return [ '' ];
	}

	protected function register_controls() {

		/**
		 * number Tab
		 */
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'solume' ),
				
			]
		);
			$this->add_control(
				'show_line',
				[
					'label' 		=> esc_html__( 'Show line', 'solume' ),
					'type' 			=> \Elementor\Controls_Manager::SWITCHER,
					'label_on' 		=> esc_html__( 'Show', 'solume' ),
					'label_off' 	=> esc_html__( 'Hide', 'solume' ),
					'return_value' 	=> 'yes',
					'default' 		=> 'no',
				]
			);
			$this->add_control(
				'number',
				[
					'label' => esc_html__( 'Number', 'solume' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 1,
					'max' => 100,
					'step' => 1,
					'default' => 1,
				]
			);

			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'solume' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__('Discovery', 'solume'),
				]
			);

			$this->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'solume' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__('Our content strategy focuses on aggregation, storage and distribution to digitize, acquire, optimize', 'solume'),
				]
			);

		$this->end_controls_section();
		// End Content Tab

		/**
		 * number Style Tab
		 */
		$this->start_controls_section(
			'section_number_style',
			[
				'label' => esc_html__( 'Number', 'solume' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'Number_color',
				[
					'label' => esc_html__( 'Color', 'solume' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-number-box .number' => 'color : {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'number_typography',
					'selector' => '{{WRAPPER}} .ova-number-box .number',
				]
			);

			$this->add_responsive_control(
				'number_margin',
				[
					'label' => esc_html__( 'Margin', 'solume' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-number-box .number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section(); 
		// End number Style Tab

		/**
		 * title Style Tab
		 */
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'solume' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'solume' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-number-box .title' => 'color : {{VALUE}};',
					],
				]
			);


			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .ova-number-box .title',
				]
			);

			$this->add_responsive_control(
				'title_margin',
				[
					'label' => esc_html__( 'Margin', 'solume' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-number-box .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		 // End title Style Tab

		/**
		 * desc Style Tab
		 */
		$this->start_controls_section(
			'section_desc_style',
			[
				'label' => esc_html__( 'Desc', 'solume' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'desc_color',
				[
					'label' => esc_html__( 'Color', 'solume' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-number-box .description' => 'color : {{VALUE}};',
					],
				]
			);


			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'desc_typography',
					'selector' => '{{WRAPPER}} .ova-number-box .description',
				]
			);

			$this->add_responsive_control(
				'desc_margin',
				[
					'label' => esc_html__( 'Margin', 'solume' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-number-box .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		// End desc Style Tab

		/**
		 * line Style Tab
		 */
		$this->start_controls_section(
			'section_line_style',
			[
				'label' => esc_html__( 'Line', 'solume' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_line' => 'yes',
				]
			]
		);

			$this->add_control(
				'Line_color',
				[
					'label' => esc_html__( 'Color', 'solume' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-number-box.linetop::before' => 'background : {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'line_width',
				[
					'label' => esc_html__( 'Width', 'solume' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px','em','%' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 300,
							'step' => 1,
						]
					],
					'selectors' => [
						'{{WRAPPER}} .ova-number-box.linetop::before' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'line_height',
				[
					'label' => esc_html__( 'Height', 'solume' ),
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
						'{{WRAPPER}} .ova-number-box.linetop::before' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'Line_margin',
				[
					'label' => esc_html__( 'Margin', 'solume' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .ova-number-box.linetop::before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section(); 
		// End Line Style Tab

	}

	protected function render() {

		$settings = $this->get_settings();

		$number = $settings['number'] ? $settings['number'] : '';
		$title = $settings['title'] ? $settings['title'] : '';
		$description = $settings['description'] ? $settings['description'] : '';
		$line = $settings['show_line'];
		

		?>
			<div class="ova-number-box <?php if($line =='yes') { echo 'linetop'; }  ?>">			
				<?php if( $number){ ?>
					<?php if($number < 10 ): ?>
						<h3 class="number">
							<?php echo '0' . esc_html( $number ); ?>
						</h3>
					<?php else: ?>
						<h3 class="number">
							<?php echo esc_html( $number ); ?>
						</h3>
					
					<?php endif; ?>

				<?php } ?>
				
				<?php if( $title ){ ?>

					<h2 class="title">
						<?php echo esc_html( $title ); ?>
					</h2>

				<?php } ?>

				<?php if( $description ){ ?>

					<p class="description">
						<?php echo esc_html( $description ); ?>
					</p>

				<?php } ?>
			</div>

		<?php
	}
// end render
}


$widgets_manager->register( new Solume_Elementor_Number_Box() );


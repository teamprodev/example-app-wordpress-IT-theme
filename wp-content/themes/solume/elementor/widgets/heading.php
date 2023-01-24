<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Solume_Elementor_Heading extends Widget_Base {

	public function get_name() {
		return 'solume_elementor_heading';
	}

	public function get_title() {
		return esc_html__( 'Heading', 'solume' );
	}

	public function get_icon() {
		return 'eicon-heading';
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
			
		$this->add_control(
			'sub_title',
			[
				'label' 	=> esc_html__( 'Sub Title', 'solume' ),
				'type' 		=> Controls_Manager::TEXT,
				'default' 	=> 'about us'
			]
		);

		$this->add_control(
			'title',
			[
				'label' 	=> esc_html__( 'Title', 'solume' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default' 	=> 'Title'
			]
		);

		$this->add_control(
			'description',
			[
				'label' 	=> esc_html__( 'Description', 'solume' ),
				'type' 		=> Controls_Manager::TEXTAREA,
				'default' 	=> 'As a process transformation company, we rethinks and rebuilds processes for the digital age by combining the speed and insight of design thinking with the scale and accuracy of data analytics. We rethink the process and work together to streamline it, rebuild it, and deliver it '
			]
		);

		$this->add_control(
			'link_address',
			[
				'label'   		=> esc_html__( 'Link', 'solume' ),
				'type'    		=> \Elementor\Controls_Manager::URL,
				'show_external' => false,
				'default' 		=> [
					'url' 			=> '',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		
		$this->add_control(
			'html_tag',
			[
				'label' 	=> esc_html__( 'HTML Tag', 'solume' ),
				'type' 		=> \Elementor\Controls_Manager::SELECT,
				'default' 	=> 'h2',
				'options' 	=> [
					'h1' 		=> esc_html__( 'H1', 'solume' ),
					'h2'  		=> esc_html__( 'H2', 'solume' ),
					'h3'  		=> esc_html__( 'H3', 'solume' ),
					'h4' 		=> esc_html__( 'H4', 'solume' ),
					'h5' 		=> esc_html__( 'H5', 'solume' ),
					'h6' 		=> esc_html__( 'H6', 'solume' ),
					'div' 		=> esc_html__( 'Div', 'solume' ),
					'span' 		=> esc_html__( 'span', 'solume' ),
					'p' 		=> esc_html__( 'p', 'solume' ),
				],
			]
		);

		$this->add_responsive_control(
			'align_heading',
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
					'{{WRAPPER}} .ova-title' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		//SECTION TAB STYLE TITLE
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'solume' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> 'content_typography_title',
					'label' 	=> esc_html__( 'Typography', 'solume' ),
					'selector' 	=> '{{WRAPPER}} .ova-title .title',
				]
			);

			$this->add_control(
				'color_title',
				[
					'label' 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title .title' => 'color : {{VALUE}};',
						'{{WRAPPER}} .ova-title .title a' => 'color : {{VALUE}};',	
					],
				]
			);

			$this->add_control(
				'color_title_hover',
				[
					'label' 	=> esc_html__( 'Color hover', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title .title a:hover' => 'color : {{VALUE}};'
					],
				]
			);

			$this->add_responsive_control(
				'padding_title',
				[
					'label' 	 => esc_html__( 'Padding', 'solume' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title .title ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_title',
				[
					'label' 	 => esc_html__( 'Margin', 'solume' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title .title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		//END SECTION TAB STYLE TITLE

		//SECTION TAB STYLE SUB TITLE
		$this->start_controls_section(
			'section_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'solume' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> 'content_typography_sub_title',
					'label' 	=> esc_html__( 'Typography', 'solume' ),
					'selector' 	=> '{{WRAPPER}} .ova-title h3.sub-title',
				]
			);

			$this->add_control(
				'color_sub_title',
				[
					'label'	 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title h3.sub-title' => 'color : {{VALUE}};'
						
						
					],
				]
			);

			$this->add_responsive_control(
				'padding_sub_title',
				[
					'label' 	 => esc_html__( 'Padding', 'solume' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title h3.sub-title ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_sub_title',
				[
					'label' 	 => esc_html__( 'Margin', 'solume' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title h3.sub-title ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		$this->end_controls_section();
		//END SECTION TAB STYLE SUB TITLE

		//SECTION TAB STYLE DESCRIPTION
		$this->start_controls_section(
			'section_description',
			[
				'label' => esc_html__( 'Description', 'solume' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' 		=> 'content_typography_description',
					'label' 	=> esc_html__( 'Typography', 'solume' ),
					'selector' 	=> '{{WRAPPER}} .ova-title .description',
				]
			);

			$this->add_control(
				'color_description',
				[
					'label'	 	=> esc_html__( 'Color', 'solume' ),
					'type' 		=> Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova-title .description' => 'color : {{VALUE}};'		
					],
				]
			);

			$this->add_responsive_control(
				'padding_description',
				[
					'label' 	 => esc_html__( 'Padding', 'solume' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title .description ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'margin_description',
				[
					'label' 	 => esc_html__( 'Margin', 'solume' ),
					'type' 		 => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova-title .description ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		$this->end_controls_section();
		//END SECTION TAB STYLE DESCRIPTION
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		$title     		= $settings['title'];
		$sub_title 		= $settings['sub_title'];
		$description	= $settings['description']; 
		$link      		= $settings['link_address']['url'];
		$target    		= $settings['link_address']['is_external'] ? ' target="_blank"' : '';
		$html_tag  		= $settings['html_tag'];
		
		?>
		<div class="ova-title">

			<?php if($sub_title): ?>
				<h3 class="sub-title"><?php echo esc_html( $sub_title ); ?></h3>
			<?php endif; ?>

			<?php if($title): ?>
				<?php if( $link ) { ?>
					<<?php echo esc_html($html_tag); ?> class="title">
						<a href="<?php echo esc_url( $link ); ?>"<?php printf( $target ); ?>>
							<?php echo esc_html( $title ); ?>
						</a>
						</<?php echo esc_html($html_tag); ?>>
					<?php } else { ?>
						<<?php echo esc_html($html_tag); ?> class="title">
							<?php echo esc_html( $title ); ?>
						</<?php echo esc_html($html_tag); ?>>

				<?php } ?>
			<?php endif; ?>

			<?php if($description): ?>
				<p class="description"> <?php echo esc_html($description); ?> </p>
			<?php endif; ?>

		</div> 
		<?php
	}
	
}
$widgets_manager->register( new Solume_Elementor_Heading() );
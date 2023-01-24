<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Solume_Elementor_Search_Popup extends Widget_Base {

	public function get_name() {
		return 'solume_elementor_search_popup';
	}

	public function get_title() {
		return esc_html__( 'Search Popup', 'solume' );
	}

	public function get_icon() {
		return 'eicon-search';
	}

	public function get_categories() {
		return [ 'solume' ];
	}

	public function get_script_depends() {
		return [ 'solume-elementor-search-popup' ];
	}
	
	// Add Your Controll In This Function
	protected function register_controls() {

		// SECTION SEARCH
		$this->start_controls_section(
			'section_search',
			[
				'label' => esc_html__( 'Search', 'solume' ),
			]
		);	
			
			$this->add_control(
				'color_icon_search',
				[
					'label' => __( 'Icon Color', 'solume' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova_wrap_search_popup i' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'color_hover_icon_search',
				[
					'label' => __( 'Icon Hover Color', 'solume' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova_wrap_search_popup i:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'background_icon_search',
				[
					'label' => __( 'Background', 'solume' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova_wrap_search_popup i' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'background_icon_search_hover',
				[
					'label' => __( 'Background hover', 'solume' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova_wrap_search_popup i:hover' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'icon_search_padding',
				[
					'label'      => esc_html__( 'Padding', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .ova_wrap_search_popup i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'border_radius_icon',
				array(
					'label'      => esc_html__( 'Border Radius', 'solume' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .ova_wrap_search_popup i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);


			$this->add_control(
				'size_icon',
				[
					'label' => __( 'Size Icon', 'solume' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .ova_wrap_search_popup i' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		//END SECTION SEARCH

		// SECTION SEARCH POPUP
		$this->start_controls_section(
			'section_search_POPUP',
			[
				'label' => esc_html__( 'Search popup', 'solume' ),
			]
		);	

			$this->add_control(
				'color_icon_search_popup',
				[
					'label' => __( 'Icon Color', 'solume' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova_wrap_search_popup .ova_search_popup .container .search-form .search-submit i' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'color_hover_icon_search_popup',
				[
					'label' => __( 'Icon Hover Color', 'solume' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova_wrap_search_popup .ova_search_popup .container .search-form .search-submit:hover i' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'background_icon_search_popup',
				[
					'label' => __( 'Background', 'solume' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova_wrap_search_popup .ova_search_popup .container .search-form .search-submit' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'background_icon_search_hover_popup',
				[
					'label' => __( 'Background hover', 'solume' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .ova_wrap_search_popup .ova_search_popup .container .search-form .search-submit:hover' => 'background-color: {{VALUE}}',
					],
				]
			);


		$this->end_controls_section();
		//END SECTION SEARCH POPUP
	}

	// Render Template Here
	protected function render() {

		$settings = $this->get_settings();

		?>
		<div class="ova_wrap_search_popup">
				<i class="ovaicon ovaicon-search"></i>
				<div class="ova_search_popup">
					<div class="search-popup__overlay"></div>
					<div class="container">
						<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
						        <input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search …', 'solume' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php esc_attr_e( 'Search for:', 'solume' ) ?>" />
				   			 	<button type="submit" class="search-submit">
				   			 		<i class="ovaicon ovaicon-search"></i>
				   			 	</button>
						</form>									
					</div>
				</div>
			</div>
		<?php
	}
	
}
$widgets_manager->register( new Solume_Elementor_Search_Popup() );
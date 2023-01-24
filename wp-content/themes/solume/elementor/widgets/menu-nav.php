<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Solume_Elementor_Menu_Nav extends Widget_Base {

	public function get_name() {
		return 'solume_elementor_menu_nav';
	}

	public function get_title() {
		return esc_html__( 'Menu', 'solume' );
	}

	public function get_icon() {
		return 'eicon-nav-menu';
	}

	public function get_categories() {
		return [ 'hf' ];
	}
	

	protected function register_controls() {


		/* Global Section *******************************/
		/***********************************************/
		$this->start_controls_section(
			'section_menu_type',
			[
				'label' => esc_html__( 'Global', 'solume' ),
			]
		);


			$menus = \wp_get_nav_menus();
			$list_menu = array();
			foreach ($menus as $menu) {
				$list_menu[$menu->slug] = $menu->name;
			}

			$this->add_control(
				'menu_slug',
				[
					'label' => esc_html__( 'Select Menu', 'solume' ),
					'type' => Controls_Manager::SELECT,
					'options' => $list_menu,
					'default' => '',
					'prefix_class' => 'elementor-view-',
				]
			);
			
			
		$this->end_controls_section();	


		/* Parent Menu Section *******************************/
		/***********************************************/
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Parent Menu', 'solume' ),
			]
		);
			

			// Typography Parent Menu
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'menu_typography',
					'selector'	=> '{{WRAPPER}} ul li a'
				]
			);


			// Control Tabs
			$this->start_controls_tabs(
				'style_parent_menu_tabs'
			);

				// Normal Tab
				$this->start_controls_tab(
					'style_parent_menu_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'solume' ),
					]
				);

					$this->add_control(
						'link_color',
						[
							'label' => esc_html__( 'Menu Color', 'solume' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} ul.menu > li > a' => 'color: {{VALUE}};',
							],
							'separator' => 'before'
						]
					);

				$this->end_controls_tab();



				// Hover Tab
				$this->start_controls_tab(
					'style_parent_menu_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'solume' ),
					]
				);

					$this->add_control(
						'link_color_hover',
						[
							'label' => esc_html__( 'Menu Color', 'solume' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} ul.menu > li > a:hover' => 'color: {{VALUE}};',
							]
							
						]
					);

				$this->end_controls_tab();



				// Active Tab
				$this->start_controls_tab(
					'style_parent_menu_active_tab',
					[
						'label' => esc_html__( 'Active', 'solume' ),
					]
				);

					$this->add_control(
						'link_color_active',
						[
							'label' => esc_html__( 'Menu Color', 'solume' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} ul.menu > li.current-menu-item > a' => 'color: {{VALUE}};',
							]
							
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();


		/* Sub Menu Section *******************************/
		/***********************************************/
		$this->start_controls_section(
			'section_submenu_content',
			[
				'label' => esc_html__( 'Sub Menu', 'solume' ),
			]
		);	

			// Typography SubMenu
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'submenu_typography',
					'selector'	=> '{{WRAPPER}} ul.sub-menu li a'
				]
			);

			// Background Submenu
			$this->add_control(
				'submenu_bg_color',
				[
					'label' => esc_html__( 'Background', 'solume' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} ul.sub-menu' => 'background-color: {{VALUE}};',
					]
					
				]
			);

			// Background Item Hover In Submenu
			$this->add_control(
				'submenu_bg_item_hover_color',
				[
					'label' => esc_html__( 'Background Item Hover', 'solume' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} ul.sub-menu li a:hover' => 'background-color: {{VALUE}};',
					]
					
				]
			);



			// Control Tabs
			$this->start_controls_tabs(
				'style_sub_menu_tabs'
			);

				// Normal Tab
				$this->start_controls_tab(
					'style_sub_menu_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'solume' ),
					]
				);

					$this->add_control(
						'submenu_link_color',
						[
							'label' => esc_html__( 'Menu Color', 'solume' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} ul.sub-menu li a' => 'color: {{VALUE}};',
							]
							
						]
					);

				$this->end_controls_tab();



				// Hover Tab
				$this->start_controls_tab(
					'style_sub_menu_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'solume' ),
					]
				);

					$this->add_control(
						'submenu_link_color_hover',
						[
							'label' => esc_html__( 'Menu Color', 'solume' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} ul.sub-menu li a:hover' => 'color: {{VALUE}};',
							]
							
						]
					);

				$this->end_controls_tab();


				// Active Tab
				$this->start_controls_tab(
					'style_sub_menu_active_tab',
					[
						'label' => esc_html__( 'Active', 'solume' ),
					]
				);

					$this->add_control(
						'submenu_link_color_active',
						[
							'label' => esc_html__( 'Menu Color', 'solume' ),
							'type' => Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} ul.sub-menu li.current-menu-item > a' => 'color: {{VALUE}};',
							]
							
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();


		
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		
		$settings = $this->get_settings();
		
		?>

		<nav class="main-navigation">
            <button class="menu-toggle">
            	<span>
            		<?php echo esc_html__( 'Menu', 'solume' ); ?>
            	</span>
            </button>
			<?php
				wp_nav_menu( [
					'theme_location'  => $settings['menu_slug'],
					'container_class' => 'primary-navigation',
					'menu'              => $settings['menu_slug'],
				] );
			?>
        </nav>
		

	<?php }



	
}


$widgets_manager->register( new Solume_Elementor_Menu_Nav() );



<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class Solume_Elementor_Logo extends Widget_Base {

	public function get_name() {
		return 'ova_logo';
	}

	public function get_title() {
		return esc_html__( 'Logo', 'solume' );
	}

	public function get_icon() {
		return 'eicon-image';
	}

	public function get_categories() {
		return [ 'hf' ];
	}

	public function get_keywords() {
		return [ 'image', 'photo', 'visual' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_image',
			[
				'label' => esc_html__( 'Image', 'solume' ),
			]
		);

		
		$this->add_control(
			'link_to',
			[
				'label' => esc_html__( 'Link', 'solume' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'home' => esc_html__( 'Home Page', 'solume' ),
					'none' => esc_html__( 'None', 'solume' ),
					'custom' => esc_html__( 'Custom URL', 'solume' ),
				],
				'default' => 'home',

				
			]
		);

		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'solume' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'solume' ),
				'condition' => [
					'link_to' => 'custom',
				],
				'show_label' => false,
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => esc_html__( 'Alignment', 'solume' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Left', 'solume' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'solume' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'Right', 'solume' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-widget-container' => 'justify-content: {{VALUE}};',
				],
				
			]
		);




		$this->add_control(
			'desk_logo',
			[
				'label' => esc_html__( 'Desktop Logo', 'solume' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'desk_logo',
				'default' => 'thumbnail',
				'separator' => 'none',
			]
		);

		$this->add_control(
			'desk_w',
			[
				'label' => esc_html__( 'Desktop Logo Width', 'solume' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1000,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 132,
				],
				
			]
		);
		$this->add_control(
			'desk_h',
			[
				'label' => esc_html__( 'Desktop Logo Height', 'solume' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1000,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 36,
				],
				
			]
		);



		$this->add_control(
			'mobile_logo',
			[
				'label' => esc_html__( 'Mobile Logo', 'solume' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'separator' => 'before'
			]
		);

		$this->add_control(
			'mobile_w',
			[
				'label' => esc_html__( 'Mobile Logo Width', 'solume' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1000,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 132,
				],
				
			]
		);
		$this->add_control(
			'mobile_h',
			[
				'label' => esc_html__( 'Mobile Logo Height', 'solume' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1000,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 36,
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'mobile_logo',
				'default' => 'thumbnail',
				'separator' => 'none',
			]
			
		);


		$this->add_control(
			'sticky_logo',
			[
				'label' => esc_html__( 'Sticky Logo', 'solume' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'separator' => 'before'
			]
		);

		

		$this->add_control(
			'sticky_w',
			[
				'label' => esc_html__( 'Sticky Logo Width', 'solume' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1000,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 132,
				],
				
			]
		);
		$this->add_control(
			'sticky_h',
			[
				'label' => esc_html__( 'Sticky Logo Height', 'solume' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 1000,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 36,
				],
				
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'sticky_logo',
				'default' => 'thumbnail',
				'separator' => 'none',
			]
		);


		
		



		$this->end_controls_section();
	}

	private function get_link_url( $settings ) {

		if ( 'none' === $settings['link_to'] ) {
			return false;
		}

		if ( 'home' === $settings['link_to'] ) {
			return array( 'url' => esc_url( home_url('/') ) );
		}

		if ( 'custom' === $settings['link_to'] ) {
			if ( empty( $settings['link']['url'] ) ) {
				return false;
			}

			return $settings['link'];
		}

		return false;
		
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( empty( $settings['desk_logo']['url'] ) ) {
			return;
		} 
		$desk_w   = $settings['desk_w']['size'] ? $settings['desk_w']['size'].$settings['desk_w']['unit'] : 'auto';
		$desk_h   = $settings['desk_h']['size'] ? $settings['desk_h']['size'].$settings['desk_w']['unit'] : 'auto';

		$mobile_w = $settings['mobile_w']['size'] ? $settings['mobile_w']['size'].$settings['desk_w']['unit'] : 'auto';
		$mobile_h = $settings['mobile_h']['size'] ? $settings['mobile_h']['size'].$settings['desk_w']['unit'] : 'auto';

		$sticky_w  = $settings['sticky_w']['size'] ? $settings['sticky_w']['size'].$settings['desk_w']['unit'] : 'auto';
		$sticky_h  = $settings['sticky_h']['size'] ? $settings['sticky_h']['size'].$settings['desk_w']['unit'] : 'auto';


		$link = $this->get_link_url( $settings );

		?>

		<div class="brand_el">

			<?php if ( $link ) : ?>
				<?php $nofollow = ( isset( $link['nofollow'] ) && $link['nofollow'] ) ? ' rel="nofollow"' : ''; ?>
				<a href="<?php echo esc_url( $link['url'] ); ?> " <?php echo ( isset( $link['is_external'] ) && $link['is_external'] !== '' ) ? ' target="_blank"' : '' ?>  <?php echo esc_attr( $nofollow ); ?>>
			<?php endif; ?>

				<img src="<?php echo esc_url( $settings['desk_logo']['url'] ); ?>" 
					alt="<?php bloginfo('name');  ?>" 
					class="logo_desktop" 
					style="width:<?php echo esc_attr($desk_w) ?> ; height:<?php echo esc_attr($desk_h) ?>" 
				/>

				<img src="<?php echo esc_url( $settings['mobile_logo']['url'] ); ?>" 
					alt="<?php bloginfo('name');  ?>" 
					class="logo_mobile" 
					style="width:<?php echo esc_attr($mobile_w) ?> ;  height:<?php echo esc_attr($mobile_h) ?>" 
				/>

				<img src="<?php echo esc_url( $settings['sticky_logo']['url'] ); ?>" 
					alt="<?php bloginfo('name');  ?>" 
					class="logo_sticky" 
					style="width:<?php echo esc_attr($sticky_w) ?> ; height:<?php echo esc_attr($sticky_h) ?>" 
				/>

			<?php if ( $link ) : ?>
				</a>
			<?php endif; ?>

		</div>

		<?php
	}
	
}

$widgets_manager->register( new Solume_Elementor_Logo() );
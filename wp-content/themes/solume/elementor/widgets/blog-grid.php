<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Solume_Elementor_Blog_Grid extends Widget_Base {

	public function get_name() {
		return 'solume_elementor_blog_grid';
	}

	public function get_title() {
		return esc_html__( 'Blog Grid', 'solume' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return [ 'solume' ];
	}

	public function get_script_depends() {
		return [ '' ];
	}

	protected function register_controls() {

		$args = array(
		  'orderby' => 'name',
		  'order' => 'ASC'
		  );

		$categories=get_categories($args);
		$cate_array = array();
		$arrayCateAll = array( 'all' => esc_html__( 'All categories', 'solume' ) );
		if ($categories) {
			foreach ( $categories as $cate ) {
				$cate_array[$cate->cat_name] = $cate->slug;
			}
		} else {
			$cate_array[ esc_html__( 'No content Category found', 'solume' ) ] = 0;
		}



		//SECTION CONTENT
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'solume' ),
			]
		);

			$this->add_control(
				'category',
				[
					'label' => esc_html__( 'Category', 'solume' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'all',
					'options' => array_merge($arrayCateAll,$cate_array),
				]
			);

			$this->add_control(
				'total_count',
				[
					'label' => esc_html__( 'Post Total', 'solume' ),
					'type' => Controls_Manager::NUMBER,
					'default' => 3,
				]
			);

			$this->add_control(
				'number_column',
				[
					'label' => esc_html__( 'Columns', 'solume' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'columns3',
					'options' => [
						'columns2' => esc_html__( '2 Columns', 'solume' ),
						'columns3' => esc_html__( '3 Columns', 'solume' ),
						'columns4' => esc_html__( '4 Columns', 'solume' ),
					]
				]
			);


			$this->add_control(
				'order_by',
				[
					'label' => esc_html__('Order', 'solume'),
					'type' => Controls_Manager::SELECT,
					'default' => 'desc',
					'options' => [
						'asc' => esc_html__('Ascending', 'solume'),
						'desc' => esc_html__('Descending', 'solume'),
					]
				]
			);

		

			$this->add_control(
				'text_readmore',
				[
					'label' => esc_html__( 'Text Read More', 'solume' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__('Read More', 'solume'),
				]
			);

			$this->add_control(
				'show_category',
				[
					'label' => esc_html__( 'Show Category', 'solume' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'solume' ),
					'label_off' => esc_html__( 'Hide', 'solume' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'show_date',
				[
					'label' => esc_html__( 'Show Date', 'solume' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'solume' ),
					'label_off' => esc_html__( 'Hide', 'solume' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'show_author',
				[
					'label' => esc_html__( 'Show Author', 'solume' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'solume' ),
					'label_off' => esc_html__( 'Hide', 'solume' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);


			$this->add_control(
				'show_title',
				[
					'label' => esc_html__( 'Show Title', 'solume' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'solume' ),
					'label_off' => esc_html__( 'Hide', 'solume' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);


			$this->add_control(
				'show_read_more',
				[
					'label' => esc_html__( 'Show Read More', 'solume' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'solume' ),
					'label_off' => esc_html__( 'Hide', 'solume' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'icon',
				[
					'label' 	=> esc_html__( 'Icon', 'solume' ),
					'type' 		=> \Elementor\Controls_Manager::ICONS,
					'default' 	=> [
						'value' 	=> 'icomoon icomoon-arrow-right',
						'library' 	=> 'solid',
					],
					'condition' => [
							'show_read_more' => 'yes'
						]
					]
				);

			$this->add_control(
				'icon_fontsize',
				[
					'label' 		=> esc_html__( 'Icon Size', 'solume' ),
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
						'{{WRAPPER}} .ova-blog .item .read-more i::before' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .ova-blog .item .read-more svg' => 'width: {{SIZE}}{{UNIT}}; height:auto;',

					],
				]
			);

			$this->add_responsive_control(
				'align_item',
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
				
					'toggle' 	=> true,
					'selectors' => [
						'{{WRAPPER}} .ova-blog .item' => 'text-align: {{VALUE}}',
						'{{WRAPPER}} .ova-blog .item .post-meta' => 'justify-content: {{VALUE}}',

					],
				]
			);

			

		$this->end_controls_section();
		//END SECTION CONTENT


		//SECTION TAB STYLE TITLE
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'solume' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .ova-blog .post-title a',
			]
		);

		$this->add_control(
			'color_title',
			[
				'label' => esc_html__( 'Color Title', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .post-title a' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_title_hover',
			[
				'label' => esc_html__( 'Color Title Hover', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .post-title a:hover' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_title',
			[
				'label' => esc_html__( 'Margin', 'solume' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog .post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		//END SECTION TAB STYLE TITLE


		$this->start_controls_section(
			'section_short_desc',
			[
				'label' => esc_html__( 'Short Description', 'solume' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'short_desc_typography',
				'selector' => '{{WRAPPER}} .ova-blog .short_desc p',
			]
		);

		$this->add_control(
			'color_short_desc',
			[
				'label' => esc_html__( 'Color Title', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .short_desc p' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_short_desc_hover',
			[
				'label' => esc_html__( 'Color Title Hover', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .short_desc p:hover' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_short_desc',
			[
				'label' => esc_html__( 'Margin', 'solume' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog .short_desc p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		//END SECTION TAB STYLE TITLE





		$this->start_controls_section(
			'section_meta',
			[
				'label' => esc_html__( 'Meta', 'solume' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'selector' => '{{WRAPPER}} .ova-blog .item .post-meta .item-meta .right, {{WRAPPER}} .ova-blog .item .post-meta .item-meta .right a',
			]
		);

		$this->add_control(
			'text_color_meta',
			[
				'label' => esc_html__( 'Text Color', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .post-meta .item-meta .right' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'link_color_meta',
			[
				'label' => esc_html__( 'Link Color', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .post-meta .item-meta .right a' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'link_color_meta_hover',
			[
				'label' => esc_html__( 'Link Color hover', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .post-meta .item-meta .right a:hover' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_color_meta',
			[
				'label' => esc_html__( 'Icon Color', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .post-meta .item-meta .left' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_meta',
			[
				'label' => esc_html__( 'Margin', 'solume' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .post-meta .item-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();


		// CATEGORY TAB
		$this->start_controls_section(
			'cat_section',
			[
				'label' => esc_html__( 'Category', 'solume' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'selector' => '{{WRAPPER}} .ova-blog .item .category a',
			]
		);

		$this->add_control(
			'cat_color',
			[
				'label' => esc_html__( 'Color', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .category a' => 'color : {{VALUE}};',
					'{{WRAPPER}} .ova-blog .item .category	' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'cat_color_hover',
			[
				'label' => esc_html__( 'Color Hover', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .category a:hover' => 'color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bg_cat_color',
			[
				'label' => esc_html__( 'Background', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .category a' => 'background-color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bg_cat_color_hover',
			[
				'label' => esc_html__( 'Background Hover', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .category a:hover' => 'background-color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'cat_padding',
			[
				'label' => esc_html__( 'Padding', 'solume' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .category a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'cat_margin',
			[
				'label' => esc_html__( 'Margin', 'solume' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .category a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section(); // END Category Tab


		//SECTION TAB STYLE READMORE
		$this->start_controls_section(
			'section_readmore',
			[
				'label' => esc_html__( 'Read More', 'solume' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'readmore_typography',
				'selector' => '{{WRAPPER}} .ova-blog .item .read-more',
			]
		);

		$this->add_control(
			'color_readmore',
			[
				'label' => esc_html__( 'Color', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .read-more' => 'color : {{VALUE}};',
					'{{WRAPPER}} .ova-blog .item .read-more svg path' => 'fill : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'color_readmore_hover',
			[
				'label' => esc_html__( 'Color Hover', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .read-more:hover' => 'color : {{VALUE}};',
					'{{WRAPPER}} .ova-blog .item .read-more:hover svg path' => 'fill : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bg_color_readmore',
			[
				'label' => esc_html__( 'Background', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .read-more' => 'background-color : {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bg_color_readmore_hover',
			[
				'label' => esc_html__( 'Background Hover', 'solume' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .read-more:hover' => 'background-color : {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_readmore',
			[
				'label' => esc_html__( 'Margin', 'solume' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ova-blog .item .read-more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		//END SECTION TAB STYLE READMORE

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
		$settings = $this->get_settings_for_display();
		
		$category = $settings['category'];
		$total_count = $settings['total_count'];
		$order = $settings['order_by'];
		$number_column = $settings['number_column'];

		$text_readmore = $settings['text_readmore'];
		$show_date = $settings['show_date'];
		$show_author = $settings['show_author'];
		$show_title = $settings['show_title'];
		$show_category = $settings['show_category'];
		$show_read_more = $settings['show_read_more'];
	
		$args = [];
		if ($category == 'all') {
			$args=[
				'post_type' => 'post',
				'posts_per_page' => $total_count,
				'order' => $order,
			];
		} else {
			$args=[
				'post_type' => 'post', 
				'category_name'=>$category,
				'posts_per_page' => $total_count,
				'order' => $order,
				'fields'	=> 'ids'
			];
		}

		$blog = new \WP_Query($args);

		?>
		
		<ul class="ova-blog <?php echo esc_attr( $number_column ); ?>">
			<?php
				if($blog->have_posts()) : while($blog->have_posts()) : $blog->the_post();
			?>
				<li class="item ">

					<?php if(has_post_thumbnail()){ ?>

					    <div class="media">
				        	<?php 
				        		$thumbnail = wp_get_attachment_image_url(get_post_thumbnail_id() , 'full' );
				        	?>
							<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				        		<img src="<?php echo esc_url( $thumbnail ) ?>" alt="<?php the_title(); ?>">
							</a>
				        </div>

			        <?php } ?>

					<?php if( $show_category == 'yes' ){ ?>
					        	<span class="category">
									<?php the_category(', '); ?>
								</span>
					<?php } ?>

					<?php if( $show_title == 'yes' ){ ?>
			            <h2 class="post-title">
					        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
					          <?php the_title(); ?>
					        </a>
					    </h2>
				    <?php } ?>

				    <?php if( $show_read_more == 'yes' ){ ?>
					    <a class="read-more" href="<?php the_permalink(); ?>">
					    	<?php  echo esc_html( $text_readmore );
								\Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); 
							?>
					    </a>
				    <?php }?>

					<ul class="post-meta">
					    	
						<?php if( $show_date == 'yes' ){ ?>
							<li class="item-meta post-date">
								<span class="left date">
									<i aria-hidden="true" class="icomoon icomoon-calendar-alt"></i>
								</span>
								<span class="right date">
									<?php the_time( get_option( 'date_format' ));?>
								</span>
							</li>
						<?php } ?>

						<?php if( $show_author == 'yes' ){ ?>
							<li class="item-meta wp-author">
								<span class="left author">
									<i aria-hidden="true" class="icomoon icomoon-user-circle"></i>
								</span>
								<span class="right post-author">
									<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
										<?php the_author_meta( 'display_name' ); ?>
									</a>
								</span>
							</li>
						<?php } ?>
							
					</ul>
					
				</li>	
					
			<?php
				endwhile; endif; wp_reset_postdata();
			?>
		</ul>
		
		
		<?php
	}
}

$widgets_manager->register( new Solume_Elementor_Blog_Grid() );

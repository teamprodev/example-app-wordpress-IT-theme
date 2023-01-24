<?php if (!defined( 'ABSPATH' )) exit;

if( !class_exists('Solume_Hooks') ){
	
	class Solume_Hooks {

		public function __construct() {
			
			// Return HTML for Header
			add_filter( 'solume_render_header', array( $this, 'solume_render_header' ) );

			// Return HTML for Footer
			add_filter( 'solume_render_footer', array( $this, 'solume_render_footer' ) );


			/* Get All Header */
			add_filter( 'solume_list_header', array( $this, 'solume_list_header' ) );

			/* Get All Footer */
			add_filter( 'solume_list_footer', array( $this,  'solume_list_footer' ) );

			/* Define Layout */
			add_filter( 'solume_define_layout', array( $this,  'solume_define_layout' ) );

			/* Define Wide */
			add_filter( 'solume_define_wide_boxed', array( $this,  'solume_define_wide_boxed' ) );

			/* Get layout */
			add_filter( 'solume_get_layout', array( $this, 'solume_get_layout' ) );

			/* Get sidebar */
			add_filter( 'solume_theme_sidebar', array( $this, 'solume_theme_sidebar' )  );
			

			/* Wide or Boxed */
			add_filter( 'solume_wide_site', array( $this, 'solume_wide_site' ) );

			/* Get Blog Template */
			add_filter( 'solume_blog_template', array( $this, 'solume_blog_template' ) );
			
			// Comment Form Default Field
			add_filter( 'comment_form_default_fields', array( $this, 'solume_comment_form_default_fields') );
			add_filter( 'comment_form_defaults', array( $this, 'solume_comment_form_defaults' ) );

	    }

		
		public function solume_render_header(){

			$current_id = solume_get_current_id();

			// Get header default from customizer
			$global_header = get_theme_mod('global_header','default');

			// Header in Metabox of Post, Page
		    $meta_header = get_post_meta($current_id, 'ova_met_header_version', 'true');
		  	
		    // Header use in post,page
		    if( $current_id != '' && $meta_header != 'global'  && $meta_header != '' ){

		    	$header = $meta_header;

		  	}else if( solume_is_blog_archive() ){ // Header use in blog

		  		$header = get_theme_mod('blog_header', 'default');

		  	}else if( is_singular('post') ){ // Header use in single post

		  		$header = get_theme_mod('single_header', 'default');

		  	}else{ // Header use in global

		  		$header = $global_header;
		  	}
			

			$header_split = explode(',', apply_filters( 'solume_header_customize', $header, $header ));

			if ( solume_is_elementor_active() && isset( $header_split[1] ) ) {

				$post_id_header = solume_get_id_by_slug( $header_split[1] );

				// Check WPML 
				if( function_exists( 'icl_object_id' ) ){
					$post_id_header = icl_object_id($post_id_header, 'ova_framework_hf_el', false);

					if ( ! $post_id_header ) {
						$post_id_header = solume_get_id_by_slug( $header_split[1] );
					}
				}
				
				return Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $post_id_header );

			}else if ( solume_is_elementor_active() && !isset( $header_split[1] ) ) {

				return get_template_part( 'template-parts/header', $header_split[0] );

			}else if ( !solume_is_elementor_active()  ) {

				return get_template_part( 'template-parts/header', 'default' );

			}

		}


		
		public function solume_render_footer(){

			$current_id = solume_get_current_id();

			// Get Footer default from customizer
			$global_footer = get_theme_mod('global_footer', 'default' );

			// Footer in Metabox of Post, Page
		    $meta_footer =  get_post_meta( $current_id, 'ova_met_footer_version', 'true' );
			
		  	

		  	if( $current_id != '' && $meta_footer != 'global'  && $meta_footer != '' ){

		  		$footer = $meta_footer;

		  	}else if( solume_is_blog_archive() ){

		  		$footer = get_theme_mod('blog_footer', 'default');

		  	}else if( is_singular('post') ){

		  		$footer = get_theme_mod('single_footer', 'default');

		  	}else{

		  		$footer = $global_footer;
		  		
		  	}

		  	
		  	$footer_split = explode(',', apply_filters( 'solume_footer_customize', $footer, $footer ));

			if ( solume_is_elementor_active() && isset( $footer_split[1] ) ) {

				$post_id_footer = solume_get_id_by_slug( $footer_split[1] );

				// Check WPML 
				if( function_exists( 'icl_object_id' ) ){
					$post_id_footer = icl_object_id($post_id_footer, 'ova_framework_hf_el', false);

					if ( ! $post_id_footer ) {
						$post_id_footer = solume_get_id_by_slug( $footer_split[1] );
					}
				}

				return Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $post_id_footer );
				
			}else if ( solume_is_elementor_active() && !isset( $footer_split[1] ) ) {

				get_template_part( 'template-parts/footer', $footer_split[0] );

			}else if( !solume_is_elementor_active() ){

				get_template_part( 'template-parts/footer', 'default' );			
			}
		}



		function solume_list_header(){

		    $hf_header_array['default'] = esc_html__( 'Default', 'solume' );

		    if( !solume_is_elementor_active() ) return $hf_header_array;

		    $args_hf = array(
		        'post_type' => 'ova_framework_hf_el',
		        'post_status'   => 'publish',
		        'posts_per_page' => '-1',
		        'meta_query' => array(
		            array(
		                'key'     => 'hf_options',
		                'value'   => 'header',
		                'compare' => '=',
		            ),
		        )
		    );

		    $hf = new WP_Query( $args_hf );

		    if($hf->have_posts()):  while($hf->have_posts()) : $hf->the_post();
		        global $post;
		        $hf_header_array[ 'ova,'.$post->post_name ] = get_the_title();

		    endwhile;endif; wp_reset_postdata();

		    return $hf_header_array;
		}

		
		function solume_list_footer(){

		    $hf_footer_array['default'] = esc_html__( 'Default', 'solume' );

		    if( !solume_is_elementor_active() ) return $hf_footer_array;

		    $args_hf = array(
		        'post_type' => 'ova_framework_hf_el',
		        'post_status'   => 'publish',
		        'posts_per_page' => '-1',
		        'meta_query' => array(
		            array(
		                'key'     => 'hf_options',
		                'value'   => 'footer',
		                'compare' => '=',
		            ),
		        )
		    );

		    $hf = new WP_Query( $args_hf );

		    if($hf->have_posts()):  while($hf->have_posts()) : $hf->the_post();
		        global $post;
		        $hf_footer_array[ 'ova,'.$post->post_name ] = get_the_title();

		    endwhile;endif; wp_reset_postdata();

		    return $hf_footer_array;
		}


		function solume_define_layout(){
			return array(
				'layout_1c' => esc_html__('No Sidebar', 'solume'),
				'layout_2r' => esc_html__('Right Sidebar', 'solume'),
				'layout_2l' => esc_html__('Left Sidebar', 'solume'),
			);
		}
		

		function solume_get_layout(){
			
			$layout = '';
			
			$width_sidebar = get_theme_mod( 'global_sidebar_width', '320' );

			if( is_singular( 'post' ) ){

			    $layout = get_theme_mod( 'single_layout', 'layout_2r' );

			}else if( solume_is_blog_archive() ){

			    $layout = get_theme_mod( 'blog_layout', 'layout_2r' );

			}else if( solume_is_woo_active() && is_product() ){

				$layout = get_theme_mod( 'woo_product_layout', 'woo_layout_1c' );
				$width_sidebar = get_theme_mod( 'woo_sidebar_width', '320' );

			} else if( solume_is_woo_active() && ( is_product_category() || is_product_tag() || is_shop() ) ){
				
				$layout = get_theme_mod( 'woo_archive_layout', 'woo_layout_1c' );
				$width_sidebar = get_theme_mod( 'woo_sidebar_width', '320' );

			}


			$current_id = solume_get_current_id();

			if( $current_id ){

			    $layout_in_post = get_post_meta( $current_id, 'ova_met_main_layout', true );

			    if( $layout_in_post != 'global' && $layout_in_post != '' ){
			    	$layout = $layout_in_post;
			    }

			}

			// Check if page is posts (settings >> reading >> posts page)
			if( get_option( 'page_for_posts' ) == $current_id ){
				
				$layout_in_post = get_post_meta( $current_id, 'ova_met_main_layout', true );

				if( $layout_in_post == 'global' ){
					$layout = get_theme_mod( 'blog_layout', 'layout_2r' );
				}
					

			}


			if( isset( $_GET['layout_sidebar'] ) ){
				$layout = $_GET['layout_sidebar'];
			}

			if( !$layout ){
				$layout = get_theme_mod( 'global_layout', 'layout_2r' );
			    $width_sidebar = get_theme_mod( 'global_sidebar_width', '320' );
			}

			// Check if Woo Sidebar is inactive
			if( solume_is_woo_active() && ( is_product_category() || is_product_tag() || is_shop() ) ){
				if( !is_active_sidebar('woo-sidebar') ){
					$layout = 'woo_layout_1c';
					$width_sidebar = 0;
				}
			}else if( solume_is_woo_active() && is_product() ){
				if( !is_active_sidebar('woo-sidebar') ){
					$layout = 'woo_layout_1c';
					$width_sidebar = 0;
				}
			}else if( !is_active_sidebar('main-sidebar') ){
					$layout = 'layout_1c';
					$width_sidebar = 0;
			}
			

			return array( $layout, $width_sidebar );
		}

		


		function solume_wide_site(){
			$current_id = solume_get_current_id();
			$width_site = get_post_meta( $current_id, 'ova_met_wide_site', true );

			if( $current_id && $width_site != 'global' ){
			    $width = $width_site;
			}else{
				$width = get_theme_mod( 'global_wide_site', 'wide' );
			}

			return $width;
		}

		function solume_theme_sidebar(){
			$layout_sidebar = apply_filters( 'solume_get_layout', '' );
			return $layout_sidebar[0];
		}

		function solume_define_wide_boxed(){
			return array(
				'wide' => esc_html__('Wide', 'solume'),
				'boxed' => esc_html__('Boxed', 'solume'),
			);
		}

		function solume_blog_template(){
			$blog_template = get_theme_mod( 'blog_template', 'default' );
			if( isset( $_GET['blog_template'] ) ){
				$blog_template = $_GET['blog_template'];
			}
			return $blog_template;
		}
		

		function solume_comment_form_defaults( $defaults ){

			$defaults['comment_field'] = sprintf(
											'<p class="comment-form-comment"> %s</p>',
											'<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required" placeholder="'.esc_attr__( 'Comment', 'solume' ).'"></textarea>'
										);

			return $defaults;
		
		}

		function solume_comment_form_default_fields( $fields ){

			$commenter     = wp_get_current_commenter();

			$req      = get_option( 'require_name_email' );
			$html_req = ( $req ? " required='required'" : '' );
			$html5 = true;


			$fields['author'] = sprintf( '<p class="comment-form-author">%s</p>',
								sprintf(
									'<input id="author" name="author" type="text" value="%s" placeholder="'.esc_attr__( 'Name', 'solume' ).'" size="30" maxlength="245"%s />',
									esc_attr( $commenter['comment_author'] ),
									$html_req
								) );

			$fields['email'] = sprintf(
								'<p class="comment-form-email"> %s</p>',
								
								sprintf(
									'<input id="email" name="email" %s value="%s" size="30" maxlength="100" placeholder="'.esc_attr__( 'Email', 'solume' ).'" aria-describedby="email-notes"%s />',
									( $html5 ? 'type="email"' : 'type="text"' ),
									esc_attr( $commenter['comment_author_email'] ),
									$html_req
								)
							);
			$fields['url'] = sprintf(
							'<p class="comment-form-url">%s</p>',
							sprintf(
								'<input id="url" name="url" %s value="%s" size="30" maxlength="200" placeholder="'.esc_attr__( 'Website', 'solume' ).'" />',
								( $html5 ? 'type="url"' : 'type="text"' ),
								esc_attr( $commenter['comment_author_url'] )
							)
						);

			
			return $fields;
			
		}


	}
}

new Solume_Hooks();


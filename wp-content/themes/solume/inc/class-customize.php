<?php if (!defined( 'ABSPATH' )) exit;

if (!class_exists( 'Solume_Customize' )){

	class Solume_Customize {
		
		public function __construct() {
	        add_action( 'customize_register', array( $this, 'solume_customize_register' ) );
	    }

	    public function solume_customize_register($wp_customize) {
	        
	        $this->solume_init_remove_setting( $wp_customize );
	        $this->solume_init_ova_typography( $wp_customize );
	        $this->solume_init_ova_color( $wp_customize );
	        $this->solume_init_ova_layout( $wp_customize );
	        $this->solume_init_ova_header( $wp_customize );
	        $this->solume_init_ova_footer( $wp_customize );
	        $this->solume_init_ova_blog( $wp_customize );
	        

	        if( solume_is_woo_active() ){
	        	$this->solume_init_ova_woo( $wp_customize );	
	        }
	   
	        do_action( 'solume_customize_register', $wp_customize );
	    }

	    public function solume_init_remove_setting( $wp_customize ){
	    	/* Remove Colors &  Header Image Customize */
			$wp_customize->remove_section('colors');
			$wp_customize->remove_section('header_image');

			$wp_customize->add_setting( 'logo', array(
		      'type' => 'theme_mod', // or 'option'
		      'capability' => 'edit_theme_options',
		      'theme_supports' => '', // Rarely needed.
		      'default' => '',
		      'transport' => 'refresh', // or postMessage
		      'sanitize_callback' => 'sanitize_text_field' // Get function name 
		      
		    ) );

		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
		        'label'    => esc_html__( 'Logo Default', 'solume' ),
		        'section'  => 'title_tagline',
		        'settings' => 'logo'
		    )));
	    }

	   
	    
	    /* Typo */
	    public function solume_init_ova_typography($wp_customize){


	    		/* Body Pane ******************************/
				$wp_customize->add_section( 'typo_general' , array(
				    'title'      => esc_html__( 'Typography', 'solume' ),
				    'priority'   => 1,
				    // 'panel' => 'typo_panel',
				) );


					/* General Typo */
					$wp_customize->add_setting( 'general_heading', array(
					  'default' => '',
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );


					/* Message */
					$wp_customize->add_setting( 'text_typo_message', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => '',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					$wp_customize->add_control(
						new Solume_Customize_Control_Heading( 
						$wp_customize, 
						'text_typo_message', 
						array(
							'label'          => esc_html__('Text Font','solume'),
				            'section'        => 'typo_general',
				            'settings'       => 'text_typo_message',
						) )
					);

						/* Font Size */
						$wp_customize->add_setting( 'general_font_size', array(
						  'type' => 'theme_mod', // or 'option'
						  'capability' => 'edit_theme_options',
						  'theme_supports' => '', // Rarely needed.
						  'default' => '16px',
						  'transport' => 'refresh', // or postMessage
						  'sanitize_callback' => 'sanitize_text_field' // Get function name 
						  
						) );
						
						$wp_customize->add_control('general_font_size', array(
							'label' => esc_html__('Font Size','solume'),
							'description' => esc_html__('Example: 16px, 1.2em','solume'),
							'section' => 'typo_general',
							'settings' => 'general_font_size',
							'type' 		=>'text'
						));

						/* Line Height */
						$wp_customize->add_setting( 'general_line_height', array(
						  'type' => 'theme_mod', // or 'option'
						  'capability' => 'edit_theme_options',
						  'theme_supports' => '', // Rarely needed.
						  'default' => '1.8em',
						  'transport' => 'refresh', // or postMessage
						  'sanitize_callback' => 'sanitize_text_field' // Get function name 
						  
						) );
						
						$wp_customize->add_control('general_line_height', array(
							'label' => esc_html__('Line height','solume'),
							'description' => esc_html__('Recommend use em. Example: 1.6em, 23px','solume'),
							'section' => 'typo_general',
							'settings' => 'general_line_height',
							'type' 		=>'text'
						));


						/* Letter Space */
						$wp_customize->add_setting( 'general_letter_space', array(
						  'type' => 'theme_mod', // or 'option'
						  'capability' => 'edit_theme_options',
						  'theme_supports' => '', // Rarely needed.
						  'default' => '0px',
						  'transport' => 'refresh', // or postMessage
						  'sanitize_callback' => 'sanitize_text_field' // Get function name 
						  
						) );
						
						$wp_customize->add_control('general_letter_space', array(
							'label' => esc_html__('Letter Spacing','solume'),
							'description' => esc_html__('Example: 0px, 0.5em','solume'),
							'section' => 'typo_general',
							'settings' => 'general_letter_space',
							'type' 		=>'text'
						));




				$wp_customize->add_control(
					new Solume_Customize_Control_Heading( 
					$wp_customize, 
					'general_heading', 
					array(
						'label'          => esc_html__('Primary Font','solume'),
			            'section'        => 'typo_general',
			            'settings'       => 'general_heading',
					) )
				);


				/* General Font */
				$wp_customize->add_setting( 'primary_font',
					array(
						'default' => solume_default_primary_font(),
						'sanitize_callback' => 'solume_google_font_sanitization'
					)
				);
					$wp_customize->add_control( new Solume_Google_Font_Select_Custom_Control( $wp_customize, 'primary_font',
						array(
							'label' => esc_html__( 'Primary Font', 'solume' ),
							'section' => 'typo_general',
							'input_attrs' => array(
								'font_count' => 'all',
								'orderby' => 'popular',
							),
						)
					) );

				/* Custom Font */
				/* Message */
				$wp_customize->add_setting( 'custom_font_message', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new Solume_Customize_Control_Heading( 
					$wp_customize, 
					'custom_font_message', 
					array(
						'label'          => esc_html__('Custom Font','solume'),
			            'section'        => 'typo_general',
			            'settings'       => 'custom_font_message',
					) )
				);


					$wp_customize->add_control(
						new Solume_Customize_Control_Heading( 
						$wp_customize, 
						'custom_font_message', 
						array(
							'label'          => esc_html__('Custom Font','solume'),
				            'section'        => 'typo_general',
				            'settings'       => 'custom_font_message',
						) )
					);

					$wp_customize->add_setting( 'ova_custom_font', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => '',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );

					$wp_customize->add_control('ova_custom_font', array(
						'label' => esc_html__('Custom Font','solume'),
						'description' => esc_html__('Step 1: Insert font-face in style.css file: Refer https://www.w3schools.com/cssref/css3_pr_font-face_rule.asp. Step 2: Insert font-family and font-weight like format: 
							["Perpetua", "Regular:Bold:Italic:Light"] | ["Name-Font", "Regular:Bold:Italic:Light"]. Step 3: Refresh customize page to display new font in dropdown font field.','solume'),
						'section' => 'typo_general',
						'settings' => 'ova_custom_font',
						'type' =>'textarea'
					));
				

	    }


	     /* Color */
	    public function solume_init_ova_color( $wp_customize ){

	    	/* Body Pane ******************************/
			$wp_customize->add_section( 'color_section' , array(
			    'title'      => esc_html__( 'Color', 'solume' ),
			    'priority'   => 2,
			    // 'panel' => 'typo_panel',
			) );

				$wp_customize->add_setting( 'primary_color', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'transport' => 'refresh', // or postMessage
				  'default'		=> '#FE7146',
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'primary_color', 
					array(
						'label'          => esc_html__("Primary",'solume'),
			            'section'        => 'color_section',
			            'settings'       => 'primary_color',

					) ) 
				);

				$wp_customize->add_setting( 'primary_color_hover', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'transport' => 'refresh', // or postMessage
				  'default'		=> '#C26346',
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'primary_color_hover', 
					array(
						'label'          => esc_html__("Primary Hover",'solume'),
			            'section'        => 'color_section',
			            'settings'       => 'primary_color_hover',
					) ) 
				);


				$wp_customize->add_setting( 'secondary_color', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default'		=> '#303360',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'secondary_color', 
					array(
						'label'          => esc_html__("Secondary",'solume'),
			            'section'        => 'color_section',
			            'settings'       => 'secondary_color',
					) ) 
				);

				$wp_customize->add_setting( 'secondary_color_hover', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				 'default'		=> '#1A1D4B',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'secondary_color_hover', 
					array(
						'label'          => esc_html__("Secondary Hover",'solume'),
			            'section'        => 'color_section',
			            'settings'       => 'secondary_color_hover',
					) ) 
				);


				$wp_customize->add_setting( 'text_color', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default'		=> '#555555',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'text_color', 
					array(
						'label'          => esc_html__("Text",'solume'),
			            'section'        => 'color_section',
			            'settings'       => 'text_color',
					) ) 
				);

				$wp_customize->add_setting( 'heading_color', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default'		=> '#00092C',		
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'heading_color', 
					array(
						'label'          => esc_html__("Heading",'solume'),
			            'section'        => 'color_section',
			            'settings'       => 'heading_color',
					) ) 
				);

				

				$wp_customize->add_setting( 'light_color', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default'		=> '#7B7B7B',	
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'light_color', 
					array(
						'label'          => esc_html__("Light",'solume'),
			            'section'        => 'color_section',
			            'settings'       => 'light_color',
					) ) 
				);

				$wp_customize->add_setting( 'border_color', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default'		=> '#E9E9E9',	
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'border_color', 
					array(
						'label'          => esc_html__("Border",'solume'),
			            'section'        => 'color_section',
			            'settings'       => 'border_color',
					) ) 
				);

				$wp_customize->add_setting( 'background', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default'		=> '#FAEEED',	
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'background', 
					array(
						'label'          => esc_html__("Background",'solume'),
			            'section'        => 'color_section',
			            'settings'       => 'background',
					) ) 
				);

				$wp_customize->add_setting( 'secondary_background', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default'		=> '#F5F5FD',	
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
					$wp_customize, 
					'secondary_background', 
					array(
						'label'          => esc_html__("Secondary Background",'solume'),
			            'section'        => 'color_section',
			            'settings'       => 'secondary_background',
					) ) 
				);

	    }


	    /* Layout */
	    public function solume_init_ova_layout( $wp_customize ){

	    	$wp_customize->add_section( 'layout_section' , array(
			    'title'      => esc_html__( 'Layout', 'solume' ),
			    'priority'   => 2,
			) );


	    		$wp_customize->add_setting( 'global_preload', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'yes',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_preload', array(
					'label' => esc_html__('Preload','solume'),
					'section' => 'layout_section',
					'settings' => 'global_preload',
					'type' =>'select',
					'choices' => array(
						'yes' => esc_html__('Yes', 'solume'),
						'no' => esc_html__('No', 'solume')
					)
				));

				$wp_customize->add_setting( 'global_boxed_container_width', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '1290',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_boxed_container_width', array(
					'label' => esc_html__('Container (px)','solume'),
					'section' => 'layout_section',
					'settings' => 'global_boxed_container_width',
					'type' =>'number',
					'default' => '1290'
				));

				$wp_customize->add_setting( 'global_layout', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'layout_2r',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_layout', array(
					'label' => esc_html__('Layout','solume'),
					'section' => 'layout_section',
					'settings' => 'global_layout',
					'type' =>'select',
					'choices' => apply_filters( 'solume_define_layout', '' )
				));

				$wp_customize->add_setting( 'global_sidebar_width', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '320',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_sidebar_width', array(
					'label' => esc_html__('Sidebar Width (px)','solume'),
					'section' => 'layout_section',
					'settings' => 'global_sidebar_width',
					'type' =>'number'
				));
				

				

				$wp_customize->add_setting( 'global_wide_site', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'wide',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_wide_site', array(
					'label' => esc_html__('Wide Site','solume'),
					'section' => 'layout_section',
					'settings' => 'global_wide_site',
					'type' =>'select',
					'choices' => apply_filters('solume_define_wide_boxed', '')
				));

				
				$wp_customize->add_setting( 'global_boxed_offset', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => '20',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_boxed_offset', array(
					'label' => esc_html__('Boxed Offset (px)','solume'),
					'section' => 'layout_section',
					'settings' => 'global_boxed_offset',
					'type' =>'number',
					'default' => '20'
				));

	    }

	    /* Header */
	    public function solume_init_ova_header( $wp_customize ){

	    	$wp_customize->add_section( 'header_section' , array(
			    'title'      => esc_html__( 'Header', 'solume' ),
			    'priority'   => 3,
			) );

				$wp_customize->add_setting( 'global_header', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'default',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_header', array(
					'label' => esc_html__('Header Default','solume'),
					'description' => esc_html__('This isn\'t effect in Blog' ,'solume'),
					'section' => 'header_section',
					'settings' => 'global_header',
					'type' =>'select',
					'choices' => apply_filters('solume_list_header', '')
				));

	    }

	    /* Footer */
	    public function solume_init_ova_footer( $wp_customize ){

	    	$wp_customize->add_section( 'footer_section' , array(
			    'title'      => esc_html__( 'Footer', 'solume' ),
			    'priority'   => 4,
			) );

				$wp_customize->add_setting( 'global_footer', array(
				  'type' => 'theme_mod', // or 'option'
				  'capability' => 'edit_theme_options',
				  'theme_supports' => '', // Rarely needed.
				  'default' => 'default',
				  'transport' => 'refresh', // or postMessage
				  'sanitize_callback' => 'sanitize_text_field' // Get function name 
				  
				) );
				$wp_customize->add_control('global_footer', array(
					'label' => esc_html__('Footer Default','solume'),
					'description' => esc_html__('This isn\'t effect in Blog' ,'solume'),
					'section' => 'footer_section',
					'settings' => 'global_footer',
					'type' =>'select',
					'choices' => apply_filters('solume_list_footer', '')
				));

	    }


	    /* Blog */
	    public function solume_init_ova_blog( $wp_customize ){

	    	$wp_customize->add_panel( 'blog_panel', array(
			    'title'      => esc_html__( 'Blog', 'solume' ),
			    'priority' => 5,
			) );

				$wp_customize->add_section( 'blog_section' , array(
				    'title'      => esc_html__( 'Archive', 'solume' ),
				    'priority'   => 30,
				    'panel' => 'blog_panel',
				) );

					$wp_customize->add_setting( 'blog_template', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'default',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );

					$wp_customize->add_control('blog_template', array(
						'label' => esc_html__('Type','solume'),
						'section' => 'blog_section',
						'settings' => 'blog_template',
						'type' =>'select',
						'choices' => array(
							'default' => esc_html__('Default', 'solume'),
							'grid'		=> esc_html__('Grid', 'solume'),
							'masonry'		=> esc_html__('Masonry', 'solume'),
							'listing'   => esc_html__('Listing', 'solume'),
						)
					));

					$wp_customize->add_setting( 'blog_archive_show_media', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'yes',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					
					$wp_customize->add_control('blog_archive_show_media', array(
						'label' => esc_html__('Show Media','solume'),
						'section' => 'blog_section',
						'settings' => 'blog_archive_show_media',
						'type' =>'select',
						'choices' => array(
							'yes' => esc_html__('Yes', 'solume'),
							'no'		=> esc_html__('No', 'solume'),
						)
					));

					$wp_customize->add_setting( 'blog_archive_show_title', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'yes',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					
					$wp_customize->add_control('blog_archive_show_title', array(
						'label' => esc_html__('Show Title','solume'),
						'section' => 'blog_section',
						'settings' => 'blog_archive_show_title',
						'type' =>'select',
						'choices' => array(
							'yes' => esc_html__('Yes', 'solume'),
							'no'		=> esc_html__('No', 'solume'),
						)
					));

					$wp_customize->add_setting( 'blog_archive_show_date', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'yes',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					
					$wp_customize->add_control('blog_archive_show_date', array(
						'label' => esc_html__('Show Date','solume'),
						'section' => 'blog_section',
						'settings' => 'blog_archive_show_date',
						'type' =>'select',
						'choices' => array(
							'yes' => esc_html__('Yes', 'solume'),
							'no'		=> esc_html__('No', 'solume'),
						)
					));

					$wp_customize->add_setting( 'blog_archive_show_cat', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'yes',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					
					$wp_customize->add_control('blog_archive_show_cat', array(
						'label' => esc_html__('Show Category','solume'),
						'section' => 'blog_section',
						'settings' => 'blog_archive_show_cat',
						'type' =>'select',
						'choices' => array(
							'yes' => esc_html__('Yes', 'solume'),
							'no'		=> esc_html__('No', 'solume'),
						)
					));

					$wp_customize->add_setting( 'blog_archive_show_author', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'no',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					
					$wp_customize->add_control('blog_archive_show_author', array(
						'label' => esc_html__('Show Author','solume'),
						'section' => 'blog_section',
						'settings' => 'blog_archive_show_author',
						'type' =>'select',
						'choices' => array(
							'yes' => esc_html__('Yes', 'solume'),
							'no'		=> esc_html__('No', 'solume'),
						)
					));

					$wp_customize->add_setting( 'blog_archive_show_comment', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'yes',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					
					$wp_customize->add_control('blog_archive_show_comment', array(
						'label' => esc_html__('Show Comment','solume'),
						'section' => 'blog_section',
						'settings' => 'blog_archive_show_comment',
						'type' =>'select',
						'choices' => array(
							'yes' => esc_html__('Yes', 'solume'),
							'no'		=> esc_html__('No', 'solume'),
						)
					));


					$wp_customize->add_setting( 'blog_archive_show_excerpt', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'yes',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					
					$wp_customize->add_control('blog_archive_show_excerpt', array(
						'label' => esc_html__('Show Excerpt','solume'),
						'section' => 'blog_section',
						'settings' => 'blog_archive_show_excerpt',
						'type' =>'select',
						'choices' => array(
							'yes' => esc_html__('Yes', 'solume'),
							'no'		=> esc_html__('No', 'solume'),
						)
					));

					$wp_customize->add_setting( 'blog_archive_show_readmore', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'yes',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					
					$wp_customize->add_control('blog_archive_show_readmore', array(
						'label' => esc_html__('Show Read More','solume'),
						'section' => 'blog_section',
						'settings' => 'blog_archive_show_readmore',
						'type' =>'select',
						'choices' => array(
							'yes' => esc_html__('Yes', 'solume'),
							'no'		=> esc_html__('No', 'solume'),
						)
					));




					$wp_customize->add_setting( 'blog_layout', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'layout_2r',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					$wp_customize->add_control('blog_layout', array(
						'label' => esc_html__('Layout','solume'),
						'section' => 'blog_section',
						'settings' => 'blog_layout',
						'type' =>'select',
						'choices' => apply_filters( 'solume_define_layout', '' )
					));
					

					$wp_customize->add_setting( 'blog_header', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'default',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					$wp_customize->add_control('blog_header', array(
						'label' => esc_html__('Header','solume'),
						'section' => 'blog_section',
						'settings' => 'blog_header',
						'type' =>'select',
						'choices' => apply_filters('solume_list_header', '')
					));

					$wp_customize->add_setting( 'blog_footer', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'default',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					$wp_customize->add_control('blog_footer', array(
						'label' => esc_html__('Footer','solume'),
						'section' => 'blog_section',
						'settings' => 'blog_footer',
						'type' =>'select',
						'choices' => apply_filters('solume_list_footer', '')
					));


				$wp_customize->add_section( 'single_section' , array(
				    'title'      => esc_html__( 'Single', 'solume' ),
				    'priority'   => 30,
				    'panel' => 'blog_panel',
				) );	

					$wp_customize->add_setting( 'single_layout', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'layout_2r',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					$wp_customize->add_control('single_layout', array(
						'label' => esc_html__('Layout','solume'),
						'section' => 'single_section',
						'settings' => 'single_layout',
						'type' =>'select',
						'choices' => apply_filters( 'solume_define_layout', '' )
					));





					$wp_customize->add_setting( 'blog_single_show_media', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'yes',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					
					$wp_customize->add_control('blog_single_show_media', array(
						'label' => esc_html__('Show Media','solume'),
						'section' => 'single_section',
						'settings' => 'blog_single_show_media',
						'type' =>'select',
						'choices' => array(
							'yes' => esc_html__('Yes', 'solume'),
							'no'		=> esc_html__('No', 'solume'),
						)
					));

					$wp_customize->add_setting( 'blog_single_show_title', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'yes',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					
					$wp_customize->add_control('blog_single_show_title', array(
						'label' => esc_html__('Show Title','solume'),
						'section' => 'single_section',
						'settings' => 'blog_single_show_title',
						'type' =>'select',
						'choices' => array(
							'yes' => esc_html__('Yes', 'solume'),
							'no'		=> esc_html__('No', 'solume'),
						)
					));

					$wp_customize->add_setting( 'blog_single_show_date', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'yes',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					
					$wp_customize->add_control('blog_single_show_date', array(
						'label' => esc_html__('Show Date','solume'),
						'section' => 'single_section',
						'settings' => 'blog_single_show_date',
						'type' =>'select',
						'choices' => array(
							'yes' => esc_html__('Yes', 'solume'),
							'no'		=> esc_html__('No', 'solume'),
						)
					));

					$wp_customize->add_setting( 'blog_single_show_cat', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'yes',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					
					$wp_customize->add_control('blog_single_show_cat', array(
						'label' => esc_html__('Show Category','solume'),
						'section' => 'single_section',
						'settings' => 'blog_single_show_cat',
						'type' =>'select',
						'choices' => array(
							'yes' => esc_html__('Yes', 'solume'),
							'no'		=> esc_html__('No', 'solume'),
						)
					));

					$wp_customize->add_setting( 'blog_single_show_author', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'no',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					
					$wp_customize->add_control('blog_single_show_author', array(
						'label' => esc_html__('Show Author','solume'),
						'section' => 'single_section',
						'settings' => 'blog_single_show_author',
						'type' =>'select',
						'choices' => array(
							'yes' => esc_html__('Yes', 'solume'),
							'no'		=> esc_html__('No', 'solume'),
						)
					));

					$wp_customize->add_setting( 'blog_single_show_comment', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'yes',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					
					$wp_customize->add_control('blog_single_show_comment', array(
						'label' => esc_html__('Show Comment','solume'),
						'section' => 'single_section',
						'settings' => 'blog_single_show_comment',
						'type' =>'select',
						'choices' => array(
							'yes' => esc_html__('Yes', 'solume'),
							'no'		=> esc_html__('No', 'solume'),
						)
					));

					$wp_customize->add_setting( 'blog_single_show_tag', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'yes',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					
					$wp_customize->add_control('blog_single_show_tag', array(
						'label' => esc_html__('Show Tag','solume'),
						'section' => 'single_section',
						'settings' => 'blog_single_show_tag',
						'type' =>'select',
						'choices' => array(
							'yes' => esc_html__('Yes', 'solume'),
							'no'		=> esc_html__('No', 'solume'),
						)
					));
					

					

					$wp_customize->add_setting( 'single_header', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'default',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					$wp_customize->add_control('single_header', array(
						'label' => esc_html__('Header','solume'),
						'section' => 'single_section',
						'settings' => 'single_header',
						'type' =>'select',
						'choices' => apply_filters('solume_list_header', '')
					));

					$wp_customize->add_setting( 'single_footer', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'default' => 'default',
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
					) );
					$wp_customize->add_control('single_footer', array(
						'label' => esc_html__('Footer','solume'),
						'section' => 'single_section',
						'settings' => 'single_footer',
						'type' =>'select',
						'choices' => apply_filters('solume_list_footer', '')
					));

	    }

	    public function solume_init_ova_woo( $wp_customize ){

			$wp_customize->add_setting( 'woo_archive_layout', array(
				'type'              => 'theme_mod', // or 'option'
				'capability'        => 'edit_theme_options',
				'theme_supports'    => '', // Rarely needed.
				'default'           => 'woo_layout_1c',
				'transport'         => 'refresh', // or postMessage
				'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
			) );
			$wp_customize->add_control('woo_archive_layout', array(
				'label'    => esc_html__('Archive Layout','solume'),
				'section'  => 'woocommerce_product_catalog',
				'settings' => 'woo_archive_layout',
				'type'     =>'select',
				'choices'  => array(
					'woo_layout_1c' => esc_html__('No Sidebar', 'solume'),
					'woo_layout_2r' => esc_html__('Right Sidebar', 'solume'),
					'woo_layout_2l' => esc_html__('Left Sidebar', 'solume'),
				)
			));



			$wp_customize->add_setting( 'woo_sidebar_width', array(
				'type'              => 'theme_mod', // or 'option'
				'capability'        => 'edit_theme_options',
				'theme_supports'    => '', // Rarely needed.
				'default'           => '320',
				'transport'         => 'refresh', // or postMessage
				'sanitize_callback' => 'sanitize_text_field' // Get function name 
			  
			) );
			$wp_customize->add_control('woo_sidebar_width', array(
				'label'    => esc_html__('Sidebar Width (px)','solume'),
				'section'  => 'woocommerce_product_catalog',
				'settings' => 'woo_sidebar_width',
				'type'     =>'number'
			));

			/* Show/hide title in category,tag */
			$wp_customize->add_setting( 'woo_archive_show_title', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field', // Get function name 
					  'default'  => 'yes',
					) );

	    	$wp_customize->add_control('woo_archive_show_title', array(
	    		'label'    => esc_html__('Show/Hide Title','solume'),
	    		'section'  => 'woocommerce_product_catalog',
	    		'settings' => 'woo_archive_show_title',
	    		'type'     => 'select',
	    		'choices'  => array(
	    			'yes' => esc_html__('Yes', 'solume'),
	    			'no' => esc_html__('No', 'solume'),

	    		)
	    	));


			$wp_customize->add_section( 'product_detail' , array(
				    'title'      => esc_html__( 'Product detail', 'solume' ),
				    'priority'   => 30,
				    'panel' => 'woocommerce',
				) );

			$wp_customize->add_setting( 'woo_product_layout', array(
				'type'              => 'theme_mod', // or 'option'
				'capability'        => 'edit_theme_options',
				'theme_supports'    => '', // Rarely needed.
				'default'           => 'woo_layout_1c',
				'transport'         => 'refresh', // or postMessage
				'sanitize_callback' => 'sanitize_text_field' // Get function name 
					  
			) );
			$wp_customize->add_control('woo_product_layout', array(
				'label'    => esc_html__('Single Layout','solume'),
				'section'  => 'product_detail',
				'settings' => 'woo_product_layout',
				'type'     =>'select',
				'choices'  => array(
					'woo_layout_1c' => esc_html__('No Sidebar', 'solume'),
					'woo_layout_2r' => esc_html__('Right Sidebar', 'solume'),
					'woo_layout_2l' => esc_html__('Left Sidebar', 'solume'),
				)
			));


	    	$wp_customize->add_setting( 'woo_product_detail_show_title', array(
					  'type' => 'theme_mod', // or 'option'
					  'capability' => 'edit_theme_options',
					  'theme_supports' => '', // Rarely needed.
					  'transport' => 'refresh', // or postMessage
					  'sanitize_callback' => 'sanitize_text_field', // Get function name 
					  'default'  => 'yes',
					) );

	    	$wp_customize->add_control('woo_product_detail_show_title', array(
	    		'label'    => esc_html__('Show/Hide Title','solume'),
	    		'section'  => 'product_detail',
	    		'settings' => 'woo_product_detail_show_title',
	    		'type'     => 'select',
	    		'choices'  => array(
	    			'yes' => esc_html__('Yes', 'solume'),
	    			'no' => esc_html__('No', 'solume'),

	    		)
	    	));
	    }

	 


		
	}

}

new Solume_Customize();







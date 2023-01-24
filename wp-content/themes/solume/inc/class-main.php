<?php if (!defined( 'ABSPATH' )) exit;

if( !class_exists('Solume_Main') ){

	class Solume_Main {

		public function __construct() {
           	
           	
			/* Add theme support */
			add_action( 'after_setup_theme', array( $this, 'solume_theme_support' ) );
	

			/**
			 * Register Menu
			 */
			add_action( 'init', array( $this, 'solume_register_menus' ) );

			

			/**
			 * Load google font from customize
			 */
			add_action('wp_enqueue_scripts', array( $this, 'solume_load_google_fonts' ) );

			/**
			 * Add Body class
			 */
			add_filter('body_class', array( $this, 'solume_body_classes' ) );
			

			/**
			 * Enqueue CSS, Javascript
			 */
			add_action('wp_enqueue_scripts', array( $this, 'solume_enqueue_scripts' ) );

			

			/**
			 * Enqueue style from customize
			 */
			add_action('wp_enqueue_scripts', array( $this, 'solume_enqueue_customize' ), 11 );
			

        }



		function solume_theme_support(){

			$GLOBALS['content_width'] = apply_filters('solume_content_width', 800);
		    

		    add_theme_support('title-tag');

		    // Adds RSS feed links to <head> for posts and comments.
		    add_theme_support( 'automatic-feed-links' );

		    // Switches default core markup for search form, comment form, and comments    
		    // to output valid HTML5.
		    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

		    add_theme_support( 'responsive-embeds' );

		    /* See http://codex.wordpress.org/Post_Formats */
		    add_theme_support( 'post-formats', array( 'image', 'gallery', 'audio', 'video') );

		    add_theme_support( 'post-thumbnails' );
		    
		    add_theme_support( 'custom-header' );
		    add_theme_support( 'custom-background');

		    add_theme_support('responsive-embeds');

		    add_theme_support( 'woocommerce' );
		    
		    add_theme_support( 'ova_framework_hf_el' );

		    add_filter('gutenberg_use_widgets_block_editor', '__return_false');
            add_filter('use_widgets_block_editor', '__return_false');

		    add_image_size( 'solume_thumbnail', 768, 660, true );
		    add_image_size( 'solume_portfolio_thumbnail', 440, 440, true );
		    add_image_size( 'solume_portfolio_fixed_width', 440 );
		    
		}



		function solume_register_menus() {
		  register_nav_menus( array(
		    'primary'   => esc_html__( 'Primary Menu', 'solume' )

		  ) );
		}


		
		function solume_load_google_fonts(){

		    $fonts_url = '';

		    $default_primary_font = json_decode( solume_default_primary_font() );

		    $custom_fonts = get_theme_mod('ova_custom_font','');

		    // Primary Font 
		    $primary_font = json_decode( get_theme_mod( 'primary_font' ) ) ? json_decode( get_theme_mod( 'primary_font' ) ) : $default_primary_font;
		    $primary_font_family = $primary_font->font;
		    $primary_font_weights_string = $primary_font->regularweight ? $primary_font->regularweight : '100,200,300,400,500,600,700,800,900';
		    $is_custom_primary_font = $custom_fonts != '' ? !strpos($primary_font_family, $custom_fonts) : true;

		    $general_flag = _x( 'on', $primary_font_family.': on or off', 'solume');
		    
		    if ( 'off' !== $general_flag || 'off' !== $second_flag || 'off' !== $three_flag  ) {
		        $font_families = array();
		 
		        if ( 'off' !== $general_flag && $is_custom_primary_font ) {
		            $font_families[] = $primary_font_family.':'.$primary_font_weights_string;
		        }
		 
		        if($font_families != null){
		          $query_args = array(
		              'family' => urlencode( implode( '|', $font_families ) )
		          );  
		          $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		        }
		        
		    }
		 
		    $google_fonts =  esc_url_raw( $fonts_url );

		    /**
			 * Load google font from customize
			 */
			wp_enqueue_style( 'ova-google-fonts', $google_fonts, array(), null );

		}


		function solume_body_classes( $classes ){

            global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
            if ($is_lynx) {
                $classes[] = 'lynx';
            } elseif ($is_gecko) {
                $classes[] = 'gecko';
            } elseif ($is_opera) {
                $classes[] = 'opera';
            } elseif ($is_NS4) {
                $classes[] = 'ns4';
            } elseif ($is_safari) {
                $classes[] = 'safari';
            } elseif ($is_chrome) {
                $classes[] = 'chrome';
            } elseif ($is_IE) {
                $classes[] = 'ie';
            }

            if ($is_iphone) {
                $classes[] = 'iphone';
            }

            // Adds a class to blogs with more than 1 published author.
            if (is_multi_author()) {
                $classes[] = 'group-blog';
            }

            // Add class when using homepage template + featured image.
            if (has_post_thumbnail()) {
                $classes[] = 'has-post-thumbnail';
            }

            

            $classes[] = apply_filters( 'solume_theme_sidebar','' );

            $classes[] = solume_woo_sidebar();

            $wide_site = apply_filters( 'solume_wide_site', '' );
            if( $wide_site == 'boxed' ){
				$classes[] = 'container_boxed';
            }


            return $classes;
        }



		

		function solume_enqueue_scripts() {

		    // enqueue the javascript that performs in-link comment reply fanciness
		    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		        wp_enqueue_script( 'comment-reply' ); 
		    }

		    // Carousel
			wp_enqueue_script('carousel', SOLUME_URI.'/assets/libs/carousel/owl.carousel.min.js', array('jquery'),null,true);
			wp_enqueue_style('carousel', SOLUME_URI.'/assets/libs/carousel/assets/owl.carousel.min.css', array(), null);


		    // Font Icon
		    wp_enqueue_style('ovaicon', SOLUME_URI.'/assets/libs/ovaicon/font/ovaicon.css', array(), null);

		    // Font Icomoon
	    	wp_enqueue_style('ovaicomoon', SOLUME_URI.'/assets/libs/icomoon/style.css', array(), null);

		    wp_enqueue_script('masonry', SOLUME_URI.'/assets/libs/masonry.min.js', array('jquery'),null,true);
		    
		    // Fontawesome
		    wp_enqueue_style('fontawesome', SOLUME_URI.'/assets/libs/fontawesome/css/all.min.css', array(), null);

		    wp_enqueue_script('solume-script', SOLUME_URI.'/assets/js/script.js', array('jquery'),null,true);
		    wp_enqueue_style( 'solume-style', get_template_directory_uri() . '/style.css' );

		    
		}

		

        function solume_enqueue_customize(){

        	$css = '';
           
			$primary_color = get_theme_mod( 'primary_color', '#FE7146' );
			$primary_color_hover = get_theme_mod( 'primary_color_hover', '#C26346' );

			$secondary_color = get_theme_mod( 'secondary_color', '#303360' );
			$secondary_color_hover = get_theme_mod( 'secondary_color_hover', '#1A1D4B' );

			$text_color = get_theme_mod( 'text_color', '#555555' );

			$heading_color = get_theme_mod( 'heading_color', '#00092C' );

			$light_color = get_theme_mod( 'light_color', '#7B7B7B' );

			$border_color = get_theme_mod( 'border_color', '#E9E9E9' );

			$background = get_theme_mod( 'background', '#FAEEED' );

			$secondary_background = get_theme_mod( 'secondary_background', '#F5F5FD' );


			/* Primary Font */
			$default_primary_font = json_decode( solume_default_primary_font() );
			$primary_font = json_decode( get_theme_mod( 'primary_font' ) ) ? json_decode( get_theme_mod( 'primary_font' ) ) : $default_primary_font;
			$primary_font_family = $primary_font->font;

			/* General Typo */
			$general_font_size = get_theme_mod( 'general_font_size', '16px' );
			$general_line_height = get_theme_mod( 'general_line_height', '1.8em' );
			$general_letter_space = get_theme_mod( 'general_letter_space', '0px' );
			
			// Width Sidebar
			$global_layout_sidebar = apply_filters( 'solume_get_layout', '' );
			$width_sidebar = is_array( $global_layout_sidebar ) ? $global_layout_sidebar[1] : '0';

			// Container width
			$container_width = get_theme_mod( 'global_boxed_container_width', '1290' );
			$container_width_break = $container_width + 60;
			$boxed_offset = get_theme_mod( 'global_boxed_offset', '20' );


			// WooCommerce Sidebar
			$woo_archive_layout = get_theme_mod( 'woo_archive_layout', 'layout_1c' );
			$woo_sidebar_width = get_theme_mod( 'woo_sidebar_width', '320' );


            $css .= '--primary: '.$primary_color.';';
            $css .= '--primary-hover: '.$primary_color_hover.';';

            $css .= '--secondary: '.$secondary_color.';';
            $css .= '--secondary-hover: '.$secondary_color_hover.';';

            $css .= '--text: '.$text_color.';';

            $css .= '--heading: '.$heading_color.';';

            $css .= '--light: '.$light_color.';';
            $css .= '--border-color: '.$border_color.';';
            $css .= '--background: '.$background.';';
            $css .= '--secondary-background: '.$secondary_background.';';

            $css .= '--primary-font: '.$primary_font_family.';';
            $css .= '--font-size: '.$general_font_size.';';
            $css .= '--line-height: '.$general_line_height.';';
            $css .= '--letter-spacing: '.$general_letter_space.';';

            $css .= '--width-sidebar: '.$width_sidebar.'px;';
            $css .= '--main-content:  calc( 100% - '.$width_sidebar.'px )'.';';

            $css .= '--container-width: '.$container_width.'px;';

            $css .= '--boxed-offset: '.$boxed_offset.'px;';

            $css .= '--woo-layout: '.$woo_archive_layout.';';
            $css .= '--woo-width-sidebar: '.$woo_sidebar_width.'px;';
            $css .= '--woo-main-content:  calc( 100% - '.$woo_sidebar_width.'px )'.';';
            

            $var = ":root{{$css}}";

            $var .= '@media (min-width: 1024px) and ( max-width: '.$container_width_break.'px ){
		        body .row_site,
		        body .elementor-section.elementor-section-boxed>.elementor-container{
		            max-width: 100%;
		            padding-left: 30px;
		            padding-right: 30px;
		        }
		    }';

            wp_add_inline_style( 'solume-style', $var );

        }

        


	}

}

return new Solume_Main();
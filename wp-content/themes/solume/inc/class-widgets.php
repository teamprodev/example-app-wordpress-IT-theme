<?php if (!defined( 'ABSPATH' )) exit;

if( !class_exists('Solume_Widgets') ){
	
	class Solume_Widgets {

		function __construct(){

			/**
			 * Regsiter Widget
			 */
			add_action( 'widgets_init', array( $this, 'solume_register_widgets' ) );

		}
		

		function solume_register_widgets() {
		  
		  $args_blog = array(
		    'name' => esc_html__( 'Main Sidebar', 'solume'),
		    'id' => "main-sidebar",
		    'description' => esc_html__( 'Main Sidebar', 'solume' ),
		    'class' => '',
		    'before_widget' => '<div id="%1$s" class="widget %2$s">',
		    'after_widget' => "</div>",
		    'before_title' => '<h4 class="widget-title">',
		    'after_title' => "</h4>",
		  );
		  register_sidebar( $args_blog );

		  if( solume_is_woo_active() ){
		    $args_woo = array(
		      'name' => esc_html__( 'WooCommerce Sidebar', 'solume'),
		      'id' => "woo-sidebar",
		      'description' => esc_html__( 'WooCommerce Sidebar', 'solume' ),
		      'class' => '',
		      'before_widget' => '<div id="%1$s" class="widget woo_widget %2$s">',
		      'after_widget' => "</div>",
		      'before_title' => '<h4 class="widget-title">',
		      'after_title' => "</h4>",
		    );
		    register_sidebar( $args_woo );
		  }

		 
		  

		}


	}
}

return new Solume_Widgets();
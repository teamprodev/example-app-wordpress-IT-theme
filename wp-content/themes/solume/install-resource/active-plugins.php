<?php

require_once (SOLUME_URL.'/install-resource/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'solume_register_required_plugins' );


function solume_register_required_plugins() {
   
    $plugins = array(

        array(
            'name'                     => esc_html__('Elementor','solume'),
            'slug'                     => 'elementor',
            'required'                 => true,
        ),
        array(
            'name'                     => esc_html__('CMB2','solume'),
            'slug'                     => 'cmb2',
            'required'                 => true,
        ),
        array(
            'name'                     => esc_html__('Contact Form 7','solume'),
            'slug'                     => 'contact-form-7',
            'required'                 => true,
        ),
        array(
            'name'                     => esc_html__('Widget importer exporter','solume'),
            'slug'                     => 'widget-importer-exporter',
            'required'                 => true,
        ),
        array(
            'name'                     => esc_html__('One click demo import','solume'),
            'slug'                     => 'one-click-demo-import',
            'required'                 => true,
        ),
        array(
            'name'                     => esc_html__('OvaTheme Framework','solume'),
            'slug'                     => 'ova-framework',
            'required'                 => true,
            'source'                   => get_template_directory() . '/install-resource/plugins/ova-framework.zip'
        ),
        array(
            'name'                     => esc_html__('OvaTheme Portfolio','solume'),
            'slug'                     => 'ova-portfolio',
            'required'                 => true,
            'source'                   => get_template_directory() . '/install-resource/plugins/ova-portfolio.zip'
        ),
        array(
            'name'                     => esc_html__('OvaTheme Service','solume'),
            'slug'                     => 'ova-sev',
            'required'                 => true,
            'source'                   => get_template_directory() . '/install-resource/plugins/ova-sev.zip'
        ),
        array(
            'name'                     => esc_html__('Revolution Slider','solume'),
            'slug'                     => 'revslider',
            'required'                 => true,
            'source'                   => get_template_directory() . '/install-resource/plugins/revslider.zip',
            'version'                  => '6.5.24',   
        ),
        array(
            'name'                     => esc_html__('Mailchimp','solume'),
            'slug'                     => 'mailchimp-for-wp',
            'required'                 => true,
        ),
    );

   
    $config = array(
        'id'           => 'solume',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

        
    );

    solume_tgmpa( $plugins, $config );
}

add_action( 'pt-ocdi/after_import', 'solume_after_import_setup' );
function solume_after_import_setup() {
    // Assign menus to their locations.
    $primary = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $primary->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home 1' );
    $blog_page_id  = get_page_by_title( 'Blog' );


    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
    

}


add_filter( 'pt-ocdi/import_files', 'solume_import_files' );
function solume_import_files() {
    return array(
        array(
            'import_file_name'             => 'Demo Import',
            'categories'                   => array( 'Category 1', 'Category 2' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'install-resource/demo-import/demo-content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'install-resource/demo-import/widgets.wie',
            'local_import_customizer_file'   => trailingslashit( get_template_directory() ) . 'install-resource/demo-import/customize.dat',
            // 'import_preview_image_url'     => 'http://demo.ovathemes.com/documentation/demo-import.jpg',
        )
    );
}


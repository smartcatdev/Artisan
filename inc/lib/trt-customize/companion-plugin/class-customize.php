<?php

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Artisan_Customize {

    /**
     * Returns the instance.
     *
     * @since  1.0.0
     * @access public
     * @return object
     */
    public static function get_instance() {
        
        static $instance = null;

        if ( is_null( $instance ) ) {
            $instance = new self;
            $instance->setup_actions();
        }

        return $instance;
    }

    /**
     * Constructor method.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function __construct() {
        
    }

    /**
     * Sets up initial actions.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function setup_actions() {

        // Register panels, sections, settings, controls, and partials.
        add_action( 'customize_register', array ( $this, 'sections' ) );

        // Register scripts and styles for the controls.
        add_action( 'customize_controls_enqueue_scripts', array ( $this, 'enqueue_control_scripts' ), 0 );
    }

    /**
     * Sets up the customizer sections.
     *
     * @since  1.0.0
     * @access public
     * @param  object  $manager
     * @return void
     */
    public function sections( $manager ) {

        // Load custom sections.
        require_once( trailingslashit( get_template_directory() ) . 'inc/lib/trt-customize/companion-plugin/section-pro.php' );

        // Register custom section types.
        $manager->register_section_type( 'Artisan_Customize_Section_Pro' );

        // Register sections.
        $manager->add_section(
            new Artisan_Customize_Section_Pro(
                $manager, 'artisan_companion', array (
                    'title'             => esc_html__( 'Artisan Theme Options & Widgets', 'artisan' ),
                    'install_text'      => esc_html__( 'Activate Options', 'artisan' ),
                    'dismiss_text'      => esc_html__( 'Dismiss', 'artisan' ),
                    'install_url'       => esc_url( artisan_features_install_url() ),
                    'description'       => esc_html__( 'It seems that you have not yet installed the Artisan Features plugin. It is highly recommended to install the plugin. It includes 3 header styles, 3 blog styles, over 140 customization options, one-click install theme-presets and 7 advanced widgets, completely free!', 'artisan' ),
                    'confirm_text'      => esc_html__( 'Are you sure? The theme features & widgets will provide you with tons of customization options', 'artisan' ),
                    'confirm_button'    => esc_html__( 'Confirm', 'artisan' ),
                )
            )
        );
    }

    /**
     * Loads theme customizer CSS.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue_control_scripts() {

        wp_enqueue_script( 'artisan-pro-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/lib/trt-customize/companion-plugin/customize-controls.js', array ( 'customize-controls' ) );
        wp_enqueue_style( 'artisan-pro-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/lib/trt-customize/companion-plugin/customize-controls.css' );
        
        wp_localize_script( 'artisan-pro-customize-controls', 'artisan_customize', array(
            'ajax_url'                  => esc_url( admin_url( 'admin-ajax.php' ) ),
            'artisan_dismiss_nonce'      => wp_create_nonce( 'artisan_dismiss_nonce' )
        ) );
        
    }

}

// remove this when pushing live
//set_theme_mod( ARTISAN_OPTIONS::COMPANION_NOTICE_DISMISSED, false );
// If user has dismissed the notice, do not display it
if( ! get_theme_mod( ARTISAN_OPTIONS::COMPANION_NOTICE_DISMISSED, ARTISAN_DEFAULTS::COMPANION_NOTICE_DISMISSED )
        && !function_exists( 'artisan\init' )) {
    Artisan_Customize::get_instance();
}


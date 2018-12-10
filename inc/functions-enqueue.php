<?php

/**
 * Enqueue scripts and styles.
 */
function artisan_scripts() {
    
    wp_enqueue_style( 'artisan-style', get_stylesheet_uri() );

    // Fonts
    $fonts = artisan_fonts();
    if ( get_theme_mod( ARTISAN_OPTIONS::FONT_PRIMARY, ARTISAN_DEFAULTS::FONT_PRIMARY ) == get_theme_mod( ARTISAN_OPTIONS::FONT_SECONDARY, ARTISAN_DEFAULTS::FONT_SECONDARY ) ) :
        // Fonts are the same, enqueue once
        wp_enqueue_style('artisan-google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( ARTISAN_OPTIONS::FONT_PRIMARY, ARTISAN_DEFAULTS::FONT_PRIMARY ) ] ), array(), ARTISAN_VERSION );
    else :
        // Fonts are different, enqueue together
        wp_enqueue_style('artisan-google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( ARTISAN_OPTIONS::FONT_PRIMARY, ARTISAN_DEFAULTS::FONT_PRIMARY ) ] . '|' . $fonts[ get_theme_mod( ARTISAN_OPTIONS::FONT_SECONDARY, ARTISAN_DEFAULTS::FONT_SECONDARY ) ] ), array(), ARTISAN_VERSION );
    endif;

    // Styles
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/bootstrap.min.css', array(), ARTISAN_VERSION );
    wp_enqueue_style( 'font-awesome-5', get_template_directory_uri() . '/assets/lib/font-awesome/fontawesome-all.min.css', array(), ARTISAN_VERSION );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/lib/animate/animate.css', array(), ARTISAN_VERSION );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/lib/slick/slick.css', null, ARTISAN_VERSION );
    wp_enqueue_style( 'artisan-util', get_template_directory_uri() . '/assets/css/util.css', array(), ARTISAN_VERSION );
    wp_enqueue_style( 'artisan', get_template_directory_uri() . '/assets/css/artisan.css', array(), ARTISAN_VERSION );
    if ( class_exists( 'woocommerce' ) ) :
        wp_enqueue_style( 'artisan-wc', get_template_directory_uri() . '/assets/css/artisan-woocommerce.css', array(), ARTISAN_VERSION );
    endif;
    
    // Scripts
    wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/assets/lib/sticky-js/jquery.sticky.js', array('jquery'), ARTISAN_VERSION, true );
    wp_enqueue_script( 'bootstrap-tabs', get_template_directory_uri() . '/assets/lib/bootstrap/bootstrap.min.js', array('jquery'), ARTISAN_VERSION, true );
    wp_enqueue_script( 'bootstrap-toolkit', get_template_directory_uri() . '/assets/lib/bootstrap-toolkit/bootstrap-toolkit.min.js', array('jquery'), ARTISAN_VERSION, true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/lib/wow/wow.min.js', array( 'jquery' ), ARTISAN_VERSION, true );
    wp_enqueue_script( 'jquery-lettering', get_template_directory_uri() . '/assets/lib/lettering/jquery.lettering.js', array('jquery'), ARTISAN_VERSION, true );
    wp_enqueue_script( 'jquery-textillate', get_template_directory_uri() . '/assets/lib/textillate/jquery.textillate.js', array('jquery','jquery-lettering'), ARTISAN_VERSION, true );
    wp_enqueue_script( 'jquery-easeScroll', get_template_directory_uri() . '/assets/lib/ease-scroll/jquery.easeScroll.js', array('jquery'), ARTISAN_VERSION, true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/lib/slick/slick.min.js', array( 'jquery' ), ARTISAN_VERSION );
    wp_enqueue_script( 'bigSlide', get_template_directory_uri() . '/assets/lib/big-slide/bigSlide.min.js', array('jquery'), ARTISAN_VERSION, true );
    wp_enqueue_script( 'jquery-slimScroll', get_template_directory_uri() . '/assets/lib/slim-scroll/jquery.slimscroll.min.js', array('jquery'), ARTISAN_VERSION, true );
    wp_enqueue_script( 'jquery-parallax', get_template_directory_uri() . '/assets/lib/jquery-parallax/jquery.parallax.js', array('jquery'), ARTISAN_VERSION, false );
    wp_enqueue_script( 'artisan-parallax', get_template_directory_uri() . '/assets/lib/artisan-parallax/parallax.js', array('jquery'), ARTISAN_VERSION, true );
    wp_enqueue_script( 'artisan-general', get_template_directory_uri() . '/assets/js/artisan-general.js', array('jquery', 'wow', 'jquery-textillate', 'jquery-easeScroll', 'slick' ), ARTISAN_VERSION, true );
    wp_enqueue_script( 'artisan-header', get_template_directory_uri() . '/assets/js/artisan-header.js', array('jquery', 'jquery-parallax', 'jquery-sticky', 'bigSlide', 'jquery-slimScroll' ), ARTISAN_VERSION, false );
    wp_enqueue_script( 'artisan-resize', get_template_directory_uri() . '/assets/js/artisan-resize.js', array('jquery', 'masonry', 'bootstrap-toolkit'), ARTISAN_VERSION, true );
    
    // _s
    wp_enqueue_script( 'artisan-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), ARTISAN_VERSION, true );
    wp_enqueue_script( 'artisan-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), ARTISAN_VERSION, true );

    // Localization Data
    $parallax_preset = artisan_get_parallax_preset();
    $artisan_header_JS = array(
        'parallax_image_layer'          => esc_js( $parallax_preset['image_layer'] ),
        'parallax_texture_layer'        => esc_js( $parallax_preset['texture_layer'] ),
        'parallax_color_layer'          => esc_js( $parallax_preset['color_layer'] ),
        'parallax_content_layer'        => esc_js( $parallax_preset['content_layer'] ),
        'vert_state'                    => esc_js( get_theme_mod( ARTISAN_OPTIONS::VERT_NAVBAR_DISPLAY_SETTING, ARTISAN_DEFAULTS::VERT_NAVBAR_DISPLAY_SETTING ) ),
    );
    $artisan_general_JS = array(
        'ease_scroll_toggle'            => get_theme_mod( ARTISAN_OPTIONS::EASE_SCROLL_TOGGLE, ARTISAN_DEFAULTS::EASE_SCROLL_TOGGLE ) ? 'yes' : 'no',
    );
    $artisan_parallax_JS = array(
        'intensity_value'               => intval( artisan_get_parallax_preset('vertical') )
    );
    
    // Localizations
    wp_localize_script( 'artisan-header', 'artisan_local', $artisan_header_JS );
    wp_localize_script( 'artisan-general', 'artisan_local_general', $artisan_general_JS );
    wp_localize_script( 'artisan-parallax', 'artisan_local_parallax', $artisan_parallax_JS );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
}
add_action( 'wp_enqueue_scripts', 'artisan_scripts' );
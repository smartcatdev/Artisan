<?php

/**
 * Enqueue scripts and styles.
 */
function beyrouth_scripts() {
    
    wp_enqueue_style( 'beyrouth-style', get_stylesheet_uri() );

    // Fonts
    $fonts = beyrouth_fonts();
    if ( get_theme_mod( BEYROUTH_OPTIONS::FONT_PRIMARY, BEYROUTH_DEFAULTS::FONT_PRIMARY ) == get_theme_mod( BEYROUTH_OPTIONS::FONT_SECONDARY, BEYROUTH_DEFAULTS::FONT_SECONDARY ) ) :
        // Fonts are the same, enqueue once
        wp_enqueue_style('beyrouth-google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( BEYROUTH_OPTIONS::FONT_PRIMARY, BEYROUTH_DEFAULTS::FONT_PRIMARY ) ] ), array(), BEYROUTH_VERSION );
    else :
        // Fonts are different, enqueue together
        wp_enqueue_style('beyrouth-google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( BEYROUTH_OPTIONS::FONT_PRIMARY, BEYROUTH_DEFAULTS::FONT_PRIMARY ) ] . '|' . $fonts[ get_theme_mod( BEYROUTH_OPTIONS::FONT_SECONDARY, BEYROUTH_DEFAULTS::FONT_SECONDARY ) ] ), array(), BEYROUTH_VERSION );
    endif;

    // Styles
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/bootstrap.min.css', array(), BEYROUTH_VERSION );
    wp_enqueue_style( 'font-awesome-5', get_template_directory_uri() . '/assets/lib/font-awesome/fontawesome-all.min.css', array(), BEYROUTH_VERSION );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/lib/animate/animate.css', array(), BEYROUTH_VERSION );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/lib/slick/slick.css', null, BEYROUTH_VERSION );
    wp_enqueue_style( 'beyrouth-util', get_template_directory_uri() . '/assets/css/util.css', array(), BEYROUTH_VERSION );
    wp_enqueue_style( 'beyrouth', get_template_directory_uri() . '/assets/css/beyrouth.css', array(), BEYROUTH_VERSION );
    if ( class_exists( 'woocommerce' ) ) :
        wp_enqueue_style( 'beyrouth-wc', get_template_directory_uri() . '/assets/css/beyrouth-woocommerce.css', array(), BEYROUTH_VERSION );
    endif;
    
    // Scripts
    wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/assets/lib/sticky-js/jquery.sticky.js', array('jquery'), BEYROUTH_VERSION, true );
    wp_enqueue_script( 'bootstrap-tabs', get_template_directory_uri() . '/assets/lib/bootstrap/bootstrap.min.js', array('jquery'), BEYROUTH_VERSION, true );
    wp_enqueue_script( 'bootstrap-toolkit', get_template_directory_uri() . '/assets/lib/bootstrap-toolkit/bootstrap-toolkit.min.js', array('jquery'), BEYROUTH_VERSION, true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/lib/wow/wow.min.js', array( 'jquery' ), BEYROUTH_VERSION, true );
    wp_enqueue_script( 'jquery-lettering', get_template_directory_uri() . '/assets/lib/lettering/jquery.lettering.js', array('jquery'), BEYROUTH_VERSION, true );
    wp_enqueue_script( 'jquery-textillate', get_template_directory_uri() . '/assets/lib/textillate/jquery.textillate.js', array('jquery','jquery-lettering'), BEYROUTH_VERSION, true );
    wp_enqueue_script( 'jquery-easeScroll', get_template_directory_uri() . '/assets/lib/ease-scroll/jquery.easeScroll.js', array('jquery'), BEYROUTH_VERSION, true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/lib/slick/slick.min.js', array( 'jquery' ), BEYROUTH_VERSION );
    wp_enqueue_script( 'bigSlide', get_template_directory_uri() . '/assets/lib/big-slide/bigSlide.min.js', array('jquery'), BEYROUTH_VERSION, true );
    wp_enqueue_script( 'jquery-slimScroll', get_template_directory_uri() . '/assets/lib/slim-scroll/jquery.slimscroll.min.js', array('jquery'), BEYROUTH_VERSION, true );
    wp_enqueue_script( 'jquery-parallax', get_template_directory_uri() . '/assets/lib/jquery-parallax/jquery.parallax.js', array('jquery'), BEYROUTH_VERSION, false );
    wp_enqueue_script( 'beyrouth-parallax', get_template_directory_uri() . '/assets/lib/beyrouth-parallax/parallax.js', array('jquery'), BEYROUTH_VERSION, true );
    wp_enqueue_script( 'beyrouth-general', get_template_directory_uri() . '/assets/js/beyrouth-general.js', array('jquery', 'wow', 'jquery-textillate', 'jquery-easeScroll', 'slick' ), BEYROUTH_VERSION, true );
    wp_enqueue_script( 'beyrouth-header', get_template_directory_uri() . '/assets/js/beyrouth-header.js', array('jquery', 'jquery-parallax', 'jquery-sticky', 'bigSlide', 'jquery-slimScroll' ), BEYROUTH_VERSION, false );
    wp_enqueue_script( 'beyrouth-resize', get_template_directory_uri() . '/assets/js/beyrouth-resize.js', array('jquery', 'masonry', 'bootstrap-toolkit'), BEYROUTH_VERSION, true );
    
    // _s
    wp_enqueue_script( 'beyrouth-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), BEYROUTH_VERSION, true );
    wp_enqueue_script( 'beyrouth-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), BEYROUTH_VERSION, true );

    // Localization Data
    $parallax_preset = beyrouth_get_parallax_preset();
    $beyrouth_header_JS = array(
        'parallax_image_layer'          => esc_js( $parallax_preset['image_layer'] ),
        'parallax_texture_layer'        => esc_js( $parallax_preset['texture_layer'] ),
        'parallax_color_layer'          => esc_js( $parallax_preset['color_layer'] ),
        'parallax_content_layer'        => esc_js( $parallax_preset['content_layer'] ),
        'vert_state'                    => esc_js( get_theme_mod( BEYROUTH_OPTIONS::VERT_NAVBAR_DISPLAY_SETTING, BEYROUTH_DEFAULTS::VERT_NAVBAR_DISPLAY_SETTING ) ),
    );
    $beyrouth_general_JS = array(
        'ease_scroll_toggle'            => get_theme_mod( BEYROUTH_OPTIONS::EASE_SCROLL_TOGGLE, BEYROUTH_DEFAULTS::EASE_SCROLL_TOGGLE ) ? 'yes' : 'no',
    );
    $beyrouth_parallax_JS = array(
        'intensity_value'               => intval( beyrouth_get_parallax_preset('vertical') )
    );
    
    // Localizations
    wp_localize_script( 'beyrouth-header', 'beyrouth_local', $beyrouth_header_JS );
    wp_localize_script( 'beyrouth-general', 'beyrouth_local_general', $beyrouth_general_JS );
    wp_localize_script( 'beyrouth-parallax', 'beyrouth_local_parallax', $beyrouth_parallax_JS );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
}
add_action( 'wp_enqueue_scripts', 'beyrouth_scripts' );
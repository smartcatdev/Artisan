<?php

/**
 * Enqueue scripts and styles.
 */
function zenith_scripts() {
    
    wp_enqueue_style( 'zenith-style', get_stylesheet_uri() );

    // Fonts
    $fonts = zenith_fonts();
    if ( get_theme_mod( ZENITH_OPTIONS::FONT_PRIMARY, ZENITH_DEFAULTS::FONT_PRIMARY ) == get_theme_mod( ZENITH_OPTIONS::FONT_SECONDARY, ZENITH_DEFAULTS::FONT_SECONDARY ) ) :
        // Fonts are the same, enqueue once
        wp_enqueue_style('zenith-google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( ZENITH_OPTIONS::FONT_PRIMARY, ZENITH_DEFAULTS::FONT_PRIMARY ) ] ), array(), ZENITH_VERSION ); 
    else :
        // Fonts are different, enqueue together
        wp_enqueue_style('zenith-google-fonts', '//fonts.googleapis.com/css?family=' . esc_attr( $fonts[ get_theme_mod( ZENITH_OPTIONS::FONT_PRIMARY, ZENITH_DEFAULTS::FONT_PRIMARY ) ] . '|' . $fonts[ get_theme_mod( ZENITH_OPTIONS::FONT_SECONDARY, ZENITH_DEFAULTS::FONT_SECONDARY ) ] ), array(), ZENITH_VERSION ); 
    endif;

    // Styles
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/bootstrap.min.css', array(), ZENITH_VERSION );
    wp_enqueue_style( 'font-awesome-5', get_template_directory_uri() . '/assets/lib/font-awesome/fontawesome-all.min.css', array(), ZENITH_VERSION );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/lib/animate/animate.css', array(), ZENITH_VERSION );
    wp_enqueue_style( 'zenith-util', get_template_directory_uri() . '/assets/css/util.css', array(), ZENITH_VERSION );
    wp_enqueue_style( 'zenith', get_template_directory_uri() . '/assets/css/zenith.css', array(), ZENITH_VERSION );
    if ( class_exists( 'woocommerce' ) ) :
        wp_enqueue_style( 'zenith-wc', get_template_directory_uri() . '/assets/css/zenith-woocommerce.css', array(), ZENITH_VERSION );
    endif;
    
    // Scripts
    wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/assets/lib/sticky-js/jquery.sticky.js', array('jquery'), ZENITH_VERSION, true );
    wp_enqueue_script( 'bootstrap-tabs', get_template_directory_uri() . '/assets/lib/bootstrap/bootstrap.min.js', array('jquery'), ZENITH_VERSION, true );
    wp_enqueue_script( 'bootstrap-toolkit', get_template_directory_uri() . '/assets/lib/bootstrap-toolkit/bootstrap-toolkit.min.js', array('jquery'), ZENITH_VERSION, true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/lib/wow/wow.min.js', array( 'jquery' ), ZENITH_VERSION, true );
    wp_enqueue_script( 'jquery-lettering', get_template_directory_uri() . '/assets/lib/lettering/jquery.lettering.js', array('jquery'), ZENITH_VERSION, true );
    wp_enqueue_script( 'jquery-textillate', get_template_directory_uri() . '/assets/lib/textillate/jquery.textillate.js', array('jquery','jquery-lettering'), ZENITH_VERSION, true );
    wp_enqueue_script( 'jquery-easeScroll', get_template_directory_uri() . '/assets/lib/ease-scroll/jquery.easeScroll.js', array('jquery'), ZENITH_VERSION, true );
    wp_enqueue_script( 'bigSlide', get_template_directory_uri() . '/assets/lib/big-slide/bigSlide.min.js', array('jquery'), ZENITH_VERSION, true );
    wp_enqueue_script( 'jquery-slimScroll', get_template_directory_uri() . '/assets/lib/slim-scroll/jquery.slimscroll.min.js', array('jquery'), ZENITH_VERSION, true );
    wp_enqueue_script( 'jquery-parallax', get_template_directory_uri() . '/assets/lib/jquery-parallax/jquery.parallax.js', array('jquery'), ZENITH_VERSION, false );
    wp_enqueue_script( 'zenith-parallax', get_template_directory_uri() . '/assets/lib/zenith-parallax/parallax.js', array('jquery'), ZENITH_VERSION, true );
    wp_enqueue_script( 'zenith-general', get_template_directory_uri() . '/assets/js/zenith-general.js', array('jquery', 'wow', 'jquery-textillate'), ZENITH_VERSION, true );
    wp_enqueue_script( 'zenith-header', get_template_directory_uri() . '/assets/js/zenith-header.js', array('jquery'), ZENITH_VERSION, false );
    wp_enqueue_script( 'zenith-resize', get_template_directory_uri() . '/assets/js/zenith-resize.js', array('jquery','masonry'), ZENITH_VERSION, true );
    
    // _s
    wp_enqueue_script( 'zenith-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), ZENITH_VERSION, true );
    wp_enqueue_script( 'zenith-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), ZENITH_VERSION, true );

    // Localization Data
    $parallax_preset = zenith_get_parallax_preset();
    $zenith_header_JS = array(
        'parallax_image_layer'          => $parallax_preset['image_layer'],
        'parallax_texture_layer'        => $parallax_preset['texture_layer'],
        'parallax_color_layer'          => $parallax_preset['color_layer'],
        'parallax_content_layer'        => $parallax_preset['content_layer'],
        'vert_state'                    => get_theme_mod( ZENITH_OPTIONS::VERT_NAVBAR_DISPLAY_SETTING, ZENITH_DEFAULTS::VERT_NAVBAR_DISPLAY_SETTING ),
    );
    $zenith_general_JS = array(
        'ease_scroll_toggle'            => get_theme_mod( ZENITH_OPTIONS::EASE_SCROLL_TOGGLE, ZENITH_DEFAULTS::EASE_SCROLL_TOGGLE ) ? 'yes' : 'no',
    );
    $zenith_parallax_JS = array(
        'intensity_value'   => zenith_get_parallax_preset('vertical')
    );
    
    // Localizations
    wp_localize_script( 'zenith-header', 'zenith_local', $zenith_header_JS );
    wp_localize_script( 'zenith-general', 'zenith_local_general', $zenith_general_JS );
    wp_localize_script( 'zenith-parallax', 'zenith_local_parallax', $zenith_parallax_JS );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
}
add_action( 'wp_enqueue_scripts', 'zenith_scripts' );
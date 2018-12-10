<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
  <?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Artisan
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses artisan_header_style()
 */
function artisan_custom_header_setup() {

    add_theme_support( 'custom-header', apply_filters( 'artisan_custom_header_args', array (
        'default-image'     => get_template_directory_uri() . '/assets/images/header-demo_1.jpg',
        'header-text'       => false,
        'flex-height'       => true,
        'flex-width'        => true,
        'uploads'           => true,
        'width'             => 1200,
        'height'            => 700,
        'random-default'    => true,
    ) ) );
    
    register_default_headers( array(
        'woman' => array(
            'url'           => get_template_directory_uri() . '/assets/images/header-demo_1.jpg',
            'thumbnail_url' => get_template_directory_uri() . '/assets/images/header-demo_1.jpg',
            'description'   => __( 'Woman and Reflection', 'artisan' )
        ), 
        'architecture' => array(
            'url'           => get_template_directory_uri() . '/assets/images/header-demo_2.jpg',
            'thumbnail_url' => get_template_directory_uri() . '/assets/images/header-demo_2.jpg',
            'description'   => __( 'Architecture', 'artisan' )
        ), 
    ) );
    
}
add_action( 'after_setup_theme', 'artisan_custom_header_setup' );

/**
 * Creates header using images from Custom Header
 * @param string $details Extra info to print into header
 */
add_action( 'artisan_custom_header', 'artisan_render_custom_header' );
function artisan_render_custom_header() {

    if( is_page_template( 'templates/page-widget_shell.php' ) ) {
        return;
    }
    
    if ( has_header_image() ) :
        
        if ( 
            ( is_singular( 'post' )       && get_theme_mod( ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_ON_POSTS, ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_ON_POSTS ) ) ||
            ( is_page()         && !is_front_page() && get_theme_mod( ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_ON_PAGES, ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_ON_PAGES ) ) ||
            ( is_front_page()   && !is_home() && get_theme_mod( ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_ON_FRONT, ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_ON_FRONT ) ) ||
            ( is_home()         && get_theme_mod( ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_ON_BLOG, ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_ON_BLOG ) ) ||
            ( is_archive()      && !is_author() && !is_post_type_archive( 'download' ) && ( !class_exists('woocommerce') || ( class_exists( 'woocommerce' ) && !is_shop() ) ) && get_theme_mod( ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_ON_ARCHIVE, ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_ON_ARCHIVE ) ) ||
            ( class_exists( 'woocommerce' ) && is_shop() && get_theme_mod( ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_ON_SHOP, ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_ON_SHOP ) ) ||
            ( is_post_type_archive( 'download' ) && get_theme_mod( ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_ON_SHOP, ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_ON_SHOP ) )
                
        ) :
        
            get_template_part( 'template-parts/custom-header', get_theme_mod( ARTISAN_OPTIONS::CUSTOM_HEADER_STYLE_TOGGLE, ARTISAN_DEFAULTS::CUSTOM_HEADER_STYLE_TOGGLE ) );
            
        endif;
        
    endif;
    
}

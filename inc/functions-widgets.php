<?php

// Register sidebars
add_action( 'widgets_init', 'artisan_widgets_init' );


/**
 * Register widget area.
 *
 */
function artisan_widgets_init() {

    if ( get_theme_mod( ARTISAN_OPTIONS::NAVBAR_STYLE, ARTISAN_DEFAULTS::NAVBAR_STYLE ) != 'vertical' ) {
     
        register_sidebar( array (
            'name'              => esc_html__( 'Footer', 'artisan' ),
            'id'                => 'sidebar-footer',
            'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
            'before_widget'     => '<aside id="%1$s" class="' . 'col-sm-' . esc_attr( 12 / get_theme_mod( ARTISAN_OPTIONS::FOOTER_NUM_WIDGET_COLS, ARTISAN_DEFAULTS::FOOTER_NUM_WIDGET_COLS ) ) . ' widget %2$s">',
            'after_widget'      => '</aside>',
            'before_title'      => '<h2 class="widget-title">',
            'after_title'       => '</h2>',
        ));
        
    }
    
    register_sidebar( array (
        'name'              => esc_html__( 'Frontpage - Below Content', 'artisan' ),
        'id'                => 'sidebar-front-below',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    register_sidebar( array (
        'name'              => esc_html__( 'Frontpage - Above Content', 'artisan' ),
        'id'                => 'sidebar-front-above',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 

    register_sidebar( array (
        'name'              => esc_html__( 'Blog - Above Content', 'artisan' ),
        'id'                => 'sidebar-blog-above',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Blog - Below Content', 'artisan' ),
        'id'                => 'sidebar-blog-below',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Post - Above Content', 'artisan' ),
        'id'                => 'sidebar-post-above',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Post - Below Content', 'artisan' ),
        'id'                => 'sidebar-post-below',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page - Above Content', 'artisan' ),
        'id'                => 'sidebar-page-above',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page - Below Content', 'artisan' ),
        'id'                => 'sidebar-page-below',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page Template A - Above Content', 'artisan' ),
        'id'                => 'sidebar-page-a-above',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page Template A - Below Content', 'artisan' ),
        'id'                => 'sidebar-page-a-below',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    register_sidebar( array (
        'name'              => esc_html__( 'Shop - Above Content', 'artisan' ),
        'id'                => 'sidebar-shop-above',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Shop - Below Content', 'artisan' ),
        'id'                => 'sidebar-shop-below',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Shop', 'artisan' ),
        'id'                => 'sidebar-shop',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Sidebar A', 'artisan' ),
        'id'                => 'sidebar-side-a',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Sidebar B', 'artisan' ),
        'id'                => 'sidebar-side-b',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Sidebar C', 'artisan' ),
        'id'                => 'sidebar-side-c',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Blog & Archive', 'artisan' ),
        'id'                => 'sidebar-blog-side',
        'description'       => esc_html__( 'Add widgets here.', 'artisan' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
}

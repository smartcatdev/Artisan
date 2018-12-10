<?php

// Register sidebars
add_action( 'widgets_init', 'zenith_widgets_init' );


/**
 * Register widget area.
 *
 */
function zenith_widgets_init() {

    if ( get_theme_mod( ZENITH_OPTIONS::NAVBAR_STYLE, ZENITH_DEFAULTS::NAVBAR_STYLE ) != 'vertical' ) {
     
        register_sidebar( array (
            'name'              => esc_html__( 'Footer', 'zenith' ),
            'id'                => 'sidebar-footer',
            'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
            'before_widget'     => '<aside id="%1$s" class="' . 'col-sm-' . esc_attr( 12 / get_theme_mod( ZENITH_OPTIONS::FOOTER_NUM_WIDGET_COLS, ZENITH_DEFAULTS::FOOTER_NUM_WIDGET_COLS ) ) . ' widget %2$s">',
            'after_widget'      => '</aside>',
            'before_title'      => '<h2 class="widget-title">',
            'after_title'       => '</h2>',
        ));
        
    }
    
    register_sidebar( array (
        'name'              => esc_html__( 'Frontpage - Below Content', 'zenith' ),
        'id'                => 'sidebar-front-below',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    register_sidebar( array (
        'name'              => esc_html__( 'Frontpage - Above Content', 'zenith' ),
        'id'                => 'sidebar-front-above',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 

    register_sidebar( array (
        'name'              => esc_html__( 'Blog - Above Content', 'zenith' ),
        'id'                => 'sidebar-blog-above',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Blog - Below Content', 'zenith' ),
        'id'                => 'sidebar-blog-below',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Post - Above Content', 'zenith' ),
        'id'                => 'sidebar-post-above',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Post - Below Content', 'zenith' ),
        'id'                => 'sidebar-post-below',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page - Above Content', 'zenith' ),
        'id'                => 'sidebar-page-above',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page - Below Content', 'zenith' ),
        'id'                => 'sidebar-page-below',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page Template A - Above Content', 'zenith' ),
        'id'                => 'sidebar-page-a-above',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page Template A - Below Content', 'zenith' ),
        'id'                => 'sidebar-page-a-below',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    register_sidebar( array (
        'name'              => esc_html__( 'Shop - Above Content', 'zenith' ),
        'id'                => 'sidebar-shop-above',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Shop - Below Content', 'zenith' ),
        'id'                => 'sidebar-shop-below',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Shop', 'zenith' ),
        'id'                => 'sidebar-shop',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Sidebar A', 'zenith' ),
        'id'                => 'sidebar-side-a',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Sidebar B', 'zenith' ),
        'id'                => 'sidebar-side-b',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Sidebar C', 'zenith' ),
        'id'                => 'sidebar-side-c',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Blog & Archive', 'zenith' ),
        'id'                => 'sidebar-blog-side',
        'description'       => esc_html__( 'Add widgets here.', 'zenith' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
}

<?php

// Register sidebars
add_action( 'widgets_init', 'beyrouth_widgets_init' );


/**
 * Register widget area.
 *
 */
function beyrouth_widgets_init() {

    if ( get_theme_mod( BEYROUTH_OPTIONS::NAVBAR_STYLE, BEYROUTH_DEFAULTS::NAVBAR_STYLE ) != 'vertical' ) {
     
        register_sidebar( array (
            'name'              => esc_html__( 'Footer', 'beyrouth' ),
            'id'                => 'sidebar-footer',
            'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
            'before_widget'     => '<aside id="%1$s" class="' . 'col-sm-' . esc_attr( 12 / get_theme_mod( BEYROUTH_OPTIONS::FOOTER_NUM_WIDGET_COLS, BEYROUTH_DEFAULTS::FOOTER_NUM_WIDGET_COLS ) ) . ' widget %2$s">',
            'after_widget'      => '</aside>',
            'before_title'      => '<h2 class="widget-title">',
            'after_title'       => '</h2>',
        ));
        
    }

    register_sidebar( array (
        'name'              => esc_html__( 'Frontpage - Above Content', 'beyrouth' ),
        'id'                => 'sidebar-front-above',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Frontpage - Below Content', 'beyrouth' ),
        'id'                => 'sidebar-front-below',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));


    register_sidebar( array (
        'name'              => esc_html__( 'Blog - Above Content', 'beyrouth' ),
        'id'                => 'sidebar-blog-above',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Blog - Below Content', 'beyrouth' ),
        'id'                => 'sidebar-blog-below',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Post - Above Content', 'beyrouth' ),
        'id'                => 'sidebar-post-above',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Post - Below Content', 'beyrouth' ),
        'id'                => 'sidebar-post-below',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page - Above Content', 'beyrouth' ),
        'id'                => 'sidebar-page-above',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page - Below Content', 'beyrouth' ),
        'id'                => 'sidebar-page-below',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page Template A - Above Content', 'beyrouth' ),
        'id'                => 'sidebar-page-a-above',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Page Template A - Below Content', 'beyrouth' ),
        'id'                => 'sidebar-page-a-below',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
    register_sidebar( array (
        'name'              => esc_html__( 'Shop - Above Content', 'beyrouth' ),
        'id'                => 'sidebar-shop-above',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    )); 
    
    register_sidebar( array (
        'name'              => esc_html__( 'Shop - Below Content', 'beyrouth' ),
        'id'                => 'sidebar-shop-below',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Shop', 'beyrouth' ),
        'id'                => 'sidebar-shop',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Sidebar A', 'beyrouth' ),
        'id'                => 'sidebar-side-a',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Sidebar B', 'beyrouth' ),
        'id'                => 'sidebar-side-b',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Sidebar C', 'beyrouth' ),
        'id'                => 'sidebar-side-c',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));

    register_sidebar( array (
        'name'              => esc_html__( 'Blog & Archive', 'beyrouth' ),
        'id'                => 'sidebar-blog-side',
        'description'       => esc_html__( 'Add widgets here.', 'beyrouth' ),
        'before_widget'     => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      => '<h2 class="widget-title">',
        'after_title'       => '</h2>',
    ));
    
}

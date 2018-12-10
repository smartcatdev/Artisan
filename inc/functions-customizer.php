<?php

/**
 * Artisan Theme Customizer
 *
 * @package Artisan
 */
if ( !class_exists( 'AcidConfig' ) ) { include_once get_template_directory() . '/inc/lib/Acid/acid.php'; }

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function artisan_customize_register( $wp_customize ) {
    
    $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
    
    
    // Housekeeping ------------------------------------------------------------
    $wp_customize->get_section( 'header_image' )->panel = 'panel_custom_header';
    $wp_customize->get_section( 'title_tagline' )->title = __( 'General Settings', 'artisan' );
    $wp_customize->get_section( 'title_tagline' )->panel = 'panel_title_tagline';
    // End Housekeeping --------------------------------------------------------
    
    
    // Priority ----------------------------------------------------------------
    $wp_customize->get_section( 'title_tagline' )->priority = 1;
    $wp_customize->get_panel( 'panel_title_tagline' )->priority = 1;
    $wp_customize->get_panel( 'panel_navbar' )->priority = 2;
    $wp_customize->get_panel( 'panel_custom_header' )->priority = 3;
    $wp_customize->get_panel( 'panel_blog' )->priority = 4;
    $wp_customize->get_panel( 'panel_appearance' )->priority = 5;
    // End Priority ------------------------------------------------------------
    
    // Selective Refresh -------------------------------------------------------
    if ( isset( $wp_customize->selective_refresh ) ) {
        
        $wp_customize->selective_refresh->add_partial( 'blogname', array (
            'selector' => '.site-title a',
            'render_callback' => 'artisan_customize_partial_blogname',
        ) );
        
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array (
            'selector' => '.site-description',
            'render_callback' => 'artisan_customize_partial_blogdescription',
        ) );
        
        $wp_customize->selective_refresh->add_partial( ARTISAN_OPTIONS::NAVBAR_SHOW_SOCIAL, array(
            'selector'  => '.navbar-social'
        ) );
        
        $wp_customize->selective_refresh->add_partial( ARTISAN_OPTIONS::CUSTOM_HEADER_STYLE_TOGGLE, array(
            'selector'  => '#custom-header-content'
        ) );
        
        $wp_customize->selective_refresh->add_partial( ARTISAN_OPTIONS::BLOG_SHOW_DATE, array(
            'selector'  => '.masonry_card_blog .post-date'
        ) );
        
        $wp_customize->selective_refresh->add_partial( ARTISAN_OPTIONS::BLOG_CARD_FONT_SIZE_DSK, array(
            'selector'  => '.masonry_card_blog .entry-title'
        ) );
        
        $wp_customize->selective_refresh->add_partial( ARTISAN_OPTIONS::BLOG_SHOW_COMMENT_COUNT, array(
            'selector'  => '.masonry_card_blog .meta-stats'
        ) );
        
    }
    // End Selective Refresh ---------------------------------------------------
}

add_action( 'customize_register', 'artisan_customize_register', 99 );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function artisan_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function artisan_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function artisan_customize_preview_js() {
    wp_enqueue_style( 'artisan-customizer-preview-style', get_template_directory_uri() . '/assets/admin/css/customizer-preview.css', ARTISAN_VERSION, null );
    wp_enqueue_script( 'artisan-customizer-preview-script', get_template_directory_uri() . '/assets/admin/js/customizer-preview.js', array ( 'jquery', 'customize-preview' ), ARTISAN_VERSION, true );
}
add_action( 'customize_preview_init', 'artisan_customize_preview_js' );


function artisan_customize_controls_js() {
    wp_enqueue_script( 'artisan-customizer-control', get_template_directory_uri() . '/assets/admin/js/customizer-control.js', array ( 'jquery', 'customize-controls' ), ARTISAN_VERSION, true );
    wp_enqueue_style( 'artisan-customizer-style', get_template_directory_uri() . '/assets/admin/css/customizer-alt.css', ARTISAN_VERSION, null );
}
add_action( 'customize_controls_enqueue_scripts', 'artisan_customize_controls_js' );


$acid = acid_instance( get_template_directory_uri() . '/inc/lib/' );

$data = array (
    
    'sections'  => array(
        
        'static_front_page'  => array(
            
            'title'         => __( 'Homepage Settings', 'artisan' ),
            'desciption'    => __( 'You can choose what\'s displayed on the homepage of your site. It can be posts in reverse chronological order (classic blog), or a fixed/static page. To set a static homepage, you first need to create two Pages. One will become the homepage, and the other will be where your posts are displayed.', 'artisan' ),
            'options'       => array(
                
                ARTISAN_OPTIONS::HOMEPAGE_SHOW_CONTENT => array (
                    'type'          => 'toggle',
                    'label'         => __( 'Show the Frontpage Content?', 'artisan' ),
                    'description'   => __( 'While this is on, the content of the page set as the static Homepage will be visible', 'artisan' ),
                    'default'       => ARTISAN_DEFAULTS::HOMEPAGE_SHOW_CONTENT,
                ),
                
            ),
            
        ),
        
    ),

    'panels' => array (

        // Panel: Site Title & Logo --------------------------------------------
        'panel_title_tagline' => array (

            'title'         => __( 'Site Title & Logo', 'artisan' ),
            'sections'      => array (
                
                // Section : Site Title & Logo: Advanced -----------------------
                'section_title_tagline' => array (

                    'title' => __( 'Advanced Settings', 'artisan' ),
                    'options' => array (
                        
                        ARTISAN_OPTIONS::NAVBAR_BRANDING_WHAT_TO_SHOW => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Navbar Branding', 'artisan' ),
                            'description'   => __( 'Set whether the Navbar shows Site Title & Tagline or the custom Logo (if one is set).', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_BRANDING_WHAT_TO_SHOW,
                            'choices'   => array (
                                'title_tagline'     => __( 'Title & Tagline', 'artisan' ),
                                'logo'              => __( 'Logo', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::NAVBAR_ALWAYS_SHOW_LOGO => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Logo - Always Visible?', 'artisan' ),
                            'description'   => __( 'If on, the logo will be visible even when Slim Navbar is collapsed / unstuck', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_ALWAYS_SHOW_LOGO,
                        ),
                        ARTISAN_OPTIONS::NAVBAR_LOGO_HORIZONTAL_PADDING => array (
                            'type'          => 'number',
                            'label'         => __( 'Logo - Horizontal Padding', 'artisan' ),
                            'description'   => __( 'Set the space (in pixels) between menu links and the logo', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_LOGO_HORIZONTAL_PADDING
                        ),
                        ARTISAN_OPTIONS::NAVBAR_LOGO_HEIGHT_DSK => array (
                            'type'          => 'number',
                            'label'         => __( 'Logo - Height (Desktop)', 'artisan' ),
                            'description'   => __( 'Set the logo height for the desktop Navbar', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_LOGO_HEIGHT_DSK
                        ),
                        ARTISAN_OPTIONS::NAVBAR_LOGO_HEIGHT_MBL => array (
                            'type'          => 'number',
                            'label'         => __( 'Logo - Height (Mobile)', 'artisan' ),
                            'description'   => __( 'Set the logo height for the mobile Navbar', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_LOGO_HEIGHT_MBL
                        ),
                        ARTISAN_OPTIONS::NAVBAR_SITE_TITLE_FONT_FAMILY => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Site Title - Font Family', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_SITE_TITLE_FONT_FAMILY,
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'artisan' ),
                                'secondary' => __( 'Use Secondary Font', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::NAVBAR_SITE_TITLE_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Site Title - Font Size', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_SITE_TITLE_FONT_SIZE
                        ),
                        ARTISAN_OPTIONS::NAVBAR_SITE_TITLE_LETTER_GAP => array(
                            'type'          => 'select',
                            'label'         => __( 'Site Title - Letter Spacing', 'artisan' ),
                            'description'   => __( 'Set the scaling "em" value. Can be positive or negative. 0 for normal spacing.', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_SITE_TITLE_LETTER_GAP,
                            'choices'   => array (
                                '-.1'       => __( '-.100em (Narrowest)', 'artisan' ),
                                '-.075'     => __( '-.075em', 'artisan' ),
                                '-.050'     => __( '-.050em', 'artisan' ),
                                '-.025'     => __( '-.025em', 'artisan' ),
                                '0.0'       => __( '0.00em (Default)', 'artisan' ),
                                '.025'      => __( '.025em', 'artisan' ),
                                '.050'      => __( '.050em', 'artisan' ),
                                '.075'      => __( '.075em', 'artisan' ),
                                '.100'      => __( '.100em', 'artisan' ),
                                '.250'      => __( '.250em', 'artisan' ),
                                '.500'      => __( '.500em (Widest)', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::NAVBAR_SITE_TITLE_ALL_CAPS => array(
                            'type'          => 'toggle',
                            'label'         => __( 'Site Title - All Uppercase?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_SITE_TITLE_ALL_CAPS
                        ),
                        ARTISAN_OPTIONS::NAVBAR_HIDE_TAGLINE => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Hide Site Tagline?', 'artisan' ),
                            'description'   => __( 'Both the Title & Tagline show by default when no logo is chosen', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_HIDE_TAGLINE,
                        ),
                        ARTISAN_OPTIONS::NAVBAR_TAGLINE_FONT_FAMILY => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Site Tagline - Font Family', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_TAGLINE_FONT_FAMILY,
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'artisan' ),
                                'secondary' => __( 'Use Secondary Font', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::NAVBAR_TAGLINE_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Site Tagline - Font Size', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_TAGLINE_FONT_SIZE
                        ),
                        
                    )

                ),
                
            ), // End of Site Identity

        ), // End of Site Identity Panel
            
            
        // Panel: Custom Header ------------------------------------------------
        'panel_custom_header' => array (

            'title'         => __( 'Header', 'artisan' ),
            'desciption'    => __( 'Customize the header banner on your site', 'artisan' ),
            'sections'      => array (

                // Section : Custom Header Settings ----------------------------
                'section_custom_header_general' => array (

                    'title' => __( 'General Settings', 'artisan' ),
                    'options' => array (
                        // Style
                        ARTISAN_OPTIONS::CUSTOM_HEADER_STYLE_TOGGLE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Header - Style', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_STYLE_TOGGLE,
                            'choices'   => array (
                                'social'                => __( 'Parallax - Social', 'artisan' ),
                                'parallax_vertical'     => __( 'Parallax - Vertical Scroll', 'artisan' ),
                                'parallax_layers'       => __( 'Parallax - Perspective Layers', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_HEIGHT_CALC => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Height Calculation', 'artisan' ),
                            'description'   => __( 'This allows you to choose between using % values or fixed pixel values for setting the header height', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_HEIGHT_CALC,
                            'choices'   => array (
                                'percent'   => __( 'Use % of browser height', 'artisan' ),
                                'fixed'     => __( 'Use a fixed pixel value', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_HEIGHT_PCT => array (
                            'type'          => 'number',
                            'label'         => __( 'Height (%)', 'artisan' ),
                            'description'   => __( 'Setting this to 100 will match the Header height to the browser window on both Desktop and Mobile devices.', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_HEIGHT_PCT,
                            'min'           => 25,
                            'max'           => 100,
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_HEIGHT_PCT_MBL => array (
                            'type'          => 'number',
                            'label'         => __( 'Height for Mobile (%)', 'artisan' ),
                            'description'   => __( 'When viewed on screens less than 992px wide', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_HEIGHT_PCT_MBL,
                            'max'           => 100,
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_HEIGHT_PX => array (
                            'type'          => 'number',
                            'label'         => __( 'Height (px)', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_HEIGHT_PX,
                            'min'           => 250,
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_HEIGHT_PX_MBL => array (
                            'type'          => 'number',
                            'label'         => __( 'Height for Mobile (px)', 'artisan' ),
                            'description'   => __( 'When viewed on screens less than 992px wide', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_HEIGHT_PX_MBL,
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_PLX_INTENSITY => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Parallax Effect - Intensity', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_PLX_INTENSITY,
                            'choices'   => array (
                                'subtle'            => __( 'Subtle', 'artisan' ),
                                'default'           => __( 'Medium (Default)', 'artisan' ),
                                'high'              => __( 'High', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_TEXTURE_IMG => array (
                            'type'          => 'image',
                            'label'         => __( 'Perspective Layers - Transparent Pattern', 'artisan' ),
                            'description'   => __( 'https://www.transparenttextures.com', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_TEXTURE_IMG,
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_TEXTURE_OPAC => array (
                            'type'          => 'decimal',
                            'label'         => __( 'Perspective Layers - Pattern (Opacity)', 'artisan' ),
                            'description'   => __( '0.0 for transparent, up to 1.0 for solid/opaque', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_TEXTURE_OPAC,
                        ),
                        ARTISAN_OPTIONS::SOCIAL_HEADER_ALIGNMENT => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Parallax Social - Content Alignment', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::SOCIAL_HEADER_ALIGNMENT,
                            'choices'   => array (
                                'flex-start'        => __( 'Left Side', 'artisan' ),
                                'center'            => __( 'Centered', 'artisan' ),
                                'flex-end'          => __( 'Right Side', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::SOCIAL_HEADER_SHOW_SOCIAL => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Parallax Social - Show Social Icons?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::SOCIAL_HEADER_SHOW_SOCIAL,
                        ),
                        ARTISAN_OPTIONS::SOCIAL_HEADER_SHOW_SCROLL_TAB => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Parallax Social - Show Scroll Tab?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::SOCIAL_HEADER_SHOW_SCROLL_TAB,
                        ),
                        
                    )

                ),
                
                // Section : Custom Header Locations ----------------------------
                'section_custom_header' => array (

                    'title' => __( 'Display Locations', 'artisan' ),
                    'options' => array (
                        
                        ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_ON_POSTS => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Include on Posts?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_ON_POSTS,
                        ),
                        
                        ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_ON_PAGES => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Include on Pages?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_ON_PAGES,
                        ),
                        
                        ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_ON_FRONT => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Include on the Front Page?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_ON_FRONT,
                        ),
                        
                        ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_ON_BLOG => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Include on the Blog?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_ON_BLOG,
                        ),
                        
                        ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_ON_ARCHIVE => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Include on Archive Pages?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_ON_ARCHIVE,
                        ),
                        
                        ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_ON_SHOP => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Include on the Shop Page?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_ON_SHOP,
                        ),
                        
                    )

                ),

                // Section : Custom Header - Logo Settings ---------------------
                'section_custom_header_logo' => array (

                    'title' => __( 'Content', 'artisan' ),
                    'options' => array (

                        // Logo
                        ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_LOGO => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Display the Site Logo?', 'artisan' ),
                            'description'   => __( 'If on, the Custom Logo for the site will be displayed', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_LOGO,
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_LOGO_HEIGHT => array (
                            'type'          => 'number',
                            'label'         => __( 'Height of Logo (px)', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_LOGO_HEIGHT,
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_LOGO_HEIGHT_MBL => array (
                            'type'          => 'number',
                            'label'         => __( 'Height of Logo for Mobile (px)', 'artisan' ),
                            'description'   => __( 'When viewed on screens less than 992px wide', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_LOGO_HEIGHT_MBL,
                        ),
                        
                        // Main Heading
                        ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_TITLE => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Display the Main Heading?', 'artisan' ),
                            'description'   => __( 'If on, the primary content heading will be displayed', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_TITLE
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_TITLE_CONTENT => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'What to Display?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_TITLE_CONTENT,
                            'choices'   => array (
                                'site_title'        => __( 'Site Title', 'artisan' ),
                                'site_description'  => __( 'Site Description', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_TITLE_FONT_FAMILY => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Font Family', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_TITLE_FONT_FAMILY,
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'artisan' ),
                                'secondary' => __( 'Use Secondary Font', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_TITLE_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Font Size', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_TITLE_FONT_SIZE
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_TITLE_LETTER_GAP => array (
                            'type'          => 'select',
                            'label'         => __( 'Letter Spacing', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_TITLE_LETTER_GAP,
                            'choices'   => array (
                                '-.1'       => __( '-.100em (Narrowest)', 'artisan' ),
                                '-.075'     => __( '-.075em', 'artisan' ),
                                '-.050'     => __( '-.050em', 'artisan' ),
                                '-.025'     => __( '-.025em', 'artisan' ),
                                '0.0'       => __( '0.00em', 'artisan' ),
                                '.025'      => __( '.025em', 'artisan' ),
                                '.050'      => __( '.050em', 'artisan' ),
                                '.075'      => __( '.075em', 'artisan' ),
                                '.100'      => __( '.100em', 'artisan' ),
                                '.250'      => __( '.250em (Default)', 'artisan' ),
                                '.500'      => __( '.500em (Widest)', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_TITLE_ALL_CAPS => array (
                            'type'          => 'toggle',
                            'label'         => __( 'All Uppercase?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_TITLE_ALL_CAPS
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_TITLE_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Text Color', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_TITLE_COLOR
                        ),

                    )

                ),

                // Section : Custom Header - Menu Settings ---------------------
                'section_custom_header_menu' => array (

                    'title' => __( 'Custom Menu', 'artisan' ),
                    'options' => array (

                        // Menu
                        ARTISAN_OPTIONS::CUSTOM_HEADER_SHOW_MENU => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Display the Menu?', 'artisan' ),
                            'description'   => __( 'If on, the "Custom Header" menu will be displayed (if one is set)', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_SHOW_MENU
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_MENU_FONT_FAMILY => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Font Family', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_MENU_FONT_FAMILY,
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'artisan' ),
                                'secondary' => __( 'Use Secondary Font', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_MENU_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Font Size', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_MENU_FONT_SIZE
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_MENU_LETTER_GAP => array (
                            'type'          => 'select',
                            'label'         => __( 'Menu - Link Letter Spacing', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_MENU_LETTER_GAP,
                            'choices'   => array (
                                '-.1'       => __( '-.100em (Narrowest)', 'artisan' ),
                                '-.075'     => __( '-.075em', 'artisan' ),
                                '-.050'     => __( '-.050em', 'artisan' ),
                                '-.025'     => __( '-.025em', 'artisan' ),
                                '0.0'       => __( '0.00em', 'artisan' ),
                                '.025'      => __( '.025em', 'artisan' ),
                                '.050'      => __( '.050em', 'artisan' ),
                                '.075'      => __( '.075em', 'artisan' ),
                                '.100'      => __( '.100em', 'artisan' ),
                                '.250'      => __( '.250em', 'artisan' ),
                                '.500'      => __( '.500em (Default/Widest)', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_MENU_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Text Color', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_MENU_COLOR
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_MENU_LINKS_GAP => array (
                            'type'          => 'number',
                            'label'         => __( 'Link Spacing', 'artisan' ),
                            'description'   => __( 'Amount of space in px between each link in the menu', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_MENU_LINKS_GAP
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_MENU_BUTTONS => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Style all Custom Header menu items as Buttons?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_MENU_BUTTONS
                        ),
                       
                    )

                ),

                // Section : Custom Header Style - Parallax Layers -------------
                'section_custom_header_plx_vertical' => array (

                    'title' => __( 'Color / Gradient Overlay', 'artisan' ),
                    'options' => array (

                        ARTISAN_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_STYLE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Include a colored overlay layer?', 'artisan' ),
                            'description'   => __( 'If "Yes", a semi-transparent colored layer will be added between the texture and content layers', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_STYLE,
                            'choices'   => array (
                                'no'        => __( 'No Color', 'artisan' ),
                                'single'    => __( 'Single Color', 'artisan' ),
                                'gradient'  => __( 'Gradient', 'artisan' ),
                            )
                        ),

                        // Overlay - Single Color
                        ARTISAN_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Color Overlay - Color', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_COLOR,
                        ),
                        ARTISAN_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_OPACITY => array (
                            'type'          => 'decimal',
                            'label'         => __( 'Color Overlay - Color (Opacity)', 'artisan' ),
                            'description'   => __( '0.0 for transparent, up to 1.0 for solid/opaque', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_OPACITY,
                        ),

                        // Overlay - Gradient
                        ARTISAN_OPTIONS::GRADIENT_STYLE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Gradient - Style', 'artisan' ),
                            'description'   => __( 'Choose from linear or radial', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::GRADIENT_STYLE,
                            'choices'   => array (
                                'linear'    => __( 'Linear', 'artisan' ),
                                'radial'    => __( 'Radial', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::GRADIENT_OVERALL_OPACITY => array (
                            'type'          => 'decimal',
                            'label'         => __( 'Gradient - Layer Opacity', 'artisan' ),
                            'description'   => __( 'This option can be used to set transparency for the entire gradient. Set 0.0 for transparent, up to 1.0 for solid/opaque', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::GRADIENT_OVERALL_OPACITY,
                        ),
                        ARTISAN_OPTIONS::GRADIENT_LINEAR_DIRECTION => array (
                            'type'          => 'select',
                            'label'         => __( 'Linear Gradient - Direction', 'artisan' ),
                            'description'   => __( 'Set the linear gradient direction (Start to End)', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::GRADIENT_LINEAR_DIRECTION,
                            'choices'   => array (
                                'up'        => __( 'Up', 'artisan' ),
                                'down'      => __( 'Down', 'artisan' ),
                                'right'     => __( 'Right', 'artisan' ),
                                'left'      => __( 'Left', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::GRADIENT_START_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Gradient Overlay - Start Color', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::GRADIENT_START_COLOR,
                        ),
                        ARTISAN_OPTIONS::GRADIENT_START_COLOR_OPACITY => array (
                            'type'          => 'decimal',
                            'label'         => __( 'Gradient Overlay - Start Color (Opacity)', 'artisan' ),
                            'description'   => __( '0.0 for transparent, up to 1.0 for solid/opaque', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::GRADIENT_START_COLOR_OPACITY,
                        ),
                        ARTISAN_OPTIONS::GRADIENT_END_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Gradient Overlay - End Color', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::GRADIENT_END_COLOR,
                        ),
                        ARTISAN_OPTIONS::GRADIENT_END_COLOR_OPACITY => array (
                            'type'          => 'decimal',
                            'label'         => __( 'Gradient Overlay - End Color (Opacity)', 'artisan' ),
                            'description'   => __( '0.0 for transparent, up to 1.0 for solid/opaque', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::GRADIENT_END_COLOR_OPACITY,
                        ),
                        
                    )

                ),

            ), // End of Custom Header Sections

        ), // End of Custom Header Panel

        // Panel: Blog ---------------------------------------------------------
        'panel_blog' => array (

            'title'         => __( 'Blog', 'artisan' ),
            'desciption'    => __( 'Customize the blog and archive pages on your site', 'artisan' ),
            'sections'      => array (

                // Section : Blog General Settings ------------------------------
                'section_blog_general' => array (

                    'title' => __( 'General Settings', 'artisan' ),
                    'options' => array (

                        ARTISAN_OPTIONS::BLOG_LAYOUT_STYLE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Blog Style', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::BLOG_LAYOUT_STYLE,
                            'choices'   => array (
                                'blog_standard' => __( 'Standard', 'artisan' ),
                                'blog_masonry'  => __( 'Masonry - Cards', 'artisan' ),
                                'blog_mosaic'   => __( 'Mosaic - Grid', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::BLOG_SHOW_DATE => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show Date Posted?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::BLOG_SHOW_DATE,
                        ),
                        ARTISAN_OPTIONS::BLOG_SHOW_AUTHOR => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show Author?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::BLOG_SHOW_AUTHOR,
                        ),
                        ARTISAN_OPTIONS::BLOG_SHOW_CONTENT => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show Content / Excerpt?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::BLOG_SHOW_CONTENT,
                        ),
                        ARTISAN_OPTIONS::BLOG_SHOW_CATEGORY => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show Category Footer?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::BLOG_SHOW_CATEGORY,
                        ),
                        ARTISAN_OPTIONS::BLOG_SHOW_COMMENT_COUNT => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show the Comment Count in the Meta Stats tab?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::BLOG_SHOW_COMMENT_COUNT,
                        ),
                        ARTISAN_OPTIONS::BLOG_EXCERPT_TRIM_NUM => array (
                            'type'          => 'number',
                            'label'         => __( 'Automatic Excerpt - Trim by Number of Words', 'artisan' ),
                            'description'   => __( 'If no manual excerpt exists, a post will show this many words of preview content', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::BLOG_EXCERPT_TRIM_NUM,
                        ),
                        ARTISAN_OPTIONS::BLOG_READ_MORE_TEXT => array (
                            'type'          => 'text',
                            'label'         => __( 'Automatic Excerpt - "Read more" Link Text', 'artisan' ),
                            'description'   => __( 'This link only shows on posts with no manual excerpt, as a content preview will be used instead', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::BLOG_READ_MORE_TEXT,
                        ),

                    )

                ),
                
                // Section : Blog Layout Settings ------------------------------
                'section_blog_advanced' => array (

                    'title' => __( 'Advanced Settings', 'artisan' ),
                    'options' => array (
                        
                        ARTISAN_OPTIONS::BLOG_LAYOUT_NUM_COLS => array (
                            'type'          => 'select',
                            'label'         => __( 'Layout - Number of Columns', 'artisan' ),
                            'description'   => __( 'Mobile devices will automatically show fewer columns to maximize space.', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::BLOG_LAYOUT_NUM_COLS,
                            'choices'   => array (
                                '1col'      => __( 'Single Column', 'artisan' ),
                                '2col'      => __( 'Two Columns', 'artisan' ),
                                '3col'      => __( 'Three Columns', 'artisan' ),
                                '4col'      => __( 'Four Columns', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::BLOG_CARD_APPEARANCE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Blog Card Appearance', 'artisan' ),
                            'description'   => __( 'Select whether the Standard style blog cards should appear flat, or as raised cards with a shadow.', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::BLOG_CARD_APPEARANCE,
                            'choices'   => array (
                                'flat'      => __( 'Flat', 'artisan' ),
                                'raised'    => __( 'Raised', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::BLOG_CARD_BORDER_RADIUS => array (
                            'type'          => 'number',
                            'label'         => __( 'Round Corners on Posts in the Blog?', 'artisan' ),
                            'description'   => __( 'Set this to 0 for sharp corners, or set the rounding value in pixels.', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::BLOG_CARD_BORDER_RADIUS,
                        ),
                        ARTISAN_OPTIONS::BLOG_CARD_MOSAIC_GAP => array (
                            'type'          => 'number',
                            'label'         => __( 'Space around each Mosaic tile?', 'artisan' ),
                            'description'   => __( 'This is the uncombined padding around each tile. For example, setting this to 5px per tile will equal a 10px wide gutter. Set to 0 for gapless tiles.', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::BLOG_CARD_MOSAIC_GAP,
                        ),
                        ARTISAN_OPTIONS::BLOG_CARD_FONT_SIZE_DSK => array (
                            'type'          => 'number',
                            'label'         => __( 'Post Title - Font Size (Desktop)', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::BLOG_CARD_FONT_SIZE_DSK,
                        ),
                        ARTISAN_OPTIONS::BLOG_CARD_FONT_SIZE_MBL => array (
                            'type'          => 'number',
                            'label'         => __( 'Post Title - Font Size (Mobile)', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::BLOG_CARD_FONT_SIZE_MBL,
                        ),
                        ARTISAN_OPTIONS::BLOG_META_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Post Date & Author - Font Size', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::BLOG_META_FONT_SIZE,
                        ),

                    )

                ),

            ), // End of Blog Sections

        ), // End of Blog Panel

        // Panel: Social -------------------------------------------------------
        null => array (

            'sections'       => array (

                'section_nav_social_links' => array (

                    'title' => __( 'Social Links', 'artisan' ),
                    'options' => array (
                        
                        ARTISAN_OPTIONS::SOCIAL_URL_1 => array (
                            'type'          => 'url',
                            'label'         => __( 'Social Link #1 - URL', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::SOCIAL_URL_1
                        ),
                        ARTISAN_OPTIONS::SOCIAL_ICON_1 => array (
                            'type'          => 'select',
                            'label'         => __( 'Social Link #1 - Icon', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::SOCIAL_ICON_1,
                            'choices'       => artisan_get_icons( 'social' )
                        ),
                        ARTISAN_OPTIONS::SOCIAL_URL_2 => array (
                            'type'          => 'url',
                            'label'         => __( 'Social Link #2 - URL', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::SOCIAL_URL_2
                        ),
                        ARTISAN_OPTIONS::SOCIAL_ICON_2 => array (
                            'type'          => 'select',
                            'label'         => __( 'Social Link #2 - Icon', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::SOCIAL_ICON_2,
                            'choices'       => artisan_get_icons( 'social' )
                        ),
                        ARTISAN_OPTIONS::SOCIAL_URL_3 => array (
                            'type'          => 'url',
                            'label'         => __( 'Social Link #3 - URL', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::SOCIAL_URL_3
                        ),
                        ARTISAN_OPTIONS::SOCIAL_ICON_3 => array (
                            'type'          => 'select',
                            'label'         => __( 'Social Link #3 - Icon', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::SOCIAL_ICON_3,
                            'choices'       => artisan_get_icons( 'social' )
                        ),
                        ARTISAN_OPTIONS::SOCIAL_URL_4 => array (
                            'type'          => 'url',
                            'label'         => __( 'Social Link #4 - URL', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::SOCIAL_URL_4
                        ),
                        ARTISAN_OPTIONS::SOCIAL_ICON_4 => array (
                            'type'          => 'select',
                            'label'         => __( 'Social Link #4 - Icon', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::SOCIAL_ICON_4,
                            'choices'       => artisan_get_icons( 'social' )
                        ),
                        ARTISAN_OPTIONS::SOCIAL_URL_5 => array (
                            'type'          => 'url',
                            'label'         => __( 'Social Link #5 - URL', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::SOCIAL_URL_5
                        ),
                        ARTISAN_OPTIONS::SOCIAL_ICON_5 => array (
                            'type'          => 'select',
                            'label'         => __( 'Social Link #5 - Icon', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::SOCIAL_ICON_5,
                            'choices'       => artisan_get_icons( 'social' )
                        ),

                    )

                ),
                
            ), // End of Social Section
            
        ), // End of Social Panel

        // Panel: Navbar -------------------------------------------------------
        'panel_navbar' => array (

            'title'         => __( 'Navbar', 'artisan' ),
            'desciption'    => __( 'Customize the primary navbar on your site, including control over appearance & behaviour', 'artisan' ),
            'sections'      => array (

                // Section : Navbar General Settings ---------------------------
                'section_nav_general' => array (

                    'title' => __( 'General Settings', 'artisan' ),
                    'options' => array (

                        ARTISAN_OPTIONS::NAVBAR_STYLE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Navbar Style', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_STYLE,
                            'choices'   => array (
                                'slim_split'    => __( 'Slim - Centered & Split', 'artisan' ),
                                'slim_left'     => __( 'Slim - Left Aligned', 'artisan' ),
                                'banner'        => __( 'Banner', 'artisan' ),
                                'vertical'      => __( 'Vertical', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::NAVBAR_LINKS_FONT_FAMILY => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Navbar Links - Font Family', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_LINKS_FONT_FAMILY,
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'artisan' ),
                                'secondary' => __( 'Use Secondary Font', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::NAVBAR_LINKS_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Navbar Links - Font Size', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_LINKS_FONT_SIZE
                        ),
                        ARTISAN_OPTIONS::NAVBAR_LINKS_GAP => array (
                            'type'          => 'number',
                            'label'         => __( 'Navbar Links - Gap Between Links', 'artisan' ),
                            'label'         => __( 'Set the pixel value for the amount of space between links', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_LINKS_GAP
                        ),
                        ARTISAN_OPTIONS::NAVBAR_HAS_SHADOW => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Add a box shadow to the Navbar?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_HAS_SHADOW,
                        ),
                        ARTISAN_OPTIONS::NAVBAR_SHOW_SOCIAL => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show Social Links in Navbar?', 'artisan' ),
                            'description'   => __( 'If on, social links will display in the Navbar. Navbar styles display these in different ways', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_SHOW_SOCIAL,
                        ),
                        ARTISAN_OPTIONS::VERT_NAVBAR_DISPLAY_SETTING => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Vertical Navbar - Visibility', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::VERT_NAVBAR_DISPLAY_SETTING,
                            'choices'   => array (
                                'toggled'       => __( 'Openable (Hidden by Default)', 'artisan' ),
                                'always'        => __( 'Always Visible', 'artisan' ),
                            )
                        ),
                        
                    )

                ),

                // Section : Slim Style Settings ---------------------------
                'section_nav_style_a' => array (

                    'title' => __( 'Advanced Settings', 'artisan' ),
                    'options' => array (
                        
                        ARTISAN_OPTIONS::NAVBAR_INITIAL_HEIGHT => array (
                            'type'          => 'number',
                            'label'         => __( 'Navbar - Height (Initial)', 'artisan' ),
                            'description'   => __( 'When the Slim Navbar is at the very top of the page (unstuck)', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_INITIAL_HEIGHT
                        ),
                        ARTISAN_OPTIONS::NAVBAR_STICKY_HEIGHT => array (
                            'type'          => 'number',
                            'label'         => __( 'Navbar - Height (Sticky)', 'artisan' ),
                            'description'   => __( 'When the Slim Navbar is sticky, after the user scrolls down the page', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_STICKY_HEIGHT
                        ),
                        ARTISAN_OPTIONS::NAVBAR_RIGHT_ALIGN_MENU => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Right Aligned Menu?', 'artisan' ),
                            'description'   => __( 'If on, the menu will be right-aligned. For the "Slim - Left Aligned" style of Navbar, the menu will replace the Social Links section', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_RIGHT_ALIGN_MENU,
                        ),
                        ARTISAN_OPTIONS::NAVBAR_BOXED_CONTENT => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Box the Content?', 'artisan' ),
                            'description'   => __( 'If on, the Navbar content will be lined up with the main content of the page instead of the left & right bounds of the window', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_BOXED_CONTENT,
                        ),
                        ARTISAN_OPTIONS::NAVBAR_TRANSPARENT_MENU_BG => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Transparent Menu?', 'artisan' ),
                            'description'   => __( 'If on, the menu will be transparent, allowing the Navbar background (color or image) to show through', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_TRANSPARENT_MENU_BG,
                        ),
                        ARTISAN_OPTIONS::NAVBAR_BRANDING_ALIGNMENT => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Branding - Alignment', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_BRANDING_ALIGNMENT,
                            'choices'   => array (
                                'left'      => __( 'Left', 'artisan' ),
                                'center'    => __( 'Centered', 'artisan' ),
                                'right'     => __( 'Right', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::NAVBAR_MENU_ALIGNMENT => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Menu - Alignment', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_MENU_ALIGNMENT,
                            'choices'   => array (
                                'left'      => __( 'Left', 'artisan' ),
                                'center'    => __( 'Centered', 'artisan' ),
                                'right'     => __( 'Right', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::NAVBAR_BRANDING_SPACE_TOP_DSK => array (
                            'type'          => 'number',
                            'label'         => __( 'Branding - Space Above', 'artisan' ),
                            'description'   => __( 'Set the amount of space (in pixels) above the branding (for the Banner style of Navbar)', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_BRANDING_SPACE_TOP_DSK
                        ),
                        ARTISAN_OPTIONS::NAVBAR_BRANDING_SPACE_BOTTOM_DSK => array (
                            'type'          => 'number',
                            'label'         => __( 'Branding - Space Below', 'artisan' ),
                            'description'   => __( 'Set the amount of space (in pixels) below the branding (for the Banner style of Navbar)', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_BRANDING_SPACE_BOTTOM_DSK
                        ),
                        ARTISAN_OPTIONS::NAVBAR_BRANDING_SPACE_TOP_MBL => array (
                            'type'          => 'number',
                            'label'         => __( 'Branding - Space Above (Mobile)', 'artisan' ),
                            'description'   => __( 'Set the amount of space (in pixels) above the branding on mobile devices (for the Banner style of Navbar)', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_BRANDING_SPACE_TOP_MBL
                        ),
                        ARTISAN_OPTIONS::NAVBAR_BRANDING_SPACE_BOTTOM_MBL => array (
                            'type'          => 'number',
                            'label'         => __( 'Branding - Space Below (Mobile)', 'artisan' ),
                            'description'   => __( 'Set the amount of space (in pixels) below the branding on mobile devices (for the Banner style of Navbar)', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_BRANDING_SPACE_BOTTOM_MBL
                        ),
                        ARTISAN_OPTIONS::NAVBAR_FINAL_LINK_ACCENT => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Style final Navbar link as a CTA?', 'artisan' ),
                            'description'   => __( 'When toggled on, the last (right-most) link in the Navbar will appear as a unique button callout', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_FINAL_LINK_ACCENT
                        ),
                        ARTISAN_OPTIONS::NAVBAR_FINAL_LINK_ROUNDED => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Rounded button?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_FINAL_LINK_ROUNDED
                        ),
                        ARTISAN_OPTIONS::NAVBAR_FINAL_LINK_FILL => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Color fill?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_FINAL_LINK_FILL
                        ),

                    )

                ),

                // Section : Navbar Colors -------------------------------------
                'section_nav_colors' => array (

                    'title' => __( 'Colors', 'artisan' ),
                    'options' => array (
                        
                        ARTISAN_OPTIONS::NAVBAR_BG_STYLE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Background Style', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_BG_STYLE,
                            'choices'   => array (
                                'color'     => __( 'Color', 'artisan' ),
                                'image'     => __( 'Background Image', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::NAVBAR_BG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Background Color', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_BG_COLOR,
                            'choices'   => array (
                                '#141414'    => __( 'Dark', 'artisan' ),
                                '#ffffff'    => __( 'Light', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::NAVBAR_FG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Foreground Color', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_FG_COLOR,
                            'choices'   => array (
                                '#141414'    => __( 'Dark', 'artisan' ),
                                '#ffffff'    => __( 'Light', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::NAVBAR_MENU_BG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Menu - Background Color', 'artisan' ),
                            'description'   => __( 'If the menu is not set to transparent (in Advanced Settings), you can set the background color for the menu bar', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_MENU_BG_COLOR,
                            'choices'   => array (
                                '#141414'    => __( 'Dark', 'artisan' ),
                                '#ffffff'    => __( 'Light', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::NAVBAR_MENU_FG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Menu - Foreground Color', 'artisan' ),
                            'description'   => __( 'If the menu is not set to transparent (in Advanced Settings), you can set the foreground color for the menu bar', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_MENU_FG_COLOR,
                            'choices'   => array (
                                '#141414'    => __( 'Dark', 'artisan' ),
                                '#ffffff'    => __( 'Light', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::NAVBAR_BG_IMAGE => array (
                            'type'          => 'image',
                            'label'         => __( 'Background Image', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_BG_IMAGE,
                        ),
                        ARTISAN_OPTIONS::NAVBAR_SOCIAL_BG_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Social Links - Drawer Background', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_SOCIAL_BG_COLOR,
                        ),
                        ARTISAN_OPTIONS::NAVBAR_SOCIAL_FG_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Social Links - Icons', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_SOCIAL_FG_COLOR,
                        ),
                        ARTISAN_OPTIONS::NAVBAR_SOCIAL_FG_COLOR_HOVER => array (
                            'type'          => 'color',
                            'label'         => __( 'Social Links - Icons (Hover)', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::NAVBAR_SOCIAL_FG_COLOR_HOVER,
                        ),
                        ARTISAN_OPTIONS::VERT_NAVBAR_TAB_BACKGROUND => array (
                            'type'          => 'color',
                            'label'         => __( 'Vertical Navbar Tab - Background Color', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::VERT_NAVBAR_TAB_BACKGROUND,
                        ),
                        ARTISAN_OPTIONS::VERT_NAVBAR_TAB_FOREGROUND => array (
                            'type'          => 'color',
                            'label'         => __( 'Vertical Navbar Tab - Foreground Color', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::VERT_NAVBAR_TAB_FOREGROUND,
                        ),

                    )

                ),

            ), // End of Navbar Sections

        ), // End of Navbar Panel

        // Panel: Appearance ---------------------------------------------------
        'panel_appearance' => array (

            'title'         => __( 'Appearance', 'artisan' ),
            'description'   => __( 'Customize your site colors, fonts, and more', 'artisan' ),
            'sections'      => array (

                // Section : Colors --------------------------------------------
                'section_colors' => array (

                    'title'         => __( 'Skin Colors', 'artisan' ),
                    'description'   => __( 'Customize the color theme in use on your site', 'artisan' ),
                    'options' => array (
                        
                        ARTISAN_OPTIONS::COLOR_SKIN_PRIMARY => array(
                            'type'          => 'color-select',
                            'label'         => __( 'Skin Color - Primary', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::COLOR_SKIN_PRIMARY,
                            'choices'   => array(
                                '#00a0bc'       => __( 'Cool Peppermint', 'artisan' ),
                                '#f04265'       => __( 'Cherry Gloss', 'artisan' ),
                                '#13ecb6'       => __( 'Seafoam Coast', 'artisan' ),
                                '#7f66ff'       => __( 'Royal Lilac', 'artisan' ),
                                '#00d4ff'       => __( 'Sky Blue', 'artisan' ),
                            ),
                        ),
                        ARTISAN_OPTIONS::COLOR_SKIN_SECONDARY => array(
                            'type'          => 'color-select',
                            'label'         => __( 'Skin Color - Secondary', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::COLOR_SKIN_SECONDARY,
                            'choices'   => array(
                                '#007fa3'       => __( 'Deep Azure', 'artisan' ),
                                '#d60059'       => __( 'Magenta Rose', 'artisan' ),
                                '#04aeae'       => __( 'Tide Pool', 'artisan' ),
                                '#6e3399'       => __( 'Wildberry', 'artisan' ),
                                '#0b84da'       => __( 'Ocean Swell', 'artisan' ),
                            ),
                        ),

                    ),

                ),

                // Section : Fonts ---------------------------------------------
                'fonts' => array (

                    'title'         => __( 'Fonts', 'artisan' ),
                    'description'   => __( 'Customize the fonts in use on your site. Visit <a target="_BLANK" href="https://fonts.google.com/"> Google Fonts to see font options.</a> Please be advised some fonts on this link may not be present in the theme, as Google Fonts are constantly updated. We periodically update the font list here from Google Fonts.', 'artisan' ),
                    'options' => array (
                        
                        // Primary Font
                        ARTISAN_OPTIONS::FONT_PRIMARY => array(
                            'type'      => 'select',
                            'label'     => __( 'Primary Font - For Headings & Titles', 'artisan' ),
                            'default'   => ARTISAN_DEFAULTS::FONT_PRIMARY,
                            'choices'   => artisan_fonts(),
                        ),
                        ARTISAN_OPTIONS::FONT_HEADINGS_LETTER_GAP => array(
                            'type'          => 'select',
                            'label'         => __( 'Letter Spacing for Headings & Titles', 'artisan' ),
                            'description'   => __( 'Set to 0 for normal spacing, negative for smaller gap between letters, positive for increased separation.', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FONT_HEADINGS_LETTER_GAP,
                            'choices'   => array (
                                '-.1'       => __( '-.100em (Narrowest)', 'artisan' ),
                                '-.075'     => __( '-.075em', 'artisan' ),
                                '-.050'     => __( '-.050em', 'artisan' ),
                                '-.025'     => __( '-.025em', 'artisan' ),
                                '0.0'         => __( '0.00em (Default)', 'artisan' ),
                                '.025'      => __( '.025em', 'artisan' ),
                                '.050'      => __( '.050em', 'artisan' ),
                                '.075'      => __( '.075em', 'artisan' ),
                                '.100'      => __( '.100em (Widest)', 'artisan' ),
                            )
                        ),

                        // Secondary Font
                        ARTISAN_OPTIONS::FONT_SECONDARY => array(
                            'type'      => 'select',
                            'label'     => __( 'Secondary Font - For Content', 'artisan' ),
                            'default'   => ARTISAN_DEFAULTS::FONT_SECONDARY,
                            'choices'   => artisan_fonts(),
                        ),
                        ARTISAN_OPTIONS::FONT_BODY_SIZE => array(
                            'type'      => 'number',
                            'label'     => __( 'Secondary Font - Text Size (px)', 'artisan' ),
                            'default'   => ARTISAN_DEFAULTS::FONT_BODY_SIZE,
                        ),

                    ),

                ),
                
                // Section : Smooth Scrolling ----------------------------------
                'section_scroll' => array (

                    'title'         => __( 'Smooth Scrolling', 'artisan' ),
                    'description'   => __( 'Customize whether the Smooth Scrolling feature is enabled on your site', 'artisan' ),
                    'options' => array (
                        
                        ARTISAN_OPTIONS::EASE_SCROLL_TOGGLE => array(
                            'type'          => 'toggle',
                            'label'         => __( 'Enable Smooth Scrolling?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::EASE_SCROLL_TOGGLE,
                        ),

                    ),

                ),

            ), // End of Appearance Sections

        ), // End of Appearance Panel

        // Panel: Footer -------------------------------------------------------
        'panel_footer' => array (

            'title'         => __( 'Footer', 'artisan' ),
            'desciption'    => __( 'Customize the theme footer', 'artisan' ),
            'sections'      => array (

                // Section : Pre-Footer Widget Area Settings  ------------------
                'section_pre_footer' => array (

                    'title'     => __( 'Pre-Footer Sidebar', 'artisan' ),
                    'options'   => array (
                        
                        ARTISAN_OPTIONS::FOOTER_NUM_WIDGET_COLS => array (
                            'type'          => 'range',
                            'label'         => __( 'Number of Widget Columns' , 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_NUM_WIDGET_COLS,
                            'min'           => 1,
                            'max'           => 4,
                            'step'          => 1
                        ),
                        ARTISAN_OPTIONS::WIDGETS_TITLE_FONT_FAMILY => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Widget Titles - Font Family', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::WIDGETS_TITLE_FONT_FAMILY,
                            'choices'   => array (
                                'primary'   => __( 'Use Primary Font', 'artisan' ),
                                'secondary' => __( 'Use Secondary Font', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::WIDGETS_TITLE_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Widget Titles - Font Size', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::WIDGETS_TITLE_FONT_SIZE,
                        ),
                        ARTISAN_OPTIONS::WIDGETS_TITLE_FONT_LETTER_GAP => array (
                            'type'          => 'select',
                            'label'         => __( 'Widget Titles - Letter Spacing', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::WIDGETS_TITLE_FONT_LETTER_GAP,
                            'choices'   => array (
                                '-.1'       => __( '-.100em (Narrowest)', 'artisan' ),
                                '-.075'     => __( '-.075em', 'artisan' ),
                                '-.050'     => __( '-.050em', 'artisan' ),
                                '-.025'     => __( '-.025em', 'artisan' ),
                                '0.0'       => __( '0.00em', 'artisan' ),
                                '.025'      => __( '.025em', 'artisan' ),
                                '.050'      => __( '.050em', 'artisan' ),
                                '.075'      => __( '.075em', 'artisan' ),
                                '.100'      => __( '.100em', 'artisan' ),
                                '.250'      => __( '.250em (Default)', 'artisan' ),
                                '.500'      => __( '.500em (Widest)', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::WIDGETS_TITLE_ALL_CAPS => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Widget Titles - All Uppercase?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::WIDGETS_TITLE_ALL_CAPS,
                        ),
                        ARTISAN_OPTIONS::FOOTER_BORDER_TOP_THICKNESS => array (
                            'type'          => 'number',
                            'label'         => __( 'Colored Top Border - Thickness', 'artisan' ),
                            'description'   => __( 'If set to a value greater than 0, the Prefooter will include a primary color top border of this many pixels', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_BORDER_TOP_THICKNESS,
                        ),
                        
                    )
                    
                ),
                        
                // Section : Footer General Settings  --------------------------
                'section_footer_general' => array (

                    'title'     => __( 'General Settings', 'artisan' ),
                    'options'   => array (

                        ARTISAN_OPTIONS::FOOTER_BOXED_CONTENT => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Footer - Boxed Content?', 'artisan' ),
                            'description'   => __( 'If on, the Footer will be lined up with the main content instead of the left & right bounds of the window', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_BOXED_CONTENT,
                        ),
                        ARTISAN_OPTIONS::FOOTER_CENTER_BRANDING => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Footer - Centered?', 'artisan' ),
                            'description'   => __( 'If on, the Footer content will be centered', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_CENTER_BRANDING,
                        ),
                        ARTISAN_OPTIONS::FOOTER_SHOW_SOCIAL => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Footer - Show Social?', 'artisan' ),
                            'description'   => __( 'If on, the Footer will include the social icon links you have set', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_SHOW_SOCIAL,
                        ),
                        ARTISAN_OPTIONS::FOOTER_SHOW_BRANDING => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Footer - Show Branding?', 'artisan' ),
                            'description'   => __( 'If on,  the Footer will include either an alternate custom logo or your site title', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_SHOW_BRANDING,
                        ),
                        ARTISAN_OPTIONS::FOOTER_SHOW_COPYRIGHT => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Footer - Show Copyright?', 'artisan' ),
                            'description'   => __( 'If on, the Footer will include the copyright tagline you set', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_SHOW_COPYRIGHT,
                        ),
                        ARTISAN_OPTIONS::FOOTER_COPYRIGHT_TAGLINE => array (
                            'type'          => 'text',
                            'label'         => __( 'Copyright - Tagline Text', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_COPYRIGHT_TAGLINE,
                        ),
                        ARTISAN_OPTIONS::FOOTER_BRANDING_TYPE => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Branding - What to Display?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_BRANDING_TYPE,
                            'choices'   => array (
                                'site_title'    => __( 'Show Site Title', 'artisan' ),
                                'alt_logo'      => __( 'Show Logo', 'artisan' ),
                            )
                        ),
                        ARTISAN_OPTIONS::FOOTER_ALTERNATE_LOGO => array (
                            'type'          => 'image',
                            'label'         => __( 'Branding - Logo', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_ALTERNATE_LOGO,
                        ),
                        ARTISAN_OPTIONS::FOOTER_ALTERNATE_LOGO_HEIGHT => array (
                            'type'          => 'number',
                            'label'         => __( 'Branding - Logo Height', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_ALTERNATE_LOGO_HEIGHT,
                        ),
                        ARTISAN_OPTIONS::FOOTER_SITE_TITLE_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Branding - Font Size', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_SITE_TITLE_FONT_SIZE
                        ),
                        ARTISAN_OPTIONS::FOOTER_SITE_TITLE_ALL_CAPS => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Branding - All Uppercase?', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_SITE_TITLE_ALL_CAPS
                        ),
                        ARTISAN_OPTIONS::FOOTER_COPYRIGHT_TAGLINE_FONT_SIZE => array (
                            'type'          => 'number',
                            'label'         => __( 'Copyright - Font Size', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_COPYRIGHT_TAGLINE_FONT_SIZE
                        ),

                    )

                ),

                // Section : Footer Colors -------------------------------------
                'section_footer_colors' => array (

                    'title'     => __( 'Colors', 'artisan' ),
                    'options'   => array (
                        
                        // Pre-Footer Background
                        ARTISAN_OPTIONS::PRE_FOOTER_BG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Prefooter: Background Color', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::PRE_FOOTER_BG_COLOR,
                            'choices'   => array (
                                '#141414'    => __( 'Dark', 'artisan' ),
                                '#ffffff'    => __( 'Light', 'artisan' ),
                            )
                        ),

                        // Pre-Footer Foreground
                        ARTISAN_OPTIONS::PRE_FOOTER_FG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Prefooter: Foreground Color', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::PRE_FOOTER_FG_COLOR,
                            'choices'   => array (
                                '#141414'    => __( 'Dark', 'artisan' ),
                                '#ffffff'    => __( 'Light', 'artisan' ),
                            )
                        ),
                        
                        // Pre-Footer Widget Titles
                        ARTISAN_OPTIONS::PRE_FOOTER_WIDGET_TITLE_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Prefooter: Widgets Title Color', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::PRE_FOOTER_WIDGET_TITLE_COLOR,
                        ),
                        
                        // Footer Background
                        ARTISAN_OPTIONS::FOOTER_BG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Footer: Background Color', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_BG_COLOR,
                            'choices'   => array (
                                '#000000'    => __( 'Dark', 'artisan' ),
                                '#ffffff'    => __( 'Light', 'artisan' ),
                            )
                        ),

                        // Footer Foreground
                        ARTISAN_OPTIONS::FOOTER_FG_COLOR => array (
                            'type'          => 'color-select',
                            'label'         => __( 'Footer: Foreground Color', 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::FOOTER_FG_COLOR,
                            'choices'   => array (
                                '#141414'    => __( 'Dark', 'artisan' ),
                                '#ffffff'    => __( 'Light', 'artisan' ),
                            )
                        ),

                    )

                ),

            ), // End of Footer Sections

        ), // End of Footer Panel

        // Panel: WooCommerce --------------------------------------------------
        'woocommerce' => array (

            'title'         => __( 'WooCommerce', 'artisan' ),
            'sections'      => array (

                // Section : WooCommerce Advanced  -----------------------------
                'section_woocommerce_featured' => array (

                    'title'     => __( 'Featured Products', 'artisan' ),
                    'options'   => array (
                        
                        ARTISAN_OPTIONS::WOO_SHOW_FEATURED_PRODUCTS => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show Featured Products at the top of the Shop page?' , 'artisan' ),
                            'description'   => __( 'To feature a product, click the corresponding star icon on the Products page.' , 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::WOO_SHOW_FEATURED_PRODUCTS,
                        ),
                        ARTISAN_OPTIONS::WOO_SHOW_FEATURED_PRODUCT_HEADING => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Show "Featured" Header Banner?' , 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::WOO_SHOW_FEATURED_PRODUCT_HEADING,
                        ),
                        ARTISAN_OPTIONS::WOO_FEATURED_PRODUCTS_NUM_COLS => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Featured Products Per Row' , 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::WOO_FEATURED_PRODUCTS_NUM_COLS,
                            'choices'       => array (
                                'two'   => __( 'Two', 'artisan' ),
                                'three' => __( 'Three', 'artisan' ),
                            )
                        ),
                        
                    )
                    
                ),
                
                // Section : WooCommerce Advanced  -----------------------------
                'section_woocommerce_slide_cart' => array (

                    'title'     => __( 'Slide-In Cart', 'artisan' ),
                    'options'   => array (
                        
                        ARTISAN_OPTIONS::WOO_SLIDE_CART_TOGGLE => array (
                            'type'          => 'toggle',
                            'label'         => __( 'Include the Slide-In Cart Drawer?' , 'artisan' ),
                            'description'   => __( 'If this is on, users can click a tab on the right side of the page to open a drawer displaying the items currently added to their cart.' , 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::WOO_SLIDE_CART_TOGGLE,
                        ),
                        ARTISAN_OPTIONS::WOO_SLIDE_CART_TAB_COLOR => array (
                            'type'          => 'color',
                            'label'         => __( 'Tab: Color' , 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::WOO_SLIDE_CART_TAB_COLOR,
                        ),
                        ARTISAN_OPTIONS::WOO_SLIDE_CART_TAB_ICON => array (
                            'type'          => 'radio-toggle',
                            'label'         => __( 'Tab: Icon' , 'artisan' ),
                            'default'       => ARTISAN_DEFAULTS::WOO_SLIDE_CART_TAB_ICON,
                            'choices'       => array (
                                'fa-shopping-cart'      =>  __( 'Cart', 'artisan' ),
                                'fa-shopping-bag'       =>  __( 'Bag', 'artisan' ),
                                'fa-shopping-basket'    =>  __( 'Basket', 'artisan' ),
                            )
                        ),
                        
                    )
                    
                ),
                
            ), // End of Footer Sections

        ), // End of WooCommerce Panel
       
    ), // End of Panels

);

$acid->config( $data );

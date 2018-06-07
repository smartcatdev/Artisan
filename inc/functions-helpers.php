<?php

/**
 * Retrieve all color theme mods in use and return them as an associative array
 * 
 * @since 1.0.0
 * @return array of hex colors
 */
function zenith_get_all_theme_colors() {
    
    $theme_colors = array();
    
    $theme_colors['navbar_bg']              = get_theme_mod( ZENITH_OPTIONS::NAVBAR_BG_COLOR, ZENITH_DEFAULTS::NAVBAR_BG_COLOR );
    $theme_colors['navbar_fg']              = get_theme_mod( ZENITH_OPTIONS::NAVBAR_FG_COLOR, ZENITH_DEFAULTS::NAVBAR_FG_COLOR );
    
    $theme_colors['navbar_menu_bg']         = get_theme_mod( ZENITH_OPTIONS::NAVBAR_MENU_BG_COLOR, ZENITH_DEFAULTS::NAVBAR_MENU_BG_COLOR );
    $theme_colors['navbar_menu_fg']         = get_theme_mod( ZENITH_OPTIONS::NAVBAR_MENU_FG_COLOR, ZENITH_DEFAULTS::NAVBAR_MENU_FG_COLOR );
    
    $theme_colors['prefooter_bg']           = get_theme_mod( ZENITH_OPTIONS::PRE_FOOTER_BG_COLOR, ZENITH_DEFAULTS::PRE_FOOTER_BG_COLOR );
    $theme_colors['prefooter_fg']           = get_theme_mod( ZENITH_OPTIONS::PRE_FOOTER_FG_COLOR, ZENITH_DEFAULTS::PRE_FOOTER_FG_COLOR );
    
    $theme_colors['footer_bg']              = get_theme_mod( ZENITH_OPTIONS::FOOTER_BG_COLOR, ZENITH_DEFAULTS::FOOTER_BG_COLOR );
    $theme_colors['footer_fg']              = get_theme_mod( ZENITH_OPTIONS::FOOTER_FG_COLOR, ZENITH_DEFAULTS::FOOTER_FG_COLOR );
    
    $theme_colors['primary']                = get_theme_mod( ZENITH_OPTIONS::COLOR_SKIN_PRIMARY, ZENITH_DEFAULTS::COLOR_SKIN_PRIMARY );
    $theme_colors['secondary']              = get_theme_mod( ZENITH_OPTIONS::COLOR_SKIN_SECONDARY, ZENITH_DEFAULTS::COLOR_SKIN_SECONDARY );
    
    $theme_colors['social_bg']              = get_theme_mod( ZENITH_OPTIONS::NAVBAR_SOCIAL_BG_COLOR, ZENITH_DEFAULTS::NAVBAR_SOCIAL_BG_COLOR );
    $theme_colors['social_fg']              = get_theme_mod( ZENITH_OPTIONS::NAVBAR_SOCIAL_FG_COLOR, ZENITH_DEFAULTS::NAVBAR_SOCIAL_FG_COLOR );
    $theme_colors['social_fg_hov']          = get_theme_mod( ZENITH_OPTIONS::NAVBAR_SOCIAL_FG_COLOR_HOVER, ZENITH_DEFAULTS::NAVBAR_SOCIAL_FG_COLOR_HOVER );
    $theme_colors['custom_header_title']    = get_theme_mod( ZENITH_OPTIONS::CUSTOM_HEADER_TITLE_COLOR, ZENITH_DEFAULTS::CUSTOM_HEADER_TITLE_COLOR );
    $theme_colors['custom_header_menu']     = get_theme_mod( ZENITH_OPTIONS::CUSTOM_HEADER_MENU_COLOR, ZENITH_DEFAULTS::CUSTOM_HEADER_MENU_COLOR );
    
    $theme_colors['cart_tab']               = get_theme_mod( ZENITH_OPTIONS::WOO_SLIDE_CART_TAB_COLOR, ZENITH_DEFAULTS::WOO_SLIDE_CART_TAB_COLOR );
    
    $theme_colors['plx_overlay_single']     = get_theme_mod( ZENITH_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_COLOR, ZENITH_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_COLOR );
    $theme_colors['plx_overlay_grad_start'] = get_theme_mod( ZENITH_OPTIONS::GRADIENT_START_COLOR, ZENITH_DEFAULTS::GRADIENT_START_COLOR );
    $theme_colors['plx_overlay_grad_end']   = get_theme_mod( ZENITH_OPTIONS::GRADIENT_END_COLOR, ZENITH_DEFAULTS::GRADIENT_END_COLOR );
   
    $theme_colors['footer_widget_title']    = get_theme_mod( ZENITH_OPTIONS::PRE_FOOTER_WIDGET_TITLE_COLOR, ZENITH_DEFAULTS::PRE_FOOTER_WIDGET_TITLE_COLOR );
 
    return $theme_colors;
    
}

/**
 * Retrieve all icons or a specific subset
 * 
 * @since 1.0.0
 * @return array of Font Awesome 5 icons
 */
function zenith_get_icons( $subset = null ) {
    
    $icons = array(
        'fa-app-store'      => __( 'App Store', 'zenith' ),
        'fa-apple'          => __( 'Apple', 'zenith' ),
        'fa-bandcamp'       => __( 'Bandcamp', 'zenith' ),
        'fa-behance'        => __( 'Behance', 'zenith' ),
        'fa-codepen'        => __( 'CodePen', 'zenith' ),
        'fa-discord'        => __( 'Discord', 'zenith' ),
        'fa-dribbble'       => __( 'Dribbble', 'zenith' ),
        'fa-etsy'           => __( 'Etsy', 'zenith' ),
        'fa-facebook-f'     => __( 'Facebook', 'zenith' ),
        'fa-git'            => __( 'Git', 'zenith' ),
        'fa-github'         => __( 'GitHub', 'zenith' ),
        'fa-google-play'    => __( 'Google Play', 'zenith' ),
        'fa-google-plus-g'  => __( 'Google+', 'zenith' ),
        'fa-imdb'           => __( 'IMDb', 'zenith' ),
        'fa-instagram'      => __( 'Instagram', 'zenith' ),
        'fa-itunes-note'    => __( 'iTunes', 'zenith' ),
        'fa-kickstarter-k'  => __( 'Kickstarter', 'zenith' ),
        'fa-lastfm'         => __( 'Last.fm', 'zenith' ),
        'fa-linkedin-in'    => __( 'LinkedIn', 'zenith' ),
        'fa-medium-m'       => __( 'Medium', 'zenith' ),
        'fa-microsoft'      => __( 'Microsoft', 'zenith' ),
        'fa-mixcloud'       => __( 'Mixcloud', 'zenith' ),
        'fa-patreon'        => __( 'Patreon', 'zenith' ),
        'fa-pinterest-p'    => __( 'Pinterest', 'zenith' ),
        'fa-playstation'    => __( 'PlayStation', 'zenith' ),
        'fa-reddit-alien'   => __( 'Reddit', 'zenith' ),
        'fas fa-rss'        => __( 'RSS', 'zenith' ),
        'fa-slack-hash'     => __( 'Slack', 'zenith' ),
        'fa-snapchat-ghost' => __( 'Snapchat', 'zenith' ),
        'fa-soundcloud'     => __( 'SoundCloud', 'zenith' ),
        'fa-spotify'        => __( 'Spotify', 'zenith' ),
        'fa-steam'          => __( 'Steam', 'zenith' ),
        'fa-stumbleupon'    => __( 'StumbleUpon', 'zenith' ),
        'fa-tumblr'         => __( 'Tumblr', 'zenith' ),
        'fa-twitch'         => __( 'Twitch', 'zenith' ),
        'fa-twitter'        => __( 'Twitter', 'zenith' ),
        'fa-vimeo'          => __( 'Vimeo', 'zenith' ),
        'fa-vimeo'          => __( 'Vimeo', 'zenith' ),
        'fa-xbox'           => __( 'Xbox', 'zenith' ),
        'fa-yelp'           => __( 'Yelp', 'zenith' ),
        'fa-youtube'        => __( 'YouTube', 'zenith' ),
    );
    
    return $icons;
    
}

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @since 1.0.0
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function zenith_add_excerpt_more_link( $more ) {

//    return sprintf( '… <a class="read-more" href="%1$s">%2$s</a>',
//        get_permalink( get_the_ID() ),
//        __( get_theme_mod( ZENITH_OPTIONS::BLOG_READ_MORE_TEXT, ZENITH_DEFAULTS::BLOG_READ_MORE_TEXT ), 'zenith' )
//    );
    
    /* translators: permalink url, then Read More text theme mod */
    return sprintf( __( '... <a class="read-more" href="%1$s">%2$s</a>', 'zenith' ), esc_url( get_the_permalink( get_the_ID() ) ), esc_html( get_theme_mod( ZENITH_OPTIONS::BLOG_READ_MORE_TEXT, ZENITH_DEFAULTS::BLOG_READ_MORE_TEXT ) ) );
    
}
add_filter( 'excerpt_more', 'zenith_add_excerpt_more_link' );

/**
 * Filter the excerpt length to a user-defined number words.
 *
 * @since 1.0.0
 * @param int $length Excerpt length.
 * @return int modified excerpt length.
 */
function zenith_custom_auto_excerpt_length( $length ) {
    return intval( get_theme_mod( ZENITH_OPTIONS::BLOG_EXCERPT_TRIM_NUM, ZENITH_DEFAULTS::BLOG_EXCERPT_TRIM_NUM ) );
}
add_filter( 'excerpt_length', 'zenith_custom_auto_excerpt_length', 999 );

/**
 * Hex to rgb(a) converter function.
 * 
 * @since 1.0.0
 * @param string $color hex value.
 * @param decimal $opacity optional opacity decimal.
 * @return string rgba(a) value
 */
function zenith_hex2rgba( $color, $opacity = false ) {

    $default = 'rgb(0,0,0)';

    // Return default if no color provided
    if ( empty( $color ) ) { return $default; }

    // Sanitize $color if "#" is provided
    if ( $color[0] == '#' ) { $color = substr( $color, 1 ); }

    // Check if color has 6 or 3 characters and get values
    if ( strlen( $color ) == 6 ) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    // Convert hexadec to rgb
    $rgb =  array_map( 'hexdec', $hex );

    // Check if opacity is set(rgba or rgb)
    if( $opacity ) {

        if( abs( $opacity ) > 1 ) { $opacity = 1.0; }
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';

    } else {

        $output = 'rgb('.implode(",",$rgb).')';

    }

    // Return rgb(a) color string
    return $output;

}

/**
 * Retrieves the parallax preset (Layers) or parallax value (Vertical)
 * for the currently selected Custom Header template.
 * 
 * @since 1.0.0
 * @param string $style key to identify what to return.
 * @return either an associative array of percentages (Layers) or a single integer value (Vertical)
 */
function zenith_get_parallax_preset( $style = 'layers' ) {

    switch ( get_theme_mod( ZENITH_OPTIONS::CUSTOM_HEADER_PLX_INTENSITY, ZENITH_DEFAULTS::CUSTOM_HEADER_PLX_INTENSITY ) ) :
        
        case 'subtle' :
            $parallax_preset = array(
                'image_layer' => '20%',
                'texture_layer' => '4%',
                'color_layer' => '15%',
                'content_layer' => '0'
            );
            $parallax_value = 5;
            break;
        
        case 'high' :
            $parallax_preset = array(
                'image_layer' => '75%',
                'texture_layer' => '20%',
                'color_layer' => '60%',
                'content_layer' => '0'
            );
            $parallax_value = 2;
            break;
        
        default :
            $parallax_preset = array(
                'image_layer' => '50%',
                'texture_layer' => '10%',
                'color_layer' => '50%',
                'content_layer' => '0'
            );
            $parallax_value = 3;
        
    endswitch;
    
    return $style == 'vertical' ? $parallax_value : $parallax_preset ;

}

/**
 * Returns all posts as an array.
 * Pass true to include Pages
 * 
 * @param array $types - post types to retrieve
 * @return array of posts
 */
function zenith_all_posts_array( $types = array( 'post' ) ) {
    
    $posts = get_posts( array(
        'post_type'        => $types,
        'posts_per_page'   => -1,
        'post_status'      => 'publish',
        'orderby'          => 'title',
        'order'            => 'ASC',
    ));

    $posts_array = array(
        'none'  => __( 'None', 'zenith' ),
    );
    
    foreach ( $posts as $post ) :
        
        if ( ! empty( $post->ID ) ) :
            $posts_array[ $post->ID ] = $post->post_title;
        endif;
        
    endforeach;
    
    return $posts_array;
    
}

function zenith_features_install_url() {
    
    $slug = 'zenith-features';
    $nonce_key = 'install-plugin_' . $slug;
    
    
    // check if plugin is installed
    if ( ! function_exists( 'get_plugins' ) ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
    
    $plugins = get_plugins();
    $installed = false;
    
    foreach( $plugins as $plugin ) {
        
        if( 'Builder Features' == $plugin['Name'] ) {
            $installed = true;
        }
        
    }
    
    if( $installed ) {
        $install_url = self_admin_url( 'themes.php?page=tgmpa-install-plugins' );
    }else{
        $install_url = add_query_arg( array(
            'action'    => 'install-plugin',
            'plugin'    => $slug,
            '_wpnonce'  => wp_create_nonce( $nonce_key )
        ), self_admin_url( 'update.php' ) );
    }
    
    return esc_url( $install_url );
    
}

function zenith_dismiss_companion() {
    
    if( ! isset( $_POST['zenith_dismiss_nonce'] ) || ! wp_verify_nonce( $_POST['zenith_dismiss_nonce'], 'zenith_dismiss_nonce' ) ) {
        die( esc_html__( 'Invalid nonce', 'zenith' ) );
        return;
    }
    
    if( current_user_can( 'edit_theme_options' ) ) {
        set_theme_mod( ZENITH_OPTIONS::COMPANION_NOTICE_DISMISSED, true );
    }
    
    exit();   
}
add_action( 'wp_ajax_zenith_dismiss_companion', 'zenith_dismiss_companion' );


function zenith_is_single_sidebar_active( $template = 'page' ) {
 
    if ( $template != 'post' && $template != 'page' && $template != 'blog' ) { return false; }
    
    // Which template is this check for?
    if ( $template == 'post' || $template == 'page' ) :

        // Page & Post Sidebar
        
        if ( get_post_meta( get_the_ID(), ZENITH_META::SIDEBAR_TEMPLATE, true ) != 'none' && is_active_sidebar( get_post_meta( get_the_ID(), ZENITH_META::SIDEBAR_TEMPLATE, true ) ) ) :
            return true;                    
        else : 
            return false;
        endif;
        
    else :
        
        // Blog Sidebar
        
        return is_active_sidebar( 'sidebar-blog-side' );
    
    endif;
    
}
    

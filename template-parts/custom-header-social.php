<?php $header_image = get_header_image(); ?>

<div id="zenith-custom-header" class="marquee-header social zenith_parallax" data-plx-img="<?php echo esc_url( $header_image ); ?>">

    <div id="custom-header-overlay" class="<?php echo get_theme_mod( ZENITH_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_STYLE, ZENITH_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_STYLE ) == 'no' ? 'no' : esc_attr( get_theme_mod( ZENITH_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_STYLE, ZENITH_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_STYLE ) ); ?>">
    </div>

    <div id="custom-header-content" class="social-header" data-stellar-offset-parent="true">

        <div class="marquee">
        
            <div class="marquee-inner">
        
                <?php if ( get_theme_mod( ZENITH_OPTIONS::CUSTOM_HEADER_SHOW_LOGO, ZENITH_DEFAULTS::CUSTOM_HEADER_SHOW_LOGO ) && function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>

                    <?php the_custom_logo(); ?>

                <?php endif; ?>

                <?php if ( get_theme_mod( ZENITH_OPTIONS::CUSTOM_HEADER_SHOW_TITLE, ZENITH_DEFAULTS::CUSTOM_HEADER_SHOW_TITLE ) ) : ?>

                    <h2 class="custom-header-title textillate wow">

                        <?php 
                        switch ( get_theme_mod( ZENITH_OPTIONS::CUSTOM_HEADER_TITLE_CONTENT, ZENITH_DEFAULTS::CUSTOM_HEADER_TITLE_CONTENT ) ) :

                            case 'site_title' :
                                echo esc_html( get_bloginfo('name') );
                                break;

                            case 'site_description' :
                                echo esc_html( get_bloginfo('description') );
                                break;

                            default :
                                echo esc_html( get_bloginfo('name') );

                        endswitch; ?>

                    </h2>

                <?php endif; ?>
                
                <?php if ( get_theme_mod( ZENITH_OPTIONS::SOCIAL_HEADER_SHOW_SOCIAL, ZENITH_DEFAULTS::SOCIAL_HEADER_SHOW_SOCIAL ) ) : ?>

                    <div class="navbar-social">
                        
                        <?php if ( get_theme_mod( ZENITH_OPTIONS::SOCIAL_ICON_1, ZENITH_DEFAULTS::SOCIAL_ICON_1 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( ZENITH_OPTIONS::SOCIAL_URL_1, ZENITH_DEFAULTS::SOCIAL_URL_1 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( ZENITH_OPTIONS::SOCIAL_ICON_1, ZENITH_DEFAULTS::SOCIAL_ICON_1 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( ZENITH_OPTIONS::SOCIAL_ICON_2, ZENITH_DEFAULTS::SOCIAL_ICON_2 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( ZENITH_OPTIONS::SOCIAL_URL_2, ZENITH_DEFAULTS::SOCIAL_URL_2 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( ZENITH_OPTIONS::SOCIAL_ICON_2, ZENITH_DEFAULTS::SOCIAL_ICON_2 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( ZENITH_OPTIONS::SOCIAL_ICON_3, ZENITH_DEFAULTS::SOCIAL_ICON_3 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( ZENITH_OPTIONS::SOCIAL_URL_3, ZENITH_DEFAULTS::SOCIAL_URL_3 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( ZENITH_OPTIONS::SOCIAL_ICON_3, ZENITH_DEFAULTS::SOCIAL_ICON_3 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( ZENITH_OPTIONS::SOCIAL_ICON_4, ZENITH_DEFAULTS::SOCIAL_ICON_4 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( ZENITH_OPTIONS::SOCIAL_URL_4, ZENITH_DEFAULTS::SOCIAL_URL_4 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( ZENITH_OPTIONS::SOCIAL_ICON_4, ZENITH_DEFAULTS::SOCIAL_ICON_4 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( ZENITH_OPTIONS::SOCIAL_ICON_5, ZENITH_DEFAULTS::SOCIAL_ICON_5 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( ZENITH_OPTIONS::SOCIAL_URL_5, ZENITH_DEFAULTS::SOCIAL_URL_5 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( ZENITH_OPTIONS::SOCIAL_ICON_5, ZENITH_DEFAULTS::SOCIAL_ICON_5 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>

                    </div>

                <?php endif; ?>

            </div>
        
        </div>
        
        <?php if ( get_theme_mod( ZENITH_OPTIONS::SOCIAL_HEADER_SHOW_SCROLL_TAB, ZENITH_DEFAULTS::SOCIAL_HEADER_SHOW_SCROLL_TAB ) ) : ?>
        
            <div class="down-scroll-tab">
                <div id="down-scroll-tab-trigger">
                    <span class="fas fa-chevron-down"></span>
                    <span class="fas fa-chevron-down"></span>
                </div>
            </div>
        
        <?php endif; ?>
        
    </div>

</div>
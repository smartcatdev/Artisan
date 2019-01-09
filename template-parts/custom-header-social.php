<?php $header_image = get_header_image(); ?>

<div id="beyrouth-custom-header" class="marquee-header social beyrouth_parallax" data-plx-img="<?php echo esc_url( $header_image ); ?>">

    <div id="custom-header-overlay" class="<?php echo get_theme_mod( BEYROUTH_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_STYLE, BEYROUTH_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_STYLE ) == 'no' ? 'no' : esc_attr( get_theme_mod( BEYROUTH_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_STYLE, BEYROUTH_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_STYLE ) ); ?>">
    </div>

    <div id="custom-header-content" class="social-header" data-stellar-offset-parent="true">

        <div class="marquee">
        
            <div class="marquee-inner">

                <?php if ( get_theme_mod( BEYROUTH_OPTIONS::CUSTOM_HEADER_SHOW_TITLE, BEYROUTH_DEFAULTS::CUSTOM_HEADER_SHOW_TITLE ) ) : ?>

                    <?php if( get_theme_mod( BEYROUTH_OPTIONS::CUSTOM_HEADER_TITLE_CONTENT, BEYROUTH_DEFAULTS::CUSTOM_HEADER_TITLE_CONTENT ) == 'both' ) : ?>

                        <h2 class="custom-header-title textillate wow">
                            <?php echo esc_html( get_bloginfo('name') ); ?>
                        </h2>

                        <h3 class="custom-header-title custom-header-subtitle textillate wow">
                            <?php echo esc_html( get_bloginfo('description') ); ?>
                        </h3>

                    <?php elseif( get_theme_mod( BEYROUTH_OPTIONS::CUSTOM_HEADER_TITLE_CONTENT, BEYROUTH_DEFAULTS::CUSTOM_HEADER_TITLE_CONTENT ) == 'site_title' ) : ?>
                        <h2 class="custom-header-title textillate wow">
                            <?php echo esc_html( get_bloginfo('name') ); ?>
                        </h2>
                    <?php else : ?>

                        <h2 class="custom-header-title textillate wow">
                            <?php echo esc_html( get_bloginfo('description') ); ?>
                        </h2>

                    <?php endif; ?>

                <?php endif; ?>
                
                <?php if ( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_HEADER_SHOW_SOCIAL, BEYROUTH_DEFAULTS::SOCIAL_HEADER_SHOW_SOCIAL ) ) : ?>

                    <div class="navbar-social">
                        
                        <?php if ( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_ICON_1, BEYROUTH_DEFAULTS::SOCIAL_ICON_1 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_URL_1, BEYROUTH_DEFAULTS::SOCIAL_URL_1 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_ICON_1, BEYROUTH_DEFAULTS::SOCIAL_ICON_1 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_ICON_2, BEYROUTH_DEFAULTS::SOCIAL_ICON_2 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_URL_2, BEYROUTH_DEFAULTS::SOCIAL_URL_2 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_ICON_2, BEYROUTH_DEFAULTS::SOCIAL_ICON_2 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_ICON_3, BEYROUTH_DEFAULTS::SOCIAL_ICON_3 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_URL_3, BEYROUTH_DEFAULTS::SOCIAL_URL_3 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_ICON_3, BEYROUTH_DEFAULTS::SOCIAL_ICON_3 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_ICON_4, BEYROUTH_DEFAULTS::SOCIAL_ICON_4 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_URL_4, BEYROUTH_DEFAULTS::SOCIAL_URL_4 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_ICON_4, BEYROUTH_DEFAULTS::SOCIAL_ICON_4 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_ICON_5, BEYROUTH_DEFAULTS::SOCIAL_ICON_5 ) != '' ) : ?>
                            <a class="navbar-icon" href="<?php echo esc_url( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_URL_5, BEYROUTH_DEFAULTS::SOCIAL_URL_5 ) ); ?>">
                                <span class="fab <?php echo esc_attr( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_ICON_5, BEYROUTH_DEFAULTS::SOCIAL_ICON_5 ) ); ?>"></span>
                            </a>
                        <?php endif; ?>

                    </div>

                <?php endif; ?>

            </div>
        
        </div>
        
        <?php if ( get_theme_mod( BEYROUTH_OPTIONS::SOCIAL_HEADER_SHOW_SCROLL_TAB, BEYROUTH_DEFAULTS::SOCIAL_HEADER_SHOW_SCROLL_TAB ) ) : ?>
        
            <div class="down-scroll-tab">
                <div id="down-scroll-tab-trigger">
                    <span class="fas fa-chevron-down"></span>
                    <span class="fas fa-chevron-down"></span>
                </div>
            </div>
        
        <?php endif; ?>
        
    </div>

</div>
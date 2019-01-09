<header id="masthead" class="site-header header-style-vertical">

    <div id="slim-header-wrap">

        <div id="slim-header">
    
            <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>

                <div id="custom-logo-wrap" class="has-logo <?php echo ! get_theme_mod( BEYROUTH_OPTIONS::NAVBAR_ALWAYS_SHOW_LOGO, BEYROUTH_DEFAULTS::NAVBAR_ALWAYS_SHOW_LOGO ) ? 'sometimes-hidden' : ''; ?>">
            
                    <?php the_custom_logo(); ?>

                </div>
                    
            <?php else : ?> 
            
                <div id="custom-logo-wrap" class="<?php echo ! get_theme_mod( BEYROUTH_OPTIONS::NAVBAR_ALWAYS_SHOW_LOGO, BEYROUTH_DEFAULTS::NAVBAR_ALWAYS_SHOW_LOGO ) ? 'sometimes-hidden' : ''; ?>">
            
                    <div class="site-branding">
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url() ); ?>">
                                <?php echo esc_html( get_bloginfo('name') ); ?>
                            </a>
                        </h1>
                        <?php if ( get_bloginfo( 'name' ) ) : ?>
                            <p class="site-tagline">
                                <a href="<?php echo esc_url( home_url() ); ?>">
                                    <?php echo esc_html( get_bloginfo( 'description' ) ); ?>
                                </a>
                            </p>
                        <?php endif; ?>
                    </div>

                </div>
            
            <?php endif; ?> 
            
            <?php if ( get_theme_mod( BEYROUTH_OPTIONS::NAVBAR_SHOW_SOCIAL, BEYROUTH_DEFAULTS::NAVBAR_SHOW_SOCIAL ) ) : ?>
            
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
            
            <?php do_action( 'beyrouth_mobile_menu' ); ?>
            
        </div>
    
    </div>
    
    <div id="vertical-header-wrap" class="<?php echo get_theme_mod( BEYROUTH_OPTIONS::VERT_NAVBAR_DISPLAY_SETTING, BEYROUTH_DEFAULTS::VERT_NAVBAR_DISPLAY_SETTING ) == 'always'? 'always-visible expanded' : ''; ?>">
        
        <?php if ( get_theme_mod( BEYROUTH_OPTIONS::VERT_NAVBAR_DISPLAY_SETTING, BEYROUTH_DEFAULTS::VERT_NAVBAR_DISPLAY_SETTING ) == 'toggled' ) : ?>
            <span id="vertical-menu-toggle-wrap">
                <div id="vertical-menu-toggle">
                    <div class="bar"></div>
                </div>
            </span>
        <?php endif; ?>
    
        <?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>

            <div id="custom-logo-wrap" class="has-logo">

                <?php the_custom_logo(); ?>

            </div>

        <?php else : ?> 

            <div id="custom-logo-wrap">

                <div class="site-branding">
                    <h1 class="site-title">
                        <a href="<?php echo esc_url( home_url() ); ?>">
                            <?php echo esc_html( get_bloginfo('name') ); ?>
                        </a>
                    </h1>
                    <?php if ( get_bloginfo( 'name' ) ) : ?>
                        <p class="site-tagline">
                            <a href="<?php echo esc_url( home_url() ); ?>">
                                <?php echo esc_html( get_bloginfo( 'description' ) ); ?>
                            </a>
                        </p>
                    <?php endif; ?>
                </div>

            </div>

        <?php endif; ?> 

        <?php if ( get_theme_mod( BEYROUTH_OPTIONS::NAVBAR_SHOW_SOCIAL, BEYROUTH_DEFAULTS::NAVBAR_SHOW_SOCIAL ) ) : ?>

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
        
        <div id="vertical-header-menu-wrap">
        
            <div id="vert-nav-slim-scroll-wrap">

                <?php if ( has_nav_menu( 'primary-menu' ) ) : ?>

                    <?php wp_nav_menu( array( 
                        'theme_location'    => 'primary-menu', 
                        'menu_id'           => 'vertical-header-primary',
                        'menu_class'        => 'vertical-header-menu' 
                    ) ); ?>

                <?php else : ?>

                    <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>

                        <ul id="vertical-header-primary" class="vertical-header-menu">

                            <li class="menu-item menu-item-type-custom menu-item-object-custom">

                                <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">
                                   <?php esc_html_e( 'Add a Primary Menu?', 'beyrouth' ); ?>
                                </a>

                            </li>

                        </ul>

                    <?php endif; ?>

                <?php endif; ?>

            </div>
            
        </div>
        
        <div id="footer-branding-wrap">

            <?php if ( get_theme_mod( BEYROUTH_OPTIONS::FOOTER_SHOW_BRANDING, BEYROUTH_DEFAULTS::FOOTER_SHOW_BRANDING ) ) : ?>

                <?php if ( get_theme_mod( BEYROUTH_OPTIONS::FOOTER_BRANDING_TYPE, BEYROUTH_DEFAULTS::FOOTER_BRANDING_TYPE ) == 'alt_logo' ) : ?>

                    <?php if ( get_theme_mod( BEYROUTH_OPTIONS::FOOTER_ALTERNATE_LOGO, BEYROUTH_DEFAULTS::FOOTER_ALTERNATE_LOGO ) && get_theme_mod( BEYROUTH_OPTIONS::FOOTER_ALTERNATE_LOGO, BEYROUTH_DEFAULTS::FOOTER_ALTERNATE_LOGO ) != '' ) : ?>

                        <img class="custom-logo alternate" src="<?php echo esc_url( get_theme_mod( BEYROUTH_OPTIONS::FOOTER_ALTERNATE_LOGO, BEYROUTH_DEFAULTS::FOOTER_ALTERNATE_LOGO ) ); ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">

                    <?php endif; ?>

                <?php else : ?>

                    <h3 class="site-title">
                        <?php echo esc_html( get_bloginfo('name') ); ?>
                    </h3>

                <?php endif; ?>

            <?php endif; ?>

            <?php if ( get_theme_mod( BEYROUTH_OPTIONS::FOOTER_SHOW_COPYRIGHT, BEYROUTH_DEFAULTS::FOOTER_SHOW_COPYRIGHT ) ) : ?>

                <div class="footer-copyright">
                    <?php echo esc_html( get_theme_mod( BEYROUTH_OPTIONS::FOOTER_COPYRIGHT_TAGLINE, BEYROUTH_DEFAULTS::FOOTER_COPYRIGHT_TAGLINE ) ); ?>
                </div>

            <?php endif; ?>

            <?php do_action('beyrouth_designer'); ?>

        </div>

    </div>
        
</header>
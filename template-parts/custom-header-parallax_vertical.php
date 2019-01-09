<?php $header_image = get_header_image(); ?>

<div id="beyrouth-custom-header" class="beyrouth_parallax" data-plx-img="<?php echo esc_url( $header_image ); ?>">

    <div id="custom-header-overlay" class="<?php echo get_theme_mod( BEYROUTH_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_STYLE, BEYROUTH_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_STYLE ) == 'no' ? '' : esc_attr( get_theme_mod( BEYROUTH_OPTIONS::CUSTOM_HEADER_COLOR_LAYER_STYLE, BEYROUTH_DEFAULTS::CUSTOM_HEADER_COLOR_LAYER_STYLE ) ); ?>">
    </div>

    <div id="custom-header-content" data-stellar-offset-parent="true">

        <div class="container">

            <div class="row">

                <div class="col-sm-8 col-sm-offset-2">

                    <div class="util-tbl-wrap" style="">

                        <div class="util-tbl-inner util-vert-mid text-center">
                            
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

                            <?php if ( get_theme_mod( BEYROUTH_OPTIONS::CUSTOM_HEADER_SHOW_MENU, BEYROUTH_DEFAULTS::CUSTOM_HEADER_SHOW_MENU ) ) : ?>

                                <?php if ( has_nav_menu( 'custom-header' ) ) : ?>

                                    <?php wp_nav_menu( array( 
                                        'theme_location'    => 'custom-header', 
                                        'menu_id'           => 'custom-header-menu',
                                    ) ); ?>

                                <?php else : ?>

                                    <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>

                                        <ul id="custom-header-menu">

                                            <li class="menu-item menu-item-type-custom menu-item-object-custom">

                                                <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>">
                                                   <?php esc_html_e( 'Add a Custom Header Menu?', 'beyrouth' ); ?>
                                                </a>

                                            </li>

                                        </ul>

                                    <?php endif; ?>

                                <?php endif; ?>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
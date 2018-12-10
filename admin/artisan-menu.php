<div class="wrap" id="artisan-docs">
    
    <h2>
        <?php esc_html_e( 'Artisan Theme Guide & Documentation', 'artisan' ); ?>
    </h2>
    
    <div id="artisan-flex-wrap">
    
        <div id="artisan-docs-menu">
            
            <ul class="parent-nav">

                <?php artisan_docs_tab( '#welcome', __( 'Welcome to Artisan', 'artisan' ) ); ?>

                <?php artisan_docs_tab( '#setup', __( 'Quick-Start Guide', 'artisan' ), array(
                    '#choose-navbar'            => __( 'Navbar', 'artisan' ),
                    '#add-menu'                 => __( 'Menus', 'artisan' ),
                    '#setup-blog'               => __( 'Blog', 'artisan' ),
                    '#customize-header'         => __( 'Header', 'artisan' ),
                    '#page-templates'           => __( 'Page Templates', 'artisan' ),
                    '#theme-presets'            => __( 'Theme Presets', 'artisan' ),
                ) ); ?>

                <?php if ( !function_exists( '\artisan_pro\init' ) ) : ?>
                    <li>
                        <a href="<?php echo esc_url( admin_url( 'themes.php?page=artisan-theme-upgrade' ) ); ?>">
                            <?php _e( 'Artisan Pro', 'artisan' ) ?>
                        </a>
                    </li>
                <?php endif; ?>
                

                
            </ul>

        </div>

        <div id="artisan-docs-content">
            
            <?php if( !function_exists( 'artisan\init' ) ) : ?>
            <div id="artisan-features-notice">

                <h3>
                    <span class="fas fa-lightbulb icon-rotate"></span>
                    <?php esc_html_e( 'Artisan Features', 'artisan' ); ?>
                </h3>
                <p>
                    <?php esc_html_e( 'It seems that you have not yet installed the Artisan Features plugin. It is highly recommended to install the plugin. It includes 3 header styles, 3 blog styles, over 140 customization options, one-click install theme-presets and 6 advanced widgets, completely free!', 'artisan' ); ?>
                </p>

            </div>
            <?php endif; ?>

            <div id="welcome">
                <?php artisan_render_doc( 'welcome' ); ?>
            </div>

            <div id="setup">
                <?php artisan_render_doc( 'setup' ); ?>
            </div>

        </div>
        
    </div>
    
</div>
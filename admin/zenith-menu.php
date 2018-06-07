<div class="wrap" id="zenith-docs">
    
    <h2>
        <?php esc_html_e( 'Zenith Theme Guide & Documentation', 'zenith' ); ?>
    </h2>
    
    <div id="zenith-flex-wrap">
    
        <div id="zenith-docs-menu">
            
            <ul class="parent-nav">

                <?php zenith_docs_tab( '#welcome', __( 'Welcome to Zenith', 'zenith' ) ); ?>

                <?php zenith_docs_tab( '#setup', __( 'Quick-Start Guide', 'zenith' ), array(
                    '#choose-navbar'            => __( 'Navbar', 'zenith' ),
                    '#add-menu'                 => __( 'Menus', 'zenith' ),
                    '#setup-blog'               => __( 'Blog', 'zenith' ),
                    '#customize-header'         => __( 'Header', 'zenith' ),
                    '#page-templates'           => __( 'Page Templates', 'zenith' ),
                    '#theme-presets'            => __( 'Theme Presets', 'zenith' ),
                ) ); ?>

                <?php if ( !function_exists( '\zenith_pro\init' ) ) : ?>
                    <li>
                        <a href="<?php echo esc_url( admin_url( 'themes.php?page=zenith-theme-upgrade' ) ); ?>">
                            <?php _e( 'Zenith Pro', 'zenith' ) ?>
                        </a>
                    </li>
                <?php endif; ?>
                

                
            </ul>

        </div>

        <div id="zenith-docs-content">
            
            <?php if( !function_exists( 'zenith\init' ) ) : ?>
            <div id="zenith-features-notice">

                <h3>
                    <span class="fas fa-lightbulb icon-rotate"></span>
                    <?php esc_html_e( 'Zenith Features', 'zenith' ); ?>
                </h3>
                <p>
                    <?php esc_html_e( 'It seems that you have not yet installed the Zenith Features plugin. It is highly recommended to install the plugin. It includes 3 header styles, 3 blog styles, over 140 customization options, one-click install theme-presets and 6 advanced widgets, completely free!', 'zenith' ); ?>
                </p>

            </div>
            <?php endif; ?>

            <div id="welcome">
                <?php zenith_render_doc( 'welcome' ); ?>
            </div>

            <div id="setup">
                <?php zenith_render_doc( 'setup' ); ?>
            </div>

        </div>
        
    </div>
    
</div>
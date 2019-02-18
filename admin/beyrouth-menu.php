<div class="wrap" id="beyrouth-docs">
    
    <h2>
        <?php esc_html_e( 'Beyrouth Theme Guide & Documentation', 'beyrouth' ); ?>
    </h2>
    
    <div id="beyrouth-flex-wrap">
    
        <div id="beyrouth-docs-menu">
            
            <ul class="parent-nav">

                <?php beyrouth_docs_tab( '#welcome', __( 'Welcome to Beyrouth', 'beyrouth' ) ); ?>

                <?php beyrouth_docs_tab( '#setup', __( 'Quick-Start Guide', 'beyrouth' ), array(
                    '#choose-navbar'            => __( 'Navbar', 'beyrouth' ),
                    '#add-menu'                 => __( 'Menus', 'beyrouth' ),
                    '#setup-blog'               => __( 'Blog', 'beyrouth' ),
                    '#customize-header'         => __( 'Header', 'beyrouth' ),
                    '#page-templates'           => __( 'Page Templates', 'beyrouth' ),
                    '#theme-presets'            => __( 'Theme Presets', 'beyrouth' ),
                ) ); ?>
                
            </ul>

        </div>

        <div id="beyrouth-docs-content">
            
            <?php if( !function_exists( 'beyrouth\init' ) ) : ?>
            <div id="beyrouth-features-notice">

                <h3>
                    <span class="fas fa-lightbulb icon-rotate"></span>
                    <?php esc_html_e( 'Beyrouth Features', 'beyrouth' ); ?>
                </h3>
                <p>
                    <?php esc_html_e( 'It seems that you have not yet installed the Beyrouth Features plugin. It is highly recommended to install the plugin. It includes 3 header styles, 3 blog styles, over 140 customization options, one-click install theme-presets and 6 advanced widgets, completely free!', 'beyrouth' ); ?>
                </p>

            </div>
            <?php endif; ?>

            <div id="welcome">
                <?php beyrouth_render_doc( 'welcome' ); ?>
            </div>

            <div id="setup">
                <?php beyrouth_render_doc( 'setup' ); ?>
            </div>

        </div>
        
    </div>
    
</div>
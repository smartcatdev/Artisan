<section class="sub-section">

    <h3 id="customize-header" class="sub-heading">
        <?php esc_html_e( 'Header', 'zenith' ); ?>
    </h3>
    
    <p>
        <?php esc_html_e( 'The custom header is a full-screen section that you can optionally display everywhere on your site, or on specific templates only. You can select an image, set the size, and turn enable one of 2 parallax styles. Additionally, you can place a logo, site title, site desctipion and a menu.', 'zenith' ); ?>
    </p>
    
    <img alt="<?php esc_attr_e( 'Header', 'zenith' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/header.jpg' ); ?>">
    
    <div class="nested-subsection">
    
        <?php $query['autofocus[section]'] = 'section_custom_header_general';
        $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
        
        <h4>
            <?php esc_html_e( 'Parallax Style: Vertical Scroll', 'zenith' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php esc_html_e( 'You can choose to use this header Parallax Style by selecting it under Header > General Settings. The "Vertical Scroll" style is a traditional parallax effect, where the background image of the header will appear to move at a different rate from the content as the user scrolls down the page.', 'zenith' ); ?>
            </p>

            <span class="options-heading">
                <?php esc_html_e( 'Options:', 'zenith' ); ?>
            </span>
            <ul class="options-list">
                <li><?php esc_html_e( 'How to Calculate Height (Percentage or Pixels)', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Height Settings (Desktop & Mobile)', 'zenith' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php esc_html_e( 'Parallax Intensity', 'zenith' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php esc_html_e( 'Show in Customizer', 'zenith' ); ?> <span class="fas fa-chevron-right"></span></a>
            
        </div>
        
    </div>
        
    <div class="nested-subsection">
    
        <?php $query['autofocus[section]'] = 'section_custom_header_general';
        $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
        
        <h4>
            <?php esc_html_e( 'Parallax Style: Perspective Layers', 'zenith' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php esc_html_e( 'You can choose to use this header Parallax Style by selecting it under Header > General Settings. The "Perspective Layers" style is a parallax effect that outputs three layers (your header image, then optional pattern and color overlay layers) that move at different speeds in response to the mouse cursor location.', 'zenith' ); ?>
            </p>

            <span class="options-heading">
                <?php esc_html_e( 'Options:', 'zenith' ); ?>
            </span>
            <ul class="options-list">
                <li><?php esc_html_e( 'How to Calculate Height (Percentage or Pixels)', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Height Settings (Desktop & Mobile)', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Parallax Intensity', 'zenith' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php esc_html_e( 'Transparent Pattern/Texture Image', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Transparent Pattern/Texture Opacity', 'zenith' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php esc_html_e( 'Show in Customizer', 'zenith' ); ?> <span class="fas fa-chevron-right"></span></a>
            
        </div>
        
    </div>
        
    <div class="nested-subsection">
    
        <h4>
            <?php esc_html_e( 'Header: Overall Settings', 'zenith' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php esc_html_e( 'The Zenith Header features many customizable options, including toggles to determine where the Header is shown and what is displayed within it, and color and gradient settings for the overlay. Some of these settings are only available for certain Parallax Styles, so be sure to look through the options after selecting one to see what is available for you to customize.', 'zenith' ); ?>
            </p>

            <span class="options-heading">
                <?php esc_html_e( 'Options:', 'zenith' ); ?>
            </span>
            <ul class="options-list">
                <li>
                    <?php $query['autofocus[section]'] = 'section_custom_header';
                    $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
                    <a href="<?php echo esc_url( $section_link ); ?>">
                        <?php esc_html_e( 'Display Locations to set which templates include the Header', 'zenith' ); ?>
                    </a>
                </li>
                <li>
                    <?php $query['autofocus[section]'] = 'section_custom_header_logo';
                    $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
                    <a href="<?php echo esc_url( $section_link ); ?>">
                        <?php esc_html_e( 'Content settings that determine what is shown in the Header', 'zenith' ); ?>
                    </a>
                </li>
            </ul>
            <ul class="options-list">
                <li>
                    <?php $query['autofocus[section]'] = 'section_custom_header_menu';
                    $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
                    <a href="<?php echo esc_url( $section_link ); ?>">
                        <?php esc_html_e( 'Header Menu Settings', 'zenith' ); ?>
                    </a>
                </li>
                <li>
                    <?php $query['autofocus[section]'] = 'section_custom_header_plx_vertical';
                    $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
                    <a href="<?php echo esc_url( $section_link ); ?>">
                        <?php esc_html_e( 'Color or Gradient Overlay Settings', 'zenith' ); ?>
                    </a>
                </li>
            </ul>
            <div class="clear"></div>
            
        </div>
        
    </div>
        
</section>
<section class="sub-section">

    <h3 id="choose-navbar" class="sub-heading">
        <?php esc_html_e( 'Navbar', 'zenith' ); ?>
    </h3>
    
    <p>
        <?php esc_html_e( 'One of the first things you\'ll want to do when building your site with Zenith is to decide which of the Navbars you want to use. The Navbar appears at the top of every page of your website, and contains your site\'s branding and navigation menus.', 'zenith' ); ?>
        <?php esc_html_e( 'The three Navbar styles are: "Slim - Centered & Split", "Slim - Left Aligned", and "Banner".', 'zenith' ); ?>
    </p>
    
    <div class="nested-subsection">
    
        <?php $query['autofocus[section]'] = 'section_nav_general';
        $section_link = add_query_arg( $query, admin_url( 'customize.php' ) ); ?>
        
        <h4>
            <?php esc_html_e( 'Slim - Left Aligned', 'zenith' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php esc_html_e( 'This is the default Navbar style that is set when you first install Zenith. It aligns the branding (logo or site title & tagline) and menu to the left side, and if social media links are available it will display them along the right side. It has a single Menu Location ("Navbar: Slim - Primary").', 'zenith' ); ?>
            </p>

            <img alt="<?php esc_attr_e( 'Navbar: Slim - Left Aligned', 'zenith' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/navbars/navbar_slim_left.jpg' ); ?>">
            
            <span class="options-heading">
                <?php esc_html_e( 'Options:', 'zenith' ); ?>
            </span>
            <ul class="options-list">
                <li><?php esc_html_e( 'Links - Font Family', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Links - Font Size', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Links - Spacing', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Social Links Toggle', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Navbar Shadow Toggle', 'zenith' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php esc_html_e( 'Navbar Height (Initial & Sticky)', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Right Align Menu Toggle', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Boxed Content Toggle', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Final Link as Button Toggle', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Color Settings (Foreground & Background)', 'zenith' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php esc_html_e( 'Show in Customizer', 'zenith' ); ?> <span class="fas fa-chevron-right"></span></a>
            
            <div class="tip-bubble">
                <p>
                    <span class="how-do"><?php esc_html_e( 'Pro-Tip', 'zenith' ); ?></span>
                    <?php esc_html_e( 'Both "Slim" Navbar styles have two height values that can be set, "Initial" and "Sticky". The initial height transitions to the sticky height when the user scrolls down the page and the Navbar becomes stuck to the top of the browser. By using different values you can cause the Navbar to expand or become more compact as it becomes stuck.', 'zenith' ); ?>
                </p>
            </div>
            
        </div>
        
    </div>
    
    <div class="nested-subsection">
        
        <h4>
            <?php esc_html_e( 'Slim - Centered & Split', 'zenith' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php esc_html_e( 'This Navbar style is similar to the "Slim - Left Aligned" style, but the primary difference is that this style centers the branding in the middle of the Navbar, and features two different Menu Locations ("Navbar: Split - Left" & "Navbar: Split - Right"), which appear on opposite sides of the branding. It also displays the social link section differently - the icons appear within a drawer that slides open by clicking on a plus sign button on the right side of the Navbar.', 'zenith' ); ?>
            </p>

            <img alt="<?php esc_attr_e( 'Navbar: Slim - Centered & Split', 'zenith' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/navbars/navbar_slim_split.jpg' ); ?>">
            
            <span class="options-heading">
                <?php esc_html_e( 'Options:', 'zenith' ); ?>
            </span>
            <ul class="options-list">
                <li><?php esc_html_e( 'Links - Font Family', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Links - Font Size', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Links - Spacing', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Social Links Toggle', 'zenith' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php esc_html_e( 'Navbar Shadow Toggle', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Navbar Height (Initial & Sticky)', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Final Link as Button Toggle', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Color Settings (Foreground & Background)', 'zenith' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php esc_html_e( 'Show in Customizer', 'zenith' ); ?> <span class="fas fa-chevron-right"></span></a>
            
        </div>
        
    </div>
    
    <div class="nested-subsection">
        
        <h4>
            <?php esc_html_e( 'Banner', 'zenith' ); ?>
        </h4>
        
        <div class="nested-subsection-inner">
        
            <p>
                <?php esc_html_e( 'The "Banner" Navbar style features more of an expanded, stacked Navbar layout than its "Slim" siblings. It comes with controls for horizontally aligning both the menu and the branding (independently). It has a single Menu Location ("Navbar: Banner - Primary"), which appears below the branding. There are settings to fine-tune the space above and below the branding (for both Desktop and Mobile).', 'zenith' ); ?>
            </p>

            <img alt="<?php esc_attr_e( 'Navbar: Banner', 'zenith' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/navbars/navbar_banner.jpg' ); ?>">
            
            <span class="options-heading">
                <?php esc_html_e( 'Options:', 'zenith' ); ?>
            </span>
            <ul class="options-list">
                <li><?php esc_html_e( 'Links - Font Family', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Links - Font Size', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Links - Spacing', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Navbar Shadow Toggle', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Transparent Menu Toggle', 'zenith' ); ?></li>
            </ul>
            <ul class="options-list">
                <li><?php esc_html_e( 'Final Link as Button Toggle', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Branding Alignment', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Menu Alignment', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Spacing Above & Below Branding (Desktop & Mobile)', 'zenith' ); ?></li>
                <li><?php esc_html_e( 'Color Settings (Foreground & Background)', 'zenith' ); ?></li>
            </ul>
            <div class="clear"></div>
            
            <a class="cstmzr-link" href="<?php echo esc_url( $section_link ); ?>"><?php esc_html_e( 'Show in Customizer', 'zenith' ); ?> <span class="fas fa-chevron-right"></span></a>
            
        </div>
        
    </div>
        
</section>
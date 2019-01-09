<h2 class="section-heading">
    <?php esc_html_e( 'Quick-Start Guide', 'beyrouth' ); ?>
</h2>

<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=beyrouth-theme-info#choose-navbar' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Select a Navbar', 'beyrouth' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/beyrouth_qs_navbar.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=beyrouth-theme-info#add-menu' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Adding Your Menus', 'beyrouth' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/beyrouth_qs_menus.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=beyrouth-theme-info#setup-blog' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Select a Blog Layout', 'beyrouth' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/beyrouth_qs_blog.jpg' ); ?>">
    </a>
</div>

<div class="clear"></div>

<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=beyrouth-theme-info#customize-header' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Setting Up Your Header', 'beyrouth' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/beyrouth_qs_header.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=beyrouth-theme-info#page-templates' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Using Page Templates', 'beyrouth' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/beyrouth_qs_templates.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=beyrouth-theme-info#theme-presets' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Using Theme Presets', 'beyrouth' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/beyrouth_qs_presets.jpg' ); ?>">
    </a>
</div>

<div class="clear"></div>

<?php beyrouth_render_doc( 'navbar' ); ?>

<?php beyrouth_render_doc( 'menus' ); ?>

<?php beyrouth_render_doc( 'blog' ); ?>

<?php beyrouth_render_doc( 'custom_header' ); ?>

<?php beyrouth_render_doc( 'page_templates' ); ?>

<?php beyrouth_render_doc( 'theme_presets' ); ?>
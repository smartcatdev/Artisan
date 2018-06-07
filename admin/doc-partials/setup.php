<h2 class="section-heading">
    <?php esc_html_e( 'Quick-Start Guide', 'zenith' ); ?>
</h2>

<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=zenith-theme-info#choose-navbar' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Select a Navbar', 'zenith' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/zenith_qs_navbar.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=zenith-theme-info#add-menu' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Adding Your Menus', 'zenith' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/zenith_qs_menus.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=zenith-theme-info#setup-blog' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Select a Blog Layout', 'zenith' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/zenith_qs_blog.jpg' ); ?>">
    </a>
</div>

<div class="clear"></div>

<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=zenith-theme-info#customize-header' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Setting Up Your Header', 'zenith' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/zenith_qs_header.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=zenith-theme-info#page-templates' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Using Page Templates', 'zenith' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/zenith_qs_templates.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=zenith-theme-info#theme-presets' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Using Theme Presets', 'zenith' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/zenith_qs_presets.jpg' ); ?>">
    </a>
</div>

<div class="clear"></div>

<?php zenith_render_doc( 'navbar' ); ?>

<?php zenith_render_doc( 'menus' ); ?>

<?php zenith_render_doc( 'blog' ); ?>

<?php zenith_render_doc( 'custom_header' ); ?>

<?php zenith_render_doc( 'page_templates' ); ?>

<?php zenith_render_doc( 'theme_presets' ); ?>
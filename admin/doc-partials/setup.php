<h2 class="section-heading">
    <?php esc_html_e( 'Quick-Start Guide', 'artisan' ); ?>
</h2>

<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=artisan-theme-info#choose-navbar' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Select a Navbar', 'artisan' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/artisan_qs_navbar.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=artisan-theme-info#add-menu' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Adding Your Menus', 'artisan' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/artisan_qs_menus.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=artisan-theme-info#setup-blog' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Select a Blog Layout', 'artisan' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/artisan_qs_blog.jpg' ); ?>">
    </a>
</div>

<div class="clear"></div>

<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=artisan-theme-info#customize-header' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Setting Up Your Header', 'artisan' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/artisan_qs_header.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=artisan-theme-info#page-templates' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Using Page Templates', 'artisan' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/artisan_qs_templates.jpg' ); ?>">
    </a>
</div>
<div class="quickstart-cta">
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=artisan-theme-info#theme-presets' ) ); ?>">
        <img alt="<?php esc_attr_e( 'Using Theme Presets', 'artisan' ); ?>" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/docs/quick_start/artisan_qs_presets.jpg' ); ?>">
    </a>
</div>

<div class="clear"></div>

<?php artisan_render_doc( 'navbar' ); ?>

<?php artisan_render_doc( 'menus' ); ?>

<?php artisan_render_doc( 'blog' ); ?>

<?php artisan_render_doc( 'custom_header' ); ?>

<?php artisan_render_doc( 'page_templates' ); ?>

<?php artisan_render_doc( 'theme_presets' ); ?>
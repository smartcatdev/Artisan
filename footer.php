<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Artisan
 */

?>

    </div><!-- #content -->

    <?php if ( get_theme_mod( ARTISAN_OPTIONS::NAVBAR_STYLE, ARTISAN_DEFAULTS::NAVBAR_STYLE ) != 'vertical' ) : ?>
        <?php get_template_part( 'template-parts/footer', 'slim' ); ?>
    <?php endif; ?>

    <?php if ( get_theme_mod( ARTISAN_OPTIONS::NAVBAR_STYLE, ARTISAN_DEFAULTS::NAVBAR_STYLE ) == 'vertical' ) : ?>
        </div>
    <?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

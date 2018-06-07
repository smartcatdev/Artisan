<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zenith
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if ( is_singular() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;

        if ( 'post' === get_post_type() ) :
            ?>
            <div class="entry-meta">
                <?php
                zenith_posted_on();
                zenith_posted_by();
                ?>
            </div><!-- .entry-meta -->
        <?php endif;
        
        do_action( 'zenith_social_icons' );
        
        ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content( sprintf(
                        wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'zenith' ), array (
            'span' => array (
                'class' => array (),
            ),
                                )
                        ), get_the_title()
        ) );

        wp_link_pages( array (
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zenith' ),
            'after' => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php zenith_entry_footer(); ?>
    </footer><!-- .entry-footer -->
    
    <?php 
    
    if ( get_theme_mod( ZENITH_OPTIONS::SINGLE_POST_SHOW_NAVIGATION, ZENITH_DEFAULTS::SINGLE_POST_SHOW_NAVIGATION ) ) :
    
        the_post_navigation(); ?>
    
        <div class="clear"></div>
    
        <?php 
        
    endif;
    
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    
    ?>
    
</article><!-- #post-<?php the_ID(); ?> -->
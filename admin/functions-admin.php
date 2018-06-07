<?php
/**
 * 
 * Functions available for the zenith admin menu
 * 
 */

add_action( 'admin_enqueue_scripts', 'zenith_load_admin_css' );


function zenith_load_admin_css( $hook ) {
    
    // Enqueue fonts and css only on this page
    if( 'appearance_page_zenith-theme-info' == $hook ) {
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/lib/font-awesome/fontawesome-all.min.css', array(), ZENITH_VERSION );
        wp_enqueue_style( 'zenith-admin-fonts', '//fonts.googleapis.com/css?family=Lato:300,700,900', array(), ZENITH_VERSION );
        wp_enqueue_style( 'zenith-admin-css', get_template_directory_uri() . '/assets/admin/css/docs.css', array(), ZENITH_VERSION );
    }
    
    // Uploader JS & CSS
    if ( in_array( $hook, array( 'post.php', 'post-new.php') ) ) {
        
        $screen = get_current_screen();

        if( is_object( $screen ) && 'download' == $screen->post_type ) {

            wp_enqueue_style( 'zenith-media-uploader', get_template_directory_uri() . '/assets/admin/css/uploader.css', array(), ZENITH_VERSION );
            wp_enqueue_script( 'zenith-media-uploader', get_template_directory_uri() . '/assets/lib/wp-media-uploader/wp_media_uploader.js', array( 'jquery' ), ZENITH_VERSION );
            wp_enqueue_script( 'zenith-admin-script', get_template_directory_uri() . '/assets/admin/js/admin.js', array( 'jquery', 'jquery-ui-sortable', 'zenith-media-uploader' ), ZENITH_VERSION );
            
        }
        
    }
    
}

function zenith_docs_partial( $file ) {
    return trailingslashit( get_template_directory() ) . 'admin/doc-partials/' . $file . '.php';
}

function zenith_render_doc( $filename ) {
    
    if( file_exists( zenith_docs_partial( $filename ) ) ) {
        require zenith_docs_partial( $filename );
    }
    
}

function zenith_docs_tab( $jump_link, $label, $children = null ) { ?>
    
<li>
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=zenith-theme-info' . $jump_link ) ); ?>">
        <?php echo esc_html( $label ); ?>
    </a>
    
    <?php if( is_array( $children ) ) : ?>
        
    <ul class="child-nav">
        
        <?php foreach( $children as $child_link => $child_label ) : ?>

        <li>
            <a href="<?php echo esc_url( admin_url( 'themes.php?page=zenith-theme-info' . $child_link ) ); ?>">
                <?php echo esc_html( $child_label ); ?>
            </a>

        </li>            
            
        <?php endforeach; ?>
    
    </ul>
        
    <?php endif; ?>
    
</li>


<?php }

function zenith_docs_subsection( $jump_id, $heading, $paragraphs ) { ?>

    <section class="sub-section">

        <h3 id="<?php echo esc_attr( $jump_id ); ?>" class="sub-heading">
            <?php echo esc_html( $heading ); ?>
        </h3>
        
        <?php if ( is_array( $paragraphs ) ) : ?>
            <?php foreach ( $paragraphs as $paragraph ) : ?>
                <p>
                    <?php echo esc_html( $paragraph ); ?>
                </p>
            <?php endforeach; ?>
        <?php else : ?>
            <p>
                <?php echo esc_html( $paragraphs ); ?>
            </p>
        <?php endif; ?>

    </section>

<?php 
}

function zenith_docs_quickstart_cta( $jump_link, $font_icon, $label ) { ?>

    <div class="quickstart-cta">

        <a href="<?php echo esc_url( admin_url( 'themes.php?page=zenith-theme-info#' . $jump_link ) ); ?>">

            <span class="fas <?php echo esc_attr( $font_icon ); ?>"></span>

            <h5 class="quickstart-label">
                <?php echo esc_html( $label ); ?>
            </h5>

        </a>

    </div>

<?php 
}
<?php
/**
 * 
 * Functions available for the artisan admin menu
 * 
 */

add_action( 'admin_enqueue_scripts', 'artisan_load_admin_css' );


function artisan_load_admin_css( $hook ) {
    
    // Enqueue fonts and css only on this page
    if( 'appearance_page_artisan-theme-info' == $hook ) {
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/lib/font-awesome/fontawesome-all.min.css', array(), ARTISAN_VERSION );
        wp_enqueue_style( 'artisan-admin-fonts', '//fonts.googleapis.com/css?family=Lato:300,700,900', array(), ARTISAN_VERSION );
        wp_enqueue_style( 'artisan-admin-css', get_template_directory_uri() . '/assets/admin/css/docs.css', array(), ARTISAN_VERSION );
    }
    
    // Uploader JS & CSS
    if ( in_array( $hook, array( 'post.php', 'post-new.php') ) ) {
        
        $screen = get_current_screen();

        if( is_object( $screen ) && 'download' == $screen->post_type ) {

            wp_enqueue_style( 'artisan-media-uploader', get_template_directory_uri() . '/assets/admin/css/uploader.css', array(), ARTISAN_VERSION );
            wp_enqueue_script( 'artisan-media-uploader', get_template_directory_uri() . '/assets/lib/wp-media-uploader/wp_media_uploader.js', array( 'jquery' ), ARTISAN_VERSION );
            wp_enqueue_script( 'artisan-admin-script', get_template_directory_uri() . '/assets/admin/js/admin.js', array( 'jquery', 'jquery-ui-sortable', 'artisan-media-uploader' ), ARTISAN_VERSION );
            
        }
        
    }
    
}

function artisan_docs_partial( $file ) {
    return trailingslashit( get_template_directory() ) . 'admin/doc-partials/' . $file . '.php';
}

function artisan_render_doc( $filename ) {
    
    if( file_exists( artisan_docs_partial( $filename ) ) ) {
        require artisan_docs_partial( $filename );
    }
    
}

function artisan_docs_tab( $jump_link, $label, $children = null ) { ?>
    
<li>
    <a href="<?php echo esc_url( admin_url( 'themes.php?page=artisan-theme-info' . $jump_link ) ); ?>">
        <?php echo esc_html( $label ); ?>
    </a>
    
    <?php if( is_array( $children ) ) : ?>
        
    <ul class="child-nav">
        
        <?php foreach( $children as $child_link => $child_label ) : ?>

        <li>
            <a href="<?php echo esc_url( admin_url( 'themes.php?page=artisan-theme-info' . $child_link ) ); ?>">
                <?php echo esc_html( $child_label ); ?>
            </a>

        </li>            
            
        <?php endforeach; ?>
    
    </ul>
        
    <?php endif; ?>
    
</li>


<?php }

function artisan_docs_subsection( $jump_id, $heading, $paragraphs ) { ?>

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

function artisan_docs_quickstart_cta( $jump_link, $font_icon, $label ) { ?>

    <div class="quickstart-cta">

        <a href="<?php echo esc_url( admin_url( 'themes.php?page=artisan-theme-info#' . $jump_link ) ); ?>">

            <span class="fas <?php echo esc_attr( $font_icon ); ?>"></span>

            <h5 class="quickstart-label">
                <?php echo esc_html( $label ); ?>
            </h5>

        </a>

    </div>

<?php 
}
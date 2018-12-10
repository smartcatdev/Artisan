(function ($) {

    wp.customize.bind('ready', function () {

        var customize = this

        // Navbar Style ( Split || Left Align )
        customize( 'navbar_style', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( 'banner' === value ) {
                    
                    // Banner Style
                    
                    // Show
                    $('li#customize-control-navbar_banner_logo_alignment').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_menu_alignment').removeClass('artisan-hidden');
                    $('li#customize-control-style_a_boxed_navbar').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_transparent_menu_toggle').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_height').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing_mbl').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing_mbl').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_links_gap_spacing').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_final_link_accent').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_final_link_rounded').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_final_link_fill').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_background_style').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_menu_background').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_menu_foreground').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_bg_image').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_social_drawer_background').removeClass('artisan-hidden');
                    
                    // Hide
                    $('li#customize-control-style_a_right_align_menu').addClass('artisan-hidden');
                    $('li#customize-control-style_a_always_show_logo').addClass('artisan-hidden');
                    $('li#customize-control-style_a_logo_space').addClass('artisan-hidden');
                    $('li#customize-control-style_a_collapse_height').addClass('artisan-hidden');
                    $('li#customize-control-style_a_expand_height').addClass('artisan-hidden');
                    
                } else if ( 'vertical' === value ) {
                    
                    // Show
                    $('li#customize-control-navbar_banner_menu_alignment').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_height').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing_mbl').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing_mbl').removeClass('artisan-hidden');
                    
                    // Hide
                    $('li#customize-control-navbar_background_style').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_menu_background').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_menu_foreground').addClass('artisan-hidden');
                    $('li#customize-control-navbar_bg_image').addClass('artisan-hidden');
                    $('li#customize-control-navbar_social_drawer_background').addClass('artisan-hidden');
                    $('li#customize-control-navbar_final_link_accent').addClass('artisan-hidden');
                    $('li#customize-control-navbar_final_link_rounded').addClass('artisan-hidden');
                    $('li#customize-control-navbar_final_link_fill').addClass('artisan-hidden');
                    $('li#customize-control-navbar_links_gap_spacing').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_alignment').addClass('artisan-hidden');
                    $('li#customize-control-style_a_boxed_navbar').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_transparent_menu_toggle').addClass('artisan-hidden');
                    $('li#customize-control-style_a_right_align_menu').addClass('artisan-hidden');
                    $('li#customize-control-style_a_always_show_logo').addClass('artisan-hidden');
                    $('li#customize-control-style_a_logo_space').addClass('artisan-hidden');
                    $('li#customize-control-style_a_collapse_height').addClass('artisan-hidden');
                    $('li#customize-control-style_a_expand_height').addClass('artisan-hidden');
                    
                } else if ( 'slim_left' === value ) {
                    
                    // Slim Left Style
                    
                    // Show
                    $('li#customize-control-style_a_always_show_logo').removeClass('artisan-hidden');
                    $('li#customize-control-style_a_logo_space').removeClass('artisan-hidden');
                    $('li#customize-control-style_a_collapse_height').removeClass('artisan-hidden');
                    $('li#customize-control-style_a_expand_height').removeClass('artisan-hidden');
                    $('li#customize-control-style_a_right_align_menu').removeClass('artisan-hidden');
                    $('li#customize-control-style_a_boxed_navbar').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_links_gap_spacing').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_final_link_accent').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_final_link_rounded').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_final_link_fill').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_background_style').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_menu_background').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_menu_foreground').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_bg_image').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_social_drawer_background').removeClass('artisan-hidden');
                    
                    // Hide
                    $('li#customize-control-navbar_banner_logo_alignment').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_menu_alignment').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_transparent_menu_toggle').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_height').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing_mbl').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing_mbl').addClass('artisan-hidden');
                    
                } else {
                    
                    // Slim Split Style
                    
                    // Show
                    $('li#customize-control-style_a_always_show_logo').removeClass('artisan-hidden');
                    $('li#customize-control-style_a_logo_space').removeClass('artisan-hidden');
                    $('li#customize-control-style_a_collapse_height').removeClass('artisan-hidden');
                    $('li#customize-control-style_a_expand_height').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_links_gap_spacing').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_final_link_accent').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_final_link_rounded').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_final_link_fill').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_background_style').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_menu_background').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_menu_foreground').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_bg_image').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_social_drawer_background').removeClass('artisan-hidden');
                    
                    // Hide
                    $('li#customize-control-navbar_banner_logo_alignment').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_menu_alignment').addClass('artisan-hidden');
                    $('li#customize-control-style_a_right_align_menu').addClass('artisan-hidden');
                    $('li#customize-control-style_a_boxed_navbar').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_transparent_menu_toggle').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_height').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_top_spacing_mbl').addClass('artisan-hidden');
                    $('li#customize-control-navbar_banner_logo_bottom_spacing_mbl').addClass('artisan-hidden');
                    
                }
                
            }
            
        });
        
        // Custom Logo
        customize( 'artisan_custom_header_height_percent', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
//                console.log(value + " fired");
                
                if ( parseInt(value) == 100 ) {
//                    console.log("true match");
                    $('li#customize-control-artisan_custom_header_height_percent_mbl').addClass('artisan-hidden');
                } else {
//                    console.log("false");
                    $('li#customize-control-artisan_custom_header_height_percent_mbl').removeClass('artisan-hidden');
                }
                
            }
            
        });

        // Navbar - Social Icon Toggle
        customize( 'navbar_show_social', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( value ) {
                    $('li#customize-control-navbar_social_drawer_background').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_social_link_foreground').removeClass('artisan-hidden');
                    $('li#customize-control-navbar_social_link_foreground_hover').removeClass('artisan-hidden');
                } else {
                    $('li#customize-control-navbar_social_drawer_background').addClass('artisan-hidden');
                    $('li#customize-control-navbar_social_link_foreground').addClass('artisan-hidden');
                    $('li#customize-control-navbar_social_link_foreground_hover').addClass('artisan-hidden');
                }
                
            }
            
        });

        // Blog Layout
        customize( 'blog_layout_style', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
//                console.log('BLOG LAYOUT ' + value);
                
                if ( value && value == 'blog_standard' ) {
                    $('li#customize-control-standard_blog_appearance_style').removeClass('artisan-hidden');
                } else {
                    $('li#customize-control-standard_blog_appearance_style').addClass('artisan-hidden');
                }
                
                if ( value && value == 'blog_mosaic' ) {
                    $('li#customize-control-mosaic_blog_gap_spacing').removeClass('artisan-hidden');
                } else {
                    $('li#customize-control-mosaic_blog_gap_spacing').addClass('artisan-hidden');
                }
                
            }
            
        });

        // Custom Header - Main Heading Toggle
        customize( 'custom_header_show_logo', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( value ) {
                    $('li#customize-control-artisan_custom_header_logo_height').removeClass('artisan-hidden');
                    $('li#customize-control-artisan_custom_header_logo_height_mbl').removeClass('artisan-hidden');
                } else {
                    $('li#customize-control-artisan_custom_header_logo_height').addClass('artisan-hidden');
                    $('li#customize-control-artisan_custom_header_logo_height_mbl').addClass('artisan-hidden');
                }
                
            }
            
        });

        // Custom Header - Main Heading Toggle
        customize( 'custom_header_show_heading', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( value ) {
                    $('li#customize-control-custom_header_title_content').removeClass('artisan-hidden');
                    $('li#customize-control-custom_header_title_font_family').removeClass('artisan-hidden');
                    $('li#customize-control-custom_header_title_font_size').removeClass('artisan-hidden');
                    $('li#customize-control-custom_header_title_letter_spacing').removeClass('artisan-hidden');
                    $('li#customize-control-custom_header_title_color').removeClass('artisan-hidden');
                    $('li#customize-control-custom_header_title_uppercase').removeClass('artisan-hidden');
                } else {
                    $('li#customize-control-custom_header_title_content').addClass('artisan-hidden');
                    $('li#customize-control-custom_header_title_font_family').addClass('artisan-hidden');
                    $('li#customize-control-custom_header_title_font_size').addClass('artisan-hidden');
                    $('li#customize-control-custom_header_title_letter_spacing').addClass('artisan-hidden');
                    $('li#customize-control-custom_header_title_color').addClass('artisan-hidden');
                    $('li#customize-control-custom_header_title_uppercase').addClass('artisan-hidden');
                }
                
            }
            
        });
        
        // Custom Header - Menu Toggle
        customize( 'custom_header_show_menu', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( value ) {
                    $('li#customize-control-custom_header_menu_font_family').removeClass('artisan-hidden');
                    $('li#customize-control-custom_header_menu_font_size').removeClass('artisan-hidden');
                    $('li#customize-control-custom_header_menu_letter_spacing').removeClass('artisan-hidden');
                    $('li#customize-control-custom_header_menu_color').removeClass('artisan-hidden');
                    $('li#customize-control-custom_header_menu_link_spacing').removeClass('artisan-hidden');
                } else {
                    $('li#customize-control-custom_header_menu_font_family').addClass('artisan-hidden');
                    $('li#customize-control-custom_header_menu_font_size').addClass('artisan-hidden');
                    $('li#customize-control-custom_header_menu_letter_spacing').addClass('artisan-hidden');
                    $('li#customize-control-custom_header_menu_color').addClass('artisan-hidden');
                    $('li#customize-control-custom_header_menu_link_spacing').addClass('artisan-hidden');
                }
                
            }
            
        });
        
        // Custom Header - Gradient Overlay
        customize( 'parallax_layers_include_color_layer', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( 'no' === value ) {
                    $('li#customize-control-parallax_layers_single_color').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_single_color_opacity').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_style').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_overall_opacity').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_linear_direction').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color_opacity').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color_opacity').addClass('artisan-hidden');
                } else if ( 'single' === value ) {
                    $('li#customize-control-parallax_layers_single_color').removeClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_single_color_opacity').removeClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_style').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_overall_opacity').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_linear_direction').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color_opacity').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color_opacity').addClass('artisan-hidden');
                } else {
                    $('li#customize-control-parallax_layers_single_color').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_single_color_opacity').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_style').removeClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_overall_opacity').removeClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_linear_direction').removeClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color').removeClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_start_color_opacity').removeClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color').removeClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_gradient_end_color_opacity').removeClass('artisan-hidden');
                }
                
            }
            
        });
        
        // Custom Header - Height Units Toggle
        customize( 'artisan_custom_header_height_unit', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( 'percent' === value ) {
                    $('li#customize-control-artisan_custom_header_height_pixels').addClass('artisan-hidden');
                    $('li#customize-control-artisan_custom_header_height_pixels_mbl').addClass('artisan-hidden');
                    $('li#customize-control-artisan_custom_header_height_percent').removeClass('artisan-hidden');
                    $('li#customize-control-artisan_custom_header_height_percent_mbl').removeClass('artisan-hidden');
                } else {
                    $('li#customize-control-artisan_custom_header_height_percent').addClass('artisan-hidden');
                    $('li#customize-control-artisan_custom_header_height_percent_mbl').addClass('artisan-hidden');
                    $('li#customize-control-artisan_custom_header_height_pixels').removeClass('artisan-hidden');
                    $('li#customize-control-artisan_custom_header_height_pixels_mbl').removeClass('artisan-hidden');
                }
                
            }
            
        });
        
        // Custom Header - Height Units Toggle
        customize( 'custom_header_style_toggle', function ( value ) {
            
            // Initial Load
            toggle( value.get() ); 
            
            // Value Change
            value.bind( function ( to ) {    
                toggle( to );
            });
            
            function toggle( value ) {
                
                if ( 'parallax_vertical' === value ) {
                    $('li#customize-control-parallax_layers_texture_pattern').addClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_texture_layer_opacity').addClass('artisan-hidden');
                } else {
                    $('li#customize-control-parallax_layers_texture_pattern').removeClass('artisan-hidden');
                    $('li#customize-control-parallax_layers_texture_layer_opacity').removeClass('artisan-hidden');
                }
                
            }
            
        });
        
    });
    
})(jQuery);
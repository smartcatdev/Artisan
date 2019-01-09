jQuery(document).ready(function ($) {

    $('header#masthead.header-style-vertical #vertical-header-wrap').fadeIn();

    /* -------------------------------------------------------------------------
     * Header: Custom A - Split Primary Menu (sticky.js)
     * ---------------------------------------------------------------------- */
    
    // Iterate through all <li> with submenus and match center the <ul> child
    $('ul.slim-header-menu > li.menu-item-has-children').each( function( index ) {
        if ( ( ( 200 - $(this).outerWidth() ) / 2 ) > 0 ) {
            $(this).find('ul.sub-menu').css('transform','translate(-' + ( ( 200 - $(this).outerWidth() ) / 2 ) + 'px,0)');    
        } else {
            $(this).find('ul.sub-menu').css('width', $(this).outerWidth() + 'px');    
        }
    });
  
    $('img.custom-logo').addClass('animated');
  
    $("header#masthead:not(.header-style-vertical) #slim-header-wrap").sticky({
        topSpacing: $('#wpadminbar').length > 0 ? 32 : 0,
        zIndex:9999,
    }).on('sticky-start', function() { 
        
        $('#custom-logo-wrap.sometimes-hidden img.custom-logo').removeClass('fadeOut').addClass('bounceIn');
        
        // Expand Padding Top on #content
        $('div#content,div#beyrouth-custom-header,div#cart-panel-trigger').addClass('sticky-header');
        
    }).on('sticky-end', function() { 
        
        $('#custom-logo-wrap.sometimes-hidden img.custom-logo').removeClass('bounceIn').addClass('fadeOut');
        
        // Contract Padding Top on #content
        $('div#content,div#beyrouth-custom-header,div#cart-panel-trigger').removeClass('sticky-header');
        
    });
   
    
    /* -------------------------------------------------------------------------
     * Header: Mobile Menu - Expand / Contract
     * ---------------------------------------------------------------------- */

    var mobile_nav_open = false;
    $( "#mobile-menu-trigger" ).on( 'click', function() {
        
        if ( mobile_nav_open ) {
            
            $('ul#mobile-menu').stop().slideUp().find('li').stop().each( function( index ) {
                $(this).animate({
                    opacity: 0,
                });
            });
            
            $('ul#mobile-menu').removeClass('expanded');
            $('#mobile-menu-trigger .bar').toggleClass('animate');
            mobile_nav_open = false;
            
        } else {
            
            $('ul#mobile-menu').stop().slideDown().find('li').stop().each( function( index ) {
                $(this).stop().delay( index * 75 ).animate({
                    opacity: 1,
                });
            });

            $('ul#mobile-menu').addClass('expanded');
            $('#mobile-menu-trigger .bar').toggleClass('animate');
            mobile_nav_open = true;
            
        }
        
    });
    
    /* -------------------------------------------------------------------------
     * Header: Mobile Menu - Submenu Expansion / Contraction
     * ---------------------------------------------------------------------- */

    $( '#mobile-menu-wrap ul#mobile-menu > li.menu-item-has-children').prepend('<span style="font-family: Helvetica !important;">+</span>');
    $( "#mobile-menu-wrap ul#mobile-menu > li.menu-item-has-children > span" ).on( 'click', function() {
        
        $(this).stop().toggleClass('expanded').parent().find('ul.sub-menu').stop().slideToggle();
        
    });
   
    /* -------------------------------------------------------------------------
     * Header: Slim Split Social Drawer
     * ---------------------------------------------------------------------- */
    $('#split-social-trigger').on( 'click', function() {
        
        $(this).stop().toggleClass('expanded').parentsUntil('header#masthead').find('#split-social-slide-in').stop().toggleClass('slid-in');
        
    });
    
    /* -------------------------------------------------------------------------
     * Custom Header: Layered Parallax Section
     * ---------------------------------------------------------------------- */
    
    if ( $('div#beyrouth-custom-header.parallax_layers').length ) {
        
        $(window).resize( function(){
            $( '.jparallax-layer' ).parallax({
                // Global Options
                mouseport: $('body')
            },{
                // Image Layer
                xparallax: beyrouth_local.parallax_image_layer,
                yparallax: beyrouth_local.parallax_image_layer
            },
            {
                // Texture Layer Options
                xparallax: beyrouth_local.parallax_texture_layer,
                yparallax: beyrouth_local.parallax_texture_layer
            },{
                // Color Layer Options
                xparallax: beyrouth_local.parallax_color_layer,
                yparallax: beyrouth_local.parallax_color_layer,
                xorigin: 0,
                yorigin: 0,
            },{
                // Content Layer Options
                xparallax: beyrouth_local.parallax_content_layer,
                yparallax: beyrouth_local.parallax_content_layer
            });
        });

        $( '.jparallax-layer' ).parallax({
            // Global Options
            mouseport: $('body')
        },{
            // Image Layer
            xparallax: beyrouth_local.parallax_image_layer,
            yparallax: beyrouth_local.parallax_image_layer
        },
        {
            // Texture Layer Options
            xparallax: beyrouth_local.parallax_texture_layer,
            yparallax: beyrouth_local.parallax_texture_layer
        },{
            // Color Layer Options
            xparallax: beyrouth_local.parallax_color_layer,
            yparallax: beyrouth_local.parallax_color_layer,
            xorigin: 0,
            yorigin: 0,
        },{
            // Content Layer Options
            xparallax: beyrouth_local.parallax_content_layer,
            yparallax: beyrouth_local.parallax_content_layer
        }).parent().find('.jparallax-layer.content-layer').fadeIn();
        
    }
  
    /* -------------------------------------------------------------------------
     * Cart: Slide In Side-panel
     * ---------------------------------------------------------------------- */
  
    $('#cart-panel-trigger, #cart-panel-close, #dark-cart-overlayer').bigSlide({
        menu: '#cart-panel',
        menuWidth: '280px',
        side: 'right'
    });

    $('#cart-panel-trigger, #cart-panel-close, #dark-cart-overlayer').on( 'click touchstart', function(){
        $('#cart-panel-close, #dark-cart-overlayer').fadeToggle(300);
    });
        
    /*
     * SlimScroll Cart
     */
    $('#cart-panel .inner').slimScroll({
        height: 'auto',
        size: '4px',
        railVisible: true,
        railColor: '#e6e6e6',
        railOpacity: 1.0,
        color: '#333333',
        position: 'right'
    });
    
    /* -------------------------------------------------------------------------
     * Vertical Navbar Main Menu: Expand Items
     * ---------------------------------------------------------------------- */
    
    $('#vertical-header-wrap ul.vertical-header-menu > li.menu-item-has-children ul.sub-menu').before( '<span style="font-family: Helvetica !important;">○</span>' );
    $( '#vertical-header-wrap ul.vertical-header-menu > li.menu-item-has-children > span' ).on( 'click', function() {
        if ( $(this).hasClass('expanded') ) {
            $(this).stop().html('○').toggleClass('expanded').parent().find('ul.sub-menu').stop().slideToggle();   
        } else {
            $(this).stop().html('●').toggleClass('expanded').parent().find('ul.sub-menu').stop().slideToggle();   
        }
    });

    /* -------------------------------------------------------------------------
     * Vertical Navbar Slide
     * ---------------------------------------------------------------------- */
    
    var default_state;
    default_state = ( beyrouth_local.vert_state == 'always' ) ? 'open' : 'closed';
    
    $('#vertical-menu-toggle-wrap').bigSlide({
        menu: 'header#masthead.header-style-vertical #vertical-header-wrap',
        push: '#vertical-navbar-push',
        menuWidth: '280px',
        side: 'left',
        state: default_state,
        beforeOpen: function() {
            $('#vertical-menu-toggle .bar').toggleClass('animate');
            $('#vertical-navbar-push,header#masthead.header-style-vertical #vertical-header-wrap').addClass('expanded');
        },
        afterClose: function() {
            $('#vertical-navbar-push,header#masthead.header-style-vertical #vertical-header-wrap').removeClass('expanded');
            $('#vertical-menu-toggle .bar').toggleClass('animate');
        }
    });
   
    /* -------------------------------------------------------------------------
     * Vertical Navbar slimScroll Menu
     * ---------------------------------------------------------------------- */
    $('#vert-nav-slim-scroll-wrap').slimScroll({
        height: $(window).height() - $('header#masthead.header-style-vertical div#vertical-header-wrap #custom-logo-wrap').outerHeight() - $('header#masthead.header-style-vertical .navbar-social').outerHeight(),
        size: '0px',
        railVisible: false,
        railColor: '#e6e6e6',
        railOpacity: 1.0,
        color: '#333333',
        position: 'right'
    });
    
    $('#vert-nav-slim-scroll-wrap ul#vertical-header-primary').css('padding-bottom', $('div#vertical-header-wrap #footer-branding-wrap').outerHeight() + 220 );

    /* -------------------------------------------------------------------------
     * Custom Header: Social Scroll Down Tab
     * ---------------------------------------------------------------------- */
    $('#down-scroll-tab-trigger,#down-scroll-tab-trigger span').on( 'click', function() {
        $('html, body').stop().animate({
            scrollTop: $('#beyrouth-custom-header').offset().top + $('#beyrouth-custom-header').outerHeight() - ( $('body').hasClass('admin-bar') ? 32 : 0 )
        }, 1000);
    });
    
});
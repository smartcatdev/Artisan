( function( api ) {

	// Extends our custom "companion-plugin" section.
	api.sectionConstructor['companion-plugin'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

    

} )( wp.customize );

(function ($) {
    
    // Clicker so that theme editor can dismiss notice to install plugin
    $(document).on( 'click', '.artisan-dismiss-companion', function(e) {
       
        e.preventDefault()
        
        $.ajax({
            url         : artisan_customize.ajax_url,
            type        : 'post',
            dataType    : 'json',
            data        : {
                'action'                : 'artisan_dismiss_companion',
                'artisan_dismiss_nonce'  : artisan_customize.artisan_dismiss_nonce
            }
        })
        
        .done( function( data) {
            wp.customize.section('artisan_companion').deactivate()
        })
       
    })
    
    $(document).on( 'click', '.artisan-initiate-dismiss', function(e) {
        $(this).hide()
        $('.artisan-dismiss-confirm').slideDown(300)
    })
    
})(jQuery);
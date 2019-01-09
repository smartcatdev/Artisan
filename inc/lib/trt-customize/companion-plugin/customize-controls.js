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
    $(document).on( 'click', '.beyrouth-dismiss-companion', function(e) {
       
        e.preventDefault()
        
        $.ajax({
            url         : beyrouth_customize.ajax_url,
            type        : 'post',
            dataType    : 'json',
            data        : {
                'action'                : 'beyrouth_dismiss_companion',
                'beyrouth_dismiss_nonce'  : beyrouth_customize.beyrouth_dismiss_nonce
            }
        })
        
        .done( function( data) {
            wp.customize.section('beyrouth_companion').deactivate()
        })
       
    })
    
    $(document).on( 'click', '.beyrouth-initiate-dismiss', function(e) {
        $(this).hide()
        $('.beyrouth-dismiss-confirm').slideDown(300)
    })
    
})(jQuery);
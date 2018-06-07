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
    $(document).on( 'click', '.zenith-dismiss-companion', function(e) {
       
        e.preventDefault()
        
        $.ajax({
            url         : zenith_customize.ajax_url,
            type        : 'post',
            dataType    : 'json',
            data        : {
                'action'                : 'zenith_dismiss_companion',
                'zenith_dismiss_nonce'  : zenith_customize.zenith_dismiss_nonce
            }
        })
        
        .done( function( data) {
            wp.customize.section('zenith_companion').deactivate()
        })
       
    })
    
    $(document).on( 'click', '.zenith-initiate-dismiss', function(e) {
        $(this).hide()
        $('.zenith-dismiss-confirm').slideDown(300) 
    })
    
})(jQuery);
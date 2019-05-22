( function($) {
    
    /* Create Repeater */
    $("#repeater").createRepeater({
        showFirstItemToDefault: true,
        name: 'ddd'
    });

 
    // Tab 
    var bookingList     = $( '.booking-lists' );
    var bookingSettings = $( '.booking-settings' );

    $('.tablist').on( 'click', function() {
        bookingSettings.hide();
        bookingList.show();
    } );

    $('.tabsettings').on( 'click', function() {
        bookingList.hide();
        bookingSettings.show();
    } );



} )( jQuery );
(function ($) {
    'use strict';

    // page template change option

    var $template           = $( '#page_template' ),
        $pagesettingsmeta   = $('#pageheader-meta-box'),
        $pageheader         = $('#page_header_selectbox'),
        $headerbg           = $( '.header-img' );



    // Page Template Event

    $template.on( 'change', function(){
        var $this = $(this);
        if( $this.val() == 'template-builder.php' ){
            $pagesettingsmeta.show();
        }else{
            $pagesettingsmeta.hide();
        }

    });
    // if page template builder selected
    // if( $template.val() == 'template-builder.php' ){
    //     $pagesettingsmeta.show();
    // }else{
    //     $pagesettingsmeta.hide();
    // }

    // Page header Event
    $pageheader.on( 'change', function(){
        var $this = $(this);
        if( $this.val() == 'show' ){
            $headerbg.show();
        }else{
            $headerbg.hide();
        }

    });

    // if page header show selected
    if( $pageheader.val() != 'show' ){
        $headerbg.hide();
    }

})(jQuery);
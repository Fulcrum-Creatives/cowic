(function ( $ ) {
    "use strict";
    $(function () {
        $('.has-attachment').each(function() {
            if(!$(this).children().hasClass('pdf-posts')){
               $(this).hide();
            }
        });
    });
}(jQuery));
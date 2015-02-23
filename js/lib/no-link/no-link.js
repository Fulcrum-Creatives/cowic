(function ( $ ) {
    "use strict";
    $(function () {
        $('li.submenu__no-link').children("a").contents().unwrap('a');
    });
}(jQuery));
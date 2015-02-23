(function ( $ ) {
    "use strict";
    $(function () {
        $(".content__hours li:contains('AM')").html(function(_, html) {
           return html.replace(/(AM)/g, '<span class="smallcaps">AM</span>');
        });
        $(".content__hours li:contains('PM')").html(function(_, html) {
           return html.replace(/(PM)/g, '<span class="smallcaps">PM</span>');
        });
        $(".content__hours li:contains('am')").html(function(_, html) {
           return html.replace(/(am)/g, '<span class="smallcaps">AM</span>');
        });
        $(".content__hours li:contains('pm')").html(function(_, html) {
           return html.replace(/(pm)/g, '<span class="smallcaps">PM</span>');
        });
    });
}(jQuery));
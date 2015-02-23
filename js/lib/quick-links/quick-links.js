(function ( $ ) {
    "use strict";
    $(function () {
        $('.quick-link-list li:first-child').addClass('active');
        $('.quick-link-list li').hover( function(){
            if(!$(this).hasClass('active')){
                $(this).toggleClass('active');
                $(this).siblings().removeClass('active');
            }
        });
        $('.quick-link-list').mouseleave( function(){
            $(this).find('li').removeClass('active');
            $(this).find('li').first().addClass('active');
        });
        $('.ql_mobile-menu').on('click', function(){
            $('.quick-link-list').slideToggle('fast');
            $('.rsaquo').toggle();
            $('.laquo').toggle();
        });
        function qlDesk() {
            if($(window).width() >= 1025) {
                $('.quick-link-list').show();
                $('.rsaquo').show();
                $('.laquo').hide();
            }
            if($(window).width() <= 1024) {
                $('.quick-link-list').hide();
            }
        }
        qlDesk();
        $(window).resize(function() {
            qlDesk();
        });
    });
}(jQuery));
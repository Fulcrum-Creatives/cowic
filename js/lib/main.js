var $ = jQuery.noConflict();
/**
 * Skip Navigation Link
 *
 * Allows screen readers to skip the navigation
 *
 * source: http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
 */
( function() {
    var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
        is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
        is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

    if ( ( is_webkit || is_opera || is_ie ) && 'undefined' !== typeof( document.getElementById ) ) {
        var eventMethod = ( window.addEventListener ) ? 'addEventListener' : 'attachEvent';
        window[ eventMethod ]( 'hashchange', function() {
            var element = document.getElementById( location.hash.substring( 1 ) );

            if ( element ) {
                if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
                    element.tabIndex = -1;

                element.focus();
            }
        }, false );
    }
})();
(function ( $ ) {
    "use strict";
    $(function () {
        $('li.submenu__no-link').children("a").contents().unwrap('a');
    });
}(jQuery));
(function ( $ ) {
    "use strict";
    $(function () {
        $('#main-nav-list').addClass('menu-closed');
        $('#main-nav-list li.menu-item-has-children').addClass('closed');
        $('.nav__mobile-toggle').on('click', function() {
            if($('#main-nav-list').hasClass('menu-closed')){
                $('#main-nav-list').removeClass('menu-closed').addClass('menu-open');
                $('#main-nav-list').slideDown('fast');
                
            } else if($('#main-nav-list').hasClass('menu-open')){
                $('#main-nav-list').removeClass('menu-open').addClass('menu-closed');
                $('#main-nav-list').slideUp('fast');
            } 
        });
        $('#main-nav-list li.menu-item-has-children').on('click', function() {
            $(this).siblings('li').removeClass('open').addClass('closed').children('ul').hide();
            if($(this).hasClass('closed')){
                $(this).removeClass('closed').addClass('open');
                $(this).children('ul').slideDown('fast');
            } else if($(this).hasClass('open')){
                $(this).removeClass('open').addClass('closed');
                $(this).children('ul').slideUp('fast');
            }
        });
        function menuDesk() {
            if($(window).width() >= 1025) {
                $('#main-nav-list li').hover(function() {
                    if(!this.className.match(/current-page-parent|current-menu-item/)){
                        $(this).toggleClass('active');
                    }
                });
                $('.main-nav-list').show();
            }
            $('#main-nav-list li.menu-item-has-children').mouseleave(function() {
                if(!$(this).hasClass('current-page-parent')){
                    $(this).removeClass('open active').addClass('closed');
                }
                
                $(this).children('ul').slideUp('fast');
            });
            $('#main-nav-list > li').each(function(idx, li) {
                if($(this).hasClass('current-menu-item')){
                    $(this).addClass('active');
                }
                if($(this).hasClass('current-page-parent')){
                    $(this).addClass('active');
                }
            });        
        }
        menuDesk();
        $(window).resize(function() {
            menuDesk();
        });
        $('#main-nav-list li.menu-item-has-children ul li.submenu__no-link').on('click', function(event) {
            return false;
        });
    });
}(jQuery));
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
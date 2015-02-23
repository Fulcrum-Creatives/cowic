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
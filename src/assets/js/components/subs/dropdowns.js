( function( $ ) {
    $('.menu-item-has-children .nav-link.dropdown-toggle').on('click', (event) => {
        event.preventDefault();
        if ($(event.target).next('.sub-menu').hasClass('show')) {
            $(event.target).next('.sub-menu').removeClass('show');
            if ($(event.target).hasClass('active')) {
                $(event.target).removeClass('active');
            }
        } else {
            $(event.target).addClass('active');
            $(event.target).next('.sub-menu').addClass('show');
        };
        $.each($('.sub-menu.show'), (key, value) => {
            if (!$(value).is($(event.target).next('.sub-menu')) ) {
                $(value).removeClass('show');
            }
        });

        $.each($('.nav-link.active'), (key, value) => {
            if (!$(value).is($(event.target)) && $(value).parent('li').has(event.target).length === 0) {
                $(value).removeClass('active');
            }
        });
    });

    $(document.body).on('click',
        (e) => {
            let $menu = $('.dropdown-toggle');
            if (!$menu.is(e.target) // if the target of the click isn't the container...
            && $menu.parent('.menu-item-has-children').has(e.target).length === 0) // ... nor a descendant of the container
            {
                $menu.next('.sub-menu').removeClass('show');
                $menu.removeClass('active');
            }

            let $toggler = $('.c-topnav__search-toggler .nav-link');
            if ( !$toggler.is(e.target) && $toggler.has(e.target).length === 0)// if the target of the click isn't the container...
            {
                $toggler.next('.sub-menu').removeClass('show');
                $toggler.removeClass('active');
            }
        }
    );

    $('.c-topnav__search-toggler .nav-link').on('click', (e) => {
        e.preventDefault();
        if ($('.c-topnav__search-toggler .nav-link').hasClass("active")) {
            $('.c-topnav__search-toggler .nav-link').removeClass("active");
        }else{
            $('.c-topnav__search-toggler .nav-link').addClass("active");
        }
    });

    $('.c-sidenav__closebtn').on('click', (e) => {
        $('.c-sidenav__openbtn').show();
        $('.c-sidenav').removeClass('show');
    });

    $('.c-sidenav__openbtn').on('click', (e) => {
        $('.c-sidenav__openbtn').hide();
        $('.c-sidenav').addClass('show');
    });

    $('.c-sidenav-utils__closebtn').on('click', (e) => {
        $('.c-sidenav-utils').removeClass('show');
    });

    $('.c-sidenav-utils__openbtn').on('click', (e) => {
        $('.c-sidenav-utils').addClass('show');
    });

}( jQuery ) );

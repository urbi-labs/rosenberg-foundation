$(function () {

    var open_button = $('.mobile__burger-button');
    var close_button = $('.mobile__menu__close');
    var overlay = $('.mobile-menu--overlay');
    var mobile_menu = $('#mobile__menu');

    open_button.on('click', toggleClass)

    close_button.on('click', toggleClass)

    function toggleClass(e) {
        e.preventDefault();
        overlay.toggleClass('mobile-menu--overlay--show');
        mobile_menu.toggleClass('mobile__menu--show');
    }
});
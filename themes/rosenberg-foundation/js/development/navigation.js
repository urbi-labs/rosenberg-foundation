$(function () {

    var open_button = $('.mobile__burguer-button');
    var close_button = $('.mobile__menu__close');
    var overlay = $('.mobile-menu--overlay');
    var mobile_menu = $('#mobile__menu');

    open_button.on('click', toogleClass)

    close_button.on('click', toogleClass)

    function toogleClass(e) {
        e.preventDefault();
        overlay.toggleClass('mobile-menu--overlay--show');
        //overlay.classList.add('overlay--show');
        mobile_menu.toggleClass('mobile__menu--show');
    }
});
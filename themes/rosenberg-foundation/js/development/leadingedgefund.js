$(document).ready(function () {
    var open_ledge = $('.menu__leadingedgefund>a');
    var block_ledge = $('#block-leadingedgefund');

    var overlay = $('.mobile-menu--overlay');
    var mobile_menu = $('#mobile__menu');



    open_ledge.each(function (index) {
        $(this).on('click', function (e) {

            e.preventDefault();
            block_ledge.addClass('block-leadingedgefund--show');
            overlay.removeClass('mobile-menu--overlay--show');
            mobile_menu.removeClass('mobile__menu--show');
        });
    });
    $(".close_leadingedgefund").on('click', function (e) {
        e.preventDefault();

        block_ledge.removeClass('block-leadingedgefund--show')
    })
});

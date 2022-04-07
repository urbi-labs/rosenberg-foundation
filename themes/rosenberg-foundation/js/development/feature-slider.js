$(document).ready(function () {
    $('.feature-slider__image').slick({
        asNavFor: '.feature-slider__content__container',
        prevArrow: $('.feature-slider__prev-arrow.slick-prev'),
        nextArrow: $('.feature-slider__next-arrow.slick-next'),
        autoplay: true,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    autoplay: false
                }
            },
        ]
    });

    $('.feature-slider__content__container').slick({
        asNavFor: '.feature-slider__image',
        arrows: false,
        fade: true,
        cssEase: 'linear',
        autoplay: false,
        draggable: false

    });
});

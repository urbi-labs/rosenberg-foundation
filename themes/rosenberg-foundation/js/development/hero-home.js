$(document).ready(function(){
    $('.hero-home-slick').slick({
        dots:true,
        autoplay: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 2000,
        autoplaySpeed: 4000,
        prevArrow: $('.hero-home__prev-arrow.slick-prev'),
        nextArrow: $('.hero-home__next-arrow.slick-next')
    });
});

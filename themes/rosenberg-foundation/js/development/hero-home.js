$(document).ready(function(){
    $('.hero-home').slick({
        dots:true,
        autoplay: true,
        infinite: true,
        prevArrow: $('.hero-home__prev-arrow.slick-prev'),
        nextArrow: $('.hero-home__next-arrow.slick-next'),
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 1000,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
        ]
    });
});

$(window).resize(function(){  
    var width = $(window).width();
    console.log(width);
    if (width < 700) {
        $('.hero-home__carousel-caption').removeClass('visible-div').addClass( 'invisible-div');
        $('.hero-home__carousel-caption-sm').removeClass('invisible-div').addClass('visible-div');
    } else {
        $('.hero-home__carousel-caption').removeClass('invisible-div').addClass( 'visible-div');
        $('.hero-home__carousel-caption-sm').removeClass('visible-div').addClass('invisible-div');
    }
});
$('.carousel').carousel({
    interval: 2000
})

$(document).ready(function(){

    $('.items').slick({
    dots: true,
    infinite: true,
    speed: 800,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 8,
    slidesToScroll: 8,
    responsive: [
    {
    breakpoint: 1024,
    settings: {
    slidesToShow: 6,
    slidesToScroll: 6,
    infinite: true,
    dots: true
    }
    },
    {
    breakpoint: 600,
    settings: {
    slidesToShow: 2,
    slidesToScroll: 2
    }
    },
    {
    breakpoint: 480,
    settings: {
    slidesToShow: 2,
    slidesToScroll: 2
    }
    }

    ]
    });
});
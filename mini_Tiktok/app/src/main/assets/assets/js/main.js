(function ($) {
  "use strict";

  /*-----------------------------------
  # music-slider
  ------------------------------ */

  var $slickEl = $(".music-slider");

  $slickEl.slick({
    centerMode: true,
    centerPadding: "200px",
    slidesToShow: 1,
    focusOnSelect: true,
    dots: false,
    arrows: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "150px",
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 992,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "150px",
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "100px",
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: "80px",
          slidesToShow: 1,
        },
      },
    ],
  });
})(jQuery);

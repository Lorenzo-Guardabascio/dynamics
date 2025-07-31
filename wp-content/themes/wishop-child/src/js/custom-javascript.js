// Add your custom JS here.
(function ($) {

  $('#search-button').on('click', function (e) {
    if ($('#search-input-container').hasClass('hdn')) {
      e.preventDefault();
      $('#search-input-container').removeClass('hdn')
      return false;
    }else{
      e.preventDefault();
      $('#search-input-container').addClass('hdn')
    }
  });

  $('#hide-search-input-container').on('click', function (e) {
    e.preventDefault();
    $('#search-input-container').addClass('hdn')
    return false;
  });

})(jQuery);

// Add your custom JS here.
(function($) {
  $(document).ready(function () {

      function slickify(){
        $('.slick-point').not('.slick-initialized').slick({
          infinite: true,
          centerMode: true,
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: false,
          autoplaySpeed: 4000,
          centerPadding: '5%',
          dots: true,
          arrows: false,
            responsive: [
                {
                    breakpoint: 999999999,
                    settings: "unslick"
                },
                {
                  breakpoint: 991,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                  }
                },
                {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                  }
                },
                {
                  breakpoint: 575,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                  }
                }
                
            ]
        });
        $('.slick-mobi').not('.slick-initialized').slick({
          infinite: true,
          centerMode: true,
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: false,
          autoplaySpeed: 4000,
          centerPadding: '5%',
          dots: true,
          arrows: false,
            responsive: [
                {
                    breakpoint: 999999999,
                    settings: "unslick"
                },
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                  }
                },
                {
                  breakpoint: 575,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                  }
                }
                
            ]
        });

        $('.slick-car .wc-block-grid__products').not('.slick-initialized').slick({
          infinite: true,
          centerMode: true,
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: false,
          autoplaySpeed: 4000,
          centerPadding: '5%',
          dots: false,
            responsive: [
                {
                    breakpoint: 999999999,
                    settings: "unslick"
                },
                {
                  breakpoint: 800,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                  }
                }
                
            ]
        });
      }
      slickify();
      $(window).resize(function(){
        var $windowWidth = $(window).width();
        if ($windowWidth < 800) {
           slickify();   
        }
      });

      /*
      $('#slick').slick({
        
        infinite: false,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 4000,
        centerPadding: '20px',
        dots: false,
        responsive: [{
          breakpoint: 999999999,
          settings: "unslick"
          },
          {
            infinite: true,
            breakpoint: 900,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 2,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 2,
            }
          }
        ]
      });
      */
    });
    


})(jQuery);



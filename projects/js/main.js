(function ($) {
  "use strict";

  // Porfolio isotope and filter
  var galleryIsotope = $('.gallery-container').isotope({
    itemSelector: '.gallery-item',
    layoutMode: 'fitRows'
  });

  $('#gallery-flters li').on( 'click', function() {
    $("#gallery-flters li").removeClass('filter-active');
    $(this).addClass('filter-active');

    galleryIsotope.isotope({ filter: $(this).data('filter') });
  });

  // Clients carousel (uses the Owl Carousel library)
  $(".clients-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: { 0: { items: 2 }, 768: { items: 4 }, 900: { items: 6 }
    }
  });

  // Testimonials carousel (uses the Owl Carousel library)
  $(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    items: 1
  });

})(jQuery);


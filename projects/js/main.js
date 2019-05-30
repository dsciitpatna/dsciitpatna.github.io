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

})(jQuery);


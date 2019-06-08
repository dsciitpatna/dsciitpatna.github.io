(function ($) {
  "use strict";

  // Projects isotope and filter
  var projectsIsotope = $('.gallery-container.projects').isotope({
    itemSelector: '.gallery-item',
    layoutMode: 'fitRows'
  });

  $('#gallery-flters.projects li').on( 'click', function() {
    $("#gallery-flters.projects li").removeClass('filter-active');
    $(this).addClass('filter-active');

    projectsIsotope.isotope({ filter: $(this).data('filter') });
  });



    // Budding-Projects isotope and filter
    var buddingProjectsIsotope = $('.gallery-container.buddingPojects').isotope({
      itemSelector: '.gallery-item',
      layoutMode: 'fitRows'
    });
  
    $('#gallery-flters.buddingPojects li').on( 'click', function() {
      $("#gallery-flters.buddingPojects li").removeClass('filter-active');
      $(this).addClass('filter-active');
  
      buddingProjectsIsotope.isotope({ filter: $(this).data('filter') });
    });

})(jQuery);


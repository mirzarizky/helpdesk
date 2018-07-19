$(document).ready(function() {
	// Icon Click Focus
  $('[data-toggle="tooltip"]').tooltip();
});
function collapseNavbar() {
    if ($(window).scrollTop() > 160) {
        $("header").addClass("isfixed");
    }
    else {
        $("header").removeClass("isfixed");
    }
}


(function($) {
  "use strict";
  $(window).scroll(collapseNavbar);
  $(document).ready(collapseNavbar);

  $(window).on('load',function() {
    $("#preloader").on(500).fadeOut();
    $(".preloader").on(600).fadeOut("slow");
  });

  $(function() {
    $.material.init();
  });

  $(document).on('click', 'span.clickable', function(e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('fa-angle-down').addClass('fa-angle-up');
    }
  })
})(jQuery);

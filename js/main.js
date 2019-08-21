/**
 * File main.js.
 *
 * Series of init tasks.
 *
 * Please see comments below.
 */

(function ($) {

  // ----- Base & Cross Browsing ----- //

  $(document).ready(function () {
    // Show site after all elements are loaded
    document.getElementsByTagName("html")[0].style.visibility = "visible";
    // Execute object fit hack for IE
    objectFitImages();
  });

  // --- vh hack: height: 100vh; height: calc(var(--vh, 1vh) * 100); -- //

  // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
  let vh = window.innerHeight * 0.01;
  // Then we set the value in the --vh custom property to the root of the document. `${vh}px`
  document.documentElement.style.setProperty('--vh', vh + 'px');

  // ----- Underscores Theme Support ----- //

  // --- Sidebar --- //
  // If sidebar exist => add class to body
  $(document).ready(function () {
    if ($('#secondary').length > 0) {
      $('body').addClass('has-sidebar');
    }
  });

  // --- WP Admin Bar --- //
  $(document).ready(function () {
    // Dynamic sidebar header position based on scroll pos
    window.onscroll = function () {
      // Set variables
      var x = $('#wpadminbar').height(); // 46px <= 600, fixed
      var y = window.pageYOffset; // var
      var sub = x - y;

      // Apply margin top logic
      if (window.innerWidth <= 600 && y <= x) {
        $('#masthead').css('margin-top', sub);
      } else if (window.innerWidth <= 600 && y > x) {
        $('#masthead').css('margin-top', 0);
      }
    };
    // Dynamic sidebar header position based on window resize
    $(window).on('load resize', function() {
      if (window.innerWidth <= 600 && window.pageYOffset > 46) {
        $('#masthead').css('margin-top', 0); 
      } else if (window.innerWidth <= 782 ) {
        $('#masthead').css('margin-top', 46);
      } else {
        $('#masthead').css('margin-top', 32);
      }
    });
  });

  // ----- Bootstrap Support ----- //

  // --- Default Init --- //
  // Init Bootstrap toggle
  $('.navbar-toggle').click(function () {
    $('.navbar-toggle').toggleClass('is-active');
  });

  // --- Sidebar Layout --- //
  $(document).ready(function () {
    // If sidebar exist => wrap content area with container class for all page templates
    if ($('body').hasClass('has-sidebar')) {
      $('.content-area').wrapAll("<div class='container' />");
    };
    // If sidebar !exist => add container class to header elements
    if (!$('body').hasClass('has-sidebar')) {
      $('.page header.page-header').addClass('container');
      $('.single header.page-header').addClass('container');
      $('header.entry-header').addClass('container');
      // Wrap content area with container class for rendered pages => archive, search
      $('.archive .content-area').wrapAll("<div class='container' />");
      $('.search .content-area').wrapAll("<div class='container' />");
    };
  });

  // --- Archive Post Layout --- //
  // Add Bootstrap 3 col layout to archive posts
  if ($('body').hasClass('archive')) {
    $('.site-main > article').wrapAll("<div class='row' />");
    $('article').addClass('col-12 col-sm-6 col-md-4');
  };

  // --- Woocommerce Layout --- //
  $(document).ready(function () {
    // Move sidebar to inside of primary div
    if ($('body').hasClass('woocommerce')) {
      $('#secondary').detach().appendTo('#primary');
    };
    // Wrap content area with container class for no sidebar Woocommerce layout
    if (!$('body').hasClass('has-sidebar')) {
      $('.woocommerce:not(.archive) .content-area').wrapAll("<div class='container' />");
      $('.woocommerce:not(.search) .content-area').wrapAll("<div class='container' />");
    }
  });

  // --- Gutenberg  --- //
  // Add Bootstrap properties to col
  $('.wp-block-columns').addClass('row');
  $('.wp-block-column').addClass('col');

  // --- Stackable - Gutenberg Blocks --- //
  $(document).ready(function () {
    if ($('.ugb-container').hasClass('fullwidth')) {
      // If sidebar !exist => add fullwidth class to section
      $('body:not(.has-sidebar) .fullwidth .ugb-container__content-wrapper').addClass('container-fluid');
    } else {
      // If sidebar !exist => add boxed & container classes to section
      $('body:not(.has-sidebar) .ugb-container').addClass('boxed');
      $('.boxed .ugb-container__content-wrapper').addClass('container');
      $('.boxed .ugb-container__content-wrapper').attr('style', 'margin-right: auto; margin-left: auto');
    }
  });

  // ----- Slimscroll Support ----- //
  $(document).ready(function () {
    $('.masthead-container').slimScroll( {
      height: 'auto',
      position: 'right',
      size: '8px',
      color: '#9ea5ab',
      wheelStep: 5,
      touchScrollStep: 20
    });
  })

})(jQuery);

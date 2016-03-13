/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.

// Modify page font size for accessibility
var sizer = {};

sizer.init = function() {
  if (!$('#sizer').length) return;

  this.el = $('#sizer');
  this.addEventListeners();
}

sizer.addEventListeners = function() {
  this.buttons = this.el.find('button');

  $.each(this.buttons, function(i, button) {
    $(button).on('click', sizer.setDesiredSize);
  });
}

sizer.setDesiredSize = function(event) {
  var $button = $(this);
  var size = $(this).data('size');
  var $body = $('body');

  sizer.buttons.removeClass('active');

  if (typeof(size) !== 'number') return console.error('The size data attribute must be set to a number.');

  $button.addClass('active');
  $body.css('font-size', size);

}

// Listener to toggle hamburger nav
var nav = {
  navButton: $('#toggle-nav'),
  navMenu: $('#menu-primary-navigation')
};
nav.init = function() {
  nav.navButton.on('click', function(){
    nav.navMenu.slideToggle();
  });
}

// Video swapper for vimeo videos on projects page
var videoSwapper = {
  videoLink: $('.video-link'),
  videoElement: $('.video')
}

videoSwapper.swapVideo = function(videoURL) {
  this.videoElement.attr('src', videoURL.data('href'));
}

videoSwapper.addEventListeners = function() {
  var homePage = $('.home');
  console.log(homePage.length);
  if (homePage.length !== 1) {
    this.videoLink.on('click', function(e){
      e.preventDefault();
      videoSwapper.swapVideo($(this));
    });
  }
}

videoSwapper.init = function() {
  if (this.videoLink.length) {
    this.addEventListeners();
  }
}

// Add active state to nav menu when on single posts
navActiveState = {};

// get everything between the third set of slashes
navActiveState.getCurrentPage = function() {
  // brittle
  return window.location.href.split('/')[3];
}

navActiveState.setActiveNavClass = function() {
  var currentPage = this.getCurrentPage();

  if (currentPage === 'featured-artist') {
    $('.menu-featured-artists').addClass('active');
  } else if (currentPage === 'projects') {
    $('.menu-archive').addClass('active');
  } else if (currentPage === 'soapbox-article') {
    $('.menu-soapbox').addClass('active');
  }
}

navActiveState.init = function() {
  this.setActiveNavClass();
}

$(document).ready(function() {
  sizer.init();
  nav.init();
  videoSwapper.init();
  navActiveState.init();
});

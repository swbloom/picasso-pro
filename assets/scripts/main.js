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

  // lightweight cookie library
  (function(g,f){'use strict';var h=function(e){if("object"!==typeof e.document)throw Error("Cookies.js requires a `window` with a `document` object");var b=function(a,d,c){return 1===arguments.length?b.get(a):b.set(a,d,c)};b._document=e.document;b._cacheKeyPrefix="cookey.";b._maxExpireDate=new Date("Fri, 31 Dec 9999 23:59:59 UTC");b.defaults={path:"/",secure:!1};b.get=function(a){b._cachedDocumentCookie!==b._document.cookie&&b._renewCache();a=b._cache[b._cacheKeyPrefix+a];return a===f?f:decodeURIComponent(a)};
  b.set=function(a,d,c){c=b._getExtendedOptions(c);c.expires=b._getExpiresDate(d===f?-1:c.expires);b._document.cookie=b._generateCookieString(a,d,c);return b};b.expire=function(a,d){return b.set(a,f,d)};b._getExtendedOptions=function(a){return{path:a&&a.path||b.defaults.path,domain:a&&a.domain||b.defaults.domain,expires:a&&a.expires||b.defaults.expires,secure:a&&a.secure!==f?a.secure:b.defaults.secure}};b._isValidDate=function(a){return"[object Date]"===Object.prototype.toString.call(a)&&!isNaN(a.getTime())};
  b._getExpiresDate=function(a,d){d=d||new Date;"number"===typeof a?a=Infinity===a?b._maxExpireDate:new Date(d.getTime()+1E3*a):"string"===typeof a&&(a=new Date(a));if(a&&!b._isValidDate(a))throw Error("`expires` parameter cannot be converted to a valid Date instance");return a};b._generateCookieString=function(a,b,c){a=a.replace(/[^#$&+\^`|]/g,encodeURIComponent);a=a.replace(/\(/g,"%28").replace(/\)/g,"%29");b=(b+"").replace(/[^!#$&-+\--:<-\[\]-~]/g,encodeURIComponent);c=c||{};a=a+"="+b+(c.path?";path="+
  c.path:"");a+=c.domain?";domain="+c.domain:"";a+=c.expires?";expires="+c.expires.toUTCString():"";return a+=c.secure?";secure":""};b._getCacheFromString=function(a){var d={};a=a?a.split("; "):[];for(var c=0;c<a.length;c++){var e=b._getKeyValuePairFromCookieString(a[c]);d[b._cacheKeyPrefix+e.key]===f&&(d[b._cacheKeyPrefix+e.key]=e.value)}return d};b._getKeyValuePairFromCookieString=function(a){var b=a.indexOf("="),b=0>b?a.length:b,c=a.substr(0,b),e;try{e=decodeURIComponent(c)}catch(f){console&&"function"===
  typeof console.error&&console.error('Could not decode cookie with key "'+c+'"',f)}return{key:e,value:a.substr(b+1)}};b._renewCache=function(){b._cache=b._getCacheFromString(b._document.cookie);b._cachedDocumentCookie=b._document.cookie};b._areEnabled=function(){var a="1"===b.set("cookies.js",1).get("cookies.js");b.expire("cookies.js");return a};b.enabled=b._areEnabled();return b},e="object"===typeof g.document?h(g):h;"function"===typeof define&&define.amd?define(function(){return e}):"object"===typeof exports?
  ("object"===typeof module&&"object"===typeof module.exports&&(exports=module.exports=e),exports.Cookies=e):g.Cookies=e})("undefined"===typeof window?this:window);

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
var sizer = {
  defaultSize: 16
};

sizer.init = function() {
  if (!$('#sizer').length) return;

  this.el = $('#sizer');
  this.addEventListeners();
  this.setInitialSize();
}

sizer.setInitialSize = function() {
  var size = sizer.defaultSize; //
  var rememberedSize = Cookies.get('font-size');

  if (rememberedSize !== undefined) {
    sizer.buttons.removeClass('active');
    $('button[data-size="' + rememberedSize + '"').addClass('active');
    $('body').css('font-size', rememberedSize + "px");
  }
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

  Cookies.set('font-size', size);
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

videoSwapper.getVideoIframe = function(videoLink) {
  // use linkId to lookup iFrame id
  var linkId = videoLink.data('id');
  var iFrameId = "#video-" + linkId;
  return $(iFrameId);
}
videoSwapper.swapVideo = function(videoURL) {
  var iframe = this.getVideoIframe(videoURL)
  iframe.attr('src', videoURL.data('href'));
}

videoSwapper.addEventListeners = function() {
  var homePage = $('.home');
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
    $('.breadcrumb_last').prepend('<a href="/featured-artist">Featured Artists</a> > ');
  } else if (currentPage === 'projects') {
    $('.menu-archive').addClass('active');
    $('.breadcrumb_last').prepend('<a href="/archive">Archive</a> > ');

  } else if (currentPage === 'soapbox-article') {
    $('.menu-soapbox').addClass('active');
    $('.breadcrumb_last').prepend('<a href="/soapbox">Soapbox</a> > ');

  }
}

navActiveState.init = function() {
  this.setActiveNavClass();
}

// grab the query param
var queryParamStripper = {};

queryParamStripper.init = function() {
  var queryString = window.location.search.slice(1);
  console.log(queryString);
}

// fix skiplinks focus issue in chrome
function fixSkiplinks(){
  jQuery('[href^="#"][href!="#"]').click(function() {
    jQuery(jQuery(this).attr('href')).attr('tabIndex', -1).focus();
  });
}


$(document).ready(function() {
  sizer.init();
  nav.init();
  videoSwapper.init();
  navActiveState.init();
  queryParamStripper.init();
  fixSkiplinks();
});

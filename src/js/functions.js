//just some simple jq!

/**
 * jQuery.fastClick.js
 *
 * Work around the 300ms delay for the click event in some mobile browsers.
 *
 * Code based on <http://code.google.com/mobile/articles/fast_buttons.html>
 *
 * @usage
 * $('button').fastClick(function() {alert('clicked!');});
 *
 * @license MIT
 * @author Dave Hulbert (dave1010)
 * @version 1.0.0 2013-01-17
 */

/*global document, window, jQuery, Math */

(function($) {

$.fn.fastClick = function(handler) {
  return $(this).each(function(){
    $.FastButton($(this)[0], handler);
  });
};

$.FastButton = function(element, handler) {
  var startX, startY;

  var reset = function() {
    $(element).unbind('touchend');
    $("body").unbind('touchmove.fastClick');
  };

  var onClick = function(event) {
    event.stopPropagation();
    reset();
    handler.call(this, event);

    if (event.type === 'touchend') {
      $.clickbuster.preventGhostClick(startX, startY);
    }
  };

  var onTouchMove = function(event) {
    if (Math.abs(event.originalEvent.touches[0].clientX - startX) > 10 ||
      Math.abs(event.originalEvent.touches[0].clientY - startY) > 10) {
      reset();
    }
  };

  var onTouchStart = function(event) {
    event.stopPropagation();

    $(element).bind('touchend', onClick);
    $("body").bind('touchmove.fastClick', onTouchMove);

    startX = event.originalEvent.touches[0].clientX;
    startY = event.originalEvent.touches[0].clientY;
  };

  $(element).bind({
    touchstart: onTouchStart,
    click: onClick
  });
};

$.clickbuster = {
  coordinates: [],

  preventGhostClick: function(x, y) {
    $.clickbuster.coordinates.push(x, y);
    window.setTimeout($.clickbuster.pop, 2500);
  },

  pop: function() {
    $.clickbuster.coordinates.splice(0, 2);
  },

  onClick: function(event) {
    var x, y, i;
    for (i = 0; i < $.clickbuster.coordinates.length; i += 2) {
      x = $.clickbuster.coordinates[i];
      y = $.clickbuster.coordinates[i + 1];
      if (Math.abs(event.clientX - x) < 25 && Math.abs(event.clientY - y) < 25) {
        event.stopPropagation();
        event.preventDefault();
      }
    }
  }
};

$(function(){
  if (document.addEventListener){
    document.addEventListener('click', $.clickbuster.onClick, true);
  } else if (document.attachEvent){
    // for IE 7/8
    document.attachEvent('onclick', $.clickbuster.onClick);
  }
});

}(jQuery));

//take me to top

$(document).ready(function(){
    $(this).scrollTop(0);
});

//menu controls - requires fastclick js for the 

$('.menu').fastClick(function() {
    $( ".menu" ).toggleClass("icon-list");
    $( ".menu" ).toggleClass("icon-cancel");
    $( ".menu" ).toggleClass("mob-on");
    $( ".nav-container" ).toggleClass("show-menu");
    $( "body" ).toggleClass("noscroll");
    $('.spc-top').removeClass('on');
});

//back to top button & fix burger menu on scroll 

//Check to see if the window is top if not then display button
  $(window).scroll(function(){
    if ($(this).scrollTop() > 10) {
      $('.menu').addClass('fix-me');
      $('.spc-top').addClass('on');
    } else {
      $('.menu').removeClass('fix-me');
      $('.spc-top').removeClass('on');
    }
  });
  
  //Click event to scroll to top
  $( "body" ).on('click touchstart', '.spc-top', function() {
    $('html, body').animate({scrollTop : 0},200);
    return false;
  });

  //Check to see if the window is top if not then fix the nav-bar to the top
  $(window).scroll(function(){
    if ($(this).scrollTop() > 1) {
      $('.nav-bar').addClass('fixed-nav-desktop');
    } else {
       $('.nav-bar').removeClass('fixed-nav-desktop');
    }
  });



//fix my hovers on touch

function fix()
{
    var el = this;
    var par = el.parentNode;
    var next = el.nextSibling;
    par.removeChild(el);
    setTimeout(function() {par.insertBefore(el, next);}, 0)
}

//ontouchend="this.onclick=fix"



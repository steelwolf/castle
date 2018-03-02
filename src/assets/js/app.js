import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';

$(document).foundation();

// Add special class when navbar shrinks
$(function() {
  $(window).scroll(function() {
    var winTop = $(window).scrollTop();
    if (winTop >= 1) {
      $("div.sticky-top-bar").addClass("sticky-shrink");
    } else{
      $("div.sticky-top-bar").removeClass("sticky-shrink");
    }
  });
});

// Animate the dropdown menu entrance
$('.desktop-menu').on(
  'show.zf.dropdownmenu', function() {
    var dropdown = $(this).find('.is-dropdown-submenu');
    dropdown.css('display', 'none');
    dropdown.slideDown('fast');
});
$('.desktop-menu').on(
  'hide.zf.dropdownmenu', function() {
    var dropdown = $(this).find('.is-dropdown-submenu');
    dropdown.css('display', 'block');
    dropdown.slideUp('fast');
});

// Expanding search bar
$(function() {
  $('.search-submit').click(function(e) {
    e.preventDefault();
    if ($('.search-field').val() == '') {
      $('.search-field').toggleClass('search-expand');
      $('input[type="search"]').focus();
    } else {
      $('.search-form').submit();
    }
  });
});

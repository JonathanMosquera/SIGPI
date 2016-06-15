$(function(){ // document ready

  if (!!$('.sticky').offset()) { // make sure ".sticky" element exists

    var containerTopOffset = $('.container').offset().top; // get offset the container
    var stickyTopOffset = $('.sticky').offset().top; // get offset of the sticky element
    var stickyTopCss = parseInt($('.sticky').css('top'), 10); // get original top pixels set on the sticky element from css
      
    $(window).scroll(function(){ // scroll event
      var windowTop = $(window).scrollTop(); // returns number 
      if (stickyTopOffset < windowTop){
        $('.sticky').css({ top: (windowTop-containerTopOffset) }); // set new top value for the sticky element that would be the window offset minus the container's offset
      } else {
        $('.sticky').css({ top: stickyTopCss }); // restore the original top value of the sticky element
      }
    });

  }

});
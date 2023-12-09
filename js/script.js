 
 function lazyLoad(){

  setTimeout(() => {
    $('.lazy').css('background-color','#e1dcdc');
  }, 400);

  setTimeout(() => {
    $('.lazy').css('background-color','#f1f1f1');
  }, 800);

  // console.log('Locked');

 }

 const lazyInterval = setInterval(lazyLoad,800);



 
 // Scroll to top button appear
 $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')))
    }, 1000, 'easeInOutExpo');
    e.preventDefault();

  //wishlist
  




  });


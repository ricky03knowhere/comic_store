$(document).ready(function() {

  //Owl Carousel
  $('.owl-carousel').owlCarousel({
    loop: true,
    margin: 20,
    dotsEach: true,
    autoplay: true,
    responsive: {
      0: {
        items: 2
      }, 600: {
        items: 4
      }, 1000: {
        items: 6
      }
    }
  })




  //Data Tables
  $('#dataTable').dataTable()


  //Navabar transitions
  $(window).scroll(function() {
    var nScroll = $(this).scrollTop();
    if (nScroll > 70) {
      $("#navbar-main").addClass("add-color");

    } else if (nScroll < 70) {
      $("#navbar-main").removeClass("add-color");
    }
  })

})
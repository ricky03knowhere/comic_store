//Owl Carousel
let owl = $('.owl-carousel');
owl.owlCarousel({
  margin: 10,
  loop: true,
  dotsEach: true,
  autoplay: true,
  responsive: {
    0: {
      items: 3
    },
    600: {
      items: 5
    },
    1000: {
      items: 6
    }
  }
})




//Data Tables
$('#dataTable').dataTable()

//Navabar transitions
$(document).ready(function() {
  $(window).scroll(function() {
    var nScroll = $(this).scrollTop();
    if (nScroll > 70) {
      $("#navbar-main").addClass("add-color");

    } else if (nScroll < 70) {
      $("#navbar-main").removeClass("add-color");
    }
  })

})
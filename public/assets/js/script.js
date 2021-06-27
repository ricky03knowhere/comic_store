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

//Picture Upload Preview
function picture_preview(){
    
  const selector = document.querySelector('#pictureSelector')
  const label = document.querySelector('.picture-label')
  const picture = document.querySelector('.picture-preview')

  label.textContent = selector.files[0].name
  
  const picture_file = new FileReader()
  
  picture_file.readAsDataURL(selector.files[0])
  
  picture_file.onload = (e) => {
    picture.src = e.target.result
  }
}
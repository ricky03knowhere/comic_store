
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

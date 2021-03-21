$('.delete-order').on('click', function (e) {
  e.preventDefault(); 
alert('ok2')
  let id = $(this).data('id'); 
  Swal.fire({
    title: 'Are you sure ?', 
    text: "To remove this order...", 
    icon: 'warning', 
    showCancelButton: true, 
    confirmButtonColor: '#3085d6', 
    cancelButtonColor: '#d33', 
    confirmButtonText: 'Remove'
  }).then((result) => {
    if (result.isConfirmed) {
      $('.remove-order').submit();
    }
  })
});
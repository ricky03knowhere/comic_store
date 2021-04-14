// Toast instantiation
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})


// Notification Checker
const notif = $('#notif').data('notif')

if (notif) {
Toast.fire({
  icon: 'success',
  title: notif
})
  
}

// Warning Notification
$('#btn-logout').on('click', function (e) {
  e.preventDefault();
  let id = $(this).data('id');
  Swal.fire({
    title: 'Are you sure ?',
    text: "To leave this site...",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#5e72e4',
    cancelButtonColor: '#172b4d',
    confirmButtonText: 'Ok'
  }).then((result) => {
    if (result.isConfirmed) {
      $('#logout-form').submit();
    }
  })
});

//
$('#delete-user').on('click', function (e) {
  alert('ok2')
  e.preventDefault();
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
      $('#remove-order').submit();
    }
  })
});
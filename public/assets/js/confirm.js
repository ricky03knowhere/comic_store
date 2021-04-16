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

$('.warn-notif').on('click', function (e) {
  e.preventDefault();

  let form = $(this).data('form');
  let message = $(this).data('msg');

  Swal.fire({
    title: 'Are you sure ?',
    text: `To ${message}`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#5e72e4',
    cancelButtonColor: '#172b4d',
    confirmButtonText: 'Ok'
  }).then((result) => {
    if (result.isConfirmed) {
      $(`#${form}`).submit()
    }
  })
})
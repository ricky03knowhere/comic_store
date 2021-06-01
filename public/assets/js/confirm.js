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

// --> Susscess Notification
const successNotif = $('#notif').data('notif')
if (successNotif) {
  Toast.fire({
    icon: 'success',
    title: successNotif
  })
}


// --> Warning Alert
const warnNotif = $('#alert-notif').data('notif')

if (warnNotif) {

  Swal.fire({
    title: 'Warning..!',
    text: `${warnNotif}`,
    icon: 'warning',
    confirmButtonColor: '#5e72e4',
    confirmButtonText: 'Ok',
  })
}


// Warning Confirmation

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


// Toggle Paid Handler

$('#toggle-paid .toggler').on('change', () => {
  
  // this.value = this.checked ? '1' : '2'
  // alert(this.value)
  $('#toggle-paid-form').submit()
})

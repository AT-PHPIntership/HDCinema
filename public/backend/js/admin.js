$(document).ready(function(){ 
  //datatables
  $('#list_users').DataTable();
  $('#list_films').DataTable();
  $('#list_schedules').DataTable();
  //countdown shutdown alert
  $("div.alert").delay(timeout).slideUp();

  //Confirm delete
  $('#confirmDelete').on('show.bs.modal', function (e) {
      // set message, content for body modal
      $message = $(e.relatedTarget).attr('data-message');
      $name = $(e.relatedTarget).attr('data-name');
      $linked = $(e.relatedTarget).attr('data-linked');
      $('.modal-body p').text($message);
      $('.modal-body a').html($name);
      $('.modal-body a').attr('href', $linked);
      // set title for model
      $title = $(e.relatedTarget).attr('data-title');
      $('.modal-title').text($title);

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $('.modal-footer #confirm').data('form', form);
  });
 
      //Form confirm (yes/ok) handler, submits form
  $('#confirmDelete .modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });
});
//show image upload
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image_no').show();
            $('#image_no').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#image").on('change', function(){
    readURL(this);

});

//disable select room if day,cinema change and not yet click button checkroom
$(document).on('change', 'select[name="cinema"], select[name="day"], select[name="film"], input[name="timeid[]"]', function (e) {
  if (!$('select#room').attr('disabled')) {
    $('select#room').html(new Option('No data available'));
  }
});

// get data of room and pass into select
$('#checkroom').on('click',function(e){
  e.preventDefault();
    $.ajaxSetup({

              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
    $.ajax({
      type: 'GET',
      url: 'http://hdcinema.app/admin/schedule/room',
      data: { day: $('form #day').val(),
              cinema: $('form #cinema').val()
      },
      dataType: 'json',
      success: function (data){
        if (!data.length) {
          return;
        }
        $('select#room').html('');
        data.forEach(function (value) {
          $('select#room').append(new Option(value.name, value.id));
        });
        $('select#room').attr('disabled', false);
      },
      error: function (data) {
          alert('Error:',data);
      }
    });
});



$(document).ready(function(){ 
  //datatables
  $('#list_users').DataTable();
  $('#list_films').DataTable();
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


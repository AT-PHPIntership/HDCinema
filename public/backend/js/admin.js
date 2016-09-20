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
// $(document).ready(function(e){
//   $('#add').on('click',function(e){
//     e.preventDefault();
//     $.ajaxSetup({

//               headers: {
//                   'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//               }
//           });
//     $.ajax({
//       type: 'GET',
//       url: 'http://hdcinema.app/admin/schedule/'+$('form #day').val(),
//       data: { day: $('form #day').val(),
//               cinema: $('form #cinema').val()
//       },
//       dataType: 'json',
//       success: function (data){
//         if ($('#rowdemo').next().length > 0) {
//           $('.data').each(function(index){
//             $(this).remove();
//           });
//         }
//         $('tbody tr .firstdata').remove();
//         // console.log(data);
//         // alert(1);
//         // alert(data);
//         $.each(data, function (index, value) {
//           var newRow= $('#rowdemo').clone(true).attr({'style' : 'display', 'class':'data'}).appendTo('#data');
//           newRow.find('td:nth-child(1)').html(index+1);
//           newRow.find('td:nth-child(2)').html(value['name']);
//           newRow.find('td:nth-child(2) a').attr('href', 'http://hdcinema.app/admin/schedule/'+value.films_id);
//           newRow.find('td:nth-child(3)').html(value['time']);
//           newRow.find('td:nth-child(4)').html(value['room']);
                    
//         });
//     // http://hdcinema.app/admin/film/
//       },
//       error: function (data) {
//           console.log('Error:',data);
//       }
//     });
//   });
  
// });


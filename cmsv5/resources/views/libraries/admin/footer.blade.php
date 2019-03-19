<!-- for style navbar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ URL::asset('js/admincustom.js') }}"></script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script type="text/javascript">
  $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

    //$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
});
</script>
@if(Request::is('ajan/addproduct'))
<script type="text/javascript">
$(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
  var input = $(this),
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [label]);
  });

  $('.btn-file :file').on('fileselect', function(event, label) {

      var input = $(this).parents('.input-group').find(':text'),
          log = label;

      if( input.length ) {
          input.val(log);
      } else {
          if( log ) alert(log);
      }

  });
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#img-upload').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }

  $("#imgInp").change(function(){
      readURL(this);
  });
});
</script>
@endif
@if(Request::is('ajan/addslider'))
<script type="text/javascript">
$(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
  var input = $(this),
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [label]);
  });

  $('.btn-file :file').on('fileselect', function(event, label) {

      var input = $(this).parents('.input-group').find(':text'),
          log = label;

      if( input.length ) {
          input.val(log);
      } else {
          if( log ) alert(log);
      }

  });
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#img-upload').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }

  $("#imgInp").change(function(){
      readURL(this);
  });
});
</script>
<script type="text/javascript">
$(document).ready( function() {
    $(document).on('change', '.btn-file :file', function() {
  var input = $(this),
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [label]);
  });

  $('.btn-file :file').on('fileselect', function(event, label) {

      var input = $(this).parents('.input-group').find(':text'),
          log = label;

      if( input.length ) {
          input.val(log);
      } else {
          if( log ) alert(log);
      }

  });
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#img-upload2').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }

  $("#imgInp2").change(function(){
      readURL(this);
  });
});
</script>
@endif

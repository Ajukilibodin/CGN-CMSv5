<!-- ================== BEGIN BASE JS ================== -->
<script src="{{url('/assets/plugins/jquery/jquery-1.9.1.min.js')}}"></script>
<script src="{{url('/assets/plugins/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
<script src="{{url('/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js')}}"></script>
<script src="{{url('/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{url('/assets/plugins/jquery-cookie/jquery.cookie.js')}}"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{url('/assets/plugins/flot/jquery.flot.min.js')}}"></script>
<script src="{{url('/assets/js/dashboard.min.js')}}"></script>
<script src="{{url('/assets/plugins/DataTables/js/jquery.dataTables.js')}}"></script>
<script src="{{url('/assets/js/table-manage-default.demo.min.js')}}"></script>
<script src="{{url('/assets/js/apps.min.js')}}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script type="text/javascript">
$(document).ready(function() {
  $('#data-table').DataTable( {
    "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Turkish.json"
      }
  } );
} );
</script>

<script>
  $(document).ready(function() {
    App.init();
    Dashboard.init();
    TableManageDefault.init();
  });
</script>

<!-- ================== END OF THEME JS ================== -->

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

<!-- ================== BEGIN OF MANUAL JS ================== -->

@if(Request::is('ajan/addproduct') or Request::is('ajan/modproduct/*')
 or Request::is('ajan/addcategory/*') or Request::is('ajan/editcategory/*')
 or Request::is('ajan/productalbum/*') )
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

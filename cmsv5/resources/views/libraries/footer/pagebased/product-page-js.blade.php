<!-- Select-Boxes CSS -->
<link rel="stylesheet" href="/css/select-boxes.css" type="text/css" />
<!-- Select-Boxes Plugin -->
<script type="text/javascript" src="/js/components/select-boxes.js"></script>

<!-- Select-Splitter Plugin -->
<script type="text/javascript" src="/js/components/selectsplitter.js"></script>

<script type="text/javascript">
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

function setlist(act, prod) {

  var stok = $("select[id='p_type']").val();
  $.ajax({
    type	: "POST",
    url:'/product-setlist',
    data:{_act:act, _prod:prod, _stok:stok},
  	success:function(donen_veri)
  	{
      if(donen_veri == 'NonLogin'){
        alert('Öncelikle Giriş Yapmalısınız!');
      }
      else if(donen_veri == 'OK'){
        alert('Ürün Takip Listenize Eklendi.');
      }
      else alert(donen_veri);
  	}
  });
}
</script>

<script type="text/javascript">
jQuery(document).ready( function($){

// Multiple Select
$(".select-1").select2({
placeholder: "Select Multiple Values"
});

// Loading array data
var data = [{ id: 0, text: 'enhancement' }, { id: 1, text: 'bug' }, { id: 2, text: 'duplicate' }, { id: 3, text: 'invalid' }, { id: 4, text: 'wontfix' }];
$(".select-data-array").select2({
data: data
})
$(".select-data-array-selected").select2({
data: data
});

// Enabled/Disabled
$(".select-disabled").select2();
$(".select-enable").on("click", function () {
$(".select-disabled").prop("disabled", false);
$(".select-disabled-multi").prop("disabled", false);
});
$(".select-disable").on("click", function () {
$(".select-disabled").prop("disabled", true);
$(".select-disabled-multi").prop("disabled", true);
});

// Without Search
$(".select-hide").select2({
minimumResultsForSearch: Infinity
});

// select Tags
$(".select-tags").select2({
tags: true
});

// Select Splitter
$('.selectsplitter').selectsplitter();

});
</script>

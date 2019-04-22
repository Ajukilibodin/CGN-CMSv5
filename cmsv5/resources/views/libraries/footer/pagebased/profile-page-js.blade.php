<script type="text/javascript">
function seecart(orderid) {

  $.ajax({
    type	: "POST",
    url:'/get-product-modal',
    data:{_orderid:orderid},
  	success:function(donen_veri)
  	{
      document.getElementById("modaldiv").innerHTML = donen_veri;
      $('#ordermodal').modal('show');
  	}
  });
}
</script>

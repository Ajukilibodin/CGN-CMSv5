<!--  BASE External JavaScripts	============================================= -->
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/plugins.js"></script>
<script type="text/javascript" src="/js/functions.js"></script>

<script type="text/javascript">
function sepetegit() {
   window.location.href = "/cart";
 }
</script>
@if(Request::is('/'))
  @include('libraries.footer.pagebased.index-js')
@elseif(Request::is('checkout'))
  @include('libraries.footer.pagebased.checkout-page-js')
@elseif(Request::is('product'))
  @include('libraries.footer.pagebased.product-page-js')
@endif

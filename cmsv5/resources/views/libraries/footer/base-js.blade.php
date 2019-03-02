<!--  BASE External JavaScripts	============================================= -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/functions.js"></script>

@if(Request::is('/'))
  @include('libraries.index.index-js')
@endif

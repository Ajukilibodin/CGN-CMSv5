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

@if($reg_token = Session::get('reg_token'))
@php($reg_mail = Session::get('reg_mail'))
<script type="text/javascript" src="/js/smtp.js"></script>
<script type="text/javascript">

  var mailBody = "{{$_SITEVALUES[1]->Value}}"+" Üyelik Linkiniz:<br>"+"{{url('/login/loginkey/'.$reg_token)}}";

  Email.send({
    Host : "<?php echo $_ENV['MAIL_HOST']; ?>",
    From : "<?php echo $_ENV['MAIL_USERNAME']; ?>",
    Username : "<?php echo $_ENV['MAIL_USERNAME']; ?>",
    Password : "<?php echo $_ENV['MAIL_PASSWORD']; ?>",
    To : '<?php echo $reg_mail; ?>',
    Subject : "{{$_SITEVALUES[1]->Value}}"+" Üyelik Linki",
    Body : mailBody
    }).then(message => mailResult(message));

function mailResult(message) {
  if(message=="OK")
      alert("Size Üyelik Linkinizi Mail Olarak Ulaştırdık :)");
  else
      alert("Mail Gönderme Hatası Oluştu: "+message);
}
</script>
@endif

<!--  BASE External JavaScripts	============================================= -->
<script type="text/javascript" src="{{url('/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{url('/js/plugins.js')}}"></script>
<script type="text/javascript" src="{{url('/js/functions.js')}}"></script>

<!-- Include cookiealert script -->
<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>

<script type="text/javascript">
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
function sepetegit() {
   window.location.href = "{{url('/cart')}}";
 }
</script>

@if(Request::is('/'))
  @include('libraries.footer.pagebased.index-js')
@elseif(Request::is('checkout'))
  @include('libraries.footer.pagebased.checkout-page-js')
@elseif(Request::is('product/*'))
  @include('libraries.footer.pagebased.product-page-js')
@elseif(Request::is('profile'))
  @include('libraries.footer.pagebased.profile-page-js')
@elseif(Request::is('contact'))
  @include('libraries.footer.pagebased.contact-page-js')
@endif

@if($reg_token = Session::get('reg_token'))
@php($reg_mail = Session::get('reg_mail'))
<script type="text/javascript" src="{{url('/js/smtp.js')}}"></script>
<script type="text/javascript">

  var link = "{{url('/login/loginkey/'.$reg_token)}}";
  var mailBody = "{{\App\Admin\SiteValues::find(2)->Value}}"+' Üyelik Linkiniz:<br><a href="'
  +link+'"><br><a href="'+link+'"><img src="http://cgnwebtasarim.com/img/aktif.jpeg"></a>';

  Email.send({
    Host : "<?php echo $_ENV['MAIL_HOST']; ?>",
    From : "<?php echo $_ENV['MAIL_USERNAME']; ?>",
    Username : "<?php echo $_ENV['MAIL_USERNAME']; ?>",
    Password : "<?php echo $_ENV['MAIL_PASSWORD']; ?>",
    To : '<?php echo $reg_mail; ?>',
    Subject : "{{\App\Admin\SiteValues::find(2)->Value}}"+" Üyelik Linki",
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

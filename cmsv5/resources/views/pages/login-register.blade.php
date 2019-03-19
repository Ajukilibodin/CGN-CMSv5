@extends('masters.visitor')

@section('content')
<section id="content">
  <div class="content-wrap topmargin bottommargin">
    <div class="container clearfix">
      @include('libraries.errorpopper')
      <div class="col_one_third nobottommargin">
        <div class="well well-lg nobottommargin">
          <form id="login-form" name="login-form" class="nobottommargin" action="/login/login" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h3>Hesabınıza Giriş Yapın</h3>
            <div class="col_full">
              <label for="login-form-username">Email:</label>
              <input type="text" id="login-form-username" name="login-form-username" value="" class="form-control" />
            </div>
            <div class="col_full">
              <label for="login-form-password">Şifre:</label>
              <input type="password" id="login-form-password" name="login-form-password" value="" class="form-control" />
            </div>
            <div class="col_full nobottommargin">
              <button class="button button-3d nomargin" id="login-form-submit" name="login-form-submit" value="login">Giriş</button>
              <a href="#" class="fright">Şifremi Unuttum</a>
              <?php // TODO: şifremi unuttum yönlendirmesi ?>
            </div>
            <div class="col_full nobottommargin">
              <label class="checkbox">
                <input type="checkbox" value="remember-me"> Beni Hatırla
              </label>
            </div>
          </form>
        </div>
      </div>
      <div class="col_two_third col_last nobottommargin">
        <h3>Sitemize Üye Olun</h3>
        <form id="register-form" name="register-form" class="nobottommargin" action="/login/register" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="col_half">
            <label for="register-form-name">Adınız:</label>
            <input type="text" id="register-form-name" name="register-form-name" value="" class="form-control required" />
          </div>
          <div class="col_half col_last">
            <label for="register-form-lname">Soyadınız:</label>
            <input type="text" id="register-form-lname" name="register-form-lname" value="" class="form-control required" />
          </div>
          <div class="clear"></div>
          <div class="col_half">
            <label for="register-form-email">Email Adresiniz:</label>
            <input type="text" id="register-form-email" name="register-form-email" value="" class="form-control required" />
          </div>
          <div class="col_half col_last">
            <label for="register-form-phone">Telefon:</label>
            <input type="text" id="register-form-phone" name="register-form-phone" value="" class="form-control required" />
          </div>
          <div class="clear"></div>
          <div class="col_half">
            <label for="register-form-password">Şifre Seçiniz:</label>
            <input type="password" id="register-form-password" name="register-form-password" value="" class="form-control required" />
          </div>
          <div class="col_half col_last">
            <label for="register-form-repassword">Şifrenizi Tekrar Giriniz:</label>
            <input type="password" id="register-form-repassword" name="register-form-repassword" value="" class="form-control required" />
          </div>
          <div class="clear"></div>
          <div class="col_two_third">
            <label class="checkbox">
              <input type="checkbox" name="read-contract" value="read-contract"> 	<a href="#"> Üyelik sözleşmesini </a>okudum onaylıyorum.
            </label>
            <label class="checkbox">
              <input type="checkbox" name="want-mail-subscribe" value="want-mail-subscribe"> Kampanyalar ile ilgili eposta mesajları almak istiyorum.
            </label>
          </div>
          <div class="col_one_third col_last">
            <button class="button button-3d button-dirtygreen nomargin fright" id="register-form-submit" name="register-form-submit" value="register">ÜYE OL</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section><!-- #content end -->
@endsection

@extends('masters.visitor')

@section('content')
<section id="content" class="topmargin nobottommargin">
	<div class="content-wrap nobottommargin">
		<div class="container clearfix">
		@include('libraries.index.grfx-cat')
		<div class="clear"></div>
    @include('libraries.index.products-tabed')
		<div class="clear"></div>
    @include('libraries.index.products-carousel')
		<div class="clear topmargin bottommargin-sm"></div>
		<div class="col_one_third">
			<div class="fancy-title title-border">
			<h4>W.S.A</h4>
			</div>
			<p>Doğaya ve spora tutkuyla bağlı olanların markası W.S.A, çeşitli kategorilerde sunduğu spor giyim ürünleri ile yaz kış maceranızı destekliyor..</p>
		</div>
		<div class="col_one_third subscribe-widget">
			<div class="fancy-title title-border">
			<h4>Fırsalar için kaydolun</h4>
			</div>
			<p>İndirimler ve kaçırılmayacak fırsatlar için e-mail listemize kayıt olun.</p>
			<div class="widget-subscribe-form-result"></div>
			<form id="widget-subscribe-form2" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
  			<div class="input-group divcenter">
    			<span class="input-group-addon"><i class="icon-email2"></i></span>
    			<input type="email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Email adresini giriniz">
    			<span class="input-group-btn">
			     <button class="btn btn-default" type="submit">Kaydol</button>
    			</span>
  			</div>
			</form>
		</div>
		<div class="col_one_third col_last">
			<div class="fancy-title title-border">
  			<h4>Bizi Takip Edin</h4>
			</div>

			<a href="#" class="social-icon si-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
			<i class="icon-facebook"></i>
			<i class="icon-facebook"></i>
			</a>

			<a href="#" class="social-icon si-delicious" data-toggle="tooltip" data-placement="top" title="Delicious">
			<i class="icon-delicious"></i>
			<i class="icon-delicious"></i>
			</a>

			<a href="#" class="social-icon si-paypal" data-toggle="tooltip" data-placement="top" title="PayPal">
			<i class="icon-paypal"></i>
			<i class="icon-paypal"></i>
			</a>

			<a href="#" class="social-icon si-flattr" data-toggle="tooltip" data-placement="top" title="Flattr">
			<i class="icon-flattr"></i>
			<i class="icon-flattr"></i>
			</a>

			<a href="#" class="social-icon si-android" data-toggle="tooltip" data-placement="top" title="Android">
			<i class="icon-android"></i>
			<i class="icon-android"></i>
			</a>

			<a href="#" class="social-icon si-smashmag" data-toggle="tooltip" data-placement="top" title="Smashing Magazine">
			<i class="icon-smashmag"></i>
			<i class="icon-smashmag"></i>
			</a>

			<a href="#" class="social-icon si-gplus" data-toggle="tooltip" data-placement="top" title="Google+">
			<i class="icon-gplus"></i>
			<i class="icon-gplus"></i>
			</a>

			<a href="#" class="social-icon si-wikipedia" data-toggle="tooltip" data-placement="top" title="Wikipedia">
			<i class="icon-wikipedia"></i>
			<i class="icon-wikipedia"></i>
			</a>

			<a href="#" class="social-icon si-stumbleupon" data-toggle="tooltip" data-placement="top" title="StumbleUpon">
			<i class="icon-stumbleupon"></i>
			<i class="icon-stumbleupon"></i>
			</a>

			<a href="#" class="social-icon si-foursquare" data-toggle="tooltip" data-placement="top" title="FourSquare">
			<i class="icon-foursquare"></i>
			<i class="icon-foursquare"></i>
			</a>

			<a href="#" class="social-icon si-call" data-toggle="tooltip" data-placement="top" title="Call">
			<i class="icon-call"></i>
			<i class="icon-call"></i>
			</a>

			<a href="#" class="social-icon si-ninetyninedesigns" data-toggle="tooltip" data-placement="top" title="Ninety Nine Design">
			<i class="icon-ninetyninedesigns"></i>
			<i class="icon-ninetyninedesigns"></i>
			</a>

			<a href="#" class="social-icon si-forrst" data-toggle="tooltip" data-placement="top" title="Forrst">
			<i class="icon-forrst"></i>
			<i class="icon-forrst"></i>
			</a>

			<a href="#" class="social-icon si-digg" data-toggle="tooltip" data-placement="top" title="Digg">
			<i class="icon-digg"></i>
			<i class="icon-digg"></i>
			</a>
		</div>
		<div class="clear"></div>
		</div>
    <div class="section dark parallax notopmargin nobottommargin noborder" style="height: 500px; padding: 145px 0;">
      <div class="container clearfix">
        <div class="slider-caption slider-caption-center" style="position: relative;">
          <div data-animate="fadeInUp">
            <h2 style="font-size: 42px;">WINTER SUMMER ADVENTURE</h2>
            <p>Yaz Kış Maceralarınızın tadını maximumda çıkarabilmeniz için, W.S.A markasını oluşturduk.</p>
            <a href="#" class="button button-border button-rounded button-white button-light button-large noleftmargin nobottommargin" style="margin-top: 20px;">KEŞFET</a>
          </div>
        </div>
      </div>
      <div class="video-wrap">
        <video poster="images/videos/explore.jpg" preload="none" loop autoplay muted>
          <source src='images/videos/1.mp4' type='video/mp4' />
          <source src='images/videos/1.webm' type='video/webm' />
        </video>
        <div class="video-overlay" style="background-color: rgba(0,0,0,0.3);"></div>
      </div>
    </div>
		<div class="section notopmargin nobottommargin">
      <div class="container clearfix">
  			<div class="col_one_fourth nobottommargin">
    			<div class="feature-box fbox-plain fbox-dark fbox-small">
      			<div class="fbox-icon">
      			<i class="icon-thumbs-up2"></i>
      			</div>
      			<h3>100% ORJİNAL</h3>
      			<p class="notopmargin">Tüm ürünlerimiz kendi tasarımımızdır.</p>
    			</div>
  			</div>
  			<div class="col_one_fourth nobottommargin">
    			<div class="feature-box fbox-plain fbox-dark fbox-small">
      			<div class="fbox-icon">
      			<i class="icon-credit-cards"></i>
      			</div>
      			<h3>ÖDEME SEÇENEKLERİ</h3>
      			<p class="notopmargin">Kredi kartı, haale ve kapıda ödeme seçeneklirimiz vardır.</p>
    			</div>
  			</div>
  			<div class="col_one_fourth nobottommargin">
    			<div class="feature-box fbox-plain fbox-dark fbox-small">
      			<div class="fbox-icon">
      			<i class="icon-truck2"></i>
      			</div>
      			<h3>ÜCRETSİZ KARGO</h3>
      			<p class="notopmargin">Tüm alışverişlerinizde kargo bizden.</p>
    			</div>
  			</div>
  			<div class="col_one_fourth nobottommargin col_last">
    			<div class="feature-box fbox-plain fbox-dark fbox-small">
      			<div class="fbox-icon">
      			<i class="icon-undo"></i>
      			</div>
      			<h3>30-GÜN İADE</h3>
      			<p class="notopmargin">İade ve değişimlerinizi 30 gün içerisinde yapabilirsiniz.</p>
    			</div>
  			</div>
			</div>
		</div>
  </div>
</section><!-- #content end -->
@endsection

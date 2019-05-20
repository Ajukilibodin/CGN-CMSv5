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
			<h4>{{\App\Admin\SiteValues::find(2)->Value}}</h4>
			</div>
			<p>{{\App\Admin\SiteValues::find(8)->Value}}</p>
		</div>
		<div class="col_one_third ">
			<div class="fancy-title title-border">
			<h4>Fırsalar için kaydolun</h4>
			</div>
			<p>İndirimler ve kaçırılmayacak fırsatlar için e-mail listemize kayıt olun.</p>
			<form  action="{{url('/subscribe')}}" method="post" class="nobottommargin">
				@csrf
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

			<a href="#" class="social-icon si-instagram" data-toggle="tooltip" data-placement="top" title="Instagram">
			<i class="icon-instagram"></i>
			<i class="icon-instagram"></i>
			</a>

			<a href="#" class="social-icon si-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
			<i class="icon-twitter"></i>
			<i class="icon-twitter"></i>
			</a>

			<a href="#" class="social-icon si-youtube" data-toggle="tooltip" data-placement="top" title="Youtube">
			<i class="icon-youtube"></i>
			<i class="icon-youtube"></i>
			</a>

			<a href="#" class="social-icon si-pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest">
			<i class="icon-pinterest"></i>
			<i class="icon-pinterest"></i>
			</a>

			<a href="#" class="social-icon si-linkedin" data-toggle="tooltip" data-placement="top" title="LinkedIN">
			<i class="icon-linkedin"></i>
			<i class="icon-linkedin"></i>
			</a>

			<a href="#" class="social-icon si-blogger" data-toggle="tooltip" data-placement="top" title="Blogger">
			<i class="icon-blogger"></i>
			<i class="icon-blogger"></i>
			</a>

			<a href="#" class="social-icon si-foursquare" data-toggle="tooltip" data-placement="top" title="FourSquare">
			<i class="icon-foursquare"></i>
			<i class="icon-foursquare"></i>
			</a>

			<a href="#" class="social-icon si-tumblr" data-toggle="tooltip" data-placement="top" title="Tumblr">
			<i class="icon-tumblr"></i>
			<i class="icon-tumblr"></i>
			</a>

			<a href="#" class="social-icon si-soundcloud" data-toggle="tooltip" data-placement="top" title="SoundCloud">
			<i class="icon-soundcloud"></i>
			<i class="icon-soundcloud"></i>
			</a>

			<a href="#" class="social-icon si-wikipedia" data-toggle="tooltip" data-placement="top" title="Wikipedia">
			<i class="icon-wikipedia"></i>
			<i class="icon-wikipedia"></i>
			</a>
		</div>
		<div class="clear"></div>
		</div>
		<div class="section yt-bg-player nomargin dark" data-quality="hd1080" data-start="20" data-stop="40" data-video="http://youtu.be/A3PDXmYoF5U" style="height: 600px;">
			<div class="container vertical-middle center clearfix">
				<i class="i-plain i-large icon-line-video divcenter" data-animate="fadeInDown"></i>
				<div class="emphasis-title nomargin" data-animate="fadeInUp">
					<h2 style="font-size: 42px;">WINTER SUMMER ADVENTURE</h2>
					<p>Yaz Kış Maceralarınızın tadını maximumda çıkarabilmeniz için, W.S.A markasını oluşturduk.</p>
				</div>
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
						<?php
						$pay_ways = (int)(\App\Admin\SiteValues::find(14)->Value);
						$pay_string = "";
						if($pay_ways%2 >= 1) $pay_string .= ($pay_string==""?"":", ")."Kredi Kartı";
						if($pay_ways%4 >= 2) $pay_string .= ($pay_string==""?"":", ")."Havale";
						if($pay_ways%8 >= 4) $pay_string .= ($pay_string==""?"":", ")."Kapıda";
						 ?>
      			<p class="notopmargin">{{$pay_string}} ödeme seçeneklerimiz vardır.</p>
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

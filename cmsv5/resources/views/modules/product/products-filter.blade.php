<!-- Sidebar============================================= -->
<div class="sidebar nobottommargin">
<div class="sidebar-widgets-wrap">

	<form id="quick-contact-form" name="quick-contact-form" action="/test" method="post">
		@csrf

	<div class="widget widget-filter-links clearfix notopmargin notoppadding">
		<h4>Sırala</h4>
		<ul class="shop-sorting">
			<li> <input type="radio" id="p-order1" name="p-order" value="0" checked> <label for="p-order1"> İsime Göre</label> </li>
			<li> <input type="radio" id="p-order2" name="p-order" value="1"> <label for="p-order2"> Fiyat: En Düşük Fiyat</label> </li>
			<li> <input type="radio" id="p-order3" name="p-order" value="2"> <label for="p-order3"> Fiyat: En Yüksek Fiyat</label> </li>
		</ul>
	</div>

@foreach(\App\Category::where('ParentCategory', 0)->get() as $cate)
<div class="widget widget-filter-links clearfix notopmargin">
<h4>{{$cate->Title}} Kategorisi Seç</h4>

@foreach(\App\Category::where('ParentCategory', $cate->id)->get() as $subcate)
<div>
<input id="checkbox-{{$subcate->id}}" class="checkbox-style" name="checkbox-{{$subcate->id}}" type="checkbox">
<label for="checkbox-{{$subcate->id}}" class="checkbox-style-2-label">{{$subcate->Title}}</label>
</div>
@endforeach

</div>
@endforeach


<div id="q-contact" class="widget quick-contact-widget clearfix notopmargin">
<h4 class="highlight-me">Fiyat Aralığı</h4>
<div class="quick-contact-form-result"></div>
<div class="form-process"></div>
<input type="text"value="" placeholder="Alt Limit" />
<input type="text" value="" placeholder="Üst Limit" />
<button type="submit" class="button button-small button-3d nomargin" value="submit">Filtrele</button>
</div>
</form>


<!--
<div id="tags" class="widget clearfix">
<h4 class="highlight-me">Tag Cloud</h4>
<div class="tagcloud">
<a href="#">general</a>
<a href="#">videos</a>
<a href="#">music</a>
<a href="#">media</a>
<a href="#">photography</a>
<a href="#">parallax</a>
<a href="#">ecommerce</a>
<a href="#">terms</a>
<a href="#">coupons</a>
<a href="#">modern</a>
</div>
</div>-->

<div class="widget clearfix">
<h4 class="highlight-me">En Son Ziyaret Edilenler</h4>
<?php // TODO: burayı aktif hale getir ?>
<div class="widget-last-view">

<div class="spost clearfix">
<div class="entry-image">
<a href="#"><img src="/images/shop/small/3.jpg" alt="Image"></a>
</div>
<div class="entry-c">
<div class="entry-title">
<h4><a href="#">Round-Neck Tshirt</a></h4>
</div>
<ul class="entry-meta">
<li class="color">$15</li>
</ul>
</div>
</div>

<div class="spost clearfix">
<div class="entry-image">
<a href="#"><img src="/images/shop/small/10.jpg" alt="Image"></a>
</div>
<div class="entry-c">
<div class="entry-title">
<h4><a href="#">Green Trousers</a></h4>
</div>
<ul class="entry-meta">
<li class="color">$19</li>
</ul>
</div>
</div>

<div class="spost clearfix">
<div class="entry-image">
<a href="#"><img src="/images/shop/small/11.jpg" alt="Image"></a>
</div>
<div class="entry-c">
<div class="entry-title">
<h4><a href="#">Silver Chrome Watch</a></h4>
</div>
<ul class="entry-meta">
<li class="color">$34.99</li>
</ul>
</div>
</div>

</div>
</div>







</div>
</div><!-- .sidebar end -->

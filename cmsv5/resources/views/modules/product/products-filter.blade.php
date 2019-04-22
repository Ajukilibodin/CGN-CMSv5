<!-- Sidebar============================================= -->
<div class="sidebar nobottommargin">
<div class="sidebar-widgets-wrap">

	<div class="widget widget-filter-links clearfix">
		<h4>Sırala</h4>
		<ul class="shop-sorting">
			<li class="widget-filter-reset active-filter"><a href="#" data-sort-by="original-order">Clear</a></li>
			<li><a href="?ordertype=name" data-sort-by="name">İsime Göre</a></li>
			<li><a href="?ordertype=p_up" data-sort-by="price_lh">Fiyat: En Düşük Fiyat</a></li>
			<li><a href="?ordertype=p_down" data-sort-by="price_hl">Fiyat: En Yüksek Fiyat</a></li>
		</ul>
	</div>

@foreach(\App\Category::where('ParentCategory', 0)->get() as $cate)
<div class="widget widget-filter-links clearfix">
<h4>{{$cate->Title}} Kategorisi Seç</h4>

@foreach(\App\Category::where('ParentCategory', $cate->id)->get() as $subcate)
<div>
<input id="checkbox-{{$subcate->id}}" class="checkbox-style" name="checkbox-{{$subcate->id}}" type="checkbox">
<label for="checkbox-{{$subcate->id}}" class="checkbox-style-2-label">{{$subcate->Title}}</label>
</div>
@endforeach

</div>
@endforeach


<div id="q-contact" class="widget quick-contact-widget clearfix">
<h4 class="highlight-me">Fiyat Aralığı</h4>
<div class="quick-contact-form-result"></div>
<form id="quick-contact-form" name="quick-contact-form" action="include/quickcontact.php" method="post" class="quick-contact-form nobottommargin">
<div class="form-process"></div>
<input type="text"value="" placeholder="Alt Limit" />
<input type="text" value="" placeholder="Üst Limit" />
<input type="text" class="hidden" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />
<button type="submit" class="button button-small button-3d nomargin" value="submit">Filtrele</button>
</form>
</div>



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
</div>

<div class="widget clearfix">
<h4 class="highlight-me">En Son Ziyaret Edilenler</h4>
<?php // TODO: burayı aktif hale getir ?>
<div class="widget-last-view">

<div class="spost clearfix">
<div class="entry-image">
<a href="#"><img src="images/shop/small/3.jpg" alt="Image"></a>
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
<a href="#"><img src="images/shop/small/10.jpg" alt="Image"></a>
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
<a href="#"><img src="images/shop/small/11.jpg" alt="Image"></a>
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

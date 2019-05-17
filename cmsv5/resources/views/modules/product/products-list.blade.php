<!-- column number can be adjust - consider config -->
<div id="shop" class="shop product-3 clearfix">

	@foreach($pagevalues as $pagevalue)
	<div class="product clearfix">
		<div class="product-image">
			@php($imagepath = $pagevalue->ImgPaths)
      @if(strpos($pagevalue->ImgPaths,','))
			<?php
				$temppos = strpos($imagepath,',');
				$img1 = substr($imagepath, 0 , $temppos);
				$imagepath = substr($imagepath, ($temppos+1));
				$temppos = strpos($imagepath,',');
				if ( strpos($imagepath,',') ) $img2 = substr($imagepath, 0 , $temppos);
				else $img2 = $imagepath;
			?>
			<a href="{{url('/product/'.$pagevalue->id)}}"><img src="{{url('/uploads/modules/product/'.$img1)}}" alt="{{$pagevalue->Title}}"></a>
			<a href="{{url('/product/'.$pagevalue->id)}}"><img src="{{url('/uploads/modules/product/'.$img2)}}" alt="{{$pagevalue->Title}}"></a>
			@else
			<a href="{{url('/product/'.$pagevalue->id)}}"><img src="{{url('/uploads/modules/product/'.$imagepath)}}" alt="{{$pagevalue->Title}}"></a>
      @endif

			@php($ribbontext = "")
			@if($pagevalue->Discount > 0)
			@if($ribbontext!="")@php($ribbontext.=", ")@endif
			@php($ribbontext.='<i class="icon-arrow-down"></i>'.$pagevalue->Discount.'%<i class="icon-arrow-down"></i>')
			@endif
			@if($pagevalue->Ribbons%4 >= 2)
			@if($ribbontext!="")@php($ribbontext.=", ")@endif
			@php($ribbontext.="Yeni")
			@endif
			@if($pagevalue->Ribbons%2 >= 1)
			@if($ribbontext!="")@php($ribbontext.=", ")@endif
			@php($ribbontext.="Öne Çıkan")
			@endif
			<div class="sale-flash">{!!$ribbontext!!}</div>
			<div class="product-overlay">
				<a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Sepete At</span></a>
				<a href="{{url('/product_pre/'.$pagevalue->id)}}" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Göz At</span></a>
			</div>
		</div>
		<div class="product-desc center">
			<div class="product-title">
				<h3><a href="{{url('/product/'.$pagevalue->id)}}">{{$pagevalue->Title}}</a></h3>
			</div>
			@if($pagevalue->Discount > 0)
			<div class="product-price"><del>{{$pagevalue->Price}}&#8378;</del>
				<ins>{{ $pagevalue->Price - ($pagevalue->Price/100 * $pagevalue->Discount) }}&#8378;</ins></div>
			@else
			<div class="product-price"><ins>{{$pagevalue->Price}}&#8378;</ins></div>
			@endif
		</div>
	</div>
	@endforeach

	<!--
<div class="product clearfix">
<div class="product-image">
	<a href="/product"><img src="/img/demo/t/2.jpg" alt="Erkek Tshirt"></a>
	<a href="/product"><img src="/img/demo/t/3.jpg" alt="Erkek Tshirt"></a>
<div class="sale-flash">50% indirim</div>
<div class="product-overlay">
<a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Sepete At</span></a>
<a href="/include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Göz At</span></a>
</div>
</div>
<div class="product-desc center">
<div class="product-title"><h3><a href="#">Erkek Tshirt</a></h3></div>
<div class="product-price"><del>24.99&#8378;</del> <ins>12.49&#8378;</ins></div>
</div>
</div>

<div class="product clearfix">
<div class="product-image">
	<a href="/product"><img src="/img/demo/t/1.jpg" alt="Erkek Tshirt"></a>
	<a href="/product"><img src="/img/demo/t/2.jpg" alt="Erkek Tshirt"></a>
<div class="sale-flash">50% indirim</div>
<div class="product-overlay">
<a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Sepete At</span></a>
<a href="/include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Göz At</span></a>
</div>
</div>
<div class="product-desc center">
<div class="product-title"><h3><a href="#">Erkek Tshirt</a></h3></div>
<div class="product-price"><del>24.99&#8378;</del> <ins>12.49&#8378;</ins></div>
</div>
</div>

<div class="product clearfix">
<div class="product-image">
	<a href="/product"><img src="/img/demo/t/3.jpg" alt="Erkek Tshirt"></a>
	<a href="/product"><img src="/img/demo/t/4.jpg" alt="Erkek Tshirt"></a>
<div class="sale-flash">50% indirim</div>
<div class="product-overlay">
<a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Sepete At</span></a>
<a href="/include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Göz At</span></a>
</div>
</div>
<div class="product-desc center">
<div class="product-title"><h3><a href="#">Erkek Tshirt</a></h3></div>
<div class="product-price"><del>24.99&#8378;</del> <ins>12.49&#8378;</ins></div>
</div>
</div>


<div class="product clearfix">
<div class="product-image">
	<a href="/product"><img src="/img/demo/t/4.jpg" alt="Erkek Tshirt"></a>
	<a href="/product"><img src="/img/demo/t/5.jpg" alt="Erkek Tshirt"></a>
<div class="sale-flash">50% indirim</div>
<div class="product-overlay">
<a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Sepete At</span></a>
<a href="/include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Göz At</span></a>
</div>
</div>
<div class="product-desc center">
<div class="product-title"><h3><a href="#">Erkek Tshirt</a></h3></div>
<div class="product-price"><del>24.99&#8378;</del> <ins>12.49&#8378;</ins></div>
</div>
</div>


<div class="product clearfix">
<div class="product-image">
	<a href="/product"><img src="/img/demo/t/5.jpg" alt="Erkek Tshirt"></a>
	<a href="/product"><img src="/img/demo/t/6.jpg" alt="Erkek Tshirt"></a>
<div class="sale-flash">50% indirim</div>
<div class="product-overlay">
<a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Sepete At</span></a>
<a href="/include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Göz At</span></a>
</div>
</div>
<div class="product-desc center">
<div class="product-title"><h3><a href="#">Erkek Tshirt</a></h3></div>
<div class="product-price"><del>24.99&#8378;</del> <ins>12.49&#8378;</ins></div>
</div>
</div>
-->


</div><!-- #shop end -->

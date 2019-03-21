<div class="clear"></div>

<div class="fancy-title title-center title-dotted-border topmargin">
	<h3>ÖNE ÇIKANLAR</h3>
</div>

<div id="oc-portfolio" class="owl-carousel portfolio-carousel carousel-widget" data-margin="20" data-nav="true" data-pagi="false" data-items-xxs="1" data-items-xs="2" data-items-sm="3" data-items-md="4">
	@foreach(\App\Product::where('Ribbons','>=', 1)->get() as $prod)
	@php($imagepath = $prod->ImgPaths)
	@if(strpos($prod->ImgPaths,','))
	@php($imagepath = substr($imagepath, 0 ,strpos($imagepath,',')))
	@endif
	<div class="oc-item">
		<div class="iportfolio">
			<div class="portfolio-image">
				<a href="{{url('/product')}}">
					<img src="/uploads/modules/product/{{$imagepath}}" alt="{{$prod->Title}}">
				</a>
				<div class="portfolio-overlay">
					<a href="/uploads/modules/product/{{$imagepath}}" class="left-icon" data-lightbox="image"><i class="icon-line-search"></i></a>
					<a href="{{url('/product')}}" class="right-icon"><i class="icon-line-ellipsis"></i></a>
				</div>
			</div>
			<div class="portfolio-desc">
				<h3><a href="{{url('/product')}}">{{$prod->Title}}</a></h3>
				<span>
					@php($catelinktext = "")
					@foreach(explode(',', $prod->Categories) as $prodcates)
					@php( $get_prodcate = \App\Category::where('id',$prodcates)->get()->first() )
					@if($catelinktext != "")@php($catelinktext .= ", ")@endif
					@php($catelinktext .= '<a href="'.url('/products').'">'.$get_prodcate->Title.'</a>')
					@endforeach
					{!!$catelinktext!!}
				</span>
			</div>
		</div>
	</div>
	@endforeach

	<!--
	<div class="oc-item">
		<div class="iportfolio">
			<div class="portfolio-image">
				<a href="portfolio-single.html">
					<img src="images/portfolio/4/2.jpg" alt="Locked Steel Gate">
				</a>
				<div class="portfolio-overlay">
					<a href="images/portfolio/full/2.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
					<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
				</div>
			</div>
			<div class="portfolio-desc">
				<h3><a href="portfolio-single.html">Locked Steel Gate</a></h3>
				<span><a href="#">Illustrations</a></span>
			</div>
		</div>
	</div>

	<div class="oc-item">
		<div class="iportfolio">
			<div class="portfolio-image">
				<a href="#">
					<img src="images/portfolio/4/3.jpg" alt="Mac Sunglasses">
				</a>
				<div class="portfolio-overlay">
					<a href="http://vimeo.com/89396394" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
					<a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
				</div>
			</div>
			<div class="portfolio-desc">
				<h3><a href="portfolio-single-video.html">Mac Sunglasses</a></h3>
				<span><a href="#">Graphics</a>, <a href="#">UI Elements</a></span>
			</div>
		</div>
	</div>

	<div class="oc-item">
		<div class="iportfolio">
			<div class="portfolio-image">
				<a href="portfolio-single.html">
					<img src="images/portfolio/4/5.jpg" alt="Console Activity">
				</a>
				<div class="portfolio-overlay">
					<a href="images/portfolio/full/5.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
					<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
				</div>
			</div>
			<div class="portfolio-desc">
				<h3><a href="portfolio-single.html">Console Activity</a></h3>
				<span><a href="#">UI Elements</a>, <a href="#">Media</a></span>
			</div>
		</div>
	</div>

	<div class="oc-item">
		<div class="iportfolio">
			<div class="portfolio-image">
				<a href="portfolio-single-video.html">
					<img src="images/portfolio/4/7.jpg" alt="Backpack Contents">
				</a>
				<div class="portfolio-overlay">
					<a href="http://www.youtube.com/watch?v=kuceVNBTJio" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
					<a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
				</div>
			</div>
			<div class="portfolio-desc">
				<h3><a href="portfolio-single-video.html">Backpack Contents</a></h3>
				<span><a href="#">UI Elements</a>, <a href="#">Icons</a></span>
			</div>
		</div>
	</div>

	<div class="oc-item">
		<div class="iportfolio">
			<div class="portfolio-image">
				<a href="portfolio-single.html">
					<img src="images/portfolio/4/8.jpg" alt="Sunset Bulb Glow">
				</a>
				<div class="portfolio-overlay">
					<a href="images/portfolio/full/8.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
					<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
				</div>
			</div>
			<div class="portfolio-desc">
				<h3><a href="portfolio-single.html">Sunset Bulb Glow</a></h3>
				<span><a href="#">Graphics</a></span>
			</div>
		</div>
	</div>

	<div class="oc-item">
		<div class="iportfolio">
			<div class="portfolio-image">
				<a href="portfolio-single-video.html">
					<img src="images/portfolio/4/10.jpg" alt="Study Table">
				</a>
				<div class="portfolio-overlay">
					<a href="http://vimeo.com/91973305" class="left-icon" data-lightbox="iframe"><i class="icon-line-play"></i></a>
					<a href="portfolio-single-video.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
				</div>
			</div>
			<div class="portfolio-desc">
				<h3><a href="portfolio-single-video.html">Study Table</a></h3>
				<span><a href="#">Graphics</a>, <a href="#">Media</a></span>
			</div>
		</div>
	</div>

	<div class="oc-item">
		<div class="iportfolio">
			<div class="portfolio-image">
				<a href="portfolio-single.html">
					<img src="images/portfolio/4/11.jpg" alt="Workspace Stuff">
				</a>
				<div class="portfolio-overlay">
					<a href="images/portfolio/full/11.jpg" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
					<a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
				</div>
			</div>
			<div class="portfolio-desc">
				<h3><a href="portfolio-single.html">Workspace Stuff</a></h3>
				<span><a href="#">Media</a>, <a href="#">Icons</a></span>
			</div>
		</div>
	</div>
	-->
</div>

<div class="single-product shop-quick-view-ajax clearfix">

    <div class="ajax-modal-title">
        <h2>{{$pagevalues->Title}}</h2>
    </div>

    <div class="product modal-padding clearfix">

        <div class="col_half nobottommargin">
            <div class="product-image">
                <div class="fslider" data-pagi="false">
                    <div class="flexslider">
                        <div class="slider-wrap">
                          @foreach(explode(',',$pagevalues->ImgPaths) as $p_pic)
            							<div class="slide">
            								<a href="{{url('/uploads/modules/product/'.$p_pic)}}" title="">
            									<img src="{{url('/uploads/modules/product/'.$p_pic)}}" alt="">
            								</a>
            							</div>
                          @endforeach
                        </div>
                    </div>
                </div>
                @php($ribbontext = "")
        				@if($pagevalues->Discount > 0)
        				@if($ribbontext!="")@php($ribbontext.=", ")@endif
        				@php($ribbontext.='<i class="icon-arrow-down"></i>'.$pagevalues->Discount.'%<i class="icon-arrow-down"></i>')
        				@endif
        				@if($pagevalues->Ribbons%4 >= 2)
        				@if($ribbontext!="")@php($ribbontext.=", ")@endif
        				@php($ribbontext.="Yeni")
        				@endif
        				@if($pagevalues->Ribbons%2 >= 1)
        				@if($ribbontext!="")@php($ribbontext.=", ")@endif
        				@php($ribbontext.="Öne Çıkan")
        				@endif
        				<div class="sale-flash">{!!$ribbontext!!}</div>
            </div>
        </div>
        <div class="col_half nobottommargin col_last product-desc">
            @php($fiyatTR = $pagevalues->Price * $pagevalues->Exchange->Multipler)
            @if($pagevalues->Discount > 0)
            <div class="product-price"><del>{{$fiyatTR}}&#8378;</del>
              <ins>{{ round( $fiyatTR - ($fiyatTR/100 * $pagevalues->Discount) ,2) }}&#8378;</ins></div>
            @else
            <div class="product-price"><ins>{{$fiyatTR}}&#8378;</ins></div>
            @endif
            <div class="clear"></div>
            <div class="line"></div>

            <p>{{$pagevalues->Desc}}</p>

            <!-- Product Single - Meta
            ============================================= -->
            <div class="panel panel-default product-meta nobottommargin">
              <div class="panel-body">
                @if($pagevalues->Barcode)
                <span itemprop="productID" class="sku_wrapper">Barkod No: <span class="sku">{{$pagevalues->Barcode}}</span></span>
                @endif
                <span class="tagged_as">Kategoriler:
                @php($catetext = "")
                @foreach(explode(',', $pagevalues->Categories) as $scate)
                @php($temp_cate = \App\Category::where('id', $scate)->get()->first())
                @if($catetext == "")
                @php($catetext .= '<a href="'.url('/products/'.$scate).'" rel="tag">'.$temp_cate->Title.'</a>')
                @else
                @php($catetext .= ', <a href="'.url('/products/'.$scate).'" rel="tag">'.$temp_cate->Title.'</a>')
                @endif
                @endforeach
                {!! $catetext !!}
                </span>
              </div>
            </div><!-- Product Single - Meta End -->
            <a href="{{url('/product/'.$pagevalues->id)}}" class="add-to-cart button allmargin-xs">ÜRÜNE GİT >></a>
        </div>

    </div>

</div>

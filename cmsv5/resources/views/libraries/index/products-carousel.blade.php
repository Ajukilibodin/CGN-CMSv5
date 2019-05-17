<!-- KARUSELLİ  ANASAYFA ÜRÜNLERİ  -->
    <div class="fancy-title title-center title-dotted-border topmargin">
      <h3>Haftanın Ürünleri</h3>
    </div>

    <div id="oc-products" class="owl-carousel products-carousel carousel-widget" data-margin="20" data-nav="true" data-pagi="false" data-items-xxs="1" data-items-xs="2" data-items-sm="3" data-items-md="4">
      @foreach(\App\Product::all() as $pagevalue)
      @if($pagevalue->Ribbons%16 >= 8)
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
          @if($pagevalue->Ribbons%8 >= 4)
          @if($ribbontext!="")@php($ribbontext.=", ")@endif
          @php($ribbontext.="Tükenmek Üzere")
          @endif
          @if($pagevalue->Ribbons%16 >= 8)
          @if($ribbontext!="")@php($ribbontext.=", ")@endif
          @php($ribbontext.="Haftanın Ürünü")
          @endif
          <div class="sale-flash">{!!$ribbontext!!}</div>
          <div class="product-overlay">
            <a href="{{url('/product/'.$pagevalue->id)}}" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Sepete At</span></a>
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
      @endif
      @endforeach
    </div>
    <!-- KARUSELLİ  ANASAYFA ÜRÜNLERİ  -->

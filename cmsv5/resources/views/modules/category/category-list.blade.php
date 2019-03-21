<!-- list column number can be adjust - consider config -->

<div id="portfolio" class="portfolio grid-container portfolio-3 clearfix">

@foreach(\App\Category::orderBy('ParentCategory','asc')->get() as $cate)
@php($link = url('/products/'.$cate->id))
<article class="portfolio-item ">
<div class="portfolio-image">
<a href="{{$link}}"><img src="/uploads/modules/category/{{$cate->ImgUrl}}" alt=""></a>
</div>
<div class="portfolio-desc">
<h3><a href="{{$link}}">{{$cate->Title}}</a></h3>
</div>
</article>
@endforeach

</div>

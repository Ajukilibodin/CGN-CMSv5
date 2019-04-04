<!-- 4LÜ RESİMLİ KATEGORİ  -->
<style media="screen">
.mt-25-imp{
  margin-top: 25px !important;
}
.relative{
  position:relative;
}
.absolute-text{
  position:absolute;
  bottom:0;
  background:rgba(251,251,251,0.5);
  padding:10px 20px;
  width:100%;
  text-align:center;
}
</style>
@foreach(\App\Showcase\ShowcaseCategory::all() as $showcate)
<div class="col-md-{{$showcate->ShowcaseWidth*4}} col-sm-{{$showcate->ShowcaseWidth*6}} mt-25-imp relative">
  <a href="/products/{{$showcate->CateID}}" class="hvr-outline-out">
    <img src="/uploads/modules/category/{{$showcate->CateID}}.jpg" alt="Image">
    <h4 class="absolute-text">{{$showcate->Title}}
      <br><small style="color:black;">{{$showcate->SubText}}</small>
    </h4>
  </a>
</div>
@endforeach

<!--
<div class="col-md-8 mt-25-imp">
<a href="/products" class="hvr-outline-out"><img src="/img/demo/4.png" alt="Image"></a>
</div>

<div class="col-md-4 mt-25-imp">
<a href="/products" class="hvr-outline-out"><img src="/img/demo/8.png" alt="Image"></a>
</div>
-->
<!-- 4LÜ RESİMLİ KATEGORİ  -->

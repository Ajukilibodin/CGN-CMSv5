@extends('masters.admin')

@section('contenttitle')
<h1>Ürünlerim</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ürünlerim</li>
  </ol>
</nav>
@if($message = Session::get('successmsg'))
<div class="alert alert-success">
  {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<section class="content">
  <div class="row">
    <div class="col-12 table-responsive">
      <a title="Yeni Ekle" class="btn btn-primary text-white m-1" data-toggle="tooltip" href="/ajan/addproduct">
        <i class="fas fa-plus"></i> Yeni Ürün Ekle</a>

        <div id="accordion" class="mt-2">
          @foreach(\App\Category::all()->where('ParentCategory', 0)->take(4) as $cate)
          <div class="card">
            <div class="card-header" id="heading{{$cate->id}}">
              <h5 class="mb-0">
                <button class="btn btn-info w-100 text-left" data-toggle="collapse" data-target="#collapse{{$cate->id}}" aria-expanded="true" aria-controls="collapse{{$cate->id}}">
                  {{$cate->Title}}
                </button>
              </h5>
            </div>

            <div id="collapse{{$cate->id}}" class="collapse" aria-labelledby="heading{{$cate->id}}" data-parent="#accordion">
              <div class="card-body">
                <ul style="list-style-type:none;">
                  @foreach(\App\Category::all()->where('ParentCategory', $cate->id) as $scate)
                  <li><a href="{{url('/ajan/products/'.$scate->id)}}" class="btn btn-info w-75 text-left m-1">{{$scate->Title}} (Ürün Adedi:
                    @php($count = 0)
                    @foreach(\App\Product::all() as $prod)
                      @foreach(explode(',', $prod->Categories) as $prodcates)
                        @if( $prodcates == strval($scate->id) )
                          @php($count+=1)
                        @endif
                      @endforeach
                    @endforeach
                    {{$count}}
                    <?php // TODO: burayı daha efektif kullanmanın bi yolu olmalı... ?>
                    ) </a>
                    <a href="#" class="btn btn-danger text-left m-1">Ürünleri Temizle</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          @endforeach
        </div>
    </div>
  </div>
</section>
@endsection

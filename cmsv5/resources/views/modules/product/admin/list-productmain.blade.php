@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li class="active">Ürünlerim</li>
</ol>
<h1 class="page-header">Ürünlerim <small></small></h1>
@endsection
@section('content')
@if($message = Session::get('successmsg'))
<div class="alert alert-success">
  {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
  <div class="row panel panel-inverse">
    <div class="col-12 table-responsive">
      <a title="Yeni Ekle" class="btn btn-primary text-white m-1" data-toggle="tooltip" href="/ajan/addproduct">
        <i class="fas fa-plus"></i> Yeni Ürün Ekle</a>

        <div id="accordion" class="mt-2">
          @foreach(\App\Category::where('ParentCategory', 0)->take(4)->get() as $cate)
          <div class="card">
            <div class="card-header" id="heading{{$cate->id}}">
              <h5 class="mb-0">
                <button style="width:100%;" class="btn btn-light text-left" data-toggle="collapse" data-target="#collapse{{$cate->id}}" aria-expanded="true" aria-controls="collapse{{$cate->id}}">
                  {{'Kategori: '.$cate->Title}}
                </button>
              </h5>
            </div>

            <div id="collapse{{$cate->id}}" class="collapse" aria-labelledby="heading{{$cate->id}}" data-parent="#accordion">
              <div class="card-body">
                <ul style="list-style-type:none;">
                  @foreach(\App\Category::where('ParentCategory', $cate->id)->get() as $scate)
                  <li><a style="width:75%" href="{{url('/ajan/products/'.$scate->id)}}" class="btn btn-warning border border-info w-75 text-left m-1">{{$scate->Title}} (Ürün Adedi:
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
                    <!-- <a href="#" class="btn btn-danger text-left m-1">Ürünleri Temizle</a></li> -->
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          @endforeach
        </div>
    </div>
  </div>
@endsection

@extends('masters.admin')

@section('contenttitle')
<h1>Ürün Ekle</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item"><a href="/ajan/products">Ürünlerim</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ürün Ekle</li>
  </ol>
</nav>
{!! Form::open(['url' => 'ajan/addproduct/', 'files' => true]) !!}
<div class="row">
  <div class="col-6">
    <div class="form-group">
    {{Form::label('prod-title', 'Ürün Başlığı')}}<span class="badge-sonar ml-2" style="top:unset;"></span>
    {{Form::text('prod-title','',['class' => 'form-control', 'placeholder' => 'Ürün Başlığı'])}}
    </div>
    <div class="form-group">
    {{Form::label('prod-barkod', 'Ürün Barkodu')}}
    {{Form::text('prod-barkod','',['class' => 'form-control', 'placeholder' => 'Ürün Barkodu'])}}
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-8">
        {{Form::label('prod-price', 'Ürün Fiyatı')}}
        {{Form::number('prod-price', 0.01 ,['class' => 'form-control',
         'placeholder' => 'Ürün Fiyatı', 'step' =>0.01 , 'min' => 0.01])}}
        </div>
        <div class="col-4">
          <label for="prod-exchange">Fiyat Kuru</label>
          <select class="form-control" id="prod-exchange" name="prod-exchange">
            @foreach(\App\Exchange::all() as $unit)
              <option value="{{$unit->id}}">{{$unit->Title}} (x{{$unit->Multipler}})</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="form-group">
      <h5>{{Form::label('prod-cate', 'Ürün Kategorileri')}}<span class="badge-sonar ml-2" style="top:unset;"></span></h5>
      <div class="row">
      @foreach(\App\Category::where('Type','Header')->get() as $category)
      <div class="col-6">
        <div class="form-group">
        {{Form::label('prod-cate', 'Kategori: '.$category->Title)}}
        <br>
        @php($firstSCate = true)
        @foreach(\App\Category::where('ParentCategory',$category->id)->get() as $scate)
        @if($firstSCate)
        <input type="radio" name="radio{{$category->id}}" id="radio{{$category->id}}" value="0" autocomplete="off" checked/>
        <div class="btn-group">
            <label for="radio{{$category->id}}" class="btn btn-info">
                <span class="fas fa-check"></span>
                <span> </span>
            </label>
            <label for="radio{{$category->id}}" class="btn btn-light active">
                <i>*Tanımsız*</i>
            </label>
        </div>
        @php($firstSCate = false)
        @endif
          <br>
          <input type="radio" name="radio{{$category->id}}" id="radio{{$scate->id}}" value="{{$scate->id}}" autocomplete="off" />
          <div class="btn-group">
              <label for="radio{{$scate->id}}" class="btn btn-primary">
                  <span class="fas fa-check"></span>
                  <span> </span>
              </label>
              <label for="radio{{$scate->id}}" class="btn btn-light active">
                  {{$scate->Title}}@if($scate->UnitType!=0){{' (*)'}}@endif
              </label>
          </div>
          @endforeach
        </div>
      </div>
      @endforeach
    </div>
    </div>
  </div>
  <div class="col-6">
    <div class="form-group">
    {{Form::label('prod-desc', 'Ürün Açıklaması')}}
    {{Form::textarea('prod-desc','',['class' => 'form-control', 'placeholder' => 'Ürün Açıklaması', 'rows' => '5'])}}
    <small>Ürünü açıklayacak az ve öz bir metin ziyaretçi için kolaylık sağlayacaktır...</small>
    </div>
    <div class="form-group">
      <input type="checkbox" name="check1" id="check1" value="1" autocomplete="off"/>
      <div class="btn-group">
        <label for="check1" class="btn btn-primary">
          <span class="fas fa-check"></span>
          <span> </span>
        </label>
        <label for="check1" class="btn btn-light active">
          Öne Çıkan Ürün
        </label>
      </div>
      <input type="checkbox" name="check2" id="check2" value="2" autocomplete="off" checked/>
      <div class="btn-group">
        <label for="check2" class="btn btn-primary">
          <span class="fas fa-check"></span>
          <span> </span>
        </label>
        <label for="check2" class="btn btn-light active">
          Yeni Ürün
        </label>
      </div>
    </div>
    <div class="form-group">
        <label>Ürün Resmi</label><span class="badge-sonar ml-2" style="top:unset;"></span>
        <div class="input-group mb-2">
            <span class="input-group-btn">
                <span class="btn btn-primary btn-file mr-2">
                    Dosya Aç... <input type="file" id="imgInp" name="prod-filepath">
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>
        <img id='img-upload' style="width:100%;"/>
    </div>
    <div class="form-group float-right">
      {{Form::submit('Kaydet', ['class' => 'btn btn-primary'])}}
      <a class="btn btn-secondary" href="/ajan/categories">Geri</a>
    </div>
  </div>
</div>
{!! Form::close() !!}
@endsection

@extends('masters.admin')

@section('contenttitle')
<h1>Ürün Görselleri</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item"><a href="/ajan/products">Ürünlerim</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ürün Görselleri</li>
  </ol>
</nav>
<div class="row">
  <div class="col-8">
    {!! Form::open(['url' => 'ajan/productalbum/'.$pagevalues->id, 'files' => true]) !!}
    <div class="form-group">
        <label>Resim Ekle</label>
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
      {{Form::submit('Yeni Ekle', ['class' => 'btn btn-primary'])}}
      <a class="btn btn-secondary" href="/ajan/products">Geri</a>
    </div>
    {!! Form::close() !!}
    <br><br>
    <h3>Ürünün Diğer Görselleri</h3>
    <div class="form-group">
      <div class="row">
      @php($s_first = true)
      @foreach(explode(",", $pagevalues->ImgPaths) as $subpic)
      @if($s_first)@php($s_first = false)
      @else
      <div class="col-6 border border-dark">
        <img style="width:100%;" src="/uploads/modules/product/{{$subpic}}">
        <a class="text-danger" style="position: absolute; top: 0px; right: 0px;"
          title="Görsel Sil" href="/ajan/productalbum/del/{{$pagevalues->id}}/{{$subpic}}" data-toggle="tooltip">
          <i class="fas fa-trash-alt"></i>
        </a>
      </div>
      @endif
      @endforeach
      </div>
    </div>
  </div>
  <div class="col-4">
    @php($imagepath = $pagevalues->ImgPaths)
    @if(strpos($pagevalues->ImgPaths,','))
    @php($imagepath = substr($imagepath, 0 ,strpos($imagepath,',')))
    @endif
    <h3>Ürün Bilgileri</h3>
    <label>Ürün Adı:</label>
    <label><strong>{{$pagevalues->Title}}</strong></label><br>
    <label>Kapak Görseli:</label>
    <img style="width:100%;" src="/uploads/modules/product/{{$imagepath}}">
  </div>
</div>
@endsection

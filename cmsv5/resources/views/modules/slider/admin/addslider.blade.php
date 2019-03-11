@extends('masters.admin')

@section('contenttitle')
<h1>Slider Ekle</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item"><a href="/ajan/slidersettings">Slider</a></li>
    <li class="breadcrumb-item active" aria-current="page">Slider Ekle</li>
  </ol>
</nav>
{!! Form::open(['url' => 'ajan/addslider', 'files' => true]) !!}
<div class="form-group">
{{Form::label('slider-title', 'Slider Üst Başlığı')}}
{{Form::text('slider-title','',['class' => 'form-control', 'placeholder' => 'Slider Üst Başlığı'])}}
</div>
<div class="form-group">
{{Form::label('slider-bigtitle', 'Slider Büyük Başlık')}}
{{Form::text('slider-bigtitle','',['class' => 'form-control', 'placeholder' => 'Slider Büyük Başlık'])}}
</div>
<div class="form-group">
{{Form::label('slider-subtext', 'Başlık Altı Yazısı')}}
{{Form::text('slider-subtext','',['class' => 'form-control', 'placeholder' => 'Başlık Altı Yazısı'])}}
</div>
<div class="form-group row">
  <div class="col-4">
    {{Form::label('slider-buttontext', 'Slider Button Yazısı')}}
    {{Form::text('slider-buttontext','',['class' => 'form-control', 'placeholder' => 'Slider Button Yazısı'])}}
  </div>
  <div class="col-8">
    {{Form::label('slider-buttonlink', 'Slider Button Linki')}}
    {{Form::text('slider-buttonlink','',['class' => 'form-control', 'placeholder' => 'Slider Button Linki'])}}
  </div>
</div>
<div class="form-group row">
  <style>
    .btn-file {
      position: relative;
      overflow: hidden;
    }
    .btn-file input[type=file] {
      position: absolute;
      top: 0;
      right: 0;
      min-width: 100%;
      min-height: 100%;
      font-size: 100px;
      text-align: right;
      filter: alpha(opacity=0);
      opacity: 0;
      outline: none;
      background: white;
      cursor: inherit;
      display: block;
    }

    #img-upload{
      width: 100%;
    }
    #img-upload2{
      width: 100%;
    }
  </style>
  <div class="col-8">
      <div class="form-group">
          <label>Arkaplan Resmi</label>
          <div class="input-group mb-2">
              <span class="input-group-btn">
                  <span class="btn btn-primary btn-file mr-2">
                      Dosya Aç... <input type="file" id="imgInp" name="slider-filepath">
                  </span>
              </span>
              <input type="text" class="form-control" readonly>
          </div>
          <img id='img-upload'/>
      </div>
  </div>
  <div class="col-4">
      <div class="form-group">
          <label>Yan Mini Resmi</label>
          <div class="input-group mb-2">
              <span class="input-group-btn">
                  <span class="btn btn-primary btn-file mr-2">
                      Dosya Aç... <input type="file" id="imgInp2" name="slider-picpath">
                  </span>
              </span>
              <input type="text" class="form-control" readonly>
          </div>
          <img id='img-upload2'/>
      </div>
  </div>
</div>
<div class="form-group float-right">
  {{Form::submit('Kaydet', ['class' => 'btn btn-primary'])}}
  <a class="btn btn-secondary" href="/ajan/menupage">Geri</a>
</div>
{!! Form::close() !!}
@endsection

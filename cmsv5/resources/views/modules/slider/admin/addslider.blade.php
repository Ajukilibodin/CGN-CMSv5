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
{{Form::label('slider-title', 'Slider Üst Başlığı')}}<span class="badge-sonar ml-2" style="top:unset;"></span>
{{Form::text('slider-title','',['class' => 'form-control', 'placeholder' => 'Slider Üst Başlığı'])}}
</div>
<div class="form-group">
{{Form::label('slider-bigtitle', 'Slider Büyük Başlık')}}<span class="badge-sonar ml-2" style="top:unset;"></span>
{{Form::text('slider-bigtitle','',['class' => 'form-control', 'placeholder' => 'Slider Büyük Başlık'])}}
</div>
<div class="form-group">
{{Form::label('slider-subtext', 'Başlık Altı Yazısı')}}<span class="badge-sonar ml-2" style="top:unset;"></span>
{{Form::text('slider-subtext','',['class' => 'form-control', 'placeholder' => 'Başlık Altı Yazısı'])}}
</div>
<div class="form-group row">
  <div class="col-4">
    {{Form::label('slider-buttontext', 'Slider Button Yazısı')}}<span class="badge-sonar ml-2" style="top:unset;"></span>
    {{Form::text('slider-buttontext','',['class' => 'form-control', 'placeholder' => 'Slider Button Yazısı'])}}
  </div>
  <div class="col-8">
    {{Form::label('slider-buttonlink', 'Slider Button Linki')}}
    {{Form::text('slider-buttonlink','',['class' => 'form-control', 'placeholder' => 'Slider Button Linki'])}}
  </div>
</div>
<div class="form-group row">
  <div class="col-8">
      <div class="form-group">
          <label>Arkaplan Resmi</label><span class="badge-sonar ml-2" style="top:unset;"></span>
          <div class="input-group mb-2">
              <span class="input-group-btn">
                  <span class="btn btn-primary btn-file mr-2">
                      Dosya Aç... <input type="file" id="imgInp" name="slider-filepath">
                  </span>
              </span>
              <input type="text" class="form-control" readonly>
          </div>
          <img id='img-upload' style="width:100%;"/>
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
          <img id='img-upload2' style="width:100%;"/>
      </div>
  </div>
</div>
<div class="form-group float-right">
  {{Form::submit('Kaydet', ['class' => 'btn btn-primary'])}}
  <a class="btn btn-secondary" href="/ajan/menupage">Geri</a>
</div>
{!! Form::close() !!}
@endsection

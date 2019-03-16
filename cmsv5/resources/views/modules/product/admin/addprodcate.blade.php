@extends('masters.admin')

@section('contenttitle')
<h1>Ürün Özelliği Ekle</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item"><a href="/ajan/prodcate">Ürün Özellik Yönetimi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ürün Özelliği Ekle</li>
  </ol>
</nav>
{!! Form::open(['url' => 'ajan/addprodcate/']) !!}
<div class="row">
  <div class="col-xs-9 col-md-6">
    <div class="form-group">
    {{Form::label('prca-title', 'Özellik Başlığı')}}
    {{Form::text('prca-title','',['class' => 'form-control', 'placeholder' => 'Özellik Başlığı'])}}
    </div>
    <div class="form-group">
    {{Form::label('prca-name', 'Ünite Adı')}}
    {{Form::text('prca-name','',['class' => 'form-control', 'placeholder' => 'Ünite Adı'])}}
    </div>
    <div class="form-group">
    {{Form::label('prca-values', 'Alabildiği Değerler')}}
    {{Form::textarea('prca-values','',['class' => 'form-control', 'placeholder' => 'Alabildiği Değerler', 'rows' => '3'])}}
    <small>Alabileceği değerleri virgül (,) ile ayırarak yazınız...</small>
    </div>
    <div class="form-group float-right">
      {{Form::submit('Kaydet', ['class' => 'btn btn-primary'])}}
      <a class="btn btn-secondary" href="/ajan/categories">Geri</a>
    </div>
  </div>
</div>
{!! Form::close() !!}
@endsection

@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li><a href="/ajan/prodcate">Ürün Özellik Yönetimi</a></li>
  <li class="active">Ürün Özelliği Ekle</li>
</ol>
<h1 class="page-header">Ürün Özelliği Ekle <small></small></h1>
@endsection
@section('content')
{!! Form::open(['url' => 'ajan/addprodcate/']) !!}
<div class="row panel panel-inverse">
  <div class="col-xs-9 col-md-6">
    <div class="form-group">
    {{Form::label('prca-title', 'Özellik Başlığı')}}<span class="badge-sonar ml-2" style="top:unset;"></span>
    {{Form::text('prca-title','',['class' => 'form-control', 'placeholder' => 'Özellik Başlığı'])}}
    </div>
    <div class="form-group">
    {{Form::label('prca-name', 'Ünite Adı')}}<span class="badge-sonar ml-2" style="top:unset;"></span>
    {{Form::text('prca-name','',['class' => 'form-control', 'placeholder' => 'Ünite Adı'])}}
    </div>
    <div class="form-group">
    {{Form::label('prca-values', 'Alabildiği Değerler')}}<span class="badge-sonar ml-2" style="top:unset;"></span>
    {{Form::textarea('prca-values','',['class' => 'form-control', 'placeholder' => 'Alabildiği Değerler', 'rows' => '3'])}}
    <small>Alabileceği değerleri virgül (,) ile ayırarak yazınız...</small>
    </div>
    <div class="form-group float-right">
      {{Form::submit('Kaydet', ['class' => 'btn btn-primary'])}}
      <a class="btn btn-secondary" href="/ajan/prodcate">Geri</a>
    </div>
  </div>
</div>
{!! Form::close() !!}
@endsection

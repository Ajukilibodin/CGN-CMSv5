@extends('masters.admin')

@section('contenttitle')
<h1>Menü Ekle</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item"><a href="/ajan/menupage">Menü & Sayfa</a></li>
    <li class="breadcrumb-item active" aria-current="page">Menü Ekle</li>
  </ol>
</nav>
@include('libraries.errorpopper')
{!! Form::open(['url' => 'ajan/addmenu']) !!}
<div class="form-group">
{{Form::label('menu-title', 'Menü Başlığı')}}
{{Form::text('menu-title','',['class' => 'form-control', 'placeholder' => 'Menü Başlığı'])}}
</div>
<div class="form-group">
  <label for="menu-type">Menü Tipi</label>
  <select class="form-control" id="menu-type" name="menu-type">
    <option value="-1">Sayfa Başlığı</option>
    <option value="0">Anasayfa</option>
    <option value="1">İletişim</option>
    <option value="2">Ürünler</option>
  </select>
</div>
<div class="form-group float-right">
  {{Form::submit('Kaydet', ['class' => 'btn btn-primary'])}}
  <a class="btn btn-secondary" href="/ajan/menupage">Geri</a>
</div>
{!! Form::close() !!}
<script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<script>CKEDITOR.replace( 'menu-content' );</script>
@endsection

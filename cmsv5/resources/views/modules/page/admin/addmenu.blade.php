@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li><a href="/ajan/menupage">Menü & Sayfa</a></li>
  <li class="active">Menü Ekle</li>
</ol>
<h1 class="page-header">Menü Ekle <small></small></h1>
@endsection
@section('content')
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
@endsection

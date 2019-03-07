@extends('masters.admin')

@section('contenttitle')
<h1>Sayfa Ekle</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item"><a href="/ajan/menupage">Menü & Sayfa</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sayfa Ekle</li>
  </ol>
</nav>
@include('libraries.errorpopper')
{!! Form::open(['url' => 'ajan/addpage/'.$p_id, 'onsubmit'=> '$( "#page-content" ).val(CKEDITOR.instances.auctionDescription.getData());']) !!}
<div class="form-group">
{{Form::label('page-title', 'Sayfa Başlığı')}}
{{Form::text('page-title','',['class' => 'form-control', 'placeholder' => 'Sayfa Başlığı'])}}
</div>
<div class="form-group">
  {{Form::label('page-content', 'Sayfa İçeriği')}}
  {{Form::textarea('page-content','',['class' => 'form-control', 'placeholder' => 'Sayfa İçeriği'])}}
</div>
<div class="form-group float-right">
  {{Form::submit('Kaydet', ['class' => 'btn btn-primary'])}}
  <a class="btn btn-secondary" href="/ajan/menupage/{{$p_id}}">Geri</a>
</div>
{!! Form::close() !!}
<script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<script>CKEDITOR.replace( 'page-content' );</script>
@endsection

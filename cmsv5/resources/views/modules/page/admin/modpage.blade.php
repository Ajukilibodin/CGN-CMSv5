@extends('masters.admin')

@section('contenttitle')
<h1>Sayfa Düzenle</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item"><a href="/ajan/menupage">Menü & Sayfa</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sayfa Düzenle</li>
  </ol>
</nav>
{!! Form::open(['url' => 'ajan/modpage/'.$pagevalues->Value.'/'.$pagevalues->id, 'onsubmit'=> '$( "#page-content" ).val(CKEDITOR.instances.auctionDescription.getData());']) !!}
<div class="form-group">
{{Form::label('page-title', 'Sayfa Başlığı')}}
{{Form::text('page-title',$pagevalues->Title,['class' => 'form-control', 'placeholder' => 'Sayfa Başlığı'])}}
</div>
<div class="form-group">
  {{Form::label('page-content', 'Sayfa İçeriği')}}
  {{Form::textarea('page-content',$pagevalues->Content,['class' => 'form-control', 'placeholder' => 'Sayfa İçeriği'])}}
</div>
<div class="form-group float-right">
  {{Form::submit('Kaydet', ['class' => 'btn btn-primary'])}}
  <a class="btn btn-secondary" href="/ajan/menupage/{{$pagevalues->id}}">Geri</a>
</div>
{!! Form::close() !!}
<script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<script>CKEDITOR.replace( 'page-content' );</script>
@endsection

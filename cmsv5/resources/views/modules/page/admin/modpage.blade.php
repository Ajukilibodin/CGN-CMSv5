@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li><a href="/ajan/menupage">Menü & Sayfa</a></li>
  <li class="active">Sayfa Düzenle</li>
</ol>
<h1 class="page-header">Sayfa Düzenle <small></small></h1>
@endsection
@section('content')

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
  <a class="btn btn-secondary" href="/ajan/menupage/{{$pagevalues->Value}}">Geri</a>
</div>
{!! Form::close() !!}
<script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<script>CKEDITOR.replace( 'page-content' );</script>
@endsection

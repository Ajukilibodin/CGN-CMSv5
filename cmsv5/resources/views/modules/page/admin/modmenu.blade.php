@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li><a href="/ajan/menupage">Menü & Sayfa</a></li>
  <li class="active">Menü Düzenle</li>
</ol>
<h1 class="page-header">Menü Düzenle <small></small></h1>
@endsection
@section('content')

{!! Form::open(['url' => 'ajan/modmenu/'.$menuvalues->id]) !!}
<div class="form-group">
{{Form::label('menu-title', 'Menü Başlığı')}}
{{Form::text('menu-title',$menuvalues->Title,['class' => 'form-control', 'placeholder' => 'Menü Başlığı'])}}
</div>
<div class="form-group">
  <label for="menu-type">Menü Tipi</label>
  <select class="form-control" id="menu-type" name="menu-type">
    <option value="-1">Sayfa Başlığı</option>
    <option value="0" @if($menuvalues->Type == 'DefinedPage' && $menuvalues->Value == 0){{"selected"}}@endif >Anasayfa</option>
    <option value="1" @if($menuvalues->Type == 'DefinedPage' && $menuvalues->Value == 1){{"selected"}}@endif >İletişim</option>
    <option value="2" @if($menuvalues->Type == 'DefinedPage' && $menuvalues->Value == 2){{"selected"}}@endif >Ürünler</option>
  </select>
  <small hidden class="text-danger">Eğer menü tipi değeri "Sayfa Başlığı" iken başka bir tipe dönüştürürseniz bu başlık altında bulunan tüm sayfalar otomatik olarak silinir. <strong>Geri dönüşü yoktur!</strong></small>
</div>
<div class="form-group float-right">
  {{Form::submit('Kaydet', ['class' => 'btn btn-primary'])}}
  <a class="btn btn-secondary" href="/ajan/menupage">Geri</a>
</div>
{!! Form::close() !!}
@endsection

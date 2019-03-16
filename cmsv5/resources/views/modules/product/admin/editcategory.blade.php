@extends('masters.admin')

@section('contenttitle')
<h1>Kategori Düzenle</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item"><a href="/ajan/categories">Kategori Yönetimi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Kategori Düzenle</li>
  </ol>
</nav>
{!! Form::open(['url' => 'ajan/editcategory/'.$c_id]) !!}
@php($cate = App\Category::where('id',$c_id)->first())
<div class="row">
  <div class="col-xs-9 col-md-6">
    <div class="form-group">
    {{Form::label('cate-title', 'Kategori Başlığı')}}
    {{Form::text('cate-title', $cate->Title ,['class' => 'form-control', 'placeholder' => 'Kategori Başlığı'])}}
    </div>
    @if( $cate->Type=='Category' )
    <div class="form-group">
      <label for="cate-type">Ürün Özellik Türü</label>
      <select class="form-control" id="cate-type" name="cate-type">
        <option value="0">*Tanımsız*</option>
        @foreach(\App\PCategory::all() as $unit)
          <option value="{{$unit->id}}" @if($cate->UnitType == $unit->id){{"selected"}}@endif >{{$unit->Title}} ({{$unit->UnitName}})</option>
        @endforeach
      </select>
    </div>
    @endif
    <div class="form-group float-right">
      {{Form::submit('Kaydet', ['class' => 'btn btn-primary'])}}
      <a class="btn btn-secondary" href="/ajan/categories">Geri</a>
    </div>
  </div>
</div>
{!! Form::close() !!}
@endsection

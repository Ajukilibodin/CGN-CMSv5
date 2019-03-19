@extends('masters.admin')

@section('contenttitle')
<h1>Kategori Ekle</h1>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/ajan">Anasayfa</a></li>
    <li class="breadcrumb-item"><a href="/ajan/categories">Kategori Yönetimi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Kategori Ekle</li>
  </ol>
</nav>
{!! Form::open(['url' => 'ajan/addcategory/'.$c_id]) !!}
<div class="row">
  <div class="col-xs-9 col-md-6">
    <div class="form-group">
    {{Form::label('cate-title', 'Kategori Başlığı')}}
    {{Form::text('cate-title','',['class' => 'form-control', 'placeholder' => 'Kategori Başlığı'])}}
    </div>
    @if( $c_id!=0 )
    <div class="form-group">
      <label for="cate-type">Ürün Özellik Türü</label>
      <select class="form-control" id="cate-type" name="cate-type">
        <option value="0">*Tanımsız*</option>
        @foreach(\App\PCategory::all() as $unit)
          <option value="{{$unit->id}}">{{$unit->Title}} ({{$unit->UnitName}})</option>
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

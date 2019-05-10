@extends('masters.admin')

@section('contenttitle')
<ol class="breadcrumb pull-right">
  <li><a href="/ajan">Anasayfa</a></li>
  <li><a href="/ajan/categories">Kategori Yönetimi</a></li>
  <li class="active">Kategori Ekle</li>
</ol>
<h1 class="page-header">Kategori Ekle <small></small></h1>
@endsection
@section('content')
{!! Form::open(['url' => 'ajan/addcategory/'.$c_id, 'files' => true]) !!}
<div class="row panel panel-inverse">
  <div class="col-md-6">
    <div class="form-group">
    {{Form::label('cate-title', 'Kategori Başlığı')}}<span class="badge-sonar ml-2" style="top:unset;"></span>
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
  </div>
  <div class="col-md-6">
    <div class="form-group">
        <label>Kategori Resmi</label><span class="badge-sonar ml-2" style="top:unset;"></span>
        <div class="input-group mb-2">
            <span class="input-group-btn">
                <span class="btn btn-primary btn-file mr-2">
                    Dosya Aç... <input type="file" id="imgInp" name="cate-filepath">
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>
        <img id='img-upload' style="width:100%;"/>
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group float-right">
      {{Form::submit('Kaydet', ['class' => 'btn btn-primary'])}}
      <a class="btn btn-secondary" href="/ajan/categories">Geri</a>
    </div>
  </div>
</div>
{!! Form::close() !!}
@endsection
